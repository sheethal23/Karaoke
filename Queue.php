<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<head>
<style>
		body{ 
			background-Image:url("http://students.cs.niu.edu/~z1840609/Karaoke.jpg");
			height:100%;
			width:100%;
			background-position:center;
			background-repeat=no-repeat;
			background-size:cover;
		}
</style>

	<h1 align="center" style="color:Orange;"> DJ Queues </h1> 

</head>

<body>
<div id="header" class="container" >
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
	$sql='select ss.Id,s.Title,s.NameOfTheBand,k.Version,ss.Time,ss.AmountPaid from SongSelection ss,Karaoke k,Song s where ss.KaraokeFileId=k.KaraokeFileId and k.SongId=s.SongId and ss.IsPlayed!=1 Order By ss.AmountPaid DESC,ss.Time ASC';
    $result=$pdo->query($sql);
    $rows=$result->fetchAll();
      $sql1='update SongSelection set IsPlayed=1 where Id=?';
    $re=$pdo->query($sql1);

    
    $AcceleratedTable ='<caption ><b style="color:Orange; font-size:25px">Accelerated Queue</b></caption><table class="table"><thead><tr style="color:Orange; font-size:15px"><th>Title</th><th>Name Of The Band</th><th>Song Version</th><th>Time</th><th>Amount Paid</th><th>Is this song played already?</th></tr></thead><tbody>';
    $FreeTable ='<caption><b style="color:Orange; font-size:25px">Free Queue</b></caption><table class="table"><thead><tr style="color:Orange;"><th>Title</th><th>Name Of The Band</th><th>Song Version</th><th>Time</th><th>Amount Paid</th><th>Is this song played already?</th></tr></thead><tbody>';

 foreach($rows as $row)
   {
$id=$row['Id'];

$amount=$row['AmountPaid'];

if($amount > 0.00){
	$AcceleratedTable .= '<tr style="color:Orange; font-size:15px">';
	$AcceleratedTable .= '<form color=name="SongSelection" id="SongSelection" action="Queue.php" method="post">';
	$AcceleratedTable .= "<td>".$row['Title'].'</td>';
	$AcceleratedTable .= "<td>".$row['NameOfTheBand']."</td>";
	$AcceleratedTable .= '<td>'.$row['Version'].'</td>';
	$AcceleratedTable .= "<td>".$row['Time'].'</td>';
	$AcceleratedTable .= "<td>".$row['AmountPaid'].'</td>';
	$AcceleratedTable .='<td><input type="radio" name="IsPlayed" value="Yes"  onClick="updateSelected('.$id.')"/>Yes';
	$AcceleratedTable .='</form>';
    $AcceleratedTable .='</tr>';
  }else {
	$FreeTable .= '<tr style="color:Orange; font-size:1s5px">';
	$FreeTable .= '<form name="SongSelection" id="SongSelection" action="Queue.php" method="post">';
	$FreeTable .= '<td>'.$row['Title'].'</td>';
	$FreeTable .= '<td>'.$row['NameOfTheBand'].'</td>';
	$FreeTable .= '<td>'.$row['Version'].'</td>';
	$FreeTable .= '<td>'.$row['Time'].'</td>';
	$FreeTable .= "<td>".$row['AmountPaid'].'</td>';
	$FreeTable .= '<td><input type="radio" name="IsPlayed" value="Yes" onClick="updateSelected('.$id.')"/>Yes';
    $FreeTable .= '</form>';
    $FreeTable .= '</tr>';
}
}

$AcceleratedTable .='</tbody></table>';
$FreeTable .='</tbody></table>';
echo $AcceleratedTable;
echo $FreeTable;
?>
</div>
<script>
	function updateSelected(Id){
		$.ajax({
			url: "update.php",
			type: "post",
			data: {Id : Id},
			success:function(data){

			}
		});
		setTimeout(function(){
			window.location.reload()
		},100);
	}
</script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>