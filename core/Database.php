<?php

namespace Core;

class Database
{
    /**
     * @var Request
     */
    private static $instance;

    /**
     * @var \PDO
     */
    private static $pdo;


    private function __construct ()
    {

    }

    /**
     * @return Database
     */
    public static function getInstance (): Database
    {
        if ( !self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __clone ()
    {

    }

    private function __wakeup ()
    {

    }

    /**
     * Устанавливаем соединение с базой данных
     *
     * @param \PDO $pdo
     */
    public static function setPDO(\PDO $pdo)
    {
        self::$pdo = $pdo;
    }

    /**
     * Запрос к базе данных
     *
     * @param string $query
     *
     * @return bool|\PDOStatement
     */
    public static function query(string $query)
    {
        return self::$pdo->query($query);
    }
}
