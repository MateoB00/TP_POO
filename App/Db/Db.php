<?php

namespace App\Db;

use PDO;
use App\Config;
use Models\Book;
use Models\Serie;
use PDOException;

class Db extends PDO {
    protected $connected = false;

    public function __construct() {
        $_dsn = 'mysql:dbname=' . Config::DATABASE_NAME . ';host=' . Config::DATABASE_HOST;

        try {
            parent::__construct($_dsn, Config::DATABASE_USER, Config::DATABASE_PASSWORD);
            $this->connected = true;
        } catch (PDOException $e) {
            die($e->getMessage());
            exit();
        }
    }

    public function hydrate(array $d) {
        foreach ($d as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if (method_exists($this, $setter))
                $this->$setter(trim($value));
        }
    }

    public static function all(string $table, $where = null) {
        $sql = new Db();
        $tAll = [];
        $r = $sql->prepare('SELECT * FROM ' . $table . ' ' . $where);
        $r->execute();

        if ($table == 'series') {
            while ($one = $r->fetch(PDO::FETCH_ASSOC)) {
                array_push($tAll, new Serie($one));
            }
        } else if ($table == 'books') {
            while ($one = $r->fetch(PDO::FETCH_ASSOC)) {
                array_push($tAll, new Book($one));
            }
        }

        return $tAll;
    }
}
