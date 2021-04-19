<?php namespace ProcessWire;
// php site/assets/rockbackup.php

$time = "0325";
$daily = date("Hi") == $time; // every day at time
$weekly = date("wHi") == "1$time"; // every monday at time
$yearly = date("md-Hi") == "0420-$time"; // every april-20 at time
if(!$daily AND !$weekly AND !$yearly) return;

// boot processwire
chdir(__DIR__);
chdir("../../"); // pw root folder
include("index.php");
ini_set('max_execution_time', 60*10);
/** @var Wire $wire */

$mailfrom = ['backup@baumrock.com', 'baumrock.com Backup Robot'];
$mailto = 'office@baumrock.com';
$cloud = 'https://nx17448.your-storageshare.de/s/tScxGq2EqAE7xDB';

/** @var RockBackup $backup */
$backup = $modules->get('RockBackup');
$backup->mail($mailfrom, $mailto, 'backup started');

if($daily) {
  /** @var RockBackup $backup */
  $backup = $modules->get('RockBackup');
  $backup
    ->find('*')
    ->from($wire->config->paths->site)
    ->exclude("/assets/files/")
    ->exclude("/assets/backups/*/")
    ->exclude("/assets/cache/")
    ->exclude("/assets/sessions/")
    ->exclude("/assets/logs/")
    ->exclude("/modules/.*")
    ->addDB(true)
    ->zip([
      'password' => 'Golf4Ever!',
      'filename' => 'site-daily-#',
      'max' => 7,
    ])
    ->saveToNextCloud($cloud)
    ->unlink()
    ->mail($mailfrom, $mailto, 'daily backup finished')
    ;
}
if($weekly) {
  /** @var RockBackup $backup */
  $backup = $modules->get('RockBackup');
  $backup
    ->find('*')
    ->from($wire->config->paths->root)
    ->exclude("/.git/")
    ->exclude("/rock/")
    ->exclude("/vendor/")
    ->exclude("/site/assets/backups/*/")
    ->exclude("/site/assets/cache/")
    ->exclude("/site/assets/sessions/")
    ->exclude("/site/assets/logs/")
    ->exclude("/site/modules/.*")
    ->addDB(true)
    ->zip([
      'password' => 'Golf4Ever!',
      'filename' => 'full-weekly-#',
      'max' => 4,
    ])
    ->saveToNextCloud($cloud)
    ->unlink()
    ->mail($mailfrom, $mailto, 'weekly backup finished')
    ;
}
if($yearly) {
  /** @var RockBackup $backup */
  $backup = $modules->get('RockBackup');
  $backup
    ->find('*')
    ->from($wire->config->paths->root)
    ->exclude("/.git/")
    ->exclude("/rock/")
    ->exclude("/vendor/")
    ->exclude("/site/assets/backups/*/")
    ->exclude("/site/assets/cache/")
    ->exclude("/site/assets/sessions/")
    ->exclude("/site/assets/logs/")
    ->exclude("/site/modules/.*")
    ->addDB(true)
    ->zip([
      'password' => 'Golf4Ever!',
      'filename' => 'full-yearly-'.date("Y-m-d"),
    ])
    ->saveToNextCloud($cloud)
    ->unlink()
    ->mail($mailfrom, $mailto, 'yearly backup finished')
    ;
}
