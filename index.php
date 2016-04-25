<?php
session_start();

DEFINE('PHP_MINIMAL_VERSION', 5.5);
DEFINE('PAGE_URL', 'http://localhost/SmallContent');

IF(PHP_MINIMAL_VERSION > PHP_VERSION)
{
	echo 'Minimalna wersja PHP tego skryptu, nie jest zgodna z t� zainstalowan� na serwerze!';
	exit();
}

REQUIRE 'core/main-core.php';

switch(@$_GET['page'])
{
	case 'admin': //ADMINISTRATION
		REQUIRE 'includes/login-admin.php';
		echo '<script src="js/jquery.js"></script>';
	break;
	case 'administracja':
		REQUIRE 'includes/admin/dashboard.php';
		echo '<script src="js/jquery.js"></script>';
	break;
	case 'new-mail':
		REQUIRE 'includes/new_mail.php';
	break;
	case 'read-mail':
		REQUIRE 'includes/read_message.php';
	break;
	case 'logout':
		session_destroy();
		header('Location: ./index.php');
	break;
	case 'article':
		REQUIRE './includes/article.php';
	break;
	case 'a-profil':
		REQUIRE 'includes/admin/profile.php';
	break;
	case 'new_art':
		REQUIRE 'includes/admin/new_post.php';
	break;
	case 'edit-profile':
		REQUIRE 'includes/admin/edit-profile.php';
	break;
	case 'edit-article':
		REQUIRE './includes/moderate/edit_article.php';
	break;
	case 'moderate':  //MODERATION
		REQUIRE './includes/moderate/dashboard.php';
	break;
	default:
		REQUIRE 'includes/default.php';
		echo '<script src="js/jquery.js"></script>';
	break;
}
?>
