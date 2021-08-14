
<?php
	
	function show_board(){
		
		global $mysqli;
		$sql='select * from board';
		$st=$mysqli->prepare($sql);
		$st->execute();
		$res=$st->get_result();
		
		header('Content-type:application/json');
		
		print json_encode($res->fetch_all(MSQLI_ASSOC),JSON_PRETTY_PRINT);
		
	}
	
	function reset_board(){
		
		global $msqli;
		
		 $sql= 'call clean_board'();
		 $msqli->query($sql);
		 show_board();
		 
	}
	
	?>