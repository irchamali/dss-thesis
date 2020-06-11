<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to DSS Website</title>

    <link rel="icon" href="<?= base_url('assets/'); ?>img/FavSiela.png" type="image/x-icon">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
	<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url('assets/'); ?>css/style-h.css" rel="stylesheet">
</head>
<!-- Navigation-->
	<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">DSS Web</a><button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-black text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#page-top">Home</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">About DSS</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">User Guide</a></li>
                    </ul>
                </div>
        </div>
	</nav>
	
	<body id="page-top">
<!-- <nav class="navbar navbar-expand-lg navbar fixed-top navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand page-scroll" href="<?= base_url(); ?>">DSS WEB</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>

		</button>

		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		      <li class="nav-item active">
		        <a class="nav-link page-scroll" href="#home">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a href="#about" class="nav-link page-scroll" >About</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link page-scroll" href="#guide">Guide</a>
		      </li>
		    </ul>
		</div>
	</div>
</nav> -->

<!-- <nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<a href="" class="navbar-brand">Lahan Organik</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"></div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="">About</a></li>
				<li><a href="">Guide</a></li>
				<li><a href="">Guide2</a></li>
			</ul>
		</div>
	</div>
</nav> -->