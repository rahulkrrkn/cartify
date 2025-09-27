import express from "express";
import authRouter from "./routes/auth.route.js";
import cookieParser from "cookie-parser";
const app = express();
app.use(cookieParser());

// Middleware
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

app.listen(7003, () => {
    console.log("server started at port 7003");
});

// Routes
app.use("/api/auth", authRouter);

// 404 error
app.use((req, res) => {
    res.status(404).send("<h1>404 error</h1>");
});

// Error handler
app.use((err, req, res, next) => {
    console.error(err);
    res.status(500).send("Custom Error: " + err.message);
});
