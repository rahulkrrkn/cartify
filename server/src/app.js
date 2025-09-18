import express from "express";
const app = express();
import dotenv from "dotenv";
dotenv.config();
import { mongoDbConn, sqlConn, sqlPool, testSqlPoolConnection } from "./config/db.js"
import { initNewWebsite } from "./init/init.js"
import user from "./routes/user.routes.js"
import auth from "./routes/auth.routes.js"


// --get data from frontend
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

// --constant define
const PORT = process.env.PORT || 5000;

// --database connection check and start server
async function serverStart() {
    try {
        /*--
        // DB Connection
        await mongoDbConn();
        await testSqlPoolConnection();
        const sqlconn = await sqlConn();
        sqlconn.end();
        // Checking all table and connection if not then create
        await initNewWebsite();
*/

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

// --Take down invilid request
app.use((err, req, res, next) => {
    if (err instanceof SyntaxError && err.status === 400 && "body" in err) {
        return res.status(400).json({ success: false, message: "Invalid JSON format" });
    }
    next();
});


app.use("/api/user", user);
app.use("/api/auth", auth);





// Routes
app.get("/", (req, res) => {
    res.send("Welcome");
});


app.use((req, res) => {
    console.log("404 error");
    res.status(404).send("<h1>404 Page not found</h1>")
})
console.log("End of aap.js")
