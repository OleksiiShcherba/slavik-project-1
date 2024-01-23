<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit79124ca68ebc2059b5d8aabbbc87ea06
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit79124ca68ebc2059b5d8aabbbc87ea06::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit79124ca68ebc2059b5d8aabbbc87ea06::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit79124ca68ebc2059b5d8aabbbc87ea06::$classMap;

        }, null, ClassLoader::class);
    }
}
