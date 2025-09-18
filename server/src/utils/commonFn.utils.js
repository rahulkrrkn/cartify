// --Centralized response utility

export function sendSuccess(res, message, data = {}, code = 200) {
    return res.status(code).json({
        status: "success",
        code,
        message,
        data,
        error: null
    });
}

export function sendError(res, message, errorDetails = {}, code = 400) {
    return res.status(code).json({
        status: "error",
        code,
        message,
        data: null,
        error: errorDetails
    });
}

// for internal return

export function returnSuccess(data = {}, message = "Success") {
    return {
        success: true,
        message,
        data,
        error: null
    };
}

export function returnError(message = "Error", errorDetails = {}) {
    return {
        success: false,
        message,
        data: null,
        error: errorDetails
    };
}
