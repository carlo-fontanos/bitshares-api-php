<?php

require('vendor/autoload.php');
require('inc/functions.php');

use WebSocket\Client;

/* Connect to RPC Endpoint */
$client = new Client("ws://127.0.0.1:11011");

/* Login to the full node to have access to restricted API's  */
$client->send( generate_json_rpc( 1, 'login', '["", ""]', 1) );
$client->receive();

/* Request Access to the Database API */
$client->send( generate_json_rpc( 1, 'database', '[]', 2) );
$client->receive();

/* Request Access to the History API */
$client->send( generate_json_rpc( 1, 'history', '[]', 4) );
$client->receive();

/* Execute method: get_account_history */
$client->send( generate_json_rpc( 3, 'get_account_history', '["1.2.17", "1.11.0", 50, "1.11.9999999999999"]', 4) );
$get_account_history = json_decode( $client->receive() );

/* Then print the result in object format */
pr( $get_account_history );