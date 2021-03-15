<?php namespace ProcessWire;
/**
 * add ttime link field
 */
$upgrade = function(RockMigrations $rm) {
  $f = $rm->createField('ttime', 'URL', [
    'label' => 'Link zur T-Time Buchung',
    'collapsed' => Inputfield::collapsedBlank,
  ]);
  $rm->addFieldToTemplate($f, 'club', null, 'webcams');
};

$downgrade = function(RockMigrations $rm) {
  $rm->deleteField('ttime');
};
