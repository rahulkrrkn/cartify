import transporter from "../config/email.js";

export default class SendEmail {
    // Send single mail
    static async single(to, subject, text, html = "") {
        try {
            const info = await transporter.sendMail({
                from: `"Cartify" <${process.env.EMAIL_USER}>`,
                to,
                subject,
                text,
                html,
            });
            console.log("Email sent:", info.messageId);
            return info;
        } catch (err) {
            console.error("Error sending email:", err);
            throw err;
        }
    }

    // Send bulk mail
    static async bulk(recipients, subject, text, html = "") {
        try {
            const info = await transporter.sendMail({
                from: `"Cartify" <${process.env.EMAIL_USER}>`,
                bcc: recipients, 
                subject,
                text,
                html,
            });
            console.log("Bulk email sent:", info.messageId);
            return info;
        } catch (err) {
            console.error("Error sending bulk email:", err);
            throw err;
        }
    }
}
