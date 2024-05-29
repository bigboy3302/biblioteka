<?php require "components/heads.php" ?>


<h1>Login</h1>

<form class="login" method="POST">
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
    <button>Login</button>
    <br/>
    <a class="nav" href="/register">Create Account</a>
</form>
<?php require "components/footer.php" ?>