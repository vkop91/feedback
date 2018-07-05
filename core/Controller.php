<?php

namespace Core;

use Core\Logs;

abstract class Controller
{
    /**
     * Ошибки для вывода пользователю
     * @var array
     */
    protected $errors;

    /**
     * Модель для работы с базой данных
     *
     * @var Core\ModelRepository
     */
    protected $repository;

    /**
     * Вызов экшена контроллера.
     *
     * @param  string $method
     * @param  array  $parameters
     *
     * @return mixed
     */
    public function callAction ( string $method, array $parameters )
    {
        return call_user_func_array( [ $this, $method ], $parameters );
    }

    /**
     * Подключение представления
     *
     * @param string $template
     * @param array  $variables
     *
     * @return null|string
     */
    protected function view( string $template, $variables = [] )
    {
        $output = NULL;
        $filePath = __DIR__ . "/../app/Views/$template.php";

        if (!empty($this->errors)) {
            $variables['errors'] = $this->errors;
        }

        if (file_exists($filePath)) {
            // Extract the variables to a local namespace
            extract($variables);

            // Start output buffering
            ob_start();

            // Include the template file
            include $filePath;

            // End buffering and return its contents
            $output = ob_get_clean();
        } else {
            Logs::alert( "Не найден шаблон $template", 404 );
        }

        return $output;
    }
}
