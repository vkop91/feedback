<?php

namespace App\Models\Feedback;

class FeedbackValidator
{
    /**
     * Ошибки при проверки данных
     *
     * @var array
     */
    private $errors = [];

    /**
     * Валидация данных
     *
     * @param array $data
     *
     * @return array
     */
    public function validate( array $data)
    {
        $validDate = $data;

        foreach ($validDate as $field => &$value) {
            $value = trim($value);

            if (empty($value)) {
                $this->errors[] = "Поле обязательно к заполнению.";
                continue;
            }

            if ('email' == $field) {
                $value = $this->validEmail($value);
            }
        }

        return $validDate;
    }

    /**
     * Валидация почтового ящика
     *
     * @param $email
     *
     * @return mixed
     */
    private function validEmail($email)
    {
        if (!preg_match('/.+@.+\..+/i', $email)) {
            $this->errors[] = "Неправильно заполненно поле email";
        }

        return $email;
    }

    /**
     * Возвращает ошибки
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
