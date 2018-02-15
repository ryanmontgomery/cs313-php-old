<?php

function get_patron($patron_id) {
    global $db;
    $query = 'SELECT * FROM library.patron
              WHERE patron_id = :patron_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':patron_id', $patron_id);
    $statement->execute();
    $patron = $statement->fetch();
    $statement->closeCursor();
    return $patron;
}

function get_patron_list() {
    global $db;
    $query = 'SELECT * FROM library.patron';
    $statement = $db->prepare($query);
    $statement->execute();
    $patrons = $statement->fetchAll();
    $statement->closeCursor();
    return $patrons;
}

function search_patron_list($last_name) {
    global $db;
    $query = 'SELECT * FROM library.patron
              WHERE last_name LIKE :last_name';
    $statement = $db->prepare($query);
    $statement->bindValue(":last_name", $last_name);
    $statement->execute();
    $patrons = $statement->fetchAll();
    $statement->closeCursor();
    return $patrons;
}

?>