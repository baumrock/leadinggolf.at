<?php include 'includes/header.inc'; ?>

	<div class="section">
		<img class="header__img" src="<?= $page->headerimage->size(2550,698)->url ?>" alt="" />
		<div class="container u-pt+ u-pb">
			<div class="layout layout--center">
				<div class="layout__item u-2/3-lap-and-up layout--center">
                    <h3><?= $page->title ?><?php echo ($page->subline ? " <small>{$page->subline}</small>":'')  ?></h3>

                    <ul class="list-inline list-inline--delimited">
                        <li class="u-mr-">
                            <ul class="list-inline">
                                <?php foreach ($page->tags as $tag): ?>
                                    <li class="u-mh--"><a href="<?php echo $page->parent->url.$tag->name ?>"><?php echo $tag->title ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li><?php echo convertToLocalDate($page->publication_date); ?></li>
                    </ul>
				</div>
			</div>
		</div>
        <div class="container">
			<div class="layout">
				<div class="layout__item">
					<?= $page->body ?>
				</div>
			</div>
		</div>
	</div>

    <?php if ($page->images->count > 0): ?>
        <div class="section--grey u-mt+">
            <div class="container u-pt+ u-pb">
                <div class="layout gallery">
                    <?php foreach ($page->images as $img):
                        ?><div class="layout__item layout--center u-1/3-lap-and-up u-1/2-palm gallery__item u-pb">
                            <a href="<?php echo $img->url ?>" title="<?php echo $img->description ?>"><img src="<?php echo $img->size(300,250)->url ?>" alt="<?php echo $img->description ?>" /></a>
                        </div><?php
                    endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="section u-mv">
        <div class="container layout--center">
            <div class="box">
            <a href="<?php echo $page->parent()->url ?>"><?php echo __('Zurück zur Übersicht') ?></a>
            </div>
        </div>
    </div>

<?php include 'includes/footer.inc'; ?>
