<?php include 'includes/header.inc'; ?>
	<?php include 'includes/leadin.inc'; ?>
    <?php include 'includes/repeater_grid.inc'; ?>

    <div class="container u-pb">
		<div class="layout">
			<div class="layout__item u-2/5-lap-and-up layout--right">
				<?php echo $page->body; ?>
			</div><!--
			--><div class="layout__item u-3/5-lap-and-up u-pt">
			 	<?php echo $page->body_2; ?>
			</div>
		</div>
	</div>

	<div class="section--grey">
		<div class="container u-pv">
			<div class="layout">
				<div class="layout__item layout--center">
					<?php echo $page->body_3; ?>
				</div>
			</div>
		</div>
	</div>

    <?php include 'includes/repeater_row.inc'; ?>
<?php include 'includes/footer.inc'; ?>
