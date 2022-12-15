<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= asset('css/main.css'); ?>">
    <link href="<?= asset('css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <header>
        <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
            <div class="container d-flex justify-content-between align-items-center">
                <a class="navbar-brand h1" href="<?= url('books') ?>">
                    <i class='bx bx-buildings bx-sm text-dark'></i>
                    <span class="text-dark h4">BD</span> <span class="text-primary h4"> MDS</span>
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="navbar-toggler-success">
                    <div class="flex-fill mx-xl-5 mb-2">
                        <ul class="nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark">
                            <li class="nav-item">
                                <a class="nav-link btn-outline-primary rounded-pill px-3" href="<?= url('books') ?>">Tous nos livres</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-outline-primary rounded-pill px-3" href="<?= url('create_book') ?>">Créer un book :)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-outline-primary rounded-pill px-3" href="<?= url('create_serie') ?>">Créer un série :)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn-outline-primary rounded-pill px-3" href="<?= url('series') ?>">Toutes nos séries</a>
                            </li>
                        </ul>
                    </div>
                    <div class="navbar align-self-center d-flex">
                        <a class="nav-link" href="<?= url('stats') ?>">Stats <i class="fa-solid fa-user-ninja"></i></a>
                        <a class="nav-link" href="<?= url('hasard') ?>">Série au hasard<i class="fa-solid fa-spider"></i></a>
                        <a class="nav-link" href="#"><i class="fa-solid fa-dragon"></i></a>
                    </div>
                </div>

            </div>
            <form action="index.php?route=series" method="POST">
                <input type="text" name="origin" placeholder="Origin of Series" />
                <input type="submit" value="Search" />
            </form>
            <form action="index.php?route=series" method="POST">
                <input type="text" name="title" placeholder="Title of Series" />
                <input type="submit" value="Search" />
            </form>
        </nav>
    </header>