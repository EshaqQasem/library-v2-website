<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitcaf24d36dcaf2828524fec9fd9668c5d
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

        spl_autoload_register(array('ComposerAutoloaderInitcaf24d36dcaf2828524fec9fd9668c5d', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitcaf24d36dcaf2828524fec9fd9668c5d', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitcaf24d36dcaf2828524fec9fd9668c5d::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
