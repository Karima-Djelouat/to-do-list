<?php

include_once 'config.php';

global $db;

// to get request payload
$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody, true);

// tableau associatif de data
$action = (isset($_POST['action'])) ? $_POST['action'] : $data['action'];

switch ($action) {
    case 'add_task':
        addTask();
        break;

    default:
        #code
        break;
}

function addTask(): void
{
    global $db;

    if (!isset($_POST['taskName'])) return;

    $db->addTask($_POST['taskName']);

    echo json_encode([
        'code' => 'ADD_TASK_OK',
        'taskId' => $db->getDatabase()->lastInsertRowID(),
        'taskName' => $_POST['taskName']
    ]);
}


?>