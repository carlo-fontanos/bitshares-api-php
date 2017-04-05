<?php 

function generate_json_rpc( $type_id, $method, $params, $sequence_id ){
	return '{
		"jsonrpc": "2.0", 
		"method": "call", 
		"params": [' . $type_id . ', "' . $method . '", ' . $params . ' ],
		"id": ' . $sequence_id . '
	}';
}

function pr( $obj ){
   echo '<pre>';
   print_r( $obj );
   echo '</pre>';
}