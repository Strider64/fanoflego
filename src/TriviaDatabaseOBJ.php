<?php

namespace FanOfLEGO;
use PDO;

class TriviaDatabaseOBJ extends DatabaseObject
{
    public $id;
    public $user_id;
    public $hidden;
    public $question;
    public $ans1;
    public $ans2;
    public $ans3;
    public $ans4;
    public $correct;
    public $category;
    public $date_added;

    public function __construct($args = [])
    {
        // Caution: allows private/protected properties to be set
        foreach ($args as $k => $v) {
            if (property_exists($this, $k)) {
                $this->$k = $v;
                static::$params[$k] = $v;
                static::$objects[] = $v;
            }
        }
    } // End of construct method:


    public static function fetchQuestions($category = 'lego'): bool|array
    {
        static::$table = 'cool_trivia';
        $sql = "SELECT id, user_id, hidden, question, ans1, ans2, ans3, ans4, category FROM " . static::$table . " WHERE category=:category";
        $stmt = Database::pdo()->prepare($sql);
        $stmt->execute(['category' => $category]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
 * Fetch correct answer:
 */
    public static function fetch_correct_answer($id):array
    {

        $sql = "SELECT id, correct FROM cool_trivia WHERE id=:id";
        $stmt = Database::pdo()->prepare($sql); // Database::pdo() is the PDO Connection

        $stmt->execute([ 'id' => $id ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}