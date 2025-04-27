<?php

class Verify
{
    public function __construct() {}

    public static function public()
    {
        $_SESSION["CFglobal"]["userIs"] = "public";
    }

    private static function checkSessionKeys($keys)
    {
        foreach ($keys as $key) {
            if (empty($_SESSION[$key])) {
                $_SESSION["login_error"] = "Unauthorized access. Please log in.";
                header("Location: /cartify/account/login-using-password/");
                exit();
            }
        }
    }

    public static function user()
    {
        self::checkSessionKeys(["CFuserData"]);
        $_SESSION["CFglobal"]["userIs"] = "user";
    }

    public static function seller()
    {
        self::checkSessionKeys(["CFsellerData", "CFuserData"]);
        $_SESSION["CFglobal"]["userIs"] = "seller";
    }

    public static function support()
    {
        self::checkSessionKeys(["CFsupportData", "CFuserData"]);
        $_SESSION["CFglobal"]["userIs"] = "support";
    }

    public static function admin()
    {
        self::checkSessionKeys(["CFadminData", "CFuserData"]);
        $_SESSION["CFglobal"]["userIs"] = "admin";
    }
}
