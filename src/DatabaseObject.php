<?php

namespace FanOfLEGO;

use mysql_xdevapi\Exception;
use PDO;
use PDOException;
use DateTime;
use DateTimeZone;

class DatabaseObject // Extended by the children class:
{
    static protected string $table = ""; // Overridden by the calling class:
    static protected array $db_columns = []; // Overridden by the calling class:
    static protected array $objects = [];
    static protected array $params = [];
    static protected $searchItem;
    static protected $searchValue;

    public static function styleTime($prettyDate): string
    {
        try {
            $dateStylized = new DateTime($prettyDate, new DateTimeZone("America/Detroit"));
        } catch (Exception $e) {
        }

        return $dateStylized->format("Y-m-d H:i:s");
    }

    /*
     * Put the date from 00-00-0000 00:00:00 that is stored in the MySQL
     * database table to a more presentable format such as January 1, 2021.
     */
    public static function styleDate($prettyDate): string
    {

        try {
            $dateStylized = new DateTime($prettyDate, new DateTimeZone("America/Detroit"));
        } catch (Exception $e) {
        }

        return $dateStylized->format("F j, Y");
    }

    public static function bpDate($prettyDate): string
    {
        try {
            $dateStylized = new DateTime($prettyDate, new DateTimeZone("America/Detroit"));
        } catch (Exception $e) {
        }

        return $dateStylized->format("n/j");
    }

    /*
     * There is NO read() method this fetch_all method
     *  basically does the same thing. The query ($sql)
     *  is done in the class the calls this method.
     */
    public static function fetch_by_column_name($sql): mixed
    {
        $stmt = Database::pdo()->prepare($sql); // Database::pdo() is the PDO Connection

        $stmt->execute([ static::$searchItem => static::$searchValue ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public static function fetch_all_by_column_name($sql): array
    {
        $stmt = Database::pdo()->prepare($sql);

        $stmt->execute([ static::$searchItem => static::$searchValue ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function fetch_all($sql): array
    {

        $stmt = Database::pdo()->prepare($sql);

        $stmt->execute([ static::$searchItem => static::$searchValue ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function fetch_all_records($sql): array
    {
        // execute a query
        $statement = Database::pdo()->query($sql);

        // fetch all rows
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
     * Total rows in Database Table
     */
    public static function countAll() {
        return Database::pdo()->query("SELECT count(id) FROM " . static::$table)->fetchColumn();
    }

    /*
     * Pagination static function/method to limit
     * the number of records per page. This is
     * useful for tables that contain a lot of
     * records (data).
     */
    public static function page($perPage, $offset, $page = "index", $category = "home"): array
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE page =:page AND category =:category ORDER BY id ASC, date_added DESC LIMIT :perPage OFFSET :blogOffset';
        $stmt = Database::pdo()->prepare($sql); // Prepare the query:
        $stmt->execute(['page' => $page, 'perPage' => $perPage, 'category' => $category, 'blogOffset' => $offset]); // Execute the query with the supplied data:
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function allPages($perPage, $offset): array
    {
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id ASC, date_added DESC LIMIT :perPage OFFSET :blogOffset';
        $stmt = Database::pdo()->prepare($sql); // Prepare the query:
        $stmt->execute(['perPage' => $perPage, 'blogOffset' => $offset]); // Execute the query with the supplied data:
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getImages($page='index'):array
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE page =:page ORDER BY id DESC, date_added DESC';
        $stmt = Database::pdo()->prepare($sql); // Prepare the query:
        $stmt->execute(['page' => $page, 'category' => $category]); // Execute the query with the supplied data:
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function records($perPage, $offset): array
    {
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT :perPage OFFSET :offset';
        $stmt = Database::pdo()->prepare($sql); // Prepare the query:
        $stmt->execute(['perPage' => $perPage, 'offset' => $offset]); // Execute the query with the supplied data:
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
     * Grab Record will be used for editing:
     */
    public static function fetch_by_id($id)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE id=:id LIMIT 1";
        $stmt = Database::pdo()->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /*
     * Create/Insert new record in the database table
     * that can be used for more than one table.
     */

    /**
     * @param mixed $searchItem
     */
    public static function setSearchItem(mixed $searchItem): void
    {
        self::$searchItem = $searchItem;
    }

    /**
     * @param mixed $searchValue
     */
    public static function setSearchValue(mixed $searchValue): void
    {
        self::$searchValue = $searchValue;
    }

    public function create():bool
    {
        try {
            /* Initialize an array */
            $attribute_pairs = [];

            /*
             * Set up the query using prepared states with static:$params being
             * the columns and the array keys being the prepared named placeholders.
             */
            $sql = 'INSERT INTO ' . static::$table . '(' . implode(", ", array_keys(static::$params)) . ')';
            $sql .= ' VALUES ( :' . implode(', :', array_keys(static::$params)) . ')';

            /*
             * Prepare the Database Table:
             */
            $stmt = Database::pdo()->prepare($sql); // PHP Version 8.x Database::pdo()

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
        } catch (PDOException $e) {

            /*
             * echo "unique index" . $e->errorInfo[1] . "<br>";
             *
             * An error has occurred if the error number is for something that
             * this code is designed to handle, i.e. a duplicate index, handle it
             * by telling the user what was wrong with the data they submitted
             * failure due to a specific error number that can be recovered
             * from by the visitor submitting a different value
             *
             * return false;
             *
             * else the error is for something else, either due to a
             * programming mistake or not validating input data properly,
             * that the visitor cannot do anything about or needs to know about
             *
             * throw $e;
             *
             * re-throw the exception and let the next higher exception
             * handler, php in this case, catch and handle it
             */

            if ($e->errorInfo[1] === 1062) {
                return false;
            }

            throw $e;
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n"; // Not for a production server:
        }

        return true;

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

    /*
     * Delete is probably the easiest of CRUD (Create Read Update Delete),
     * but is the most dangerous method of the four as the erasure of the data is permanent of
     * PlEASE USE WITH CAUTION! (I use a small javascript code to warn users of deletion)
     */
    public function delete($id): bool
    {
            $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
            return Database::pdo()->prepare($sql)->execute([':id' => $id]);
    }

}