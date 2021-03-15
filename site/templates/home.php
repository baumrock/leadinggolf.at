<?php include 'includes/header.inc'; ?>

	<div class="section--grey">
		<div class="jumbo" style="background-image:url(<?php echo $page->headerimage->url; ?>)">
			<div class="jumbo__body">
					<h2><?php echo $page->jumbo_headline ?></h2>
					<a class="link a--arrow" href="<?php echo $page->jumbo_link->url ?>"><?php echo ($user->language->name == 'default' ? 'Mehr erfahren' : 'Read more') ?></a>
			</div>
		</div>

		<div class="container">
			<div class="layout layout--center">
				<div class="layout__item u-2/3-lap-and-up layout--center">
					<h3><?php echo $page->headline ?> <small><?php echo $page->subline ?></small></h3>
					<?php echo $page->lead ?>
				</div>
			</div>
			<?php include 'includes/map.inc'; ?>
		</div>

	</div><!-- .section--grey -->

	<?php include 'includes/repeater_row.inc'; ?>

	<div class="section--grey">
        <div class="container">
            <div class="layout">
            <?php foreach ($page->find('parent=blog,template=blog-entry,publication_date<=today,sort=-publication_date,limit=2') as $entry): 
                ?><div class="layout__item u-1/2-lap-and-up">
                    <div class="block u-mv+">
                        <?php if ($entry->headerimage): ?>
                            <a class='block__img' style="display:block"  href="<?php echo $entry->url; ?>">
                                <img src='<?php echo $entry->headerimage->size(576,300)->url ?>' alt='<?php echo $entry->headerimage->description ?>' />
                            </a>
                        <?php endif; ?>
                        <div class="block__body">
                            <h4>
                                <a href="<?php echo $entry->url ?>">
                                    <?php echo $entry->title; ?>
                                </a>
                            </h4>
                            <div>
                                <?php echo convertToLocalDate($entry->publication_date); ?>
                            </div>
                            <?php echo $entry->lead; ?>
                            <a class="a--arrow" href="<?php echo $pages->get(1126)->url ?>"><?php echo __('Zum Blog') ?></a>
                        </div>
                    </div>
                </div><?php endforeach; ?>
            </div>
        </div>
	</div><!-- .section--grey -->

	<?php include 'includes/membercard.inc'; ?>

	<?php include 'includes/quotes.inc'; ?>

    <?php include 'includes/club-carousel.inc'; ?>

<?php include 'includes/footer.inc'; ?>
