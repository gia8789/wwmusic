<?php

function listSingleValue($table,$field) {
    global $pdo;
    if($pdo) {
        $sql = 'SELECT * FROM ' . $table; 
        $nameCateg = $pdo -> query($sql);
        while($row = $nameCateg -> fetch()) 
            echo '<a href="#" class="list-group-item">' . $row[$field] . '</a>';
    } 
}

?>
