import helper from "../../utils/helper.utils.js";
import SendEmail from "../../utils/email.utils.js";
import { emailValidator } from "../../validator/email.vtr.js";
import { sendSuccess, sendError } from "../../utils/commonFn.utils.js";
import Redis from "ioredis";

const redis = new Redis();

// --- Send OTP to Email ---
export const sendOtpToEmail = async (req, res) => {
    try {
        if (!req.body || !req.body.email) {
            return sendError(res, "Email is required", { type: "ValidationError" }, 400);
        }

        const result = emailValidator(req.body.email);
        if (!result.success) {
            return sendError(res, result.message || "Invalid email", { type: "ValidationError" }, 400);
        }

        // --If OTP already sent, don’t send again
        const redisKey = "loginOtp:" + result.data.email;
        if (await redis.get(redisKey)) {
            return sendSuccess(res, "OTP already sent. Please check your inbox.", { email: result.data.email });
        }

        // -- Generate OTP
        const otp = helper.generateOtp(6);
        console.log("Generated OTP:", otp); // temp log (remove in prod)

        // -- Send OTP
        await SendEmail.single(
            result.data.email,
            "Your OTP Code",
            `Your OTP is: ${otp}`,
            `<h2>Your OTP is: ${otp}</h2>`
        );

        // -- Save OTP in Redis with expiry (10 mins)
        await redis.set(redisKey, otp, "EX", 600, "NX");

        return sendSuccess(res, "OTP sent successfully!", { email: result.data.email });
    } catch (err) {
        console.error("Email send error:", err.message);
        return sendError(res, "Email send failed!", { type: "EmailError", details: err.message }, 500);
    }
}

// --- Verify OTP ---
export const verifyEmailOtp = async (req, res) => {
    try {
        if (!req.body || !req.body.otp || !req.body.email) {
            return sendError(res, "Email and OTP are required", { type: "ValidationError" }, 400);
        }

        const { otp, email } = req.body;
        const result = emailValidator(email);
        if (!result.success) {
            return sendError(res, result.message || "Invalid email", { type: "ValidationError" }, 400);
        }

        const redisKey = "loginOtp:" + result.data.email;
        const savedOtp = await redis.get(redisKey);

        if (!savedOtp) {
            return sendError(res, "OTP expired", { type: "OTPError", details: "OTP not found or expired" }, 400);
        }

        if (savedOtp === otp) {
            await redis.del(redisKey); // Clear OTP after success
            return sendSuccess(res, "OTP verified", { email: result.data.email });
        } else {
            return sendError(res, "Invalid OTP", { type: "OTPError", details: "OTP does not match" }, 400);
        }
    } catch (err) {
        console.error("OTP verification error:", err.message);
        return sendError(res, "Server error during OTP verification", { type: "ServerError", details: err.message }, 500);
    }
}

