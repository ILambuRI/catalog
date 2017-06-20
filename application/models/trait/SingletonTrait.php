<?php

trait SingletonTrait
{
    protected static $_instance;
    
    protected function __construct(){}
    /* Защита от клона */
    private function __clone() {}
    /* Защита от сериализации */    
    private function __wakeup() {}
    /* Singleton */
    public static function getInstance() 
    {
        if(!(static::$_instance instanceof self)) 
            static::$_instance = new self();
        return static::$_instance;
    }
}