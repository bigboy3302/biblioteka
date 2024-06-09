<?php require "views/components/head.php"; ?>
<?php require "views/components/navbar.php"; ?>

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

  .card {
    max-width: 500px;
    width: auto;
    margin: 0 auto;
    margin-top: 150px;
    border-radius: 15px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    font-size: 20px;
    background: radial-gradient(circle, 
        rgba(221, 160, 221, 1) 30%,  /* Light purple */
        rgba(147, 112, 219, 1) 79%,  /* Medium purple */
        rgba(75, 0, 130, 1) 100%);   /* Dark purple */
    border: 1px solid rgba(255, 255, 255, 0.3);
    position: relative;
    transition: transform 0.4s, box-shadow 0.4s;
  }

  .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
  }

  .card-header {
    margin-top: 40px;
    
    color: white;
    text-align: center;
    padding: 30px;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    font-size: 24px;
  }

  .card-body {
    padding: 30px;
    font-size: 24px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border-radius: 0 0 15px 15px;
  }

  .borrow-button {
    background-color: transparent;
    color: white;
    border: 2px solid white;
    padding: 10px 20px;
    border-radius: 10px;
    cursor: pointer;
    font-size: 20px;
    transition: background-color 0.3s, color 0.3s;
    margin-bottom: 20px;
  }

  .borrow-button:hover {
    background-color: white;
    color: rgba(75, 0, 130, 1);
  }

</style>

<div class="card">
  <div class="card-header">
    <h1>Details:</h1>
  </div>
  <div class="card-body">
    <h3>Title:</h3><h4><?= $book["title"] ?></h4><br>
    <?php if ($book["availability"]) { ?>
      <h3>Author:</h3><h4><?= $book["author"] ?></h4><br>
      <h3>Published:</h3> <h4><?= $book["year"] ?></h4><br>
      <form method="POST" action="/borrow">
        <input type="hidden" name="bookId" value="<?= $book["id"] ?>">
        <button type="submit" name="borrow-button" class="borrow-button">Borrow Book</button>
      </form>
    <?php } else { ?>
      <h4 style="color: red;">Book is currently unavailable</h4>
    <?php } ?>
  </div>
</div>

<?php require "views/components/footer.php"; ?>
