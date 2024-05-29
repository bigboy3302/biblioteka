<?php require "components/heads.php" ?>
<?php require "components/navbar.php" ?>

<h1>Borrowed Books</h1>
<div class="books">
<h1 style="color: black;">Your Borrowed Books</h1>
<table>
    <tr>
    
        <th>Title</th>
        <th>Author</th>
        <th>Published</th>
        <th>availale</th>
    </tr>
<?php foreach($books as $book) { ?>
<tr>
<td><?= htmlspecialchars($book["name"]) ?> </td>
  <td> <?= $book["author"] ?></td>
  <td> <?= $book["published"] ?></td>
<td>
  <form class="delete-form" method="POST" action="/return"><button class="delete-button" name="id" value="<?= $book["id"] ?>" >return</button></form>
</td>


</tr>
<?php } ?>
</table>    
</div>
<?php require "components/footer.php" ?>