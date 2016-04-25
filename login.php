<?php
session_start();
	/*if ((!isset($_POST['login'])) && (!isset($_POST['haslo'])))
	{
		header('Location: index.php?page=admin');
		exit();
	}*/
	REQUIRE 'core/main-core.php';

	//$polaczenie = @new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	try{
	$polaczenie = new mysqli('localhost', 'root', '', 'SmallContent');

	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];

		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");

		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM uzytkownicy WHERE user='%s' AND pass='%s'",
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$haslo))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;

				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['id'] = $wiersz['id'];
				$_SESSION['user'] = $wiersz['user'];
				$_SESSION['email'] = $wiersz['email'];
				$_SESSION['uprawnienia'] = $wiersz['uprawnienia'];




				$token = get_browser();
				$token2 = getdate;
				$tokeny = time();

				unset($_SESSION['blad']);
				$rezultat->free_result();
				if($_SESSION['uprawnienia']=='administrator') header('Location: ./index.php?page=administracja&login=success');//?token='.$tokeny.'?user_name='.$_SESSION['user'].'&dnipremium='.$_SESSION['dnipremium']);
				if($_SESSION['uprawnienia']=='moderator') header('Location: ./index.php?page=moderate&login=success');
			} else {

				$_SESSION['blad'] = '<span style="color:red; font-size: 20px; text-align: center;">Nieprawid�owy login lub has�o!</span>';
				header('Location: ./index.php?page=admin');

			}
		}
	}
	}catch(Exception $e)
	{
		echo 'Nie moge nawiazac polaczenia z baza danych!';
		echo $e;
		exit();
	}

		$polaczenie->close();

?>
