<!DOCTYPE html>
<html>
<head>
<title>DJ Karoake</title>
<style>

body{

   // background-image: url("http://students.cs.niu.edu/~z1840901/DJImage.jpg");
background-Image:url("http://students.cs.niu.edu/~z1840901/Karaoke.jpg");
    
    height:100%;
    
    width:100%
    
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.searchStyle{
    width:30%;
    padding:12px;
    font-size:15px;

}

.searchButton{
    
    width:8%;
    border:1px;
    padding:15px;
    background-color:orange;
    text-align:center;
    font-size:15px;
}

</style>
</head>

<body>
<h1 align='center'><font color="orange"><i>SEARCH, ADD, SING!</i></font></h1>


<form align="center" method="POST" action="">
<input type = "text" class ="searchStyle" name="searchKey" placeholder="Search for song/artist/contributor"></input>
&nbsp;
<button type = "submit" class ="searchButton">Search</button>
</form>

<br><br><br>

<?php
    
    try{
    require "credentials.php";
    }
    catch(PDOException $e)
    {
        echo 'Error'.$e->getMessage();
    }

    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $searchKey = $_POST['searchKey'];
        $sql = " select s.Title,k.Version,s.NameOfTheBand,CONCAT(c.Name,'(',c.Role,')') as Contributor,k.KaraokeFileId from Song s,Contributor c,SongContributor sc,Karaoke k where s.SongId=k.SongId and sc.ContributorId=c.ContributorId and sc.SongId=k.songId and (s.Title like '%".$searchKey."%' or c.Name like '%".$searchKey."%');";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array($searchKey));
	$cnt = $stmt->rowCount();
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

	if($cnt>0){

        echo '<table align="center" cellpadding="10" style="color:Orange; font-size:1s8px">';
        echo '<tr>';
        echo '<th>SONG TITLE</th>';
        echo '<th>KARAOKE VERSION</th>';
        echo '<th>BAND</th>';
        echo '<th>CONTRIBUTORS</th>';
	echo '</tr>';
        
        foreach($rows as $row){
            echo "<tr>";
            echo "<td>".$row['Title']."</td>";
            echo "<td>".$row['Version']."</td>";
            echo "<td>".$row['NameOfTheBand']."</td>";
	    echo "<td>".$row['Contributor']."</td>";
	    echo "<td>";
	    echo "<a href='addToQueue.php?id=".$row['KaraokeFileId']."'>Add to queue</a>";
            echo "&nbsp;";
	    echo "<a href='PaymentPage.php?id=".$row['KaraokeFileId']."'>Add to paid queue</a>";
	    echo "</td>";
            echo "</tr>";
        }
        
        echo '</table>';
	}else{
		echo '<h3 align="center"><font color="orange"><i>No songs found!<br>Search for another song!</i></h3>';
	}
    }

?>

</body>

</html>
