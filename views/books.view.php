<?php require "components/heads.php" ?>
<?php require "components/navbar.php" ?>

<h1 class="email">Welcome, <?= isset($_SESSION["username"]) ? $_SESSION["username"] : "guest"; ?>!</h1>


<div class="title">
    <h1 class="word1">Only</h1> <h1 class="word2">Books</h1>
</div>

<div class="books">
  <h1 style="color: black;">Available Books</h1>
<table>
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Published</th>
        <th>availale</th>
    </tr>
<?php foreach($books as $book) { ?>
<tr>
<td> <a class="show" href="/show?id=<?=$book["id"]?>"> <?= htmlspecialchars($book["name"]) ?> <a/> </td>

  
  <td> <?= $book["author"] ?></td>
  <td> <?= $book["published"] ?></td>
  <td> <?= $book["available"] ?> </td>
<td>
  <form class="delete-form" method="POST" action="/delete"><button class="delete-button" name="id" value="<?= $book["id"] ?>" >Delete</button></form>    </form>
</td>
<td>
  <form class="delete-form" action="/edit"><button class="delete-button" name="id" value="<?= $book["id"] ?>" >Edit</button></form>    </form>
</td>
<td>
  <form class="delete-form" method="POST" action="/borrow-books"><button class="delete-button" name="id" value="<?= $book["id"] ?>" >Borrow</button></form>    </form>
</td>

</tr>
<?php } ?>
</table>
<div/>


<?php require "components/footer.php" ?>



