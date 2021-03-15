<?php namespace ProcessWire;
// are we on the german page? yes/no
$de = $user->language->name == 'default';

// clubs select
$clubs = $de
  ? 'In welchem Club sind Sie Mitglied?'
  : 'In what club are you a member?';
$clubs = "<option value='' selected='' disabled=''>$clubs</option>";
foreach($pages->find("template=club") as $club) {
  $clubs .= "<option value='{$club->title}'>{$club->title}</option>";
}

// prevent double form submission
if($session->done OR $input->post->comment) {
  $session->done = false;
  $session->redirect('/golfcard');
}

// handle form submit
if($input->post->submitted) {
  unset($input->post->submitted);

  // prepare mail body
  $msg = "<small>Ungeprüfte Daten!</small><ul>";
  foreach($input->post as $k=>$v) $msg .= "<li>$k: $v</li>";
  $msg .= "</ul>";

  // send mail
  $mail = new WireMail();
  $mail->from($page->email, 'The Leading Golf Courses');
  $mail->to = [$page->email, 'office@baumrock.com'];
  $mail->subject = 'Golfcard Bestellung auf leadinggolf.at';
  $mail->bodyHTML = $msg;
  $mail->send();
  
  // send confirmation mail
  $mail = new WireMail();
  $mail->from($page->email, 'The Leading Golf Courses');
  $mail->to = $input->post->email;
  $mail->subject = 'The Leading Golf Courses - Golfcard';
  $mail->bodyHTML = $page->body_2;
  $mail->send();

  $session->done = true;

  echo "<div class='layout--center'>{$page->body_2}</div>";
  return;
}
?>
<style>
  input[name=comment] {display: none;}
</style>
<form class="form-styled" method="POST" action="/golfcard/#cardform" id="golfcard">
  <div class="layout layout--center">
    <div class="layout__item u-1/2-lap-and-up layout--center u-mb+">
      <h3 class="u-mt0"><?= $de ? 'Bestellung' : 'order' ?></h3>
      <?= $page->body ?>
    </div>
    <div class="layout__item u-1/2-lap-and-up">
      <input type="text" name="firstname" required="required" value="" placeholder="<?= $de ? 'Vorname' : 'Forename' ?>*">
    </div>
    <div class="layout__item u-1/2-lap-and-up">
      <input type="text" name="lastname" required="required" value="" placeholder="<?= $de ? 'Nachname' : 'Surname' ?>*">
    </div>
    <div class="layout__item u-2/3-lap-and-up">
      <input type="text" name="address" required="required" value="" placeholder="<?= $de ? 'Adresse' : 'Address' ?>*">
    </div>
  </div>
  <div class="layout layout--center">
    <div class="layout__item u-1/4-lap-and-up">
      <input type="text" name="zip" required="required" value="" placeholder="<?= $de ? 'PLZ' : 'ZIP' ?>*">
    </div>
    <div class="layout__item u-1/3-lap-and-up">
      <input type="text" name="city" required="required" value="" placeholder="<?= $de ? 'Ort' : 'City' ?>*">
    </div>
    <div class="layout__item u-2/3-lap-and-up">
      <input type="text" name="email" required="required" value="" placeholder="E-Mail*">
    </div>
  </div>
  <div class="layout layout--center">
    <div class="layout__item u-1/4-lap-and-up">
      <input type="text" name="phone" required="required" value="" placeholder="<?= $de ? 'Telefonnummer' : 'Phone' ?>*">
    </div>
    <div class="layout__item u-1/3-lap-and-up">
      <input type="text" name="oegv" required="required" value="" placeholder="ÖGV <?= $de ? 'Mitgliedsnummer' : 'Membership Number' ?>*">
    </div>
    <input type="text" name="comment" value="" placeholder="<?= $de ? 'leer lassen' : 'leave empty' ?>">
  </div>
  <div class="layout layout--center">
    <div class="layout__item u-1/2-lap-and-up">
      <select name="club">
        <?= $clubs ?>
      </select>
    </div>
  </div>
  <div class="layout layout--center">
    <button type="submit" name="submitted" value="1" class="btn btn--submit"><?= $de ? 'Absenden' : 'Submit' ?></button>
  </div>
  <div class="layout">
    <div class="layout__item layout--center u-mt">
      <p><small>
        </small>
      </p>
    </div>
  </div>
</form>
