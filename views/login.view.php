<style>
  body {
    background: radial-gradient(circle, 
    rgba(221, 160, 221, 1) 30%,  /* Light purple */
    rgba(147, 112, 219, 1) 79%,  /* Medium purple */
    rgba(75, 0, 130, 1) 100%);   /* Dark purple */
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
  }

  .card {
    width: auto;
    min-width: 300px;
    width: 500px; /* Adjust the max-width for a wider card */
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
    background-color: rgba(147, 112, 219, 1);
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
</style>

<?php require "components/head.php" ?>
<div class="card">
  <div class="card-header">
    <h1>Login</h1>
  </div>
  <div class="card-body">
    <form method="POST" class="login-form">
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
        <?php if(isset($_SESSION["flash"])) { ?>
          <p class="flash"><?= $_SESSION["flash"] ?></p>
        <?php } ?>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
      <a href="/register" class="register-link">Register</a>
    </form>
  </div>
</div>

<?php require "views/components/footer.php" ?>
</html>
