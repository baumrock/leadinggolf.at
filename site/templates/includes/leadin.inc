<div class="section">
    <?php if ($page->headerimage): ?>
        <img class="header__img" src="<?= $page->headerimage->url ?>" alt="<?= $page->headerimage->description ?>" />
    <?php endif; ?>
    <div class="container u-pv+">
        <div class="layout layout--center">
            <div class="layout__item u-2/3-lap-and-up layout--center">
                <h3 class="u-mv0"><?= $page->headline.($page->subline ? ' <small>'.$page->subline.'</small>':'') ?></h3>
                <?= $page->lead ?>
            </div>
        </div>
    </div>
</div>
