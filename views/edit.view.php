<?php require "views/components/heads.php" ?>
<?php require "views/components/navbar.php" ?>


<h1>Edit <?= htmlspecialchars($book["name"]) ?></h1>

<form class="edit" method="POST">
    <input name="id" value=" <?= $book["id"] ?>" type="hidden" />
    <label>Nosaukums:
        <input name="name" value="<?= $_POST["name"] ?? $book["name"] ?>"/>
        <?php if (isset($errors["name"])) { ?>
            <p class="invalid-data"><?= $errors["name"] ?></p>
            <?php } ?>
    </label>

    <br/>

    <label>Published:
        <input type="date" name="published" value="<?= $_POST["published"] ?? $book["published"] ?>"/>
        <?php if (isset($errors["published"])) { ?>
            <p class="invalid-data"><?= $errors["published"] ?></p>
            <?php } ?>
    </label>

    <br/>

    <label>Author:
        <input name="author" value="<?= $_POST["author"] ?? $book["author"] ?>"/>
        <?php if (isset($errors["author"])) { ?>
            <p class="invalid-data"><?= $errors["author"] ?></p>
            <?php } ?>
    </label>

    <br/>

    <label>Available:
        <input name="available" value="<?= $_POST["available"] ?? $book["available"] ?>"/>
        <?php if (isset($errors["available"])) { ?>
            <p class="invalid-data"><?= $errors["available"] ?></p>
            <?php } ?>
    </label>
    
    <button>Save</button>
</form>