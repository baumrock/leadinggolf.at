<div class="carousel" data-slick='{
    "slidesToShow": 8,
    "slidesToScroll": 1,
    "swipeToSlide": true,
    "arrows": false,
    "autoplay": true,
    "centerMode": true,
    "speed": 4000,
    "autoplaySpeed": 0,
    "cssEase": "linear",
    "responsive": [
        {
          "breakpoint": 2200,
          "settings": {
            "slidesToShow": 7
          }
        },
        {
          "breakpoint": 1900,
          "settings": {
            "slidesToShow": 6
          }
        },
        {
          "breakpoint": 1600,
          "settings": {
            "slidesToShow": 5
          }
        },
        {
          "breakpoint": 1300,
          "settings": {
            "slidesToShow": 4
          }
        },
        {
          "breakpoint": 1000,
          "settings": {
            "slidesToShow": 3
          }
        },
        {
          "breakpoint": 600,
          "settings": {
            "slidesToShow": 2,
            "speed": 1000,
            "autoplaySpeed": 3000
          }
        },
        {
          "breakpoint": 480,
          "settings": {
            "slidesToShow": 1,
            "speed": 1000,
            "autoplaySpeed": 3000
          }
        }
      ]
    }'>
    <?php foreach ($pages->find('template=club,sort=sort') as $club): ?><div class="layout--center u-pb+">
        <?php echo ($club->image ? '<a href="'.$club->url.'"><img src="'.$club->image->size(300,255)->url.'" alt="'.$club->title.'"></a>' :""); ?>
        <h6 class="u-mb- u-mt"><?php echo $club->title ?></h6>
        <a class="a--arrow" href="<?php echo $club->url ?>"><?php echo ($user->language->name == 'default' ? 'Mehr erfahren' : 'Read more') ?></a>
    </div><?php endforeach; ?>
</div>
