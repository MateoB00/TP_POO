<?php

namespace Controllers;

use Models\Book;
use Models\Serie;

class StatsController {
    static function index() {
        //Books
        $books = Book::all('books');
        $numberOfBooks = count($books);
        $numberOfWriter = Book::getAllWriters();
        $numberOfStrips = Book::getAllStrips();

        //Series
        $series = Serie::all('series');
        $numberOfSeries = count($series);


        require_once view('stats/index');
    }
}
