<?php require "components/heads.php" ?>
<?php require "components/navbar.php" ?>


<h1>Izveido Gramatu</h1>

<form class="create" method="POST">
    <label>Title:
        <input name="name"/>
    </label>
    <br/>
    <label>Author:
        <input name="author"/>
    </label>
    <br/>
    <label>Published:
        <input type="date" name="published"/>
    </label>
    <br/>
    <label>Available:
        <input name="available"/>
    </label>
    <button>Save</button>
</form>



<?php require "components/footer.php" ?>