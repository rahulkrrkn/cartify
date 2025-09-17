// Pending
import express from "express";
const router = express.Router();

router.use("/", (req, res) => {
    res.send("Welcome to user routes")
})




export default router;
