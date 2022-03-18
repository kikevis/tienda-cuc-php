<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4928b95bb8b0d75fc10851129ece762e
{
    public static $prefixLengthsPsr4 = array (
        'k' => 
        array (
            'kike\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'kike\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4928b95bb8b0d75fc10851129ece762e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4928b95bb8b0d75fc10851129ece762e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4928b95bb8b0d75fc10851129ece762e::$classMap;

        }, null, ClassLoader::class);
    }
}
