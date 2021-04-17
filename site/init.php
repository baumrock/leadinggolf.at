<?php namespace ProcessWire;
$wire->addHook('LazyCron::everyDay', function($event) {
  $event->log("Create Backup");
  $zip = $event->modules->get("RockBackup")
    ->find('*')
    ->from($event->config->paths->templates)
    ->exclude("/.git/")
    ->exclude("/rock/")
    ->exclude("/vendor/")
    ->exclude("/site/assets/backups/*/")
    ->exclude("/site/assets/cache/")
    ->exclude("/site/assets/sessions/")
    ->exclude("/site/assets/logs/")
    ->exclude("/site/modules/.*")
    ->zip();

  // https://cloud.baumrock.com/index.php/s/zcPDiEYnFdZsPoS
  $filename = date("Y-m-d").".zip";
  $user = "zcPDiEYnFdZsPoS"; // last part of url
  $fp = fopen($zip, "r");
  $c = curl_init();
  curl_setopt($c, CURLOPT_URL, "https://cloud.baumrock.com/public.php/webdav/$filename");
  curl_setopt($c, CURLOPT_USERPWD, "$user:"); // user:pwd with empty password
  curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($c, CURLOPT_PUT, true);
  curl_setopt($c, CURLOPT_INFILESIZE, filesize($zip));
  curl_setopt($c, CURLOPT_INFILE, $fp);

  $headers = array();
  $headers[] = 'X-Requested-With: XMLHttpRequest';
  curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
  curl_exec($c);
});
