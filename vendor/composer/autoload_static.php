<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit030b5aed396f698002c8c9e9e1f9d5f7
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit030b5aed396f698002c8c9e9e1f9d5f7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit030b5aed396f698002c8c9e9e1f9d5f7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit030b5aed396f698002c8c9e9e1f9d5f7::$classMap;

        }, null, ClassLoader::class);
    }
}
