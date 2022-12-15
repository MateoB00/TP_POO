<?php

use App\Config;


function connexionBDD(): PDO {
    try {
        return new PDO('mysql:host=' . Config::DATABASE_HOST . ';dbname=' . Config::DATABASE_NAME, Config::DATABASE_USER, Config::DATABASE_PASSWORD);
    } catch (Exception $e) {
        if (Config::ENVIRONMENT == 'dev') dd($e);
        erreur(500);
    }
}

/**
 * 
 * Fait le require adapté par rapport à un FQCN
 * (par exemple require_once __DIR__ . '/Controllers/HomeController.php')
 * 
 * @param string $fqcn Par exemple Controllers\HomeController
 */
function FQCNEtRequire($fqcn) {
    require_once __DIR__ . '/' . str_replace('\\', '/', $fqcn) . '.php';
}

function model(string $name) {
    return __DIR__ . '/Models/' . $name . 'Model.php';
}

function controller(string $name) {
    return __DIR__ . '/Controllers/' . $name . 'Controller.php';
}

function view($vue) {
    return __DIR__ . '/Views/' . $vue . '.php';
}

function asset(string $nom) {
    return 'App/assets/' . $nom;
}

function url($route) {
    return 'index.php?route=' . $route;
}

function erreur(int $code = 500) {
    if (file_exists(view('erreurs/' . $code))) require_once view('erreurs/' . $code);
    else require_once view('erreurs/500');

    die();
}

function dd($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die;
}

function resume(string $string): string {
    if (strlen($string) > 90)
        $resume = substr($string, 0, 90) . '...';
    else $resume = $string;

    return $resume;
}

function redirection($route, $params = null) {
    header('Location: index.php?route=' . $route . $params);
    die;
}

function erreursFormulaire(array $errors) {
    foreach ($errors as $error) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?= $error ?>
        </div>
<?php }
}
