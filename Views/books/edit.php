<?php require_once view('parts/header'); ?>

<h1>Modifie le book :)</h1>

<p>Livre : <?= $book->getTitle() ?></p>

<form method="post">
    <?php if (!empty($errors)) erreursFormulaire($errors); ?>

    <input type="hidden" name="csrf" value="<?= $token ?>">

    <div class="form-group">
        <label for="atome">Série</label>
        <select class="form-control form-control-sm" name="serie_id" id="serie_id">
            <?php foreach ($series as $serie) : ?>
                <option value="<?= $serie->getId() ?>"><?= $serie->getTitle() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <input type='hidden' name='id' value='<?= $book->getId() ?>'>

    <div class="form-group row">
        <label for="quantite" class="col-sm-12 col-form-label">Title</label>
        <div class="col-sm-12">
            <input type="text" step="1" class="form-control" name="title" id="title" placeholder="<?= $book->getTitle() ?? '' ?>" value="<?= $_POST['Title'] ?? '' ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="quantite" class="col-sm-12 col-form-label">Num</label>
        <div class="col-sm-12">
            <input type="number" step="1" class="form-control" name="num" id="num" placeholder="<?= $book->getNum() ?? '' ?>" value="<?= $_POST['Num'] ?? '' ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="quantite" class="col-sm-12 col-form-label">Writer</label>
        <div class="col-sm-12">
            <input type="text" step="1" class="form-control" name="writer" id="writer" placeholder="<?= $book->getWriter() ?? '' ?>" value="<?= $_POST['Writer'] ?? '' ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="quantite" class="col-sm-12 col-form-label">Illustrator</label>
        <div class="col-sm-12">
            <input type="text" step="1" class="form-control" name="illustrator" id="illustrator" placeholder="<?= $book->getIllustrator() ?? '' ?>" value="<?= $_POST['illustrator'] ?? '' ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="quantite" class="col-sm-12 col-form-label">Editor</label>
        <div class="col-sm-12">
            <input type="text" step="1" class="form-control" name="editor" id="editor" placeholder="<?= $book->getEditor() ?? '' ?>" value="<?= $_POST['editor'] ?? '' ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="quantite" class="col-sm-12 col-form-label">Release Year</label>
        <div class="col-sm-12">
            <input type="number" step="1" class="form-control" name="releaseyear" id="releaseyear" placeholder="<?= $book->getReleaseyear() ?? '' ?>" value="<?= $_POST['releaseyear'] ?? '' ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="quantite" class="col-sm-12 col-form-label">Strips</label>
        <div class="col-sm-12">
            <input type="number" step="1" class="form-control" name="strips" id="strips" placeholder="<?= $book->getStrips() ?? '' ?>" value="<?= $_POST['strips'] ?? '' ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="quantite" class="col-sm-12 col-form-label">Cover</label>
        <div class="col-sm-12">
            <input type="text" step="1" class="form-control" name="cover" id="cover" placeholder="<?= $book->getCover() ?? '' ?>" value="<?= $_POST['releaseyear'] ?? '' ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="quantite" class="col-sm-12 col-form-label">Rep</label>
        <div class="col-sm-12">
            <input type="number" step="1" class="form-control" name="rep" id="rep" placeholder="<?= $book->getRep() ?? '' ?>" value="<?= $_POST['rep'] ?? '' ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </div>
</form>

<?php require_once view('parts/footer'); ?>