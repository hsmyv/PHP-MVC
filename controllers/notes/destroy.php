<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 1;


    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id'],
    ])->findOrFail();
    authorize($note["user_id"] == $currentUserId);

    $db->query('DELETE FROM notes where id = :id', [
        'id' => $_GET['id']
    ]);

    header('location: /notes');
    exit();

