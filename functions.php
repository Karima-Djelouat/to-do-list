<?php

include_once 'config.php';

global $db;

$db->initiliaze();

$tasks= $db->getTasks();

// to check which is checked : 

foreach ($tasks as $key => $value)
    $tasks[$key]['checked'] = ($value['done'] === 1) ? 'checked' : null;
?>