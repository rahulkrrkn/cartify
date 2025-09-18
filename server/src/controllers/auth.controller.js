import { sendOtp, verifyOtp } from "../services/auth/emailOtp.service.js";
import { sendSuccess, sendError } from "../utils/commonFn.utils.js";

export const sendOtpToEmail = async (req, res) => {
    const { email } = req.body || {};
    if (!email) return sendError(res, "Email is required");

    const result = await sendOtp(email);
    return result.success
        ? sendSuccess(res, result.message, result.data)
        : sendError(res, result.message, result.error);
};

export const verifyEmailOtp = async (req, res) => {
    const { email, otp } = req.body || {};
    if (!email || !otp) return sendError(res, "Email and OTP are required");

    const result = await verifyOtp(email, otp);
    if (!result.success) return sendError(res, result.message, result.error);

    //// After OTP verification → handle user + JWT
    //// Set cookies


    return sendSuccess(res, "OTP verified and login successful", { user: email });
};
