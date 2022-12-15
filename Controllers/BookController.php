<?php

namespace Controllers;

use Models\Book;
use Models\Serie;
use App\Exceptions\NotFoundException;

class BookController {
    static function list() {
        $books = Book::all('books');

        require_once view('home');
    }

    static function details() {
        if (empty($_GET['id'])) throw new NotFoundException;

        $book = new Book($_GET['id']);

        $books = Book::all('books');

        // if ($book['rep'] == 0) {
        //     switch ($book['serie_id']) {
        //         case 0:
        //             $book['cover'] = 'bd.jpg';
        //             break;
        //         case 1:
        //             $book['cover'] = 'comics.jpg';
        //             break;
        //         case 2:
        //             $book['cover'] = 'manga.jpg';
        //             break;
        //     }
        // }

        require_once view('books/details');
    }

    static function update() {
        if (empty($_GET['id'])) throw new NotFoundException;

        $book = new Book($_GET['id']);
        $series = Serie::all('series');

        if (!empty($_POST)) {

            $bookUpdate = new Book($_POST);

            $bookUpdate->createOrUpdate();

            redirection('details_book&id=' . $_POST['id']);
        }

        require_once view('books/edit');
    }


    static function create() {
        $series = Serie::all('series');

        if (!empty($_POST)) {
            $bookCreate = new Book($_POST);

            if (!empty($_FILES['cover'])) {
                $nouveau_nom = uniqid('image-') // Le nom
                    . '.' . pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION); // L'extension

                $nouvelle_destination = asset('img/books/')
                    . $nouveau_nom;

                move_uploaded_file($_FILES['cover']['tmp_name'], $nouvelle_destination);
                $bookCreate->setCover($nouveau_nom);
            }

            $bookCreate->createOrUpdate();
            redirection('books');
        }

        require_once view('books/add');
    }

    static function createForSerie() {
        if (empty($_GET['id'])) throw new NotFoundException;

        if (!empty($_POST)) {
            $bookUpdate = new Book($_POST);

            $bookUpdate->createOrUpdate();
            redirection('books');
        }

        require_once view('books/add');
    }

    static function delete() {
        if (empty($_GET['id'])) throw new NotFoundException;
        $book = new Book($_GET['id']);
        $book->delete();
        redirection('books');
    }
}
