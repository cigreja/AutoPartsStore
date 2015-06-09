<?php
$db = new SQLite3('mysqlitedb.db');

$results = $db->query('SELECT name FROM foo');
while ($row = $results->fetchArray()) {
    var_dump($row);
}
?>