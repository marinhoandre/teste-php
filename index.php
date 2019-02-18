<?php

require './config/Config.php';
require './conn/Connection.php';
require './vendor/autoload.php';

use Core\Controller as Home;

$url = new Home();
$url->carregar();
