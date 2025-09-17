// Working
import helper from "../../utils/helper.utils.js";
import SendEmail from "../../utils/email.utils.js";
import { emailValidator } from "./../../validator/email.vtr.js";
import Redis from "ioredis";
const redis = new Redis()
export default {
    sendOtpToEmail: async (req, res) => {
        // Checking email resived or not
        if (!req.body) {
            return res.json({ success: false, message: "Something went wrong" });
        }
        if (!req.body.email) {
            return res.json({ success: false, message: "Please enter your email" });
        }

        const result = emailValidator(req.body.email);
        if (!result.success) {
            return res.json(result)
        }

        const otp = helper.generateOtp(6)
        // Sending OTP
        try {
            await SendEmail.single(
                result.data.email,
                "Your OTP Code",
                `Your OTP is: ${otp}`,
                `<h2>Your OTP is: ${otp}</h2>`
            );
            const redisKey = "loginOtp:" + result.data.email
            await redis.set(redisKey, otp);
            await redis.expire(redisKey, 10 * 60);

            return res.json({ success: true, message: "OTP sent successfully!" });
        } catch (err) {
            return res.json(500).json({ success: false, message: "Email send failed!" });
        };


    }

}

