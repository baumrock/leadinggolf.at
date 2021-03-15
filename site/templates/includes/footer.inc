        <footer class="footer">
            <div class="footer__box">
                <div class="container u-pv++">
                    <div class="layout">
                        <div class="layout__item">
                            <div class="layout">
                                <div class="layout__item u-1/2-lap u-1/4-desk">
                                    <h4 class="u-mb-">Sitemap</h4>
                                    <ul>
                                        <?php
                                            foreach ($pages->get('/')->children()->prepend($pages->get('/')) as $p) {
                                                echo "<li class='u-mb-'><a href='{$p->url}'>{$p->title}</a></li>";
                                            }
                                        ?>
                                    </ul>
                                </div><!--
                                 --><div class="layout__item u-1/2-lap u-1/4-desk">
                                    <h4 class="u-mb-"><?php echo ($user->language->name == 'default' ? 'Für Clubs' : 'For Clubs') ?></h4>
                                    <p><a class="a--arrow" href="<?php echo $pages->get(1018)->url() ?>"><?php echo ($user->language->name == 'default' ? 'Mitglied werden' : 'Become a member') ?></a></p>

                                    <h4 class="u-mb- u-mt+">LGC International</h4>
                                    <ul class="list-bare">
                                        <li class="u-mb-"><a href="http://www.leadinggolf.de" target="_blank"><?php echo ($user->language->name == 'default' ? 'DEUTSCHLAND' : 'GERMANY') ?></a></li>
                                        <li class="u-mb-"><a href="http://www.leadinggolf.ch" target="_blank"><?php echo ($user->language->name == 'default' ? 'SCHWEIZ' : 'SWITZERLAND') ?></a></li>
                                    </ul>
                                </div><!--
                                 --><div class="layout__item u-1/2-lap u-1/4-desk">
                                    <h4 class="u-mb-"><?php echo ($user->language->name == 'default' ? 'Kontakt' : 'Contact') ?></h4>
                                    <p>The Leading Golf Courses<br>
                                        Salesianergasse 23/7<br>
                                        1030 Wien, Austria</p>

                                    <p>
                                    <a href="tel:00436644516358">+43 664 4516358</a><br>
                                    <a href="mailto:office@leadinggolf.at">office@leadinggolf.at</a><br>
                                    <a href="mailto:office@leadinggolf-europe.com">office@leadinggolf-europe.com</a></p>
                                </div>
                                <div class="layout__item u-1/2-lap u-1/4-desk">
                                    <h4 class="u-mb-">Social Media</h4>
                                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FLeadingGolfCoursesAustria&tabs&width=300&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=103428346459935" width="300" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                                </div>
                                <div class="layout__item u-mt">
                                    <a href="<?php echo $pages->get(1078)->url; ?>"><?php echo ($user->language->name == 'default' ? 'IMPRESSUM' : 'LEGAL NOTICE') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="layout">
                    <div class="layout__item layout--center">
                        <div class="box">
                            <p class="u-m0" style="text-transform: uppercase;">The Leading Golf Courses &copy; <?php echo date('Y'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <?php // if($page->editable()) echo "<p><a href='$page->editURL'>Edit</a></p>"; ?>
        <!--[if lt IE 9]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><![endif]-->
        <!--[if gte IE 9]><!--><script src="<?php echo $config->urls->templates; ?>js/vendor/jquery.min.js"></script><!--<![endif]-->
        <script src="<?php echo $config->urls->templates; ?>js/app.min.js"></script>
        <script src="<?php echo $config->urls->templates; ?>js/vendor/slick.min.js"></script>
        <script src="<?php echo $config->urls->templates; ?>js/popup.min.js"></script>
        <script>
            $('.carousel').slick();
            $('.gallery__item > a').magnificPopup({
                type: 'image',
                gallery: {
                   enabled: true
                 }
            });
        </script>
        <?php if (isset($includeParallaxJs)): ?>
            <script src="<?php echo $config->urls->templates; ?>js/parallax.min.js"></script>
        <?php endif; ?>
        <?php if ($page->template == 'club'): ?>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0Zh_c7uaQolBHaEVx3pM0Pe4aJqc_qJ4&sensor=false"></script>
            <script>
            	google.maps.event.addDomListener(window, 'load', init);
            	function init() {
            		var pos = new google.maps.LatLng(<?php echo $page->geoposition->lat; ?>, <?php echo $page->geoposition->lng; ?>);
            		var mapOptions = {
            			zoom: 12,
                        disableDefaultUI: true,
                        draggable: true,
                        disableDoubleClickZoom: true,
                        scrollwheel: false,
            			center: pos,
                        styles: [{"featureType":"water","elementType":"all","stylers":[{"hue":"#76aee3"},{"saturation":38},{"lightness":-11},{"visibility":"on"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"hue":"#8dc749"},{"saturation":-47},{"lightness":-17},{"visibility":"on"}]},{"featureType":"poi.park","elementType":"all","stylers":[{"hue":"#c6e3a4"},{"saturation":17},{"lightness":-2},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"hue":"#cccccc"},{"saturation":-100},{"lightness":13},{"visibility":"on"}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"hue":"#5f5855"},{"saturation":6},{"lightness":-31},{"visibility":"on"}]},{"featureType":"road.local","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"all","stylers":[]}]
            		};
            		var mapElement = document.getElementById('map');
            		var map = new google.maps.Map(mapElement, mapOptions);

            		var marker = new google.maps.Marker({
            			position: pos,
            			map: map,
            			title: '<?php echo $page->title; ?>',
                        icon: '<?php echo $config->urls->templates; ?>img/pin.png'
            		});

                    google.maps.event.addListener(marker, 'click', function() {
                        window.open('https://maps.google.com/maps?q=loc:<?php echo $page->geoposition->lat.','.$page->geoposition->lng ?>', '_blank');
                    });

                    google.maps.event.addDomListener(window, 'resize', function() {
                        map.setCenter(pos);
                    });
            	}
            </script>
        <?php endif; ?>
        <?php if (isset($config->googleAnalyticsID)): ?>
            <!--<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', '<?php echo $config->googleAnalyticsId ?>', 'auto');ga('send', 'pageview');</script>-->
        <?php endif ?>
    </body>
</html>
