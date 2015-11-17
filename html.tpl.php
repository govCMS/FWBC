<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="schema.dcterms" href="http://purl.org/dc/terms/">
    <?php print $head; ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<?php
    $parent_title = "";
    if (arg(0) == 'node' && is_numeric(arg(1))) {
      $nid = arg(1);
      if ($nid) {
        /** do something **/
        $mlid = db_query("SELECT mlid FROM {book} WHERE nid = :d", array(':d'=>$nid))->fetchField();
        $plid = db_query("SELECT plid FROM {menu_links} WHERE mlid = :d", array(':d'=>$mlid))->fetchField();
        $parent_title = db_query("SELECT link_title FROM {menu_links} WHERE mlid = :d", array(':d'=>$plid))->fetchField();
      }
    }

    ?>
    <title><?php if($parent_title!="") { echo $parent_title . " | "; } echo $head_title; ?></title>
	<meta name="viewport" content="width=device-width" />
	<!--<meta name="viewport" content="initial-scale=1.0">-->
	<?php echo $styles; ?>
	<?php echo $scripts; ?>
	<link href='http://fonts.googleapis.com/css?family=Bitter:400,700,400italic' rel='stylesheet' type='text/css' />
	<!--<script type="text/javascript">
                var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www."); document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
            </script>
            <script type="text/javascript">
                try { var pageTracker = _gat._getTracker("UA-3354058-1");
                pageTracker._trackPageview(); } catch(err) {}
        </script>-->
	<script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-3354058-1', 'auto');
        ga('send', 'pageview');

    </script>	<!-- Google Tag Manager -->
	<object id="gogletagmanager" data="//www.googletagmanager.com/ns.html?id=GTM-KCP8H5" type="text/html"></object>
	<script type="text/javascript"> $('#gogletagmanager').remove();</script>
	<script type="text/javascript">
		<![CDATA[
			(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-KCP8H5');
		]]>
 </script><!-- End Google Tag Manager -->
</head>

<!--[if lt IE 7]><body class="no-js lt-ie9 lt-ie8 lt-ie7 <?php print $classes; ?>" <?php print $attributes; ?> style="padding:0px;"><![endif]-->
<!--[if IE 7]><body class="no-js lt-ie9 lt-ie8 <?php print $classes; ?>" <?php print $attributes; ?> style="padding:0px;"><![endif]-->
<!--[if IE 8]><body class="no-js lt-ie9 <?php print $classes; ?>" <?php print $attributes; ?> style="padding:0px;"><![endif]-->
<!--[if gt IE 8]><!--><body class="no-js <?php print $classes; ?>" <?php print $attributes; ?> style="padding:0px;"><!--<![endif]-->


<?php print $page_top; ?>
<div id="globalNavigation" class="header-top">
	<div class="wrapper">
		<span class="left"><a href="<?php echo home_url(); ?>">Home</a> <a href="#content">Skip to content</a></span>
		<span class="middle">
			<strong>Language assistance:</strong>
			<span id="languageSlider">
				<?php
				$lnid = theme_get_setting('fwbc_language_assitance_page');
				//$language_pages = get_child_pages(get_mlid_by_nid($lnid), $lnid);
				if ($language_pages) {
					foreach($language_pages as $lp_nid => $lp_data) {?>
					<span><a href="<?php echo page_url('node/'.$lnid); ?>"><?php echo mb_substr($lp_data['title'],0,16); ?>..</a></span>
				<?php }} ?>
			</span>
		</span>
		<div class="right"><?php the_menu('menu-top-menu'); ?></div>
	</div>
</div>
<?php $site_name = variable_get('site_name'); ?>
<div class="header">
	<div id="search">
		<?php $keys = @$_GET['keys'];
		if (!strlen($keys)) { $keys = 'Search this site...'; } ?>
		<form action="<?php echo page_url('node/'.theme_get_setting('fwbc_search_page')); ?>" onsubmit="search_presubmit();">
			<p><a href="<?php echo home_url(); ?>" title="<?php echo $site_name; ?>"><img src="<?php theme_url(); ?>/images/fwbc_logo.png" alt="<?php echo $site_name; ?>" width="159" height="70" /></a></p>
			<p><input type="text" name="keys" id="searchBox" title="Search this site" value="<?php echo $keys; ?>" onfocus="if(this.value=='Search this site...'){this.value='';}" onblur="if(this.value==''){this.value='Search this site...';}" />
			<input type="submit" value="Search" id="searchBtn" /></p>
		</form>
	</div>
	<div id="logo"><a href="<?php echo home_url(); ?>" title="<?php echo $site_name; ?>">
			<svg width="330" height="97">
				<image xlink:href="<?php theme_url(); ?>/images/govt_logo.svg" src="<?php theme_url(); ?>/images/govt_logo.png" width="330" height="97" alt="<?php echo $site_name; ?>" width="330" height="97" />
			</svg>
		</a></div>
</div>
<div class="content">
	<?php the_main_menu(); ?>
	<a name="content"></a>
    <?php print $page; ?>
	<div class="clear"></div>
	<div id="footer">
		<div class="wideBox">
			<div class="corner"></div>
			<?php the_block(2, false); ?>
		</div>
		<div class="wideBox">
			<map id="footerlogos" name="footerlogos">
				<area shape="rect" alt="Information Publication Scheme" title="Information Publication Scheme" coords="2,1,134,50" href="http://www.fwbc.gov.au/information-publication-scheme/" />
				<area shape="rect" alt="Disclosure Log" title="Disclosure Log" coords="139,4,263,51" href="http://www.fwbc.gov.au/disclosure-log/" />
			</map>
			<img class="ips" usemap="#footerlogos" src="<?php theme_url(); ?>/images/ips_fdl_logos.jpg" alt="Information Publication Scheme, FOI Disclosure Log" width="271" height="53" />
			<?php for ($fm=1; $fm<=5; $fm++) { the_footer_menu('menu-site-footer-menu-'.$fm, array('class' => 'footer-menu')); } ?>
			<div class="clear"></div>
		</div>
		<div class="wideBox">
			<div class="footer-bottom"><?php the_block(1, false); ?></div>
			<div class="footer-bottom"><?php the_menu('menu-site-bottom-menu', array('class' => 'bottom-menu'), '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;'); ?></div>
			<div class="clear"></div>
		</div>
	</div>
	</div>
	</body>
</html>
