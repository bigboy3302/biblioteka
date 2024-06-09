<style>
  body {
    background: radial-gradient(circle, 
    rgba(221, 160, 221, 1) 30%,  /* Light purple */
    rgba(147, 112, 219, 1) 79%,  /* Medium purple */
    rgba(75, 0, 130, 1) 100%);   /* Dark purple */
    background-color: grey;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }

  .card {
    width: auto;
    min-width: 300px;
    max-width: 500px; /* Adjust the max-width for a wider card */
    background-color: white;
    border-radius: 12px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .card-header {
    padding: 30px;
    text-align: center;
    background-color: black;
    color: white;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    font-size: 24px;
  }

  .card-body {
    padding: 30px;
  }

  .form-group {
    margin-bottom: 30px;
  }

  label {
    display: block;
    margin-bottom: 10px;
    color: black;
    font-size: 24px;
  }

  input[type="email"],
  input[type="password"] {
    width: 100%;
    padding: 15px;
    border: 2px solid #ccc;
    border-radius: 6px;
    font-size: 20px;
  }

  .error {
    color: red;
    margin-top: 10px;
    font-size: 18px;
  }

  button[type="submit"] {
    width: 100%;
    background-color: black;
    color: white;
    height: 60px;
    border: none;
    padding: 15px;
    border-radius: 10px;
    cursor: pointer;
    transition: background-color 0.3s;
    font-size: 24px;
  }

  button[type="submit"]:hover {
    background-color: grey;
  }

  .register-link {
    display: block;
    text-align: center;
    color: black;
    text-decoration: none;
    margin-top: 30px; 
    font-size: 22px; 
  }

  .register-link:hover {
    color: grey;
  }

  .flash {
    text-align: center;
    margin-top: 30px;
    color: #28a745;
    font-size: 22px;
  }
  
  .explanation {
    color: black;
    font-size: 20px;
  }
</style>

<?php require "components/head.php" ?>
<div class="card">
  <div class="card-header">
    <h1>Register</h1>
  </div>
  <div class="card-body">
    <form method="POST" class="register-form">
      <div class="form-group">
        <label for="email">Email:</label>
        <input id="email" name="email" type="email" class="form-control" required/>
        <?php if(isset($errors["email"])) {?>
          <p class="error"><?= $errors["email"] ?></p>
        <?php } ?>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input id="password" name="password" type="password" class="form-control" required/>
        <?php if(isset($errors["password"])) {?>
          <p class="error"><?= $errors["password"] ?></p>
        <?php } ?>
        <span class="explanation">(must contain at least 8 characters, 1 uppercase, 1 lowercase, 1 special character, and 1 digit)</span>
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <a href="/login" class="register-link">Already have an account? Login</a>
  </div>
</div>

<?php if(isset($_SESSION["flash"])) { ?>
  <p class="flash"><?= $_SESSION["flash"] ?></p>
<?php } ?>

<?php require "views/components/footer.php" ?>
