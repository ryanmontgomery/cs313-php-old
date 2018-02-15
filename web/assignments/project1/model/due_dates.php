<?php
function get_overdue_books() {
    global $db;
    $query = 'SELECT * FROM library.due_date
              WHERE CURRENT_DATE > return_by_date'; 
    $statement = $db->prepare($query);
    $statement->execute();
    $overdue_books = $statement->fetchAll();
    $statement->closeCursor();
    return $overdue_books;
}
?>