// Working
import helper from "../../utils/helper.utils.js";
import SendEmail from "../../utils/email.utils.js";


export default {
    sendOtpToEmail: async (req, res) => {
        const emailId = req.body.email;
        const otp = helper.generateOtp(6)
        if (!helper.isValidEmail(emailId)) {
            return res.json({ status: "error", message: "Please Enter your valid email", code: "INVALID_EMAIL" })
        }

        try {
            await SendEmail.single(
                emailId,
                "Your OTP Code",
                `Your OTP is: ${otp}`,
                `<h2>Your OTP is: ${otp}</h2>`
            );

            return res.json({ success: true, message: "OTP sent successfully!" });
        } catch (err) {
            return res.status(500).json({ success: false, message: "Email send failed!" });
        };

    }

}

