<?php

namespace Models;

use PDO;
use App\Db\Db;

class Serie extends Db {
    protected $id;
    protected $title;
    protected $origin;
    protected $created;
    protected $updated;

    public function __construct($d) {
        $this->table = 'series';
        parent::__construct();

        if (is_array($d)) {

            $this->hydrate($d);
        } else if (is_int($d) || (int) $d > 0) {
            $d = (int) $d;
            $r = $this->prepare('SELECT * FROM series WHERE id=:i');
            $r->execute([':i' => $d]);

            if ($r->rowCount() > 0)
                $this->hydrate($r->fetch(PDO::FETCH_ASSOC));
        }
    }


    public function setId($id) {
        $this->id = (string) $id;
    }
    public function setTitle($title) {
        $this->title = (string) $title;
    }
    public function setOrigin($origin) {
        $this->origin = (string) $origin;
    }
    public function setCreated() {
        $this->created = date('Y-m-d H:i:s');
    }
    public function setUpdated() {
        $this->updated = date('Y-m-d H:i:s');
    }

    public function getCoverSerie() {
        $booksForSerie = Book::all('books', "WHERE serie_id =" . $this->id);
        if (!empty($booksForSerie)) {
            return $this->coverSerie = end($booksForSerie)->getCover();
        } else {
            return $this->coverSerie = 'null.png';
        }
    }

    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }
    public function getOrigin() {
        return $this->origin;
    }
    public function getCreated() {
        return $this->created;
    }
    public function getUpdated() {
        return $this->updated;
    }

    public function getAlbums() {
        return Book::all('books', "WHERE serie_id =" . $this->getId());
    }

    public function createOrUpdate() {

        if (empty($this->id)) {
            $n = $this->prepare('INSERT INTO series (title, origin) VALUES (:title, :origin)');
            $n->execute([':title' => $this->title, ':origin' => $this->origin]);
        } else {
            $n = $this->prepare('UPDATE series SET title = :title, origin = :origin WHERE id=:i');
            $n->execute([':title' => $this->title, ':origin' => $this->origin, ':i' => $this->id]);
        }
    }

    public function delete() {
        $n = $this->prepare('DELETE FROM series WHERE id = :i');
        $n->execute([':i' => $this->id]);
    }
}
