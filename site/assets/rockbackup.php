<?php namespace ProcessWire;
chdir(__DIR__);
chdir("../../"); // pw root folder
include("index.php");
ini_set('max_execution_time', 60*10);
/** @var Wire $wire */

$mail = new WireMail();
$mail->to('office@baumrock.com');
$mail->from('office@baumrock.com');
$mail->subject('Backup www.leadinggolf.at');
$mail->bodyHTML('backup started...');
$mail->send();

echo "Create Backup...\n";
$zip = $wire->modules->get("RockBackup")
  ->find('*')
  ->from($wire->config->paths->templates)
  ->exclude("/.git/")
  ->exclude("/rock/")
  ->exclude("/vendor/")
  ->exclude("/site/assets/backups/*/")
  ->exclude("/site/assets/cache/")
  ->exclude("/site/assets/sessions/")
  ->exclude("/site/assets/logs/")
  ->exclude("/site/modules/.*")
  ->zip([
    'password' => 'golf4ever!',
  ]);

echo "Done\n";

// TODO backup database

echo "Sending file to cloud...\n";
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
echo "Done!\n";

echo "Deleting backup...\n";
unlink($zip);
echo "Done!\n";

$mail->bodyHTML('backup done');
$mail->send();
