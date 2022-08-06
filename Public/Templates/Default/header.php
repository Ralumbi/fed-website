<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="FED - Website">
	<meta name="author"      content="Caleb Sebus">
	
	<title><?= PROJECT_NAME ?></title>

	<link rel="shortcut icon" href="<?= ASSETS ?>/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="<?= ASSETS ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= ASSETS ?>/css/font-awesome.min.css">


	<link rel="stylesheet" href="<?= ASSETS ?>/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="<?= ASSETS ?>/css/main.css">

</head>

<body class="home">
    	

<div class="navbar navbar-inverse navbar-fixed-top headroom">
  <div class="container">
    <div class="navbar-header" style="height: 65px; margin-top: -10px;">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
      <a class="navbar-brand" href="/"><img src="<?= ASSETS ?>/images/FedLogo.png" style="height: 65px; margin-top: -10px;" alt=""> The Federation</a></div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav pull-right">
        <li class="active"><a href="/">Home</a></li>
        <li><a href="/about">About</a></li>
        <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Games <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="albion">Albion Online</a></li>
            <li><a href="newworld">New World</a></li>
			<li><a href="other">Other</a></li>
          </ul>
        </li>
        <li><a href="/contact">Contact</a></li>
		<li><a class="btn" href="/login">SIGN IN</a></li>
        <li><a class="btn" href="/register">SIGN UP</a></li>
      </ul>
    </div>
  </div>
</div>