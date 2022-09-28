<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit739d5644571c6fc3c87ffc52df4be0be
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit739d5644571c6fc3c87ffc52df4be0be::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit739d5644571c6fc3c87ffc52df4be0be::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit739d5644571c6fc3c87ffc52df4be0be::$classMap;

        }, null, ClassLoader::class);
    }
}
