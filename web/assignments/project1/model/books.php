<?php

function get_book($book_id) {
    global $db;
    $query = 'SELECT * FROM library.book
              WHERE book_id = :book_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':book_id', $book_id);
    $statement->execute();
    $book = $statement->fetch();
    $statement->closeCursor();
    return $book;
}

function get_authors_books($author_id) {
    global $db;
    $query = 'SELECT * FROM library.book
              WHERE author_id = :author_id
              ORDER BY published_date DESC';
    $statement = $db->prepare($query);
    $statment->bindValue(':author_id', $author_id);
    $statement->execute();
    $authors_books = $statment->fetchAll();
    $statment->closeCursor();
    return $authors_books;
}

function book_by_title($title) {
    global $db;
    $query = 'SELECT * FROM library.book
              WHERE name LIKE :title
              ORDER BY name ASC';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->execute();
    $books = $statement->fetchAll();
    $statement->closeCursor();
    return $books;
}

?>