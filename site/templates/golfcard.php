<?php
include 'includes/header.inc';
include 'includes/leadin.inc';
?>

    <div class="container">
		<div class="layout layout--center">
			<div class="layout__item u-1/2-lap-and-up layout--right u-hide-on-palm">
                <?php echo ($page->image ? "<img class='block__img u-mb0' src='{$page->image->width(470)->url}' alt='{$page->image->description}' />" : '') ?>
			</div><!--
            --><div class="layout__item u-1/2-lap-and-up">
                <?php echo ($page->image_2 ? "<img class='block__img u-mb0' src='{$page->image_2->width(470)->url}' alt='{$page->image_2->description}' />" : '') ?>
			</div>

            <div class="layout__item layout--center">
				<div class="box box--large" id="cardform">
					<?= $files->render('markup/form.php') ?>
				</div>
			</div>
		</div>
	</div>

    <?php include 'includes/club-carousel.inc'; ?>

<?php include 'includes/footer.inc'; ?>
