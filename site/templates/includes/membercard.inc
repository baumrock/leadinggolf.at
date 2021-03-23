<?php $includeParallaxJs = true; ?>
<div class="container">
    <div class="layout">
        <div class="layout__item layout--center u-1/3-lap-and-up">
            <div class="box box--large">
                <?php echo $pages->get('/')->body ?>
            </div>
        </div><!--
         --><div class="layout__item layout--center u-2/3-lap-and-up">
            <div class="parallax" id="parallaxSceneCards">
                <img class="parallax__item parallax__item--back" src="<?php echo $config->urls->templates; ?>img/card_back.png?cache=2" />
                <img class="parallax__item parallax__item--middle" src="<?php echo $config->urls->templates; ?>img/card_middle.png?cache=2" />
                <img class="parallax__item parallax__item--front" src="<?php echo $config->urls->templates; ?>img/card_front.png?cache=2" />
            </div>
        </div>
    </div>
</div>
