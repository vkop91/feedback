<?php

namespace App\Controllers;

use Core\{Controller, Request};
use App\Models\Feedback\{Feedback, FeedbackRepository, FeedbackValidator};

class FeedbackController extends Controller
{
    /**
     * Модель для валидации
     *
     * @var FeedbackValidator
     */
    private $validator;

    public function __construct ()
    {
        $this->repository = new FeedbackRepository();
        $this->validator = new FeedbackValidator();
    }

    /**
     * Форма обратной связи
     *
     * @param Request $request
     *
     * @return null|string
     */
    public function index( Request $request )
    {
        $data = $request->getParams();

        if (empty($data)) {
            return $this->view('feedback/form');
        }

        // Валидация данных
        $data = $this->validator->validate($request->getParams());

        if ($errors = $this->validator->getErrors()) {
            return $this->view( 'feedback/form', [
                'errors' => $errors
            ] );
        }

        // Сохранение данных
        $feedback = new Feedback();
        $feedback->setName($data['name'])
                 ->setEmail($data['email'])
                 ->setText($data['text']);

        $this->repository->save($feedback);

        return $this->view( 'feedback/success', [
            'feedback' => $feedback
        ] );
    }
}
