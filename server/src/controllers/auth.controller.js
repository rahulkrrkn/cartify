import { sendSuccess, sendError, returnError } from "../utils/commonFn.utils.js";
import { verifyPassword } from "../services/auth/passwordLogin.service.js";
import { sendOtp, verifyOtp } from "../services/auth/emailOtp.service.js";
import { loginOrSignupUser } from "../services/auth/userSignupLogin.service.js";



// --OTP send
export const sendOtpToEmail = async (req, res) => {
    const { email } = req.body || {};
    if (!email) return sendError(res, "Email is required");

    const result = await sendOtp(email);
    return result.success
        ? sendSuccess(res, result.message, result.data)
        : sendError(res, result.message, result.error);
};



// --Verify otp and login user
// pending Login system
export const verifyEmailOtp = async (req, res) => {
    const { email, otp } = req.body || {};
    if (!email || !otp) return sendError(res, "Email and OTP are required");

    const result = await verifyOtp(email, otp);
    if (!result.success) return sendError(res, result.message, result.error);
    const finalResult = await loginOrSignupUser(email);
    if (!finalResult.success) {
        return sendError(res, "login failed");
    }
    // Set cookie
    res.cookie("token", finalResult.data, {
        httpOnly: true,
        secure: process.env.NODE_ENV === "production",
        sameSite: "strict",
        maxAge: 7 * 24 * 60 * 60 * 1000 // 7 days
    });
    return sendSuccess(res, "OTP verified and login successful", { user: email });
};



// --PendingFn
export const loginWithPassword = async (req, res) => {
    const { username, password } = req.body || {};
    if (!username || !password) return sendError(res, "Email or Mobile no are required");
    const result = await verifyPassword(username, password);
    return returnError("Pending")
}

// --PendingFn
export const sendOtpToMobile = async (req, res) => {

}

// --PendingFn
export const verifyMobileOtp = async (req, res) => {

}

// --PendingFn
export const sendOtpToWhatsapp = async (req, res) => {

}
// --PendingFn
export const verifyWhatsappOtp = async (req, res) => {

}



