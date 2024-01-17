<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2c507e6177a26c279fd91f9ce047becb
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'My\\Concrete\\' => 12,
            'My\\Abstract\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'My\\Concrete\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Concrete',
        ),
        'My\\Abstract\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Abstract',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2c507e6177a26c279fd91f9ce047becb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2c507e6177a26c279fd91f9ce047becb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2c507e6177a26c279fd91f9ce047becb::$classMap;

        }, null, ClassLoader::class);
    }
}