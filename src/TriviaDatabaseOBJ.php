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
    static protected string $table = "cool_trivia";

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

    public function create():bool
    {

        /* Initialize an array */
        $attribute_pairs = [];

        /*
         * Setup the query using prepared states with static:$params being
         * the columns and the array keys being the prepared named placeholders.
         */
        $sql = 'INSERT INTO ' . static::$table . '(' . implode(", ", array_keys(static::$params)) . ', date_added)';
        $sql .= ' VALUES ( :' . implode(', :', array_keys(static::$params)) . ', NOW() )'; // Notice the 2 NOW() calls for dates:

        /*
         * Prepare the Database Table:
         */
        $stmt = Database::pdo()->prepare($sql);

        /*
         * Grab the corresponding values in order to
         * insert them into the table when the script
         * is executed.
         */
        foreach (static::$params as $key => $value)
        {
            if($key === 'id') { continue; } // Don't include the id:
            $attribute_pairs[] = $value; // Assign it to an array:
        }

        return $stmt->execute($attribute_pairs); // Execute and send boolean true:

    }

    /*
 * This is the update that method that I came up with and
 * it does use named placeholders. I have always found
 * updating is easier than creating/adding a record for
 * some strange reason?
 */
    public function update(): bool
    {
        /* Initialize an array */
        $attribute_pairs = [];

        /* Create the prepared statement string */
        foreach (static::$params as $key => $value)
        {
            if($key === 'id') { continue; } // Don't include the id:
            $attribute_pairs[] = "$key=:$key"; // Assign it to an array:
        }

        /*
         * The sql implodes the prepared statement array in the proper format
         * and updates the correct record by id.
         */
        $sql  = 'UPDATE ' . static::$table . ' SET ';
        $sql .= implode(", ", $attribute_pairs) . ' WHERE id =:id';

        /* Normally in two lines, but you can daisy-chain pdo method calls */
        Database::pdo()->prepare($sql)->execute(static::$params);

        return true;

    }

    public static function fetch_all_categories(): array
    {
        $sql = "SELECT * FROM " .static::$table . ' ORDER BY date_added DESC';
        return static::fetch_all_records($sql);
    }



}