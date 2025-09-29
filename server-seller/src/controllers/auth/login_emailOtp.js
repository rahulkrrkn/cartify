import Joi from "joi";
import Redis from "ioredis";
const redis = new Redis();
import { validateBody } from "../../../../shared/middleware/validateBody.js";
import SendEmail from "./../../../../shared/email/sendEmail.js";
import { asyncWrap, sendError, sendSuccess, generateJwtToken, returnError } from "../../../../shared/utils/commonFn.utils.js"
import { generateOtp, uniqueId } from "../../../../shared/utils/helperDirect.utils.js"
import { emailNormalization } from "../../../../shared/utils/helperStatus.utils.js"
import { findEmailAccount } from "./../../models/auth_loginSeller.js"
const validateEmail = Joi.object({
    email: Joi.string().email().required().label("Email Id"),
}).required().label("Email ID")


const redisKeySellerEmailOtp = async (newEmail, otp) => {
    const redisKey = "seller:auth:login:emailOtp:" + newEmail;
    await redis.set(redisKey, otp, "EX", 1200, "NX");
}
export const login_usingEmailOtp = [validateBody(validateEmail), async (req, res) => {
    const temp = emailNormalization(req.body.email);
    if (!temp.success) {
        return sendError(res, temp.message);
    }
    const email = temp.data.email;
    const emailOtp = generateOtp(6);
    await SendEmail.single(email, "Cartify seller account OTP", "Your OTP is " + emailOtp, "Your OTP is " + emailOtp);
    await redisKeySellerEmailOtp(email, emailOtp)
    return sendSuccess(res, "OTP sent successfully",);

}]




// export verify otp

const validateOtp = Joi.object({
    email: Joi.string().email().required().label("Email Id"),
    email_otp: Joi.string().length(6).pattern(/^[0-9]+$/).required().label("Email OTP"),
}).required().label("Email and otp")

const redisKeySellerEmailOtpGet = async (newEmail) => {
    const redisKey = "seller:auth:login:emailOtp:" + newEmail;
    return await redis.get(redisKey);
}



export const login_usingEmailOtpVerify = [validateBody(validateOtp), async (req, res) => {
    const otp = req.body.email_otp;
    const temp = emailNormalization(req.body.email);
    if (!temp.success) {
        return sendError(res, temp.message);
    }
    const email = temp.data.email;
    const oldOtp = await redisKeySellerEmailOtpGet(email);
    if (oldOtp != otp) {
        return sendError(res, "Please enter valid email or otp");
    }
    // login user if account
    const loginSeller = await findEmailAccount(email);
    const redisKey = "seller:auth:login:emailOtp:" + email;
    // remove redis data
    await redis.del(redisKey)


    if (loginSeller.length == 0) {
        return sendError(res, "Dont have seller account");
    }
    const jwtData = {
        user_id: loginSeller[0].user_id,
        seller_id: loginSeller[0].seller_id,
        mongo_id: loginSeller[0].mongoId,
        email: loginSeller[0].email,
        role: "seller",
    }
    // create new jet
    const token = generateJwtToken("JWT_SELLER_LOGIN", jwtData, 7)

    res.cookie("s_login", token, {
        httpOnly: true,
        secure: process.env.NODE_ENV === "production",
        sameSite: "strict",
        maxAge: 7 * 24 * 60 * 60 * 1000 // 7 days
    });
    return sendSuccess(res, "login Success")

}]
