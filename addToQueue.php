<?php
	try{
	require "credentials.php";
    }
    catch(PDOException $e)
    {
    echo 'Error'.$e->getMessage();
    }
	$fileid = $_GET['id'];
    $amountpaid=0;
    $IsPlayed = 0;
    //$date = date_create();
    //echo $date;
    //echo date_format($date, 'U = Y-m-d H:i:s');
	$insertSQL = "INSERT INTO SongSelection (KaraokeFileId,AmountPaid,IsPlayed) VALUES (?,?,?)";
	$stmt = $pdo->prepare($insertSQL);
    $stmt->execute(array($fileid,$amountpaid,$IsPlayed));
	echo 'Song added to free queue successfully';
?>
