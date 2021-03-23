<ul class="navigation__ul list-inline list-bare">
    <?php
        $rootPage = $pages->get('/');
        $homeIndex = 2;
        $menuItems = $rootPage->children('limit='.$homeIndex)
                           ->append($rootPage)
                           ->import($rootPage->children()->slice($homeIndex));
        foreach ($menuItems as $menuItem) {
            if ($menuItem == $rootPage) {
                echo "<li class='logo'><a class='logo__a' href='{$menuItem->url}'><img src='{$config->urls->templates}img/logo.png' alt='{$menuItem->title}' /></a></li>";
            }
            else{
                $active = ($page == $menuItem ? ' class="active"' : '');
                echo "<li{$active}><a href='{$menuItem->url}''>{$menuItem->title}</a></li>";
            }
        }
    ?>
</ul>
