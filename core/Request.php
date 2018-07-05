<?php

namespace Core;

class Request
{
    /**
     * @var Request
     */
    private static $instance;

    /**
     * @var string метод запроса
     */
    private static $method;

    /**
     * @var string текущий Url
     */
    private static $uri;

    /**
     * @var array параметры
     */
    private static $params;

    private function __construct ()
    {

    }

    /**
     * @return Request
     */
    public static function getInstance (): Request
    {
        if ( self::$instance ) {
            return self::$instance;
        }

        self::$instance = new self();

        // Получаем данные из глобальных переменных
        self::$method = $_SERVER[ 'REQUEST_METHOD' ];
        self::$uri    = $_SERVER[ 'REQUEST_URI' ];
        self::$params = $_REQUEST;

        return self::$instance;
    }

    private function __clone ()
    {

    }

    private function __wakeup ()
    {

    }

    /**
     * Method
     *
     * @return string
     */
    public function getMethod (): string
    {
        return self::$method;
    }

    /**
     * Url
     *
     * @return string
     */
    public function getUri (): string
    {
        return self::$uri;
    }

    /**
     * Params
     *
     * @return array
     */
    public function getParams (): array
    {
        return self::$params;
    }
}
