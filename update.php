<?php
	try{
		$username = 'z1840901';
		$password = '1994Jul12';
		$dsn = 'mysql:host=courses;dbname=z1840901';
		$pdo = new PDO($dsn,$username,$password);
	}
	catch(PDOException $e){
		echo "Correction Error".$e->getMessage();
	}
	$Id = $_POST['Id'];
	$sql1='update SongSelection set IsPlayed=1 where Id='.$Id.'';
    $re1=$pdo->query($sql1);
?>