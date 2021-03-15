<?php include 'includes/header.inc'; ?>

	<div class="section--grey">
		<div class="container u-pv+">
			<div class="layout layout--center">
				<div class="layout__item u-2/3-lap-and-up layout--center">
					<h3><?= $page->title ?> <small>The Leading Golf Courses</small></h3>
					<?= $page->lead ?>
				</div>
			</div>
		</div>
		<?php include 'includes/map.inc'; ?>
	</div>

	<div class="section">
		<div class="container u-pv+">
			<div class="layout layout--center">
				<?php foreach ($page->children('sort=sort') as $club):
					?><div class="layout__item u-1/3-lap-and-up layout--center u-pb">
						<?php echo ($club->image ? '<a href="'.$club->url.'"><img src="'.$club->image->size(300,255)->url.'" alt="'.$club->title.'" /></a>' : ''); ?>
						<h6 class="u-mt- u-mb-"><?= $club->title ?></h6>
						<a href="<?php echo $club->url ?>" class="a--arrow"><?php echo ($user->language->name == 'default' ? 'Mehr erfahren' : 'Read more') ?></a>
					</div><?php
				endforeach; ?>
			</div>
		</div>
	</div>

<?php include 'includes/footer.inc'; ?>
