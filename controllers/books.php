<?php
auth();

require "Database.php";
$config = require ("config.php");
$query = "SELECT * FROM books";

$params = [];
$db = new Database($config);

$books = $db -> execute($query, $params) 
             -> fetchAll();

$title = "Books"; 

require "views/books.view.php";