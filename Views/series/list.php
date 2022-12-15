<?php
require_once view('parts/header'); ?>

<?php
if (empty($seriesFromSearch)) { ?>

    <div id="work_single_banner" class="banner-wrapper bg-light w-100 py-5">
        <div class="banner-vertical-center-work container text-light d-flex justify-content-center align-items-center py-5 p-0">
            <div class="banner-content col-lg-8 col-12 m-lg-auto text-center" style="height: 30vh;">
            </div>
        </div>
    </div>

    <h1 class="text-center mt-3 light-300 text-dark">Toutes nos séries</h1>
    <section class="container py-5">
        <div class="row justify-content-center mb-5">
            <div class="filter-btns shadow-md rounded-pill text-center col-auto">
                <form action="" method="POST">
                    <button class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4 active" data-filter=".project" name="all" href="#">All</button>
                    <button class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4 active" data-filter=".business" name="manga" href="#">Manga</button>
                    <button class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4 active" data-filter=".marketing" name="bd" href="#">BD</button>
                    <button class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4 active" data-filter=".social" name="comics" href="#">Comics</button>
                </form>
            </div>
        </div>

        <div class="row projects gx-lg-5">

            <?php

            foreach ($series as $serie) {

            ?>
                <div href="work-single.html" class="col-sm-6 col-lg-4 text-decoration-none project marketing social business my-2">
                    <div class="service-work overflow-hidden card mb-5 mx-5 m-sm-0">
                        <img class="card-img-top" src="<?= asset('img/books/' . $serie->getCoverSerie()) ?>" alt=".dsqdsq.." height="250px">
                        <div class="card-body">
                            <h5 class="card-title light-500 text-dark"><?= $serie->getTitle() ?></h5>
                            <p class="card-text light-300 text-dark">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolor.
                            </p>
                            <a><?= strtoupper($serie->getOrigin()) ?></a>
                            <a href="<?= url('details_serie') ?>&id=<?= $serie->getId() ?>">Détails</a>
                            <div class="d-flex justify-content-end">
                                <a href="<?= url('create_book_for_serie') ?>&id=<?= $serie->getId() ?>" class="me-2" style="cursor: pointer">Ajoute un book à cette serie <i class="fa-solid fa-pen"></i></a>
                                <a href="<?= url('update_serie') ?>&id=<?= $serie->getId() ?>" class="me-2" style="cursor: pointer">Edit <i class="fa-solid fa-pen"></i></a>
                                <a href="<?= url('delete_serie') ?>&id=<?= $serie->getId() ?>" style="cursor: pointer">Delete <i class="fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


            <?php }
            ?>



        </div>
        <div class="row">
            <div class="btn-toolbar justify-content-center pb-4" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                    <button type="button" class="btn btn-secondary text-white">Previous</button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-secondary text-white">1</button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-secondary text-white">2</button>
                </div>
                <div class="btn-group" role="group" aria-label="Third group">
                    <button type="button" class="btn btn-secondary text-white">Next</button>
                </div>
            </div>
        </div>
    </section>

<?php } else { ?>
    <div id="work_single_banner" class="banner-wrapper bg-light w-100 py-5">
        <div class="banner-vertical-center-work container text-light d-flex justify-content-center align-items-center py-5 p-0">
            <div class="banner-content col-lg-8 col-12 m-lg-auto text-center" style="height: 30vh;">
            </div>
        </div>
    </div>

    <h1 class="text-center mt-3 light-300 text-dark">Toutes nos séries <?= $seriesFromSearch[0]->getOrigin() ?></h1>
    <section class="container py-5">
        <div class="row justify-content-center mb-5">
            <div class="filter-btns shadow-md rounded-pill text-center col-auto">
                <form action="" method="POST">
                    <button class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4 active" data-filter=".project" name="all" href="#">All</button>
                    <button class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4 active" data-filter=".business" name="manga" href="#">Manga</button>
                    <button class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4 active" data-filter=".marketing" name="bd" href="#">BD</button>
                    <button class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4 active" data-filter=".social" name="comics" href="#">Comics</button>
                </form>
            </div>
        </div>

        <div class="row projects gx-lg-5">

            <?php

            foreach ($seriesFromSearch as $serieFromSearch) {

            ?>
                <div href="work-single.html" class="col-sm-6 col-lg-4 text-decoration-none project marketing social business my-2">
                    <div class="service-work overflow-hidden card mb-5 mx-5 m-sm-0">
                        <img class="card-img-top" src="<?= asset('img/books/' . $serieFromSearch->getCoverSerie()) ?>" alt=".dsqdsq.." height="250px">
                        <div class="card-body">
                            <h5 class="card-title light-500 text-dark"><?= $serieFromSearch->getTitle() ?></h5>
                            <p class="card-text light-300 text-dark">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolor.
                            </p>
                            <a><?= strtoupper($serieFromSearch->getOrigin()) ?></a>
                            <a href="<?= url('details_serie') ?>&id=<?= $serieFromSearch->getId() ?>">Détails</a>
                            <div class="d-flex justify-content-end">
                                <a href="<?= url('create_book_for_serie') ?>&id=<?= $serieFromSearch->getId() ?>" class="me-2" style="cursor: pointer">Ajoute un book à cette serie <i class="fa-solid fa-pen"></i></a>
                                <a href="<?= url('update_serie') ?>&id=<?= $serieFromSearch->getId() ?>" class="me-2" style="cursor: pointer">Edit <i class="fa-solid fa-pen"></i></a>
                                <a href="<?= url('delete_serie') ?>&id=<?= $serieFromSearch->getId() ?>" style="cursor: pointer">Delete <i class="fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


            <?php }
            ?>



        </div>
        <div class="row">
            <div class="btn-toolbar justify-content-center pb-4" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                    <button type="button" class="btn btn-secondary text-white">Previous</button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-secondary text-white">1</button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-secondary text-white">2</button>
                </div>
                <div class="btn-group" role="group" aria-label="Third group">
                    <button type="button" class="btn btn-secondary text-white">Next</button>
                </div>
            </div>
        </div>
    </section>
<?php }
?>
<?php require_once view('parts/footer'); ?>