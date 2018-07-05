<?php

namespace App\Models\Feedback;

class Feedback
{
    /**
     * Имя
     *
     * @var string
     */
    private $name;

    /**
     * E-mail
     * @var string
     */
    private $email;

    /**
     * Text
     *
     * @var string
     */
    private $text;

    /**
     * Получить имя
     *
     * @return string
     */
    public function getName ()
    {
        return $this->name;
    }

    /**
     * Установить имя
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName ( $name )
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Получить email
     *
     * @return string
     */
    public function getEmail ()
    {
        return $this->email;
    }

    /**
     * Установить почту
     *
     * @param string $email
     *
     * @return $this
     */
    public function setEmail ( $email )
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Получить текст
     *
     * @return string
     */
    public function getText ()
    {
        return $this->text;
    }

    /**
     * Установить текст
     *
     * @param string $name
     *
     * @return $this
     */
    public function setText ( $text )
    {
        $this->text = $text;

        return $this;
    }
}
