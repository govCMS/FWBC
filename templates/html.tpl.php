<!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7" <?php print $html_attributes; ?>><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7" <?php print $html_attributes; ?>><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8" <?php print $html_attributes; ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie9" <?php print $html_attributes; ?>><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html <?php print $html_attributes . $rdf_namespaces; ?>><!--<![endif]-->

<head>
  <?php
  $parent_title = "";
  if (arg(0) == 'node' && is_numeric(arg(1))) {
    $nid = arg(1);
    if ($nid) {
      /** do something **/
      $mlid = db_query("SELECT mlid FROM {book} WHERE nid = :d", array(':d' => $nid))->fetchField();
      $plid = db_query("SELECT plid FROM {menu_links} WHERE mlid = :d", array(':d' => $mlid))->fetchField();
      $parent_title = db_query("SELECT link_title FROM {menu_links} WHERE mlid = :d", array(':d' => $plid))->fetchField();
    }
  }

  ?>
  <title><?php if ($parent_title != "") {
      echo $parent_title . " | ";
    }
    echo $head_title; ?></title>
  <link rel="schema.dcterms" href="http://purl.org/dc/terms/">
  <?php print $head; ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="shortcut icon" href="<?php print '/' . $base_path . path_to_theme(); ?>/images/icons/favicon-16x16.png">
  <link rel="apple-touch-icon" sizes="57x57" href="<?php print '/' . $base_path . path_to_theme(); ?>/images/icons/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php print '/' . $base_path . path_to_theme(); ?>/images/icons/apple-touch-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php print '/' . $base_path . path_to_theme(); ?>/images/icons/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php print '/' . $base_path . path_to_theme(); ?>/images/icons/apple-touch-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php print '/' . $base_path . path_to_theme(); ?>/images/icons/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php print '/' . $base_path . path_to_theme(); ?>/images/icons/apple-touch-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php print '/' . $base_path . path_to_theme(); ?>/images/icons/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php print '/' . $base_path . path_to_theme(); ?>/images/icons/apple-touch-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php print '/' . $base_path . path_to_theme(); ?>/images/icons/apple-touch-icon-180x180.png">
  <link rel="icon" type="image/png" href="<?php print '/' . $base_path . path_to_theme(); ?>/images/icons/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="<?php print '/' . $base_path . path_to_theme(); ?>/images/icons/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="<?php print '/' . $base_path . path_to_theme(); ?>/images/icons/android-chrome-192x192.png" sizes="192x192">
  <link rel="icon" type="image/png" href="<?php print '/' . $base_path . path_to_theme(); ?>/images/icons/favicon-16x16.png" sizes="16x16">
  
  <link rel="manifest" href="<?php print '/' . $base_path . path_to_theme(); ?>/icons/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?php print '/' . $base_path . path_to_theme(); ?>/icons/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <?php echo $styles; ?>
  <?php echo $scripts; ?>
</head>

<body class="no-js <?php print $classes; ?>" <?php print $attributes; ?> style="padding:0px;">
<?php print $page_top; ?>
<?php $site_name = variable_get('site_name'); ?>
<a id="skipto" href="#content">Skip to content</a>
<div class="wrapper-header clearfix">
  <div class="header">
    <div id="search">
      <?php $keys = @$_GET['keys'];
      if (!strlen($keys)) {
        $keys = 'Search...';
      } ?>
      <form action="<?php echo fwbc_page_url('node/' . theme_get_setting('fwbc_search_page')); ?>" onsubmit="search_presubmit();">
        <input type="text" name="keys" id="searchBox" title="Search this site" placeholder="Search this site...">
        <input type="submit" value="Search" id="searchBtn"/>
      </form>
    </div>
    <div id="logo">
      <a href="<?php echo fwbc_home_url(); ?>" title="Go to the <?php echo $site_name; ?> homepage">
        <img src="<?php fwbc_theme_url(); ?>/images/branding/abcc-crest-on-003956.gif" srcset="<?php fwbc_theme_url(); ?>/images/branding/abcc-crest-on-003956.gif 1x, <?php fwbc_theme_url(); ?>/images/branding/abcc-crest-on-003956_2x.gif 2x, <?php fwbc_theme_url(); ?>/images/branding/crest.png 3x, <?php fwbc_theme_url(); ?>/images/branding/crest.png 4x" width="295" height="92" alt="Go to the <?php echo $site_name; ?> homepage" />
      </a>
    </div>
  </div>
  <?php fwbc_the_main_menu(); ?>
</div>
<div class="region region-top-information-banner">
  <?php print render(block_get_blocks_by_region('top_information_banner')); ?>
</div>
<div class="content">
  <a name="content"></a>
  <?php print $page; ?>
  <div class="clear"></div>
</div>

<div class="wrapper-footer clearfix">
  <div id="footer">
  <!--  <div class="wideBox">-->
    <?php //fwbc_the_block(2, FALSE); ?>
  <!--  </div>-->
    <div class="wideBox">
      <div class="wideBox-half left">
        <div class="footer-bottom"><?php fwbc_the_block(0, FALSE); ?></div>
        <div class="footer-bottom"><?php fwbc_the_menu('menu-site-bottom-menu', array('class' => 'bottom-menu')); ?></div>
      </div>
      <div class="wideBox-half right">
        <div class="footer-bottom"><?php fwbc_the_menu('menu-site-bottom-right-menu', array('class' => 'bottom-menu')); ?></div>
        <p align="right"><a href="/node/123">Access to information</a></p>
      </div>
    </div>
  </div>
</div>

<?php print $page_bottom; ?>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KCP8H5" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-KCP8H5');</script>
<!-- End Google Tag Manager -->
</body>
</html>
