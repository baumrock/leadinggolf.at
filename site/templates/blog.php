<?php 
    include 'includes/header.inc';

    $tags = $pages->find('parent=/blog/tags,template=tag');
    $selectedTag = $sanitizer->entities($input->urlSegment1);
    $selector = ($selectedTag ? 'tags='.$selectedTag.',' : '');
    $news = $page->children($selector.'publication_date<=today,sort=-publication_date,limit=5');
?>

    <div class="section">
        <?php if ($page->headerimage): ?>
            <img class="header__img" src="<?= $page->headerimage->url ?>" alt="<?= $page->headerimage->description ?>" />
        <?php endif; ?>
        <div class="container u-pv+">
            <div class="layout layout--center">
                <div class="layout__item u-2/3-lap-and-up layout--center">
                    <h3 class="u-mt0"><?= $page->headline.($page->subline ? ' <small>'.$page->subline.'</small>':'') ?></h3>
                    <?= $page->lead ?>

                    <ul class="list-inline list-inline--delimited category-list">
                        <li>
                            <ul class="list-inline">
                                <?php foreach ($tags as $tag): ?>
                                    <li class="u-mh--<?php echo ($selectedTag == $tag->name ? ' active' : '') ?>"><a href="<?php echo $page->url.$tag->name ?>"><?php echo $tag->title ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li<?php echo ($selectedTag == '' ? '  class="active"' : '') ?>><a href="<?php echo $page->url ?>"><?php echo __('Alle Kategorien') ?></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container u-mb+">
        <?php foreach ($news as $entry): ?>
            <div class="box--small">
                <div class="layout">
                    <div class="layout__item<?php echo ($entry->headerimage ?' u-2/3-lap-and-up' :'') ?>">
                        <h4>
                            <a href="<?php echo $entry->url ?>">
                                <?php echo $entry->title; ?>
                            </a>
                        </h4>
                        <div>
                            <?php echo convertToLocalDate($entry->publication_date); ?>
                        </div>
                        <?php echo $entry->lead; ?>
                        <a class="a--arrow" href="<?php echo $entry->url ?>"><?php echo __('Weiter') ?></a>
                    </div><?php if ($entry->headerimage): 
                        ?><div class='layout__item layout--center u-1/3-lap-and-up'>
                        <a href="<?php echo $entry->url; ?>">
                            <img src='<?php echo $entry->headerimage->size(300,200)->url ?>' alt='<?php echo $entry->headerimage->description ?>' />
                        </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>

        <?= $news->renderPager([
            'nextItemLabel' => __('Weiter'),
            'previousItemLabel' => __('Zurück'),
            'listMarkup' => "<ul class='pagination list-inline'>{out}</ul>",
            'itemMarkup' => "<li class='{class}'>{out}</li>",
            'linkMarkup' => "<a href='{url}'>{out}</a>",
            'previousItemClass' => 'pagination__previous',
            'nextItemClass' => 'pagination__next',
            'currentItemClass' => 'current',
        ]); ?>
    </div>

<?php include 'includes/footer.inc'; ?>

