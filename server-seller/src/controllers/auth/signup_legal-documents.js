



import fs from "fs";
import path from "path";
import { validateBody } from "../../../../shared/middleware/validateBody.js";
import { jwtValidator } from "../../../../shared/middleware/jwtValidator.js";
import { createUploader } from "../../../../shared/middleware/uplodeImage.js";
import Joi from "joi";
import Redis from "ioredis";
import { sendError, sendSuccess, generateJwtToken, returnSuccess } from "../../../../shared/utils/commonFn.utils.js";
import sellerSignup, { User } from "./../../models/auth_signup_seller.js"




const redis = new Redis();
// Joi schema for seller details
const schema_SellerDocument = Joi.object({
    store_gst_number: Joi.string().empty("").default(null).label("Gst Number"),
    owner_pan: Joi.string().empty("").default(null).label("Pan Card"),
    bank_account_no: Joi.string().empty("").default(null).label("Account no"),
    ifsc_code: Joi.string().empty("").default(null).label("IFSC Code"),
    upi_id: Joi.string().empty("").default(null).label("Upi ID"),
    name_on_upi: Joi.string().empty("").default(null).label("Name on UPI"),
}).required().label("Data");

// create uploader instance (5 MB limit)
const upload = createUploader("sellers", 5);

export default [
    jwtValidator("JWT_SELLER_AUTH", "seller_signup"),
    upload.single("pan_image"),
    validateBody(schema_SellerDocument),
    async (req, res) => {
        const { store_gst_number, owner_pan, bank_account_no, ifsc_code, upi_id, name_on_upi } = req.validatedBody;
        if (!req.file) {
            return sendError(res, "File not uploded")
        }
        // get data from redis
        const key = "seller:signup:data:" + req.validatedJwt.uniqueId;
        const tempData = await redis.hgetall(key);
        if (!tempData.email) return sendError(res, "Session Expire try again")
        const store_name = tempData.store_name;
        // rename pan image
        const ext = path.extname(req.file.originalname);
        let seoName = store_name.toLowerCase()
            .replace(/\s+/g, "-")
            .replace(/[^a-z0-9\-]/g, "");
        const finalName = `${seoName}-pan-${Date.now()}${ext}`;

        const oldPath = req.file.path;
        const newPath = path.join(path.dirname(oldPath), finalName);
        await fs.promises.rename(oldPath, newPath);

        // store current data in varible
        tempData.store_gst_number = store_gst_number;
        tempData.owner_pan = owner_pan;
        tempData.bank_account_no = bank_account_no;
        tempData.ifsc_code = ifsc_code;
        tempData.upi_id = upi_id;
        tempData.name_on_upi = name_on_upi;
        tempData.pan_image = finalName;
        // create or find user
        const findUser = await sellerSignup.findUser(tempData.email)
        if (findUser.length === 0) {
            let userData = await sellerSignup.createUser(tempData);
            tempData.user_id = userData.insertId
            const user = new User({ email: tempData.email, user_id: tempData.user_id });
            let users = await user.save();
            tempData.mongoId = users._id.toString() || null;
            let final = await sellerSignup.updateMongoId(tempData)
        } else {
            tempData.user_id = findUser[0].user_id;
            await sellerSignup.updateUser(tempData);
        }
        // create or find seller
        const findSeller = await sellerSignup.findSeller(tempData);
        if (findSeller.length != 0) {
            return sendError(res, "You have already account please login ");
        }

        const createSeller = await sellerSignup.createSeller(tempData);
        if (!createSeller.insertId) return sendError(res, "someting went wrong please try again later");
        tempData.seller_id = createSeller.insertId;
        const jwtData = {
            user_id: tempData.user_id,
            seller_id: tempData.seller_id,
            mongo_id: tempData.mongoId,
            email: tempData.email,
            role: "seller",
        }
        // create new jet
        const token = generateJwtToken("JWT_SELLER_LOGIN", jwtData, 7)
        // remove redis data
        await redis.del(key);
        // Set cookie
        res.clearCookie("seller_signup");
        res.cookie("s_login", token, {
            httpOnly: true,
            secure: process.env.NODE_ENV === "production",
            sameSite: "strict",
            maxAge: 7 * 24 * 60 * 60 * 1000 // 7 days
        });

        return sendSuccess(res, "Seller details saved successfully", {})
    }
];