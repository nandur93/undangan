<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfc7d520558f48ed22ad4d308c8a2ab47
{
    public static $prefixesPsr0 = array (
        'J' => 
        array (
            'JamesMoss\\Flywheel\\' => 
            array (
                0 => __DIR__ . '/..' . '/jamesmoss/flywheel/src',
                1 => __DIR__ . '/..' . '/jamesmoss/flywheel/test',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitfc7d520558f48ed22ad4d308c8a2ab47::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitfc7d520558f48ed22ad4d308c8a2ab47::$classMap;

        }, null, ClassLoader::class);
    }
}