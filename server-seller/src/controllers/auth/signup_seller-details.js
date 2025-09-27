import fs from "fs";
import path from "path";
import { validateBody } from "../../../../shared/middleware/validateBody.js";
import { jwtValidator } from "../../../../shared/middleware/jwtValidator.js";
import { createUploader } from "../../../../shared/middleware/uplodeImage.js";
import Joi from "joi";
import Redis from "ioredis";
import { sendError, sendSuccess } from "../../../../shared/utils/commonFn.utils.js";
const redis = new Redis();
// Joi schema for seller details
const schema_SellerDetail = Joi.object({
    store_name: Joi.string().min(5).required().label("Store Name"),
    store_full_address: Joi.string().min(5).required().label("Store Full Address"),
    store_pincode: Joi.string().length(6).pattern(/^[0-9]+$/).required().label("Store Pincode"),
}).required().label("Data");

// create uploader instance (5 MB limit)
const upload = createUploader("sellers", 5);

export default [
    jwtValidator("JWT_SELLER_AUTH", "seller_signup"),
    upload.single("store_logo"), // field name in frontend
    validateBody(schema_SellerDetail),
    async (req, res) => {
        const { store_name, store_full_address, store_pincode } = req.validatedBody;
        if (!req.file) {
            return res.status(400).json({ error: "No file uploaded" });
        }

        const key = "seller:signup:data:" + req.validatedJwt.uniqueId;


        const tempData = await redis.hgetall(key);
        if (!tempData.email) return sendError(res, "Session Expire try again")

        // SEO-friendly filename
        const ext = path.extname(req.file.originalname);
        let seoName = store_name.toLowerCase()
            .replace(/\s+/g, "-")
            .replace(/[^a-z0-9\-]/g, "");
        const finalName = `${seoName}-${Date.now()}${ext}`;

        const oldPath = req.file.path;
        const newPath = path.join(path.dirname(oldPath), finalName);
        // Rename file asynchronously
        await fs.promises.rename(oldPath, newPath);

        await redis.hset(key, { store_name, store_full_address, store_pincode, store_logo: finalName });
        await redis.expire(key, 2 * 24 * 60 * 60); // expires in 2 day

        return sendSuccess(res, "Seller details saved successfully", { store_name, store_full_address, store_pincode })
    }
];
