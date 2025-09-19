import { sqlPool } from "../config/db.js"

// function for run create query
async function createTable(query, tableName) {
    try {
        const [result] = await sqlPool.query(query);
        if (result.warningStatus === 0) {
            console.log("✅", tableName, " was created");
        } else {
            const [warnings] = await sqlPool.query("SHOW WARNINGS");
            if (warnings.length) {
                // console.log("⚠️ MySQL Warnings for ", tableName, " :", warnings);
                console.log("⚠️ ", tableName, " Warnings :", warnings[0].Message);
            }
        }
        return result;
    } catch (err) {
        console.log(err);
    }
}

// Show all table
const showTables = async () => {
    try {
        const [results] = await sqlPool.query('Show tables');

        console.log("List of all table ", results); // results contains rows returned by server
    } catch (err) {
        console.log(err);
    }
}


// Create uer table
async function createUsersTable() {
    const userTable = `CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) UNIQUE NOT NULL,
    phone VARCHAR(15),
    mongo_id VARCHAR(24),
    password VARCHAR(50),
    first_name varchar(50) DEFAULT NULL,
    last_name varchar(50) DEFAULT NULL,
    dob date DEFAULT NULL,
    photo varchar(100) DEFAULT NULL,
    gender enum('Male','Female','Other') DEFAULT NULL,
    role ENUM('user','admin','vendor_owner','vendor_staff') DEFAULT 'user',
    status TINYINT DEFAULT 1 COMMENT '1 = active, 0 = inactive',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    
    ) `
    await createTable(userTable, "User Table")

}

// create addresses table
async function createAddressesTable() {
    const addressesTable = `CREATE TABLE IF NOT EXISTS addresses (
    address_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT DEFAULT NULL,
    full_name VARCHAR(50) NOT NULL,
    full_address VARCHAR(200) NOT NULL,
    postal_code INT NOT NULL,
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(200) NULL,
    status TINYINT DEFAULT 1 COMMENT '1 = active, 0 = inactive',
    is_default TINYINT DEFAULT 0 
        COMMENT '1 = default address, 0 = normal, otherwise stores PK of previous edited address',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_user
        FOREIGN KEY (user_id) REFERENCES users(user_id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
)`
    await createTable(addressesTable, "Addresses Table")

}






export { createUsersTable, showTables, createAddressesTable }