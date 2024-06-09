<?php require "components/head.php" ?>
<?php require "components/navbar.php" ?>
<style>
   body {
    background: radial-gradient(circle, 
    rgba(221, 160, 221, 1) 30%,  /* Light purple */
    rgba(147, 112, 219, 1) 79%,  /* Medium purple */
    rgba(75, 0, 130, 1) 100%);   /* Dark purple */
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
   }

   h4 {
    color: grey;
   }

   h3 {
    color: black;
   }

   .book-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    margin-top: 120px;
    margin-left: auto;
    margin-right: auto;
  }

  .book-card {
    width: auto;
    min-width: 300px;
    max-width: 400px;
    border-radius: 15px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    height: auto;
    overflow: hidden;
    font-size: 20px;
    cursor: pointer; /* Add cursor pointer to indicate it's clickable */
    background: radial-gradient(circle, 
        rgba(221, 160, 221, 1) 30%,  /* Light purple */
        rgba(147, 112, 219, 1) 79%,  /* Medium purple */
        rgba(75, 0, 130, 1) 100%);   /* Dark purple */
    border: 1px solid rgba(255, 255, 255, 0.3);
    position: relative;
    transition: transform 0.4s, box-shadow 0.4s;
  }

  .book-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
  }

  .book-details {
    padding: 20px 30px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border-radius: 0 0 15px 15px;
  }

  .book-title {
    margin: 0;
    font-size: 30px;
    text-align: center;
    color: white;
    padding: 20px 0;
    background-color: rgba(255, 255, 255, 0.3);
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
  }

  .button-container {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
    padding: 0 30px;
  }

  .delete-poga,
  .edit-poga {
    background-color: transparent;
    color: white;
    border: 2px solid white;
    padding: 10px 20px;
    border-radius: 10px;
    cursor: pointer;
    font-size: 20px;
    transition: background-color 0.3s, color 0.3s;
  }

  .delete-poga:hover,
  .edit-poga:hover {
    background-color: white;
    color: rgba(75, 0, 130, 1);
  }

  a {
    text-decoration: none;
  }

  .book-title {
    font-size: 24px;
  }

  .available {
    color: #00FF40;
  }

  .unavailable {
    color: red;
  }

  .b-t {
    text-align: center;
    color: white;
  }
</style>
<h1 class="b-t">Books</h1>

<div class="book-container">
  <?php foreach($books as $book) { ?>
    <a href="/show?id=<?= $book["id"] ?>" class="book-card <?= $book["availability"] ? 'available' : 'unavailable' ?>"> <!-- Wrap the card contents in anchor tag -->
      <h2 class="book-title"><?= $book["title"] ?></h2>
      <div class="book-details">
        <h4>Author:</h4> <h3><?= $book["author"] ?></h3>  <br>
        <h4>Published Year:</h4> <h3><?= $book["year"] ?></h3> <br>
        <h4>Availability:</h4> <h3 class="<?= $book["availability"] ? 'available' : 'unavailable' ?>"><?= $book["availability"] ? 'Available' : 'Not available' ?></h3>
      </div>
      <div class="button-container">
        <form class="delete-form" method="POST" action="/delete">
          <button class="delete-poga" name="id" value="<?= $book["id"] ?>">Delete</button>
        </form>
        <form class="edit-form" method="GET" action="/edit">
          <input type="hidden" name="id" value="<?= $book["id"] ?>">
          <button class="edit-poga" type="submit">Edit</button>
        </form>
      </div>
    </a>
  <?php } ?>
</div>

<?php require "components/footer.php" ?>
