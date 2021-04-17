<?php namespace ProcessWire;
chdir(__DIR__);
chdir("../../"); // pw root folder
include("index.php");
ini_set('max_execution_time', 60*10);
/** @var Wire $wire */

$mailfrom = 'backup@baumrock.com';
$mailto = 'office@baumrock.com';

// daily backup at 03:21
if(date("Hi") == "0321") {
  /** @var RockBackup $backup */
  $backup = $modules->get('RockBackup');
  $backup
    ->mail($mailfrom, $mailto, 'backup started')
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
    ->zip(['password' => 'golf4ever!'])
    ->saveToCloud('https://cloud.baumrock.com/index.php/s/zcPDiEYnFdZsPoS')
    ->unlink()
    ->mail($mailfrom, $mailto, 'backup finished');
}
