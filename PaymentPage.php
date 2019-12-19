<html>
<head>
<title>DJ Karaoke</title>
<style>

.checkOutButton{
width:12%;
border:1px;
padding:10px;
background-color:orange;
text-align:center;
font-size:15px;
}

.textBoxStyle{
width:17%;
padding:10px;
}

</style>

</head>
<body align="center">
<h2>PAYMENT DETAILS</h2>
<form method="POST" action="PaymentPage.php">
<p>Enter the amount</p>
<input class="textBoxStyle" type="text" id="amount" name="amount" placeholder="More the amount, faster the song plays!"></input>
<p>Name on the card</p>
<input class="textBoxStyle" type="text" id="cardName"  name="cardName"></input>
<p>Card Number</p>
<input class="textBoxStyle" type="text" id="cardNumber"  name="cardNumber"></input>
<p>Expiry</p>
<input class="textBoxStyle" type="text" name="expiry" placeholder="mm/yyyy"></input>
<p>CVV</p>
<input class="textBoxStyle" type="text" name="cvv"></input>
<br><br><br>
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
<input type="submit" class="checkOutButton"></input>
</form>

<?php

    try{
	require "credentials.php";
    }
    catch(PDOException $e)
    {
    echo 'Error'.$e->getMessage();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['amount'])) {

	    $KaraokeFileId = $_POST['id'];
	$played = 0;

        if(isset($_POST['amount']))
            $amo = $_POST['amount'];
        //$date = date_create();
    	$sql = "INSERT INTO SongSelection(KaraokeFileId,AmountPaid,IsPlayed) VALUES (?,?,?)";
    	$stmt = $pdo->prepare($sql);
    	 $stmt->execute(array($KaraokeFileId,$amo,$played));

    	echo 'Song added to the queue successfully!';
    }
	
?>
</body>
</html>

