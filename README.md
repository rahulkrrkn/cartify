# Clarify

A web application created by **Rahul Kumar**.

---

## Configuration Setup

Before making the website live, configure the following files inside the `Config/` folder:

### 1. Database Configuration
- File: `Config/configDb.inc.php`
- Add your database details:
  - Hostname
  - Username
  - Password
  - Database Name

### 2. Email Configuration
- File: `Config/email.inc.php`
- Add your email server settings:
  - SMTP Server
  - Port
  - Email Address
  - Password

### 3. WhatsApp API Configuration
- File: `Config/whatsApp.inc.php`
- Add your WhatsApp API details:
  - API URL
  - API Key
  - Other authentication parameters

### 4. Razorpay Payment Gateway Configuration
- File: `Config/razorpay.inc.php`
- Add your Razorpay payment gateway details:
  - API Key ID
  - API Secret Key

---

## Google Credentials Setup

Update your **Google OAuth credentials** and API keys in the following files:

### 1. For Password-based Login:
- File: `account/login-using-password/index`
- File: `account/login-using-password/script.js`

### 2. For OTP-based Login:
- File: `account/login-using-otp/index`
- File: `account/login-using-otp/script.js`

**Make sure to update:**
- Google Client ID
- Google Client Secret
- API Redirect URLs (if needed)

---

## Username Update

Find and replace all instances of `RahulKrRKN` in the project with **your own username**.

This is important for proper authentication, personalization, and API setups.

---

## Important: Website Live Setup

- **Create a subdirectory named `certify`** inside your server/public directory.
- Upload all your website files inside the `certify` folder.
- This is necessary for proper website functioning.

---

## Author Information

- **Developer**: Rahul Kumar
- **Website**: Clarify
- **Purpose**: Clarify is built to provide smooth and easy access to essential services through database, email, WhatsApp, and payment gateway integration.

---

Thank you for using Clarify!