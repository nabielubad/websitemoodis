<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf98662a1847076a4f8e05fea9ed568b9
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf98662a1847076a4f8e05fea9ed568b9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf98662a1847076a4f8e05fea9ed568b9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf98662a1847076a4f8e05fea9ed568b9::$classMap;

        }, null, ClassLoader::class);
    }
}
