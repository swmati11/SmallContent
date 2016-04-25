<?php
session_start();
REQUIRE './core/main-core.php';
//if((isset($_POST['POST_TEXT'])) && (isset($_POST['POST_TITLE'])))
//{
	/*$text = $_POST['POST_TEXT'];
	$title = $_POST['POST_TITLE'];
	$date = date("Y-m-d H:i:s");
	$connect = @new mysqli('localhost', 'root', '', 'SmallContent');
	$zapytanie = 'INSERT INTO article VALUES(NULL, "'.$_SESSION["user"].'", "'.$title.'", "'.$date.'")';
	$connect->query($zapytanie);
	$coj = $connect->query($zapytanie);
	echo $coj;
	$success['wyslano'] = 'Artyku³ zosta³ dodany!';
	echo $success['wyslano'];
//}*/
        $title=$_POST['POST_TITLE'];
        $text=$_POST['POST_TEXT'];
        $date=date('d.m.Y, H:i');
		$user = $_SESSION['user'];
$connect = @new mysqli('localhost', 'root', '', 'SmallContent');
        //echo '<b>NEWSY W TWOIM SERWISIE:</b><br>';
        $link=$connect->query('INSERT INTO article VALUES(NULL, "'.$user.'", "'.$title.'", "'.$text.'", "'.$date.'")');
		header('Location: ./index.php?page=administracja');
        //while($wiersz=mysqli_fetch_array($link))
        //{
       // echo '<b>'.$wiersz['title'].'</b>';
        //echo ' - ';
        //echo $wiersz['date'];
        //echo ' - ';
		//echo $wiersz['text'];

        //echo "<br>\n";
        //}

		?>