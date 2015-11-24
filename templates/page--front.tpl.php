<?php
/*
 * Front page template
*/
global $base_url;
$images_path = $base_url.'/'.variable_get('file_public_path').'/';
$homepage_slides = views_get_view_result('homepage_slider');
?>

    <div id="industryUpdate" class="box">
        <div class="corner"></div>
        <div class="banner-item">
            <h2><a href="http://www.fwbc.gov.au/industry-updates">INDUSTRY<br>UPDATE</a></h2>
            <h4><a href="http://www.fwbc.gov.au/industry-updates">Sign up for FWBC’s free<br>online newsletter now ></a></h4>
        </div>
    </div>

    <div id="fwbcOnSite" class="box">
        <div class="corner"></div>
        <div class="banner-item">
            <h2><a href="http://www.fwbc.gov.au/app">FWBC ON SITE</h2>
            <h4><a href="http://www.fwbc.gov.au/app">Your App about your rights<br>and responsibilities on site ></a></h4>
        </div>
    </div>

    <div id="noPermits" class="box">
        <div class="corner"></div>
        <div class="banner-item">
            <h2><a href="http://www.fwbc.gov.au/no-permit-list">NO PERMITS<br>LIST</h2>
            <h4><a href="http://www.fwbc.gov.au/no-permit-list">Find out who is not<br>permitted to enter your site ></a></h4>
        </div>
    </div>

    <!--
	<div id="promoArea" class="box">
		<div class="corner"></div>
		<?php
		$homepage_banners = views_get_view_result('homepage_banner');
		if (count($homepage_banners)) {
			foreach($homepage_banners as $homepage_banner) {
				$banner_image = $homepage_banner->field_field_banner_image[0]['raw']["filename"];
				$banner_alt_text = $homepage_banner->field_field_banner_alt_text[0]['raw']["value"];
				$banner_link = $homepage_banner->field_field_banner_link[0]['raw']["value"];
				$banner_open_in_new_window = $homepage_banner->field_field_banner_open_in_new_window[0]['raw']["value"];
				$banner_top_text = $homepage_banner->field_field_banner_text_top[0]['raw']["value"];
				$banner_bottom_text = $homepage_banner->field_field_banner_text_bottom[0]['raw']["value"];
				$target = ''; if ($banner_open_in_new_window) { $target = ' target="_blank"'; }
		?>
			<div class="banner-item" style="background-image:url('<?php echo $images_path . $banner_image; ?>');">
			  <h2><a href="<?php echo $banner_link; ?>"<?php if (strlen($banner_alt_text)) { echo ' title="'.$banner_alt_text.'"'; } ?><?php echo $target;  ?>><?php echo $banner_top_text; ?></a></h2>
			  <h4><a href="<?php echo $banner_link; ?>"<?php if (strlen($banner_alt_text)) { echo ' title="'.$banner_alt_text.'"'; } ?><?php echo $target;  ?>><?php echo $banner_bottom_text; ?></a></h4>
			</div>
		<?php
			}
		}
		?>
	</div>-->
	<div class="clear"></div>

    <div class="box home-box" id="home-latest-news">
        <div class="corner"></div>
        <h2>Latest News</h2>
        <?php $latest_news_block = module_invoke('views', 'block_view', 'home_latest_news-block');
        echo render($latest_news_block["content"]); ?>
        <div class="clear"></div>
        <div class="more-news"><a class="button" href="<?php echo page_url('node/'.theme_get_setting('fwbc_latest_news_page')); ?>">More news</a></div>
        <!-- <div class="more-news"><a class="button" href="/industry-update-0/">Industry updates</a></div> -->
    </div>

    <!--
	<div class="home-left-container">
		<div class="box home-box">
			<div class="corner"></div>
			<h2>Hot topics</h2>
			<?php
			$hot_topics_tree = menu_tree_all_data('menu-home-hot-topics');
			if (count($hot_topics_tree)) {
			?>
			<ul id="tabs">
				<?php $selected = ' class="selected"';
				foreach($hot_topics_tree as $hot_topic_top) { ?>
				<li style="float:none;"><a<?php $selected; ?> href="<?php echo $hot_topic_top['link']['link_path']; ?>" rel="<?php echo str_replace(' ', '-', $hot_topic_top['link']['link_title']); ?>"><?php echo $hot_topic_top['link']['link_title']; ?></a></li>
				<?php $selected = ''; } ?>
			</ul>
			<div class="clear"></div>
			<?php
			foreach($hot_topics_tree as $hot_topic_top) {
				if (count($hot_topic_top['below'])) { ?>
				<ul class="links" id="<?php echo str_replace(' ', '-', $hot_topic_top['link']['link_title']); ?>">
					<?php foreach($hot_topic_top['below'] as $hot_topic_item) { ?>
					<li><a href="<?php echo $hot_topic_item['link']['link_path']; ?>"><?php echo $hot_topic_item['link']['link_title']; ?></a></li>
					<?php } ?>
				</ul>
			<?php }}} ?>
			<a class="button" href="<?php echo page_url('rights-and-responsibilities'); ?>">Employee rights and responsibilities</a>
		</div>
		<div class="home-left-banner-item">
			<?php the_block(38); ?>
		</div>
	</div> -->

    <div id="strike" class="box">
        <div class="corner"></div>
        <div class="banner-item">
            <h2><a href="http://www.fwbc.gov.au/sites/default/files/Strike%20stop%20and%20think_web.pdf?pdf=strikeflyer">STRIKE?<br>STOP AND THINK</h2>
            <h4><a href="http://www.fwbc.gov.au/sites/default/files/Strike%20stop%20and%20think_web.pdf?pdf=strikeflyer">Four things every worker should<br>know before going on strike ></a></h4>
        </div>
    </div>

	<div class="box home-box">
		<div class="corner"></div>
		<?php the_block(3); ?>
		<a class="button" href="<?php echo page_url('contact-us'); ?>">More contact details</a>
	</div>

