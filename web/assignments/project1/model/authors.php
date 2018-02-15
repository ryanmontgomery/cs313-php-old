<?php

function get_author_list() {
    global $db;
    $query = 'SELECT * FROM library.author
              ORDER BY last_name ASC,
                       first_name DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $authors = $statement->fetchAll();
    $statement->closeCursor();
    return $authors;
}

function search_author_list($last_name) {
    global $db;
    $query = 'SELECT * FROM library.author
              WHERE last_name LIKE :last_name
              ORDER BY first_name ASC';
    $statement = $db->prepare($query);
    $statement->bindValue(":last_name", $last_name);
    $statement->execute();
    $authors = $statement->fetchAll();
    $statement->closeCursor();
    return $authors;
}

?>