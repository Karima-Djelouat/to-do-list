<?php

include_once 'config.php';

global $db;

// to get request payload
$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody, true);

// tableau associatif de data
$action = (isset($_POST['action'])) ? $_POST['action'] : $data['action'];

// var_dump($action); die;

switch ($action) {
    case 'add_task':
        addTask();
        break;
    case 'update_task':
        updateTask($data);
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

function updateTask(array $data): void
{
    global $db;

    if (!isset($data['taskId'], $data['done'])) return;

    // var_dump($data); die;

    $db->updateTask(intval($data['taskId']), intval($data['done']));

    echo json_encode([
        'code' => 'UPDATE_TASK_OK',
    ]);
}


?>