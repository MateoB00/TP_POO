<?php require_once view('parts/header'); ?>


<div id="work_banner" class="banner-wrapper bg-light w-100 py-5">
    <div class="banner-vertical-center-work container text-light d-flex justify-content-center align-items-center py-5 p-0">
        <div class="banner-content col-lg-8 col-12 m-lg-auto text-center" style="height: 30vh;">
        </div>
    </div>
</div>

<h1 class="text-center mt-3 light-300 text-dark">Toutes nos stats</h1>
<section class="container py-5">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Nombre d'albums total</th>
                <th scope="col">Nombre de séries total</th>
                <th scope="col">Nombre d'auteurs total</th>
                <th scope="col">Nombre de planches total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"><?= $numberOfBooks ?></th>
                <td><?= $numberOfSeries ?></td>
                <td><?= $numberOfWriter ?></td>
                <td><?= $numberOfStrips ?></td>
            </tr>
        </tbody>
    </table>
</section>


<?php require_once view('parts/footer'); ?>