<?php
auth();

require "Database.php";
$config = require ("config.php");
$db = new Database($config);

$query = "SELECT * FROM books WHERE id = :id";
$params = [":id" => $_GET["id"]];

$book = $db -> execute($query, $params) 
             -> fetch();

require "views/show.view.php";

