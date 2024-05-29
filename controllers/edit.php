<?php
auth();

require "Validator.php";
require "Database.php";

$config = require ("config.php");
$db = new Database($config);

$query = "SELECT * FROM books";
$params = [];


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    if(!Validator::string($_POST["name"], min: 1, max: 255)) {
        $errors["name"] = "Name cannot be empty or too long";
    }

    if(!Validator::date($_POST["published"])) {
        $errors["published"] = "date cannot be empty";
    }

    if(!Validator::string($_POST["author"], min: 1, max: 255)) {
        $errors["author"] = "Author cannot be too long";
    }


    if(!Validator::number($_POST["available"], min: 0, max: INF)) {
        $errors["available"] = "Availability cannot be negative";
    }

    if(empty($errors)) {
    
        $query = "UPDATE books
                  SET name = :name, published = :published, author = :author, available = :available
                  WHERE id = :id";
        $params = [
            ":name" => $_POST["name"],
            ":published" => $_POST["published"],
            ":author" => $_POST["author"],
            ":available" => $_POST["available"],
            ":id" => $_POST["id"]
        ];

        $db -> execute($query, $params);
        
        header("Location: /books");
        die();
    }
}

$query = "SELECT * FROM books WHERE id = :id";
$params = [":id" => $_GET["id"]];

$book = $db -> execute($query, $params) 
             -> fetch();



$title = "  Edit a book";
require "views/edit.view.php";