<?php
guest();


require "Validator.php";
require "Database.php";
$config = require ("config.php");

$query = "SELECT * FROM account";
$params = [];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database($config);
    $errors = [];

    if(!Validator::string($_POST["user"], min: 5)) {
        $errors["user"] = "Username jabut 5 rakstzimem garam";
    }

    if(!Validator::string($_POST["password"], min: 5)) {
        $errors["password"] = "Parolei jabut 5 rakstzimem garai";
    }


    $query = "SELECT * FROM account WHERE user = :user";
    $params = [
        ":user" => $_POST["user"]
    ];

    $result = $db->execute($query, $params)
                 ->fetch();

    if($result) {
        $errors["user"] = "user pastav";
    }

    if(empty($errors)) {
        $query = "INSERT INTO account (user, password, admin) VALUES (:user, :password, 0)";
        $params = [
        ":user" => $_POST["user"],
        ":password" => password_hash($_POST["password"],  PASSWORD_BCRYPT),
        ];
        $db->execute($query, $params);
        header("Location: /");
                die();
    }
}




$title = "Register";
require "views/register.view.php";