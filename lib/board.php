
<?php
	
	function show_board($input) {
	global $mysqli;
	
		header('Content-type: application/json');
		print json_encode(read_board(), JSON_PRETTY_PRINT);
	
}

function reset_board() {
	global $mysqli;
	$sql = 'call clean_board()';
	$mysqli->query($sql);
	
}

function read_board() {
	global $mysqli;
	$sql = 'select * from board';
	$st = $mysqli->prepare($sql);
	$st->execute();
	$res = $st->get_result();
	return($res->fetch_all(MYSQLI_ASSOC));
}

	
	?>