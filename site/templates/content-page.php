<?php include 'includes/header.inc'; ?>

	<?php include 'includes/leadin.inc'; ?>
    <?php include 'includes/repeater_grid.inc'; ?>

	<?php if ($page->body != ''): ?>
	    <div class="container">
			<div class="layout">
				<div class="layout__item layout--center u-1/3-lap-and-up">
					<div class="box box--large">
						<?php echo $page->body; ?>
					</div>
				</div><!--
				 --><div class="layout__item layout--center u-2/3-lap-and-up">

				 	<?php echo ($page->image ? "<img class='block__img' src='{$page->image->width(470)->url}' alt='{$page->image->description}' />" : '') ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

    <?php include 'includes/repeater_row.inc'; ?>

	<?php if ($page->name == 'testverfahren') {
		include 'includes/club-carousel.inc';
	} ?>

<?php include 'includes/footer.inc'; ?>
