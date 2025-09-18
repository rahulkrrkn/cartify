import Redis from "ioredis";
import helper from "../../utils/helper.utils.js";
import SendEmail from "../../utils/email.utils.js";
import { emailValidator } from "../../validator/email.vtr.js";
import { returnSuccess, returnError } from "../../utils/commonFn.utils.js";

const redis = new Redis();

export const sendOtp = async (email) => {
    const result = emailValidator(email);
    if (!result.success) return returnError(result.message, { type: "ValidationError" });

    const redisKey = "loginOtp:" + result.data.email;
    if (await redis.get(redisKey)) {
        return returnSuccess({ email: result.data.email }, "OTP already sent");
    }

    const otp = helper.generateOtp(6);
    console.log("Generated OTP:", otp);

    await SendEmail.single(
        result.data.email,
        "Your OTP Code",
        `Your OTP is: ${otp}`,
        `<h2>Your OTP is: ${otp}</h2>`
    );

    await redis.set(redisKey, otp, "EX", 600, "NX");
    return returnSuccess({ email: result.data.email }, "OTP sent successfully");
};

export const verifyOtp = async (email, otp) => {
    const result = emailValidator(email);
    if (!result.success) return returnError(result.message, { type: "ValidationError" });

    const redisKey = "loginOtp:" + result.data.email;
    const savedOtp = await redis.get(redisKey);

    if (!savedOtp) return returnError("OTP expired", { type: "OTPError" });
    if (savedOtp !== otp) return returnError("Invalid OTP", { type: "OTPError" });

    await redis.del(redisKey); // clear OTP
    return returnSuccess({ email: result.data.email }, "OTP verified");
};
