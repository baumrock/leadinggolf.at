<?php function positionToStyle($pos, $showSlovenia = false)
{
    $x1 = (17.1166992 - 9.5361328);
    $percentX = str_replace(',','.',(($pos->lng - 9.5361328) / $x1) * 100); // 7
    if($showSlovenia === true) {
	    $y1 = (49.2 - 45.419419324671495); // 48.980217 -> Including SL
    	$percentY = str_replace(',','.',(($pos->lat - 45.419419324671495) / $y1) * 100); // -> Including SL
    } else {
		$y1 = (49.2 -  46.48326479); // 48.980217  -> AT Only
		$percentY = str_replace(',','.',(($pos->lat - 46.4832647) / $y1) * 100); // -> AT Only
    }
    return "style='left:$percentX%;bottom:$percentY%'";
}

$showSlovenia = false;
$mapAddon = '';
if($page->toggle_slovenia) {
	$mapAddon = "-sl";
	$showSlovenia = true;
}
?>

<div class="layout layout--center u-pb+">
    <div class="layout__item layout--center u-mv+">
        <div class="map map--at active">
            <?php foreach ($pages->find('template=club') as $marker): ?>
                <?php if ($marker->geoposition->lat): ?>
                    <a href="<?php echo $marker->url ?>" class="map__marker" <?php echo positionToStyle($marker->geoposition, $showSlovenia); ?>>
                        <div class="map__overlay">
                            <img src="<?php echo $marker->headerimage->size(276,93)->url;?>" alt="<?php echo $marker->title; ?>" />
                            <h6 class="u-mt-"><?php echo $marker->title; ?></h6>
                            <p class="u-m0"><?php echo $marker->teaser; ?></p>

                            <p style="color: #ba9c3c;"><?php
                            if($marker->ttime) echo "<div><i class='fas fa-check'></i> " . __('Tee-Time online buchbar') . "</div>";
                            if($num = $marker->webcams->count) echo "<div><i class='fas fa-camera'></i> $num Webcam" . ($num>1?'s ':' ') . __('verfügbar') . "</div>";
                            if($marker->weather) echo "<div><i class='fas fa-cloud'></i> " . __('Wetterprognose verfügbar') . "</div>";
                            ?></p>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
            <img src="<?php echo $config->urls->templates; ?>img/map-bare<?=$mapAddon;?>.png" alt="Leading Golf Courses Standorte" />
        </div>
        <div class="map map--de">
            <a href="http://leadinggolf.de" target="_blank">
                <img src="<?php echo $config->urls->templates; ?>img/de-map.png" alt="Leading Golf Courses Standorte" />
            </a>
        </div>
        <div class="map map--ch">
            <a href="http://leadinggolf.ch" target="_blank">
                <img src="<?php echo $config->urls->templates; ?>img/ch-map.png" alt="Leading Golf Courses Standorte" /><br>
            </a>
        </div>
    </div>

    <div class="layout__item u-2/3-lap-and-up layout--center">
        <div class="pack pack--bottom">
            <div class="pack__item">
                <a class="map-icon map-icon__de" href="http://leadinggolf.de" target="_blank">
                    <img src="<?php echo $config->urls->templates; ?>img/de-icon.png" alt="" />
                    <span><?php echo ($user->language->name == 'default' ? 'Deutschland' : 'Germany') ?></span>
                </a>
            </div>
            <div class="pack__item">
                <a class="map-icon map-icon__at active" href="<?php echo $pages->find(1086)->url ?>">
                    <img src="<?php echo $config->urls->templates; ?>img/at-icon<?=$mapAddon;?>.png" alt="" style="width:60%" />
                    <span><?php echo ($user->language->name == 'default' ? 'Österreich' : 'Austria') ?></span>
                </a>
            </div>
            <div class="pack__item">
                <a class="map-icon map-icon__ch" href="http://leadinggolf.ch" target="_blank">
                    <img src="<?php echo $config->urls->templates; ?>img/ch-icon.png" alt="" />
                    <span><?php echo ($user->language->name == 'default' ? 'Schweiz' : 'Switzerland') ?></span>
                </a>
            </div>
        </div>
    </div>
</div>
