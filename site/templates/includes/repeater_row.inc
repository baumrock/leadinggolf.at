<?php if ($page->repeater_row): ?>
    <div class="container">
        <div class="layout">
            <?php foreach ($page->repeater_row as $eq => $media):
                ?><div class="layout__item u-1/3-lap-and-up layout--center u-pv+">
                    <div class="block">
                        <?php echo ($media->image ? "<img class='block__img' src='{$media->image->width(460)->url}' alt='{$media->image->description}' />" : '') ?>
                        <div class="block__body">
                            <?php echo $media->body; ?>
                        </div>
                    </div>
                </div><?php
            endforeach; ?>
        </div>
    </div>
<?php endif; ?>
