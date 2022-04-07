<?php 
/* 
session_start();
require_once "pdo.php";
require_once "util.php";
require_once "links.php";

$emailcheck = "/\S+@\S+/";
$salt = 'XyZzy12*_';

if ( isset($_POST['email']) && isset($_POST['password']) ) {
    unset($_SESSION['username'], $_SESSION['p_id'], $_SESSION['user']);
     if ( strlen($_POST['email']) < 1 || strlen($_POST['password']) < 1 ) {
        $_SESSION["error"] = "email and password are required";
        header("Location: login.php");
        return;
    }
    
    elseif ( !preg_match ( $emailcheck, $_POST['email'] ) ) {
        $_SESSION["error"] = "Email must have an at-sign (@)";
        header("Location: login.php");
        return;
    }
    else {
		$check = hash('md5', $salt.$_POST['password']);
		

		$stmt = $pdo->prepare('SELECT a_id, username FROM admin
            WHERE email = :em AND password = :pw');
        $stmt->execute(array( ':em' => $_POST['email'], ':pw' => $check));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if ( $row !== false ) {
			$_SESSION['username'] = $row['username'];
			$_SESSION['p_id'] = $row['a_id'];

			$stmt = $pdo->prepare('SELECT a_id FROM admin
            WHERE a_id = :pid');
			$stmt->execute(array( ':pid' => $_SESSION['p_id']));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			if ( $row !== false ) {
				$_SESSION['user'] = 'admin';
				// Redirect the browser to my_wall.php
				header("Location: admin.php");
				return;
			}            
        }


        $stmt = $pdo->prepare('SELECT p_id, username FROM person
            WHERE email = :em AND password = :pw');
        $stmt->execute(array( ':em' => $_POST['email'], ':pw' => $check));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        if ( $row !== false ) {
			$_SESSION['username'] = $row['username'];
			$_SESSION['p_id'] = $row['p_id'];

			$stmt = $pdo->prepare('SELECT p_id FROM users
            WHERE p_id = :pid');
			$stmt->execute(array( ':pid' => $_SESSION['p_id']));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			if ( $row !== false ) {
				$_SESSION['user'] = 'user';
				// Redirect the browser to my_wall.php
				header("Location: my_wall.php");
				return;
			}
			else {
				$_SESSION['user'] = 'counselor';
				// Redirect the browser to counselor_home.php
				header("Location: counselor_home.php");
				return;
			}
            
        }
        else {
            $_SESSION["error"] = "Invalid Details";
            header("Location: login.php");
            return;
        }
    }
} */
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body class="login_page">
	<header>
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg fixed-top shadow rounded">
				<a class="navbar-brand" href="index.php">
					<img src="images/logo5.png" height="32px" class="d-inline-block align-top" alt="" loading="lazy">
						
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
					</svg>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="nav navbar-nav ml-auto">
						<li class="nav-item">
						<a class="nav-link" href="#courses">Services</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="#gallery">Gallery</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="#testimonials">Testimonials</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="#about">Abut</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="#contact">Contact</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="login.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
							<path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
						  </svg></a>
						</li>
					</ul>
				</div>					
			</nav>
		</div>
	</header>
    <br><br>

	<div class="container_login">
		<div class="leftside">
			<form method="POST">

		        <div class="loginbox">
		            <div class ="login_head">
		            	Hi Dimple!
		            </div>
		            


		            <div class="username login_content">
		            	<p class="login_details">
		            		<input id="email" type="email" placeholder="Enter Email" name="email" required class="input_details">
		            		<img src="images/user.svg" class="userimage detail_img">
		            	</p>
		            	
		            	
		            </div>
		            
		            
		            <div class="psw login_content">
		            	<p class="login_details">
		            		<input id="password" type="password" placeholder="Password" name="password" required class="input_details">
		            		<img src="images/lock.svg" class="pswimage detail_img" >        
		            	</p>
		            	
		            </div>
		            <br><br>
		           <br><br>
		           <div class="submit">
		           		<input type="submit" class="button post-button" value="Log In">
		           </div>
		          
		          </div>
		          
		    </form>
		</div>
    <div class="rightside">
        <div class="login_img"><img src="images/flower.png" ></div>
    </div>
		
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


</body>
</html>