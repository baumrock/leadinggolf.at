<?php namespace ProcessWire;
/**
 * move ttime field
 */
$upgrade = function(RockMigrations $rm) {
  $rm->moveFieldAfter('ttime', 'lead', 'club');
};

$downgrade = function(RockMigrations $rm) {
  $rm->moveFieldBefore('ttime', 'webcams', 'club');
};
