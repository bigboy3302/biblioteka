<?php require "components/heads.php" ?>


<h1>Register</h1>

<form class="register" method="POST">
    <label>Username: 
        <input name="user" type="text"/> 
        <?php if (isset($errors["user"])) { ?>
            <p class="invalid-data"><?= $errors["user"] ?></p>
            <?php } ?>
    </label>
    <br/>
    <label>Password: 
        <input name="password" type="password"/> 
        <?php if (isset($errors["password"])) { ?>
            <p class="invalid-data"><?= $errors["password"] ?></p>
            <?php } ?>
    </label>
    <br/>
    <button>Register</button>
    <br/>
    <a class="nav" href="/">Log In</a>
</form>

<?php require "components/footer.php" ?>