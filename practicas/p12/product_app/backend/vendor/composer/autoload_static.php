<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit88825aefa4e7279249fa2de1dd73ebfb
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TECWEB\\MYAPI\\UPDATE\\' => 20,
            'TECWEB\\MYAPI\\READ\\' => 18,
            'TECWEB\\MYAPI\\DELETE\\' => 20,
            'TECWEB\\MYAPI\\CREATE\\' => 20,
            'TECWEB\\MYAPI\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TECWEB\\MYAPI\\CREATE\\' => 
        array (
            0 => __DIR__ . '/../..' . '/myapi/Create',
        ),
        'TECWEB\\MYAPI\\READ\\' => 
        array (
            0 => __DIR__ . '/../..' . '/myapi/Read',
        ),
        'TECWEB\\MYAPI\\UPDATE\\' => 
        array (
            0 => __DIR__ . '/../..' . '/myapi/Update',
        ),
        'TECWEB\\MYAPI\\DELETE\\' => 
        array (
            0 => __DIR__ . '/../..' . '/myapi/Delete',
        ),
        'TECWEB\\MYAPI\\' => 
        array (
            0 => __DIR__ . '/../..' . '/myapi',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit88825aefa4e7279249fa2de1dd73ebfb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit88825aefa4e7279249fa2de1dd73ebfb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit88825aefa4e7279249fa2de1dd73ebfb::$classMap;

        }, null, ClassLoader::class);
    }
}