<?php require_once view('parts/header'); ?>

<?php
if (!empty($_GET['id'])) { ?>



    <h1>Créer un book pour ta série préferer :)</h1>


    <form method="post" enctype="multipart/form-data">
        <?php if (!empty($errors)) erreursFormulaire($errors); ?>

        <input type="hidden" name="csrf" value="<?= $token ?>">
        <input type="hidden" name="serie_id" value="<?= $_GET['id'] ?>">


        <div class="form-group row">
            <label for="Title" class="col-sm-12 col-form-label">Title</label>
            <div class="col-sm-12">
                <input type="text" step="1" class="form-control" name="title" id="title" placeholder="<?= '' ?>" value="<?= $_POST['Title'] ?? '' ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="Num" class="col-sm-12 col-form-label">Num</label>
            <div class="col-sm-12">
                <input type="number" step="1" class="form-control" name="num" id="num" placeholder="<?= '' ?>" value="<?= $_POST['Num'] ?? '' ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="Writer" class="col-sm-12 col-form-label">Writer</label>
            <div class="col-sm-12">
                <input type="text" step="1" class="form-control" name="writer" id="writer" placeholder="<?= '' ?>" value="<?= $_POST['Writer'] ?? '' ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="Illustrator" class="col-sm-12 col-form-label">Illustrator</label>
            <div class="col-sm-12">
                <input type="text" step="1" class="form-control" name="illustrator" id="illustrator" placeholder="<?= '' ?>" value="<?= $_POST['illustrator'] ?? '' ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="Editor" class="col-sm-12 col-form-label">Editor</label>
            <div class="col-sm-12">
                <input type="text" step="1" class="form-control" name="editor" id="editor" placeholder="<?= '' ?>" value="<?= $_POST['editor'] ?? '' ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="releaseyear" class="col-sm-12 col-form-label">Release Year</label>
            <div class="col-sm-12">
                <input type="number" step="1" class="form-control" name="releaseyear" id="releaseyear" placeholder="<?= '' ?>" value="<?= $_POST['releaseyear'] ?? '' ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="Strips" class="col-sm-12 col-form-label">Strips</label>
            <div class="col-sm-12">
                <input type="number" step="1" class="form-control" name="strips" id="strips" placeholder="<?= '' ?>" value="<?= $_POST['strips'] ?? '' ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="Cover" class="col-sm-12 col-form-label">Cover</label>
            <div class="col-sm-12">
                <input type="file" step="1" class="form-control" name="cover" id="cover" placeholder="<?= '' ?>" value="<?= $_POST['releaseyear'] ?? '' ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="Rep" class="col-sm-12 col-form-label">Rep</label>
            <div class="col-sm-12">
                <input type="number" step="1" class="form-control" name="rep" id="rep" placeholder="<?= '' ?>" value="<?= $_POST['rep'] ?? '' ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </div>
    </form>



<?php } else { ?>
    <h1>Créer un book :)</h1>


    <form method="post" enctype="multipart/form-data">
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

        <div class="form-group row">
            <label for="Title" class="col-sm-12 col-form-label">Title</label>
            <div class="col-sm-12">
                <input type="text" step="1" class="form-control" name="title" id="title" placeholder="<?= '' ?>" value="<?= $_POST['Title'] ?? '' ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="Num" class="col-sm-12 col-form-label">Num</label>
            <div class="col-sm-12">
                <input type="number" step="1" class="form-control" name="num" id="num" placeholder="<?= '' ?>" value="<?= $_POST['Num'] ?? '' ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="Writer" class="col-sm-12 col-form-label">Writer</label>
            <div class="col-sm-12">
                <input type="text" step="1" class="form-control" name="writer" id="writer" placeholder="<?= '' ?>" value="<?= $_POST['Writer'] ?? '' ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="Illustrator" class="col-sm-12 col-form-label">Illustrator</label>
            <div class="col-sm-12">
                <input type="text" step="1" class="form-control" name="illustrator" id="illustrator" placeholder="<?= '' ?>" value="<?= $_POST['illustrator'] ?? '' ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="Editor" class="col-sm-12 col-form-label">Editor</label>
            <div class="col-sm-12">
                <input type="text" step="1" class="form-control" name="editor" id="editor" placeholder="<?= '' ?>" value="<?= $_POST['editor'] ?? '' ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="releaseyear" class="col-sm-12 col-form-label">Release Year</label>
            <div class="col-sm-12">
                <input type="number" step="1" class="form-control" name="releaseyear" id="releaseyear" placeholder="<?= '' ?>" value="<?= $_POST['releaseyear'] ?? '' ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="Strips" class="col-sm-12 col-form-label">Strips</label>
            <div class="col-sm-12">
                <input type="number" step="1" class="form-control" name="strips" id="strips" placeholder="<?= '' ?>" value="<?= $_POST['strips'] ?? '' ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="Cover" class="col-sm-12 col-form-label">Cover</label>
            <div class="col-sm-12">
                <input type="file" step="1" class="form-control" name="cover" id="cover" placeholder="<?= '' ?>" value="<?= $_POST['releaseyear'] ?? '' ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="Rep" class="col-sm-12 col-form-label">Rep</label>
            <div class="col-sm-12">
                <input type="number" step="1" class="form-control" name="rep" id="rep" placeholder="<?= '' ?>" value="<?= $_POST['rep'] ?? '' ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </div>
    </form>
<?php }
?>

<?php require_once view('parts/footer'); ?>