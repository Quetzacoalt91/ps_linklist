<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit266a54e1cee34075e9487505cc2a1b70
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PrestaShop\\Module\\LinkList\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PrestaShop\\Module\\LinkList\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit266a54e1cee34075e9487505cc2a1b70::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit266a54e1cee34075e9487505cc2a1b70::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
