<?php
auth();

require "Database.php";
$config = require ("config.php");
$db = new Database($config);

$query = "SELECT * FROM books";
$params = [];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = "SELECT * FROM books WHERE id = :id";
    $params = [ ":id" => $_POST["id"]];
    $book = $db -> execute($query, $params) -> fetch();

    

$availableCount = $book["available"];

if ($availableCount > 0) {
    $availableCount = $availableCount - 1;

    $query = "UPDATE books 
              SET available = :available
              WHERE id = :id";
    $params = [
        ":available" => $availableCount,
        ":id" => $_POST["id"]
    ];
    $db -> execute($query, $params);



    $query = "INSERT INTO borrow_books
              (book_id, user_id, name, author, published, available)
              VALUES
              (:book_id, :user_id, :name, :author, :published, :available)";

    $params = [
        ":book_id" => $_POST["id"],
        ":user_id" => $_SESSION["user_id"],
        ":name" => $book["name"],
        ":author" => $book["author"],
        ":published" => $book["published"],
        ":available" => $book["available"]
    ];

    

    $db -> execute($query, $params);
    header("Location: /books");
                die();
  }
}