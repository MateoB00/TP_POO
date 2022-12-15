<?php require_once view('parts/header'); ?>


<div id="work_banner" class="banner-wrapper bg-light w-100 py-5">
    <div class="banner-vertical-center-work container text-light d-flex justify-content-center align-items-center py-5 p-0">
        <div class="banner-content col-lg-8 col-12 m-lg-auto text-center" style="height: 30vh;">
        </div>
    </div>
</div>

<h1 class="text-center mt-3 light-300 text-dark">Tous nos livres</h1>
<section class="container py-5">

    <div class="row projects gx-lg-5">
        <?php


        foreach ($books as $book) : ?>
            <div class="col-sm-6 col-lg-4 text-decoration-none project marketing social business my-2">
                <div class="service-work overflow-hidden card mb-5 mx-5 m-sm-0">
                    <img class="card-img-top" src="<?= asset('img/books/' . $book->getCover()) ?>" alt=".dsqdsq.." height="250px">
                    <div class="card-body">
                        <?php

                        if ($book->getId() == 6) { ?>
                            <h5 class="card-title light-500 text-dark"><?= $book->getSerieData()->getTitle() . ' - ' . 'Volume 3' ?></h5>
                        <?php } else { ?>
                            <h5 class="card-title light-500 text-dark"><?= $book->getSerieData()->getTitle() . ' - ' . $book->getTitle() ?></h5>

                        <?php }



                        ?>
                        <p class="card-text light-300 text-dark">
                        <ul>
                            <li>
                                Writer : <?= $book->getWriter() ?>
                            </li>
                            <li>
                                Illustrator : <?= $book->getIllustrator() ?>
                            </li>
                            <li>
                                Editor : <?= $book->getEditor() ?>
                            </li>
                        </ul>
                        <div>
                            <p>Release Year : <?= $book->getReleaseyear() ?></p>
                            <?php

                            if ($book->getStrips() !== null) { ?>
                                <p>Strips : <?= $book->getStrips() ?></p>
                            <?php } ?>
                        </div>
                        </p>
                        <div class="d-flex justify-content-between">
                            <a href="<?= url('details_book') ?>&id=<?= $book->getId() ?>"><span>
                                    Voir + <i class=" fa-solid fa-hand-point-right"></i>
                                </span></a>
                            <a href="<?= url('series') ?>"><span>
                                    Check toutes les séries :)<i class=" fa-solid fa-hand-point-right"></i>
                                </span></a>
                        </div>
                        <a href="<?= url('update_book') ?>&id=<?= $book->getId() ?>" class="me-2" style="cursor: pointer">Edit <i class="fa-solid fa-pen"></i></a>
                        <a href="<?= url('delete_book') ?>&id=<?= $book->getId() ?>" style="cursor: pointer">Delete <i class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            </div>


        <?php endforeach;
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


<?php require_once view('parts/footer'); ?>