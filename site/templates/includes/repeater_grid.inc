<?php if ($page->repeater_grid): ?>
    <!-- <div class="section--grey"> -->
        <div class="container">
            <div class="layout layout--center">
                <?php foreach ($page->repeater_grid as $eq => $media): ?>
                    <div class="layout__item u-3/4-lap-and-up layout--center">
                        <div class="box">
                            <div class="layout<?php echo ($eq % 2 == 0 ? '' : ' layout--rev'); ?>">
                                <?php $imgMarkup = ($media->image ? "<img src='{$media->image->width(460)->url}' alt='{$media->image->description}' />" : '') ?>
                                <div class="layout__item u-1/2-lap-and-up layout--left">
                                    <div class="box box--small">
                                        <?php echo $media->body ?>
                                    </div>
                                </div><div class="layout__item u-1/2-lap-and-up layout--center">
                                    <?php echo ($media->image ? "<img src='{$media->image->width(460)->url}' alt='{$media->image->description}' />" : '') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <!-- </div> -->
<?php endif; ?>
