<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teste PHP</title>

    <link href="<?php echo URL; ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL; ?>assets/css/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL; ?>assets/css/custom.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="<?php echo URL; ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>assets/js/bootstrap.min.js"></script>

</head>

<body>
<div class="navbar">
    <div class="navbar-header">
        <a class="logo" href="<?php echo URL; ?>"><img src="<?php echo URL; ?>assets/images/logotipo.svg"></a>
    </div>
</div>

<div class="navbar-default" id="navbar-second">
    <ul class="nav navbar-nav no-border visible-xs-block">
        <li>
            <a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle">
                <i class="icon-menu7"></i>
            </a>
        </li>
    </ul>

    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li><a href="<?php echo URL; ?>"><i class="position-left"></i> Dashboard</a></li>
            <li><a href="<?php echo URL; ?>product"><i class="position-left"></i> Produtos</a></li>
        </ul>

    </div>
</div>