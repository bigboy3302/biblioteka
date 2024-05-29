<?php
auth();

require "Database.php";
$config = require ("config.php");
$db = new Database($config);


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = "SELECT * FROM borrow_books WHERE id = :id";
    $params = [ ":id" => $_POST["id"]];
    $book = $db -> execute($query, $params) -> fetch();
    

    $query = "SELECT * FROM books WHERE id = :id";
    $params = [ ":id" => $book["book_id"]];
    $books = $db -> execute($query, $params) -> fetch();

$availableCount = $books["available"];


 $availableCount = $availableCount + 1;
   
    $query = "UPDATE books 
              SET available = :available
              WHERE id = :id";

    $params = [
        ":available" => $availableCount,
        ":id" => $book["book_id"]
    ];
    $db -> execute($query, $params);

    $query = "DELETE FROM borrow_books WHERE id =:id";

    $params = [
        ":id" => $_POST["id"]
    ];

    $db -> execute($query, $params);
    header("Location: /borrowed-books");
    die();
  
}