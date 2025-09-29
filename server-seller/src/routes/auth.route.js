import express from "express";
const router = express.Router();
import signup_createAccount, { sendEmailOtpRoute, sendWhatsappOtpRoute } from "../controllers/auth/signup_create-account.js";
import signup_sellerDetails from "../controllers/auth/signup_seller-details.js";
import signup_legalDocuments from "../controllers/auth/signup_legal-documents.js";
import { login_usingEmailOtp, login_usingEmailOtpVerify } from "../controllers/auth/login_emailOtp.js";


// Signup
router.post("/signup/create-account/email/otp", sendEmailOtpRoute);
router.post("/signup/create-account/whatsapp/otp", sendWhatsappOtpRoute);
router.post("/signup/create-account", signup_createAccount);
router.post("/signup/seller-details", signup_sellerDetails);
router.post("/signup/legal-documents", signup_legalDocuments);
router.post("/login/email/otp", login_usingEmailOtp);
router.post("/login/email/otp/verify", login_usingEmailOtpVerify);




export default router;