<?php
if(!defined("PROCESSWIRE")) die();

$config->debug = false;
$config->chmodDir = '0755';
$config->chmodFile = '0644';
$config->timezone = 'Europe/Vienna';
$config->httpHosts = array('www.leadinggolf.at');
$config->installed = 1613307369;

$config->googleTagManagerID = 'GTM-NZZSV9T';
setlocale(LC_ALL,'de_AT.UTF-8', 'en_GB.UTF-8');

// try to load live config
$configs = [
  "/home/users/leadinggolf/files/config-golf.php",
  __DIR__."/config-local.php",
];
foreach($configs as $c) {
  if(!is_file($c)) continue;
  return include($c);
}
die("no config found");
