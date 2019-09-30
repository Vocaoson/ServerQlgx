<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitade12823d74cdbbf19224d5aca65961a
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitade12823d74cdbbf19224d5aca65961a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitade12823d74cdbbf19224d5aca65961a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}