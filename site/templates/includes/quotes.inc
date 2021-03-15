<div class="section--grey">
    <div class="container">
        <div class="layout">
            <?php foreach ($pages->get('/')->repeater_quotes->findRandom(2) as $quote):
                ?><div class="layout__item u-1/2-lap-and-up layout--center">
                    <div class="box box--large">
                        <blockquote><?php echo $quote->title ?>
                            <footer><cite><?php echo $quote->headline ?><br><?php echo $quote->subline ?></cite></footer>
                        </blockquote>
                    </div>
                </div><?php
            endforeach; ?>
            </div>
        </div>
    </div>
</div><!-- .section--grey -->
