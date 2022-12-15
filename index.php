<?php

session_start();

setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR', 'fr', 'fr', 'fra', 'fr_FR@euro');

require_once __DIR__ . '/functions.php';

spl_autoload_register('FQCNEtRequire');

use App\Config;
use Controllers\BookController;
use Controllers\SerieController;
use Controllers\StatsController;
use App\Exceptions\NotFoundException;
use App\Exceptions\AccessDeniedException;

try {

    if (empty($_GET['route'])) $route = 'books';
    else $route = $_GET['route'];

    switch ($route) {
            // Routes Books
        case 'books':
            BookController::list();
            break;
        case 'details_book':
            BookController::details();
            break;
        case 'update_book':
            BookController::update();
            break;
        case 'create_book':
            BookController::create();
            break;
        case 'delete_book':
            BookController::delete();
            break;
        case 'create_book_for_serie':
            BookController::createForSerie();
            break;
            // Routes Series
        case 'series':
            SerieController::list();
            break;
        case 'details_serie':
            SerieController::details();
            break;
        case 'create_serie':
            SerieController::create();
            break;
        case 'update_serie':
            SerieController::update();
            break;
        case 'delete_serie':
            SerieController::delete();
            break;
            //Utilitaires
        case 'stats':
            StatsController::index();
            break;
        case 'hasard':
            SerieController::hasard();
            break;
        default:
            break;
    }
} catch (AccessDeniedException $e) {
    require_once view('errors/403');
} catch (NotFoundException $e) {
    require_once view('errors/404');
} catch (Exception $e) {
    if (Config::ENVIRONMENT == 'dev') dd($e);

    switch ($e->getCode()) {
        case 403:
            require_once view('errors/403');
            die;

        case 404:
            require_once view('errors/404');
            die;

        default:
            require_once view('errors/500');
    }
}
