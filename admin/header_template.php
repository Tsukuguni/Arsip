<?php 
	session_start();
	if(!isset($_SESSION['uid'])){
		header('location:../login.php');
	}

	include '../database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forum Admin</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="icon" href="../assets/img/logo1.png">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600&display=swap');
		* {
			padding: 0;
			margin: 0;
		}
		body {
			font-family: 'Oswald', sans-serif;
			background-image: url(../assets/img/ft9.jpeg);
			background-size:cover;
		}
		a {
			color: inherit;
			text-decoration: none;
		}

		/* navbar */
		.navbar {
			padding: 0.5rem 1rem;
			background-color: #0079FF;
			color: #000;
			position: fixed;
			width: 100%;
			height: 45px;
			top: 0;
			left: 0;
			z-index: 99;
			display: flex;
		}

		.navbar h1 {
			margin-left: 75em;
			font-size: 20px;
			line-height: 20px;
		}

		/* btnhome */
		.btnuser {
			width: 43px;
			height: 42px;
			margin-left: 1em;
			margin-top: 2px;
			background: #fff;
			border-radius: 20px;
			border: none;
			position: absolute;
			box-shadow: 0px 2px 5px #000;
			transition: all 0.3s ease;
		}

		.btnuser:active {
			transform: scale(0.95);
		}

		.home {
			width: 10px;
			height: 35px;
			margin-left: -19px;
			margin-top: -18px;
		}

		.btnuser:hover {
			background-color: #ddd;
			transition: all 0.3s;
		}

		/* content */
		.content {
			padding: 60px 0;
		}

		.container {
			width: 100%;
			margin-left: auto;
			margin-right: auto;
			margin-top: 8px;
		}

		.page-title {
			width: 30rem;
			margin-top: 25px;
			margin-bottom: 20px;
			margin-left: auto;
			margin-right: auto;
			padding-left: 5px;
			text-align: center;
			font-size: 1.8rem;
			padding: 5px 0;
			border-radius: 5px;
			color: #fff;
			text-shadow: 1px 3px 1px rgba(0,0,0, 0.5);
		}

		.card {
			border: 1px solid #ccc;
			background-color: rgba(255,255,255, 0.8);
			padding: 15px;
		}

		.card p {
			font-size: 19px;
		}

		.card h3 {
			width: 18.7em;
		}

		.table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 8px;
		}

		.table thead th,
		.table tbody td {
			border: 1px solid;
			padding: 3px;
		}

		.btn {
			border: 1px solid;
			padding: 3px 8px;
			display: inline-block;
			background-color: #0079FF;
			color: #ddd;
			border-radius: 3px;
			transition: all 0.2s ease;
		}

		.btn:active {
			transform: scale(0.95);
		}

		.input-group {
			margin-bottom: 8px;
		}

		.input-group label {
			display: block;
			margin-bottom: 5px;
			font-size: 1.2rem;
		}

		.input-control {
			width: 100%;
			box-sizing: border-box;
			padding: 0.5rem;
			font-size: 1rem;
			background-color: rgba(255, 255, 255, 0.5);
			border: 1px solid #000;
			border-radius: 3px;

		}

		.btn-submit {
			border: 1px solid #111;
			padding: 8px 20px;
			display: inline-block;
			background-color: #0079ff;
			color: #ddd;
			border-radius: 3px;
			font-size: 1rem;
			cursor: pointer;
			margin-top: 5px;
			transition: all 0.2s ease;
		}

		.btn-submit:active {
			transform: scale(0.95);
		}

		.btn-back {
			border: 1px solid #fff;
			padding: 8px 20px;
			display: inline-block;
			border-radius: 3px;
			font-size: 1rem;
			cursor: pointer;
			margin-top: 5px;
			transition: all 0.2s ease;
		}

		.btn-back:active {
			transform: scale(0.95);
		}

		.navbar img{
			width: 38px;
			position: fixed;
		}

		.navbar h2 {	
			margin-top: 4px;
			font-size: 23.4px;
			position: static;
			margin-left: 60em;
			text-align: center;
		}

		.menu {
			margin-top: 3px;
		}
		
		.logo {
			margin-left: 84.5em;
		}

	</style>
</head>
<body>

	<!-- navbar -->
	<div class="navbar">
		<button type="button" onclick="window.location.href= ' ../index.php'" class="btnuser" title="Home">
			<img src="../assets/img/home.png" class="home">
		</button>
		<img src="../assets/img/logo1.png" class="logo"></img>
		<h2>DPPAD PROVINSI PAPUA<br></h2>
	</div>