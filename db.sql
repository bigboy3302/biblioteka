CREATE DATABASE biblioteka;
USE biblioteka;
SELECT * FROM books;
SELECT * FROM users;

CREATE TABLE books (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  author VARCHAR(255) NOT NULL,
  published DATE NOT NULL,
  available INT
); 
 
 CREATE TABLE account(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  books VARCHAR(255)
)

INSERT INTO books
  (name, author, published, available)
VALUES
  ("Matisa piedzivojumi", "Railijs Didzis Grieznis", '2024-03-20', 1);

  CREATE TABLE borrow_books (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    book_id INT NOT NULL,
    FOREIGN KEY (book_id) REFERENCES books(id),
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES account(id),
    name VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    published DATE NOT NULL,
    available INT NOT NULL
);
