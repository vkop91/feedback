<?php

namespace App\Models\Feedback;

use Core\ModelRepository;
use Core\Database;
use App\Models\Feedback\Feedback;

class FeedbackRepository extends ModelRepository
{
    protected $table = 'feedback';

    /**
     * Сохранение данных в базу данных
     *
     * @param Feedback $feedback
     */
    public function save(Feedback $feedback)
    {
        Database::query(
            "INSERT INTO " . $this->table . " (name, email, text) "
            . "VALUES ('" . $feedback->getName() . "', "
            . "'" . $feedback->getEmail() . "', "
            . "'" . $feedback->getText() . "'); ");
    }
}
