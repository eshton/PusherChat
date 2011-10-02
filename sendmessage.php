<?php 

ini_set('display_errors',0);

header('Content-type: application/json');

$app_id = '8997';
$key = 'eecbb40acb042a9a2ad0';
$secret = '6c49f4a7155ab08b5eb1';

require('Pusher-PHP/lib/Pusher.php');

$message = $_GET['message'];

if (!$event || !$message) {
    echo json_encode(array('result' => 'wrong parameter'));
    return;
}

$pusher = new Pusher\Pusher($key, $secret, $app_id);
$pusher->trigger('pusherchat', 'newmessage', $message);

echo json_encode(array('result' => 'success'));
