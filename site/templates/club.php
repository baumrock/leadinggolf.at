<?php include 'includes/header.inc'; ?>

	<div class="section">
		<img class="header__img" src="<?= $page->headerimage->url ?>" alt="" />
		<div class="container u-pv+">
			<div class="layout layout--center">
				<div class="layout__item u-2/3-lap-and-up layout--center">
					<h3><?= $page->title ?> <small>The Leading Golf Courses</small></h3>
					<?= $page->lead ?>
					<?php
					if($page->ttime) {
						echo '<br><h3>' . __('Tee-Time Buchung') . '</h3>';
						echo '<div><a href="'.$page->ttime.'" class="a--arrow btn btn--primary" target="_blank">';
						echo __('Tee-Time Buchung in einer neuen Seite öffnen');
						echo '</a></div>';
					}
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="section--grey">
		<div class="container u-pv+">
			<div class="layout gallery">
				<div class="layout__item layout--center">
					<h3>Webcams</h3>
				</div>
				<div class="layout--center">
				<?php
				if(!$page->webcams->count) echo __('Leider sind für diesen Club keine Webcams verfügbar');
				foreach($page->webcams as $i=>$webcam) {
					echo "<div style='font-size: 2rem;'><a href='{$webcam->link}' target='_blank' style='text-decoration: none;'><i class='fas fa-camera'></i> ";
					echo $webcam->desc ?: "Webcam " . ($i+1);
					echo "</a></div>";
				}
				?>
				</div>
			</div>
		</div>
	</div>

	<div class="section">
		<div class="container u-pv+">
			<div class="layout gallery">
				<div class="layout__item layout--center">
					<h3><?= __('Wetter') ?></h3>
				</div>
				<div class="layout--center">
				<?php
				$weather = str_replace(['http://', 'https://'], '//', rtrim($page->weather, '/'));
				if($weather):
					?>
					<iframe width="300" height="270" src="<?= $weather ?>/widget/w300/color-weiss" frameborder="0" scrolling="no"></iframe><br>
					<a href="<?= $weather ?>" style="text-decoration:none;" target="_blank">Das aktuelle Wetter für <?= $page->title ?></a>
					<?php
				else:
					echo __('Leider ist für diesen Club kein Wetter verfügbar');
				endif;
				?>
				</div>
			</div>
		</div>
	</div>

	<div class="section--grey">
		<div class="container u-pv+">
			<div class="layout layout--center">
				<div class="layout__item u-2/3-lap-and-up layout--center">
					<div class="layout">
						<div class="layout__item u-1/3-lap-and-up layout--right">
							<h5 class="u-mv0">Course Facts</h5>
							<?php echo $page->body; ?>
						</div><div class="layout__item u-2/3-lap-and-up layout--left u-removefirstmargin" style="padding-top:33px;">
							<?php echo $page->body_2; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="section">
		<div class="container u-pv+">
			<div class="layout gallery">
				<div class="layout__item layout--center">
					<h3>Gallery</h3>
				</div>
				<?php foreach ($page->images as $img):
					?><div class="layout__item layout--center u-1/3-lap-and-up u-1/2-palm gallery__item u-pb">
						<a href="<?php echo $img->url ?>" title="<?php echo $img->description ?>"><img src="<?php echo $img->size(300,250)->url ?>" alt="<?php echo $img->description ?>" /></a>
					</div><?php
				endforeach; ?>
			</div>
		</div>
	</div>

	<div id="map" style="width: 100%; height: 440px;" class="u-mb+"></div>

	<?php include 'includes/club-carousel.inc'; ?>



<?php include 'includes/footer.inc'; ?>
