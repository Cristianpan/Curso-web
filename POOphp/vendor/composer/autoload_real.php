<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit2909b2c2d9f48a6f72df3c3543b47cfa
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit2909b2c2d9f48a6f72df3c3543b47cfa', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit2909b2c2d9f48a6f72df3c3543b47cfa', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit2909b2c2d9f48a6f72df3c3543b47cfa::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
