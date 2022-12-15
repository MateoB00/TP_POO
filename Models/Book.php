<?php

namespace Models;

use PDO;
use App\Db\Db;

class Book extends Db {
    protected $id;
    protected $title;
    protected $writer;
    protected $illustrator;
    protected $editor;
    protected $releaseyear;
    protected $strips;
    protected $num;
    protected $cover;
    protected $rep;
    protected $created;
    protected $updated;
    protected $serie_id;
    protected $serieData;

    public function __construct($d) {
        $this->table = 'books';
        parent::__construct();

        if (is_array($d)) {

            $this->hydrate($d);
        } else if (is_int($d) || (int) $d > 0) {
            $d = (int) $d;
            $r = $this->prepare('SELECT * FROM books WHERE id=:i');
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
    public function setWriter($writer) {
        $this->writer = (string) $writer;
    }
    public function setIllustrator($illustrator) {
        $this->illustrator = (string) $illustrator;
    }
    public function setEditor($editor) {
        $this->editor = (string) $editor;
    }
    public function setReleaseyear($releaseyear) {
        $this->releaseyear = (string) $releaseyear;
    }
    public function setStrips($strips) {
        $this->strips = (string) $strips;
    }
    public function setNum($num) {
        $this->num = (string) $num;
    }
    public function setCover($cover) {
        $this->cover = (string) $cover;
    }
    public function setRep($rep) {
        $this->rep = (string) $rep;
    }
    public function setCreated() {
        $this->created = date('Y-m-d H:i:s');
    }
    public function setUpdated() {
        $this->updated = date('Y-m-d H:i:s');
    }
    public function setSerie_id($serie_id) {
        $this->serie_id = $serie_id;
        $this->serieData = new Serie($serie_id);
    }

    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }
    public function getWriter() {
        return $this->writer;
    }
    public function getIllustrator() {
        return $this->illustrator;
    }
    public function getEditor() {
        return $this->editor;
    }
    public function getReleaseyear() {
        return $this->releaseyear;
    }
    public function getStrips() {
        return $this->strips;
    }
    public function getNum() {
        return $this->num;
    }
    public function getCover() {
        return $this->cover;
    }
    public function getRep() {
        return $this->rep;
    }
    public function getCreated() {
        return $this->created;
    }
    public function getUpdated() {
        return $this->updated;
    }
    public function getSerie_id() {
        return $this->serie_id;
    }
    public function getSerieData() {
        return new Serie($this->serie_id);
    }

    public static function getAllWriters() {
        $sql = new Db();

        $resultat = $sql->query('SELECT COUNT( DISTINCT writer) FROM books');
        return $resultat->fetchColumn();
    }

    public static function getAllStrips() {
        $sql = new Db();

        $resultat = $sql->query('SELECT SUM(strips) FROM books');
        return $resultat->fetchColumn();
    }

    // public static function find($id) {
    //     $sql = new Db();

    //     $result = [];

    //     $r =  $sql->prepare('SELECT * FROM books WHERE id =' . $id);
    //     $r->execute();

    //     while ($one = $r->fetch(PDO::FETCH_ASSOC)) {
    //         array_push($tAll, new Book($one));
    //     }
    //     return $tAll;
    // }

    public function createOrUpdate() {

        if (empty($this->id)) {
            $n = $this->prepare('INSERT INTO books (serie_id, title, num, writer, illustrator, editor, releaseyear, strips, cover, rep) VALUES (:serie_id, :title, :num, :writer, :illustrator, :editor, :releaseyear, :strips, :cover, :rep)');
            $n->execute([':serie_id' => $this->serie_id, ':title' => $this->title, ':num' => $this->num, ':writer' => $this->writer, ':illustrator' => $this->illustrator, ':editor' => $this->editor, ':releaseyear' => $this->releaseyear, ':strips' => $this->strips, ':cover' => $this->cover, ':rep' => $this->rep]);
        } else {
            $n = $this->prepare('UPDATE books SET serie_id = :serie_id, title = :title, num = :num, writer = :writer, illustrator =:illustrator, editor = :editor, releaseyear = :releaseyear, strips =:strips, cover = :cover, rep = :rep  WHERE id=:i');
            $n->execute([':serie_id' => $this->serie_id, ':title' => $this->title, ':num' => $this->num, ':writer' => $this->writer, ':illustrator' => $this->illustrator, ':editor' => $this->editor, ':releaseyear' => $this->releaseyear, ':strips' => $this->strips, ':cover' => $this->cover, ':rep' => $this->rep, ':i' => $this->id]);
        }
    }

    public function delete() {
        $n = $this->prepare('DELETE FROM books WHERE id = :i');
        $n->execute([':i' => $this->id]);
    }
}
