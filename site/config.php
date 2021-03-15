<?php
if(!defined("PROCESSWIRE")) die();

$config->debug = false;
$config->chmodDir = '0755';
$config->chmodFile = '0644';
$config->timezone = 'Europe/Vienna';
$config->httpHosts = array('www.leadinggolf.at');

$config->googleTagManagerID = 'GTM-NZZSV9T';
setlocale(LC_ALL,'de_AT.UTF-8', 'en_GB.UTF-8');

// include config file from outside of the repo
include('../config.php');
