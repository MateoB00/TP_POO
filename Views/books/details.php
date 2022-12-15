<?php require_once view('parts/header'); ?>






<div id="work_single_banner2" class="bg-light w-100">
    <div class="container-fluid text-light d-flex justify-content-center align-items-center border-0 rounded-0 p-0 py-5">
        <div class="banner-content col-lg-8 m-lg-auto text-center py-5 px-3" style="height: 30vh;">

        </div>
    </div>
</div>

<section class="container py-5">

    <div class="row pt-5">
        <div class="worksingle-content col-lg-8 m-auto text-left justify-content-center">
            <h2 class="worksingle-heading h3 pb-3 light-300 typo-space-line-center text-center"><?= $book->getTitle() . ' - ' . $book->getSerieData()->getTitle() ?></h2>
            <p class="worksingle-footer py-3 text-muted light-300">

        </div>
    </div>

    <div class="row justify-content-center pb-4">
        <div class="col-lg-8">
            <div id="templatemo-slide-link-target" class="card mb-3">
                <img class="img-fluid border rounded" src="<?= asset('img/books/' . $book->getCover()) ?>" alt="Card image cap">
            </div>
            <div class="worksingle-slide-footer row">




                <div id="multi-item-example" class="col-10 carousel slide" data-bs-ride="carousel">

                    <div class="carousel-inner" role="listbox">


                        <div class="carousel-item active">
                            <div class="row">

                            </div>
                        </div>



                        <div class="carousel-item">
                            <div class="row">

                            </div>
                        </div>



                        <div class="carousel-item">
                            <div class="row">

                            </div>
                        </div>


                    </div>

                </div>



            </div>
        </div>
    </div>
    <div class="text-center pb-5">
        <a href="<?= url('update_book') ?>&id=<?= $book->getId() ?>" class="me-2" style="cursor: pointer">Modifie ce book <i class="fa-solid fa-pen"></i></a>
        <a href="<?= url('delete_book') ?>&id=<?= $book->getId() ?>" style="cursor: pointer">Supprime ce book <i class="fa-solid fa-trash"></i></a>
    </div>
    <div class="row">
        <div class="col-md-8 m-auto text-left justify-content-center border border-primary">
            <p class="pt-5 light-800 fs-4">
                Sortit en <?= $book->getReleaseyear() ?>,C'est un livre écrit par : <?= strtoupper($book->getWriter()) ?>, illustré par : <?= strtoupper($book->getIllustrator()) ?> et éditer par : <?= strtoupper($book->getEditor()) ?>, Ce livre contient <?= $book->getStrips() ?> pages. C'est un livre issu de la série : <?= strtoupper($book->getSerieData()->getTitle()) ?>, c'est donc un/une <?= strtoupper($book->getSerieData()->getOrigin()) ?></p>
        </div>
    </div>





</section>


<article class="container-fluid bg-light">
    <div class="container">
        <div class="worksingle-related-header row">
            <h1 class="h2 py-5">Related Books</h1>
            <div class="col-md-12 text-left justify-content-center">
                <div class="row gx-5">

                    <?php
                    $i = 0;
                    foreach ($books as $bookRelated) {
                        if ($bookRelated->getId() != $book->getId()) {
                    ?>
                            <div class="col-sm-6 col-lg-4 mb-5">
                                <a href="<?= url('details_book') ?>&id=<?= $bookRelated->getId() ?>" class="related-content card text-decoration-none overflow-hidden h-100">
                                    <img class="related-img card-img-top" src="<?= asset('img/books/' . $bookRelated->getCover()) ?>" alt="Card image cap" height="200px">
                                    <div class="related-body card-body p-4">
                                        <h5 class="card-title h6 m-0 semi-bold-600 text-dark"><?= $bookRelated->getSerieData()->getTitle() . ' - ' . $bookRelated->getTitle() ?></h5>
                                        <p class="card-text pt-2 mb-1 light-300 text-dark">
                                            Lorem ipsum dolor sit amet, consectetur.
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-primary light-300">Read more</span>
                                            <div class="light-300">
                                                <i class='bx-fw bx bx-heart me-1'></i>5
                                                <i class='bx-fw bx bx-chat    ms-1 me-1'></i>3
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                    <?php if (++$i >= 3) break;
                        }
                    }

                    ?>

                </div>
            </div>
        </div>

</article>






<?php require_once view('parts/footer'); ?>