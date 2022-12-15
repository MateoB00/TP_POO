<?php require_once view('parts/header'); ?>

<h1>Créer ta série :)</h1>

<form method="post">
    <?php if (!empty($errors)) erreursFormulaire($errors); ?>

    <div class="form-group row">
        <label for="quantite" class="col-sm-12 col-form-label">Title</label>
        <div class="col-sm-12">
            <input type="text" step="1" class="form-control" name="title" id="title" placeholder="" value="<?= $_POST['title'] ?? '' ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="quantite" class="col-sm-12 col-form-label">Origin</label>
        <div class="col-sm-12">
            <input type="text" step="1" class="form-control" name="origin" id="origin" placeholder="" value="<?= $_POST['origin'] ?? '' ?>" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </div>
</form>

<?php require_once view('parts/footer'); ?>