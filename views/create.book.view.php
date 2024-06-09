<?php require "components/navbar.php" ?>

<style>
  body {
    background: radial-gradient(circle, 
    rgba(221, 160, 221, 1) 30%,  /* Light purple */
    rgba(147, 112, 219, 1) 79%,  /* Medium purple */
    rgba(75, 0, 130, 1) 100%);   /* Dark purple */
   }

  .card {
    width: auto;
    max-width: 500px;
    min-width: 300px;
    margin: 0 auto;
    margin-top: 150px;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    font-size: 20px;
  }

  .card-header {
    margin-top: 40px;
    background-color: #a2a8d3;
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
  }

  .create-input {
    margin-bottom: 20px;
        padding: 12px;
        border: 2px solid  #a2a8d3;
        border-radius: 6px;
        font-size: 22px;
        width: 100%;
        box-sizing: border-box;
        background-color: transparent;
  }

  .error {
    color: red;
    margin-top: 10px;
    font-size: 18px;
  }

  #create-poga {
    background-color:  #a2a8d3;
        color: white;
        border: none;
        padding: 15px 20px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 22px;
        width: 100%;
        box-sizing: border-box;
  }

  #create-poga:hover {
    background-color: grey;
  }
</style>

<div class="card">
  <div class="card-header">
    <h1>Create a book</h1>
  </div>
  <div class="card-body">
    <form id="create-form" action="" method="post">
        <label>
            Title:<br>
            <input class="create-input" type="text" name="title" required />
        </label>
        <?php if (isset($errors["title"])) : ?>
            <p class="error"><?= $errors["title"] ?></p>
        <?php endif; ?>
        <label><br>
            Author:<br>
            <input class="create-input" type="text" name="author" required />
        </label>
        <?php if (isset($errors["author"])) : ?>
            <p class="error"><?= $errors["author"] ?></p>
        <?php endif; ?>
        <label><br>
            Year:<br>
            <input class="create-input" type="number" name="year" required />
        </label>
        <?php if (isset($errors["year"])) : ?>
            <p class="error"><?= $errors["year"] ?></p>
        <?php endif; ?>
        <label><br>
            Availability:<br>
            <select class="create-input" name="availability">
                <option value="1">Available</option>
                <option value="0">Not Available</option>
            </select>
        </label>
        <?php if (isset($errors["availability"])) : ?>
            <p class="error"><?= $errors["availability"] ?></p>
        <?php endif; ?>
        <button id="create-poga" type="submit">Save</button>
    </form>
  </div>
</div>

<?php require "components/footer.php" ?>
