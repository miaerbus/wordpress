<?php
/**
 * @package MyPlugin
 */

namespace Includes;

final class Init
{
    /**
     * Store all classes inside an array
     * @return array Full list of classes
     */
    public static function get_services()
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class,
        ];
    }

    /**
     * Loop through the classes, initialize them,
     * and call the register() method if it exists
     * @return
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instatiante($class);
            if ( method_exists( $service, 'register') ) {
                $service->register();
            }
        }
    }

    /**
     * Initialize the class
     * @param class $class class from the services
     * @return class instance new instance of the class
     */
    private static function instatiante( $class )
    {
        $service = new $class();
        return $service;
    }
}
