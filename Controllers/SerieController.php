<?php

namespace Controllers;

use mysqli;
use Models\Serie;
use App\Exceptions\NotFoundException;

class SerieController {
    static function list() {
        $series = Serie::all('series');
        //dd($series);
        if (isset($_POST['all'])) {
            $series = Serie::all('series');
        }
        if (isset($_POST['manga'])) {
            $series = Serie::all('series', "WHERE origin = 'manga'");
        }
        if (isset($_POST['bd'])) {
            $series = Serie::all('series', "WHERE origin = 'bd'");
        }
        if (isset($_POST['comics'])) {
            $series = Serie::all('series', "WHERE origin = 'comics'");
        }

        //Search input

        if (isset($_POST['origin'])) {
            $search = $_POST['origin'];

            $seriesFromSearch = Serie::all('series', "WHERE origin = '$search'");
        }
        if (isset($_POST['title'])) {
            $search = $_POST['title'];

            $seriesFromSearch = Serie::all('series', "WHERE title = '$search'");
        }
        require_once view('series/list');
    }

    static function details() {
        if (empty($_GET['id'])) throw new NotFoundException;

        $serie = new Serie($_GET['id']);

        $booksForSerie = $serie->getAlbums();

        $series = Serie::all('series');

        require_once view('series/details');
    }

    static function create() {
        if (!empty($_POST)) {
            $serieCreate = new Serie($_POST);

            $serieCreate->createOrUpdate();
            redirection('series');
        }

        require_once view('series/add');
    }

    static function update() {
        if (empty($_GET['id'])) throw new NotFoundException;

        $serie = new Serie($_GET['id']);

        if (!empty($_POST)) {

            $serieUpdate = new Serie($_POST);
            $serieUpdate->createOrUpdate();

            redirection('series');
        }

        require_once view('series/edit');
    }

    static function delete() {
        if (empty($_GET['id'])) throw new NotFoundException;
        $serie = new Serie($_GET['id']);
        $serie->delete();
        redirection('series');
    }

    static public function hasard() {
        $series = Serie::all('series');
        $randIdOfSerie = rand($series[0]->getId(), end($series)->getId());

        redirection('details_serie', '&id=' . $randIdOfSerie);
    }
}
