<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4c8456c0cd7d070b86abbc0a3032d708
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
            1 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'o' => 
        array (
            'org\\bovigo\\vfs' => 
            array (
                0 => __DIR__ . '/..' . '/mikey179/vfsstream/src/main/php',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4c8456c0cd7d070b86abbc0a3032d708::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4c8456c0cd7d070b86abbc0a3032d708::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit4c8456c0cd7d070b86abbc0a3032d708::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
