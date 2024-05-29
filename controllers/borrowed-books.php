<?php
auth();

require "Database.php";
$config = require ("config.php");


$db = new Database($config);
$query = "SELECT * FROM borrow_books WHERE user_id = :user_id";
$params = [
    ":user_id" => $_SESSION["user_id"]
];

$books = $db -> execute($query, $params) -> fetchAll();

$title = "Borrowed Books";


require "views/borrowed-books.view.php";