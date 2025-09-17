export default {
    // generate OTP
    generateOtp: (length = 6) => {
        return Math.floor(
            Math.pow(10, length - 1) + Math.random() * 9 * Math.pow(10, length - 1)
        ).toString();
    },

    // Validate email
    isValidEmail: (email) => {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    },

    // Validate mobile no
    isValidMobile: (mobile) => {
        return /^[0-9]{10}$/.test(mobile); // adjust regex for country
    },

}