<?php

$config = require('core/config.php');
$db = new Database($config['database']);


$heading = "Notes";


$notes = $db->query('select * from notes where user_id = 1')->get();

require "views/notes.view.php";