<!doctype html>
<html>
<head>
   <title>Teach 05</title>
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
   <link href="booklist.css" rel="Stylesheet" type="text/css" />
</head>
<body>

<h1>Scripture Resources</h1>

<?php
try
{
  $user = 'postgres';
  $password = 'monkeytoo2';
  $db = new PDO('pgsql:host=localhost;dbname=mydb', $user, $password);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
    
$query = "INSERT INTO scripture.scriptures (book, chapter, verse, content) 
VALUES ('$_POST[book]','$_POST[chapter]','$_POST[verse]','$_POST[content]')";
$result = pg_query($query);

$query = "INSERT INTO scripture.topic_scripture (topic_id, scripture_id)
VALUES ('$_POST[book]','$_POST[chapter]')";
$result = pg_query($query);

foreach ($db->query('SELECT book, chapter, verse, content FROM scripture.scriptures') as $row)
{
  echo '<p><b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> - "'
  . $row['content'] . '"</p>';
} 
?>
    
<form action="scriptures.php" method="post">
    <label for="book">Book:</label>
    <input id="book" type="text" name="book"><br>
    
    <label for="chapter">Chapter:</label>
    <input id="chapter" type="number" name="chapter"><br>
    
    <label for="verse">Verse:</label>
    <input id="verse" type="number" name="verse"><br>
    
    <label for="content">Content:</label>
    <textarea id="content" name="content"></textarea><br>
    
    <?php
    foreach ($db->query('SELECT name FROM scripture.topic') as $row) {
        echo '<input type="checkbox" name="topic" value="' . $row["name"] . '">' . $row['name'] . '<br />';
    }
    ?>
    
    <input type="submit" value="Submit"><br>
</form>


</body>
</html>