<div class="clear"></div>


    <div id="buildingCode2013" class="box">
        <div class="corner"></div>
        <div class="banner-item">
            <h2><a href="http://www.fwbc.gov.au/building-code/">Building Code<br>2013</h2>
            <h4><a href="http://www.fwbc.gov.au/building-code/">Information and resources on<br>the Building Code ></a></h4>
        </div>
    </div>


    <?php

	if (count($homepage_slides)) {
?>
<!--
	<div id="slideshow" class="box">
		<div class="corner"></div>
		<a href="#pause" id="pauseBtn" title="Pause"></a>
		<div id="slides">
			<?php
			$hsnmb = 1;
			foreach($homepage_slides as $homepage_slide) {
				$slide_image = $homepage_slide->field_field_slide_image[0]['raw']["filename"];
				$alt_text = $homepage_slide->field_field_slider_alt_text[0]['raw']["value"];
				$image_link = $homepage_slide->field_field_image_link[0]['raw']["value"];
				$open_in_new_window = $homepage_slide->field_field_open_in_new_window[0]['raw']["value"];
				$youtube_video_id = $homepage_slide->field_field_youtube_video_id[0]['raw']["value"];
				$top_text = $homepage_slide->field_field_slide_text_top[0]['raw']["value"];
				$bottom_text = $homepage_slide->field_field_slide_text_bottom[0]['raw']["value"];
				$target = ''; if ($open_in_new_window) { $target = ' target="_blank"'; }

				$slide_image_src = $images_path . $slide_image;
			?>

			<?php //print_r($homepage_slide->field_slide_text_top); ?>


			<div class="home-slide-item" id="slide<?php echo $hsnmb; ?>" <?php if (!strlen($youtube_video_id)) { ?>style="background-image:url('<?php echo $slide_image_src; ?>');"<?php } ?>>
				<?php if (strlen($youtube_video_id)) { ?>
					<object width= "100%" height="100%">
					  <param name="movie" value="http://www.youtube.com/v/<?php echo $youtube_video_id; ?>?version=3&rel=0&fs=0&theme=light&showinfo=0&autohide=1&color=white&playlist='.$vid.'"></param>
					  <param name="allowFullScreen" value="false"></param>
					  <param name="allowscriptaccess" value="always"></param>
					  <param name="wmode" value="transparent"></param>
					  <embed src="http://www.youtube.com/v/<?php echo $youtube_video_id; ?>?version=3&rel=0&fs=0&theme=light&showinfo=0&autohide=1&color=white&playlist='.$vid.'" type="application/x-shockwave-flash" allowfullscreen="false" width="100%" height="100%" allowscriptaccess="always" wmode="transparent"></embed>
					</object>
				<?php } else { ?>
					<?php if (strlen($image_link)) { ?>
						<h2><a onclick="ga('send','event','Files','PDF','strike-stop-and-think.pdf');" href="<?php echo $image_link; ?>" <?php if (strlen($alt_text)) { echo ' title="'.$alt_text.'"'; } ?><?php echo $target;  ?>>		<?php echo $top_text; ?>
						</a>
						</h2>
						<h4><a onclick="ga('send','event','Files','PDF','strike-stop-and-think.pdf');" href="<?php echo $image_link; ?>"<?php if (strlen($alt_text)) { echo ' title="'.$alt_text.'"'; } ?><?php echo $target;  ?>><?php echo $bottom_text; ?></a></h4>
					<?php } else { ?>
						<img src="<?php echo $slide_image_src; ?>" alt="<?php echo $alt_text; ?>" <?php if (strlen($alt_text)) { echo ' title="'.$alt_text.'"'; } ?> />
				<?php }} ?>
			</div>
			<?php $hsnmb++; } ?>

		</div>
		<div id="pager">
			<ul>
				<?php $selected = ' class="selected"'; $hsnmb = 1;
				foreach($homepage_slides as $homepage_slide) {
				$li_width = theme_get_setting('fwbc_hs_'.$homepage_slide->nid.'_width'); ?>
				<li style="width:<?php echo $li_width; ?>;"><a href="#" rel="slide<?php echo $hsnmb; ?>"<?php echo $selected; ?>><?php echo $homepage_slide->node_title; ?></a></li>
				<?php $selected = ''; $hsnmb++; } ?>
			</ul>
		</div>
	</div> -->
<?php } ?>
	<div class="box home-box">
		<div class="corner"></div>
		<?php the_block(34); ?>
	</div>
	<!-- <?php echo render($page['content']); ?> -->

    <div id="drugAndAlcohol" class="box">
        <div class="corner"></div>
        <div class="banner-item">
            <h2><a href="http://www.fwbc.gov.au/drug-and-alcohol-testing-under-building-code-2013-0/">DRUG AND<br>ALCOHOL TESTING</h2>
            <h4><a href="http://www.fwbc.gov.au/drug-and-alcohol-testing-under-building-code-2013-0/">New requirements under<br>the Building Code 2013 ></a></h4>
        </div>
    </div>
