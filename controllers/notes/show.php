<?php
use Core\Database;

$config = require base_path('config.php');
 $db = new Database($config['database']);

$currentUserId = 1;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id'],
    ])->findOrFail();
    authorize($note["user_id"] == $currentUserId);

    $db->query('DELETE FROM notes where id = :id', [
        'id' => $_GET['id']
    ]);

    header('location: /notes');
}else{

    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id'],
    ])->findOrFail();

view("notes/show.view.php", [
    'heading' => 'Note',
    'note'   => $note

]);
}