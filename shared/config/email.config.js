// v 0.0.0
import nodemailer from "nodemailer";
import dotenv from "dotenv";
dotenv.config();


console.log(process.env.EMAIL_USER)
console.log(process.env.EMAIL_PASS)
const transporter = nodemailer.createTransport({
    service: "gmail",
    auth: {
        user: process.env.EMAIL_USER,
        pass: process.env.EMAIL_PASS,
    },
});

export default transporter;
