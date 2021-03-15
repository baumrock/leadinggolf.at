<!DOCTYPE html>
<?php 
function convertToLocalDate($str){
    if (wire('user')->language->id == 1022){
        return str_replace(
            [
                "January",
                "February",
                "March",
                "May",
                "June",
                "July",
                "October",
                "December",
            ],
            [
                "Jänner",
                "Februar",
                "März",
                "Mai",
                "Juni",
                "Juli",
                "Oktober",
                "Dezember",
            ],
            $str
        );
    }
    return $str;
}
?>
<!--[if lt IE 9]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gte IE 9]><!--><html class="no-js"><!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta property="og:site_name" content="The Leading Golf Courses">
        <title><?php echo $page->get('seo_title|title') ?> - The Leading Golf Courses</title>
        <meta property="og:title" content="<?php echo $page->get('seo_title|headline|title') ?>">
        <meta name="description" content="<?php echo $page->get('seo_description') ?>">
        <meta property="og:description" content="<?php echo $page->get('seo_description') ?>">
        <?php
         if (@$page->get('seo_image|headerimage|image')->count > 0): ?>
            <meta property="og:image" content="<?php echo $page->get('seo_image|headerimage|image')->size(1200,630)->httpUrl ?>">
        <?php endif ?>
        <meta property="og:url" content="<?php echo $page->httpUrl ?>">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:image:alt" content="<?php echo @$page->get('seo_image|headerimage|image')->description ?>">
        <?php foreach ($page->seo_customtags as $customTag): ?>
            <meta<?php echo ($customTag->name ? ' name="'.$customTag->name.'"':'' ) . ($customTag->property ? ' property="'.$customTag->property.'"':'' )?> content="<?php echo $customTag->content ?>">
        <?php endforeach; ?>

        <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates; ?>css/style.min.css?cache=20170517" />
        <?php if (isset($config->googleTagManagerID)): ?>
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','<?php echo $config->googleTagManagerID ?>');</script>
        <?php endif ?>
        <!--[if lt IE 9]><script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv-printshiv.min.js"></script><script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
        <script src="<?php echo $config->urls->templates; ?>js/vendor/modernizr.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
    </head>
    <body class="<?= $page->template->name ?>">
        <?php if (isset($config->googleTagManagerID)): ?>
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $config->googleTagManagerID ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <?php endif ?>
        <header>
    		<div class="container" style="position: relative;">
                <label for="responsive-toggle-navigation" class="toggle-responsive__label navigation-toggle" onclick>Navigation</label>
    			<div class="languageselector">
    				<ul class="list-inline list-inline--delimited">
                        <?php
                            $lang = $user->language;
                            $user->language = $languages->get("default");
                            echo "<li".($user->language == $lang ? ' class="active"':'')."><a href='{$page->url}'>De</a></li>";
                            $user->language = $languages->get("en");
                            echo "<li".($user->language == $lang ? ' class="active"':'')."><a href='{$page->url}'>En</a></li>";
                            $user->language = $lang;
                        ?>
    				</ul>
    			</div>
    			<div class="layout">
    				<div class="layout__item navigation-container">
                        <input type="checkbox" id="responsive-toggle-navigation" class="toggle-responsive__checkbox" />
                        <div class="toggle-responsive__content">
                            <nav class="navigation">
                                <?php include 'includes/navigation.inc'; ?>
                            </nav>
                        </div>
    				</div>
    			</div>
    		</div>
    	</header>
