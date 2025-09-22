import { v4 as uuidv4 } from "uuid";
// generate OTP
export const generateOtp = (length = 6) => {
    return Math.floor(
        Math.pow(10, length - 1) + Math.random() * 9 * Math.pow(10, length - 1)
    ).toString();
}


export const uniqueId = () => {
    return uuidv4()
}

