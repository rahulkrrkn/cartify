<?php
class Head
{
    private static function includeFile($file)
    {
        require_once rootDir . "/layouts/head/$file.php";
    }

    public static function global()
    {
        self::includeFile('global');
    }

    public static function public()
    {
        self::global();
        self::includeFile('public');
    }
    public static function user()
    {
        self::global();
        self::includeFile('user');
    }
    public static function seller()
    {
        self::global();
        self::includeFile('seller');
    }
    public static function support()
    {
        self::global();
        self::includeFile('support');
    }
    public static function admin()
    {
        self::global();
        self::includeFile('admin');
    }
}

class Header
{
    private static function includeFiles($mainFile)
    {

        require_once rootDir . "/layouts/header/top.php";
        require_once rootDir . "/layouts/header/global.php";
        require_once rootDir . "/layouts/header/$mainFile.php";
        require_once rootDir . "/layouts/header/bottom.php";
    }

    public static function global()
    {
        self::includeFiles('global');
    }
    public static function public()
    {
        self::includeFiles('public');
    }
    public static function user()
    {
        self::includeFiles('user');
    }
    public static function seller()
    {
        self::includeFiles('seller');
    }
    public static function support()
    {
        self::includeFiles('support');
    }
    public static function admin()
    {
        self::includeFiles('admin');
    }
}

class Footer
{
    private static function includeFile($file)
    {

        require_once rootDir . "/layouts/footer/$file.php";
    }

    public static function global()
    {
        self::includeFile('global');
    }

    public static function public()
    {
        self::global();
        self::includeFile('public');
    }
    public static function user()
    {
        self::global();
        self::includeFile('user');
    }
    public static function seller()
    {
        self::global();
        self::includeFile('seller');
    }
    public static function support()
    {
        self::global();
        self::includeFile('support');
    }
    public static function admin()
    {
        self::global();
        self::includeFile('admin');
    }
}
