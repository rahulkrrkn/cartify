// --Working
import express from "express";
const router = express.Router();
import { verifyEmailOtp, sendOtpToEmail, loginWithPassword, sendOtpToMobile, verifyMobileOtp, sendOtpToWhatsapp, verifyWhatsappOtp } from "./../controllers/auth.controller.js"


// --- Signup / Email flow ---
router.post("/signup/email/otp", sendOtpToEmail);
router.post("/signup/email/otp/verify", verifyEmailOtp);



// // --- Login with email/OTP ---
// --Pending Creating users
router.post("/login/email/otp", sendOtpToEmail);
router.post("/login/email/otp/verify", verifyEmailOtp);


// --- Login with email/password ---
// --PendingFn
router.post("/login", loginWithPassword);


// --- Login with mobile OTP ---
// --PendingFn
router.post("/login/mobile/otp", sendOtpToMobile);
router.post("/login/mobile/otp/verify", verifyMobileOtp);


// --- Login with Whatsapp OTP ---
// --PendingFn
router.post("/login/whatsapp/otp", sendOtpToWhatsapp);
router.post("/login/whatsapp/otp/verify", verifyWhatsappOtp);

export default router;






router.post("/set-password", (req, res) => {
    res.json({ route: "/set-password", body: req.body });
});
router.post("/verify-mobile-login", (req, res) => {
    res.json({ route: "/verify-mobile-login", body: req.body });
});









// --- Google login / linking ---
router.post("/google", (req, res) => {
    res.json({ route: "/google", body: req.body });
});

router.post("/link/google", (req, res) => {
    res.json({ route: "/link/google", body: req.body });
});

router.post("/unlink/google", (req, res) => {
    res.json({ route: "/unlink/google", body: req.body });
});

// --- Session / Token management ---
router.post("/logout", (req, res) => {
    res.json({ route: "/logout", body: req.body });
});

router.post("/refresh", (req, res) => {
    res.json({ route: "/refresh", body: req.body });
});

// --- Password reset flow ---
router.post("/forgot-password", (req, res) => {
    res.json({ route: "/forgot-password", body: req.body });
});

router.post("/reset-password", (req, res) => {
    res.json({ route: "/reset-password", body: req.body });
});



router.post("/signup/email", (req, res) => {
    res.json({ route: "/signup/email", body: req.body });
});

router.post("/verify", (req, res) => {
    res.json({ route: "/verify", body: req.body });
});
