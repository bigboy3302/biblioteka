<?php
guest();

require "Validator.php";
require "Database.php";
$config = require ("config.php");

$params = [];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database($config);

    $errors = [];

    if(!Validator::string($_POST["user"])) {
        $errors["email"] = "Nepareizi ievadits username";
    }

    if(empty($errors)) {
        $query = "SELECT * FROM account WHERE user = :user";
        $params = [
            ":user" => $_POST["user"]
            ];
            $user = $db->execute($query, $params)->fetch();
            if(!$user || !password_verify($_POST["password"], $user["password"])) {
                $errors["user"] = "Parole vai username nesakrit";
            }

            if(empty($errors)) {
                $_SESSION["user"] = true;
                $_SESSION["username"] = $_POST["user"];
                $_SESSION["user_id"] = $user["id"];
                header("Location: /books");
                die();
            }
    }

}



$title = "login";
require "views/login.view.php";
?>