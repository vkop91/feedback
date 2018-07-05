<?php
// Иницилизация основных классов
// Обработчик ошибок
require_once __DIR__ . '/../core/Logs.php';

// Обработчик http запроса
require_once __DIR__ . '/../core/Request.php';
$request = Core\Request::getInstance();

// Роутер
require_once __DIR__ . '/../core/Router/UrlHandler.php';
require_once __DIR__ . '/../core/Router/ErrorsHandler.php';
require_once __DIR__ . '/../core/Router/Router.php';
$routes = require_once __DIR__ . '/../routes.php';
$router = new Core\Router\Router( $routes );

// Классы для работы с контроллерами, моделями
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/ModelRepository.php';

// Подключение к базе данных
$db = new PDO('mysql:host=localhost;dbname=testdb;charset=utf8mb4', 'username', 'password');
require_once __DIR__ . '/../core/Database.php';
Core\Database::getInstance();
Core\Database::setPDO($db);

// Подключение классов для работы с feedback
require_once __DIR__ . '/../app/Models/Feedback/Feedback.php';
require_once __DIR__ . '/../app/Models/Feedback/FeedbackRepository.php';
require_once __DIR__ . '/../app/Models/Feedback/FeedbackValidator.php';

// Выполнение экшена
$response = $router->handle( $request );

print $response;
