import express from "express";
const app = express();
import dotenv from "dotenv";
dotenv.config();
import { mongoDbConn, sqlConn, sqlPool, testSqlPoolConnection } from "./config/db.js"
import { initNewWebsite } from "./init/init.js"

// constant define
const PORT = process.env.PORT || 5000;

// database connection check and start server
async function serverStart() {
    try {
        // DB Connection
        await mongoDbConn();
        await testSqlPoolConnection();
        const sqlconn = await sqlConn();
        sqlconn.end();
        // Checking all table and connection if not then create
        await initNewWebsite();


        // Start server
        app.listen(PORT, () => {
            console.log("Server Started at port " + process.env.PORT);
        });

    } catch (err) {
        console.error("Failed to start server:", err);
        process.exit(1);
    }

}
serverStart();







// Routes
app.use("/", (req, res) => {
    res.send("Welcome");
});


