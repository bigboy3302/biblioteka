<?php

class Database {

  private $pdo;

  // Savienojamies ar datu bāzi tikai vienreiz
  public function __construct($config)
  {
    $connection_string = "mysql:" . http_build_query($config, "", ";");
    $this->pdo = new PDO($connection_string);
    $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  }

  // execute vai query
  public function execute($query_string, $params) {
    $query = $this->pdo->prepare($query_string);
    $query->execute($params);

    return $query;
  }


  public function borrowBook($bookId) {
    // Update the books table
    $this->execute("UPDATE books SET availability = false WHERE id = ?", [$bookId]);
  
    // Get the book details
    $book = $this->execute("SELECT title, author, year FROM books WHERE id = ?", [$bookId])->fetch();
  
    // Insert into borrowed table
    $this->execute("INSERT INTO borrowed (bookId, title, author, year, availability) VALUES (?, ?, ?, ?, false)", [$bookId, $book['title'], $book['author'], $book['year']]);
  }
  
  public function returnBook($borrowedId) {
    // Get the bookId from the borrowed table
    $bookId = $this->execute("SELECT bookId FROM borrowed WHERE id = ?", [$borrowedId])->fetch()['bookId'];
  
    // Update the books table
    $this->execute("UPDATE books SET availability = true WHERE id = ?", [$bookId]);
  
    // Delete from borrowed table
    $this->execute("DELETE FROM borrowed WHERE id = ?", [$borrowedId]);
  }
  

}