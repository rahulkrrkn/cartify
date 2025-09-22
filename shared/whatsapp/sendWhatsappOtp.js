import { returnSuccess } from "./../utils/commonFn.utils.js"
export const sendWhatsappOtp = (number, otp, template) => {
    number = "+91" + number;
    console.log("mobile No :" + number, "OTP : ", otp, "Currently otp system Not working");
    // console.info("Whatsapp OTP is :", otp)


    return returnSuccess(null, "Whatsapp API Not working")
}