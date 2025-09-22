// --Done
// whatsapp integration remaining when done in /shared/whatsapp/sendWhatsappOtp.js
import Joi from "joi";
import Redis from "ioredis";
const redis = new Redis();
import { asyncWrap, sendError, sendSuccess, generateJwtToken } from "../../../../shared/utils/commonFn.utils.js"
import { emailNormalization } from "../../../../shared/utils/helperStatus.utils.js"
import { generateOtp, uniqueId } from "../../../../shared/utils/helperDirect.utils.js"
import SendEmail from "./../../../../shared/email/sendEmail.js";
import { sendWhatsappOtp } from "./../../../../shared/whatsapp/sendWhatsappOtp.js";


export const sendEmailOtpRoute = async (req, res) => {
    const { error, value } = Joi.object({ email: Joi.string().email().required() }).validate(req.body)
    if (error) return sendError(res, error.message, error.details);
    const tempEmail = emailNormalization(value.email);
    if (!tempEmail.success) return sendError(res, tempEmail.message);
    const email = tempEmail.data.email;
    const emailOtp = generateOtp(6);
    await SendEmail.single(email, "Cartify seller account OTP", "Your OTP is " + emailOtp, "Your OTP is " + emailOtp);
    await redisKeySellerEmailOtp(email, emailOtp)

    return sendSuccess(res, "OTP sent successfully", { email: value.email });
}

const redisKeySellerEmailOtp = async (newEmail, otp) => {
    const redisKey = "seller:signup:emailOtp:" + newEmail;
    await redis.set(redisKey, otp, "EX", 600, "NX");
}


export const sendWhatsappOtpRoute = async (req, res) => {
    const { error, value } = Joi.object({ phone: Joi.string().pattern(/^[0-9]{10}$/).required() }).validate(req.body)
    if (error) return sendError(res, error.message, error.details);
    const phone = value.phone;
    const whatsappOtp = generateOtp(6);
    await sendWhatsappOtp(phone, whatsappOtp);
    await redisKeySellerWhatsappOtp(phone, whatsappOtp)
    return sendSuccess(res, "OTP sent successfully to whatsApp", { phone: value.phone });
}

const redisKeySellerWhatsappOtp = async (phone, otp) => {
    const redisKey = "seller:signup:whatsappOtp:" + phone;
    await redis.set(redisKey, otp, "EX", 600, "NX");
}

export default asyncWrap(async (req, res) => {
    const { error, value } = Joi.object({
        email: Joi.string().email().required().label("Email Id"),
        phone: Joi.string().pattern(/^[0-9]{10}$/).required().label("Mobile Number"),
        firstName: Joi.string().min(2).max(50).required().label("First Name"),
        lastName: Joi.string().min(2).max(50).required().label("Last Name"),
        email_otp: Joi.number().min(100000).max(999999).integer().required().label("Email OTP"),
        phone_otp: Joi.number().min(100000).max(999999).integer().required().label("whatsapp OTP"),
    }).validate(req.body, { abortEarly: false })
    if (error) return sendError(res, error.message, error.details.map(err => err.message).join(", "))
    const { email, phone, firstName, lastName, email_otp, phone_otp } = value;
    const temp = emailNormalization(email);
    if (!temp.success) {
        return sendError(res, temp.message);
    }
    const filterEmail = temp.data.email;
    const savedEmailOtp = await redisKeySellerEmailOtpGet(filterEmail)
    const savedWhatsappOtp = await redisKeySellerWhatsappOtpGet(phone)
    if (savedEmailOtp == null) return sendError(res, "Email OTP Expired");
    if (savedWhatsappOtp == null) return sendError(res, "whatsApp OTP Expired");
    if (String(email_otp) !== savedEmailOtp) return sendError(res, "Please Enter valid Email OTP");
    if (String(phone_otp) !== savedWhatsappOtp) return sendError(res, "Please Enter valid WhatsApp OTP");

    const tempUuid = uniqueId();
    const jwtTOken = generateJwtToken("JWT_SELLER_AUTH", { uniqueId: tempUuid }, 1)
    const key = "seller:signup:data:" + tempUuid;
    await redis.hset(key, { email, phone, firstName, lastName });
    await redis.expire(key, 2 * 24 * 60 * 60); // expires in 2 day
    // Set cookie
    res.cookie("seller_signup", jwtTOken, {
        httpOnly: true,
        secure: process.env.NODE_ENV === "production",
        sameSite: "strict",
        maxAge: 2 * 24 * 60 * 60 * 1000 // 2 days
    });

    return sendSuccess(res, "Data Saved success");
})

const redisKeySellerWhatsappOtpGet = async (phone) => {
    const redisKey = "seller:signup:whatsappOtp:" + phone;
    return await redis.get(redisKey);
}
const redisKeySellerEmailOtpGet = async (newEmail) => {
    const redisKey = "seller:signup:emailOtp:" + newEmail;
    return await redis.get(redisKey);
}



