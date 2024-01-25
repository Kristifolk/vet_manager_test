<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite4d57fc277268760af46d7dd5b0c5e59
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/src',
        1 => __DIR__ . '/..' . '/kristin/my-lib-kristin/src',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInite4d57fc277268760af46d7dd5b0c5e59::$fallbackDirsPsr4;
            $loader->classMap = ComposerStaticInite4d57fc277268760af46d7dd5b0c5e59::$classMap;

        }, null, ClassLoader::class);
    }
}