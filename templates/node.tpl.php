<?php
hide($content['links']);    // hide drupal/specs links
hide($content['comments']); // hide comments/comment form
hide($content['field_landing_page']); // hide Landing page field
hide($content['field_template']); // hide template page field
// legal case post
hide($content['field_status']); // hide Status category link
hide($content['field_state']); // hide State category link
hide($content['field_alleged_breach']); // hide Alleged breach category link
// submission post
hide($content['field_status_submission']); // hide Status category link
hide($content['field_state_submission']); // hide State category link
hide($content['field_alleged_breach_submission']); // hide Alleged breach category link

switch (get_node_type($variables)) {
	case "latest_news": // latest news list page
		hide($content['field_image']); // hide image
?>
		<div class="post-item">
			<div class="line"></div>
			<h3><a href="<?php echo $node_url; ?>"><?php echo $title; ?></a></h3>
			<span class="date"><?php echo get_post_added($submitted); ?></span>
			<p class="category"><?php echo get_post_term($node, 'field_category'); ?></p>
			<?php echo render($content); ?>
		</div>
<?php
	break;
	case "newsletters": // newsletters landing page
		hide($content['field_image']); // hide image
		$newsletter_pages = get_child_pages($node->book["mlid"], $node->vid);
		if ($newsletter_pages) {
?>
		<ul class="bulletlist">
			<?php foreach($newsletter_pages as $npid => $npdata) { ?>
			<li><a href="<?php echo page_url('node/'.$npid); ?>"><?php echo $npdata['title']; ?></a></li>
			<?php } ?>
		</ul>
<?php
		}
	break;
	case "newsletter_section": // newsletters list page
		hide($content['field_subtitle']);
		$newsletter_posts = db_query("SELECT n.nid FROM {menu_links} m LEFT JOIN {book} b ON b.mlid = m.mlid LEFT JOIN {node} n ON n.nid = b.nid WHERE n.type = 'newsletter' AND n.status = 1 AND m.plid = '".$node->book["mlid"]."' ORDER BY m.weight, n.title")->fetchAll();
		if ($newsletter_posts) {
?>
		<div class="inThisIssue">
			<h2>In This Issue <span><?php echo render($content['field_subtitle']); ?></span></h2>
			<ul class="bulletlist">
				<?php foreach($newsletter_posts as $newsletter_post) {
				$newsletter_post = node_load($newsletter_post->nid); ?>
				<li><a href="<?php echo page_url('node/'.$newsletter_post->nid); ?>"><?php echo $newsletter_post->title; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="newsletterStories">
			<?php foreach($newsletter_posts as $newsletter_post) {
				$newsletter_post = node_load($newsletter_post->nid);
				$newsletter_image = get_post_custom($newsletter_post, 'field_img', 'filename');
			?>
			<div class="box">
				<?php if (strlen($newsletter_image)) { ?><div class="newsletter-thumb"><img src="<?php echo get_thumb(image_path($newsletter_image), 295, 119); ?>" alt="<?php echo $newsletter_post->title; ?>" class="newsletterImage" /></div><?php } ?>
				<h3><?php echo $newsletter_post->title; ?></h3>
				<div class="newsletters-list-content">
					<p><?php echo limit_content(strip_tags(get_post_custom($newsletter_post, 'body')), 260); ?></p>
				</div>
				<p class="buttons">
					<a class="more" href="<?php echo page_url('node/'.$newsletter_post->nid); ?>">
						Read More
					</a>
					<a class="top" href="#top">
						Top
					</a>
				</p>
			</div>
			<?php } ?>
			<div class="clear"></div>
		</div>
		<?php } ?>
		<div class="wideBox">
			<div class="corner"></div>
			<?php echo render($content); ?>
		</div>
<?php
	break;
	case "newsletter": // single newsletter page
		hide($content['field_img']); // hide image by default
		$newsletter_image = get_post_custom($node, 'field_img', 'filename');
?>
		<h2><?php echo $title; ?></h2>
		<?php if (strlen($newsletter_image)) { ?><p><img src="<?php echo get_thumb(image_path($newsletter_image), 410); ?>" alt="<?php echo $title; ?>" /></p><?php } ?>
		<?php echo render($content); ?>
<?php
	break;
	case "search_view": // search results list page
		hide($content['field_image']); // hide image
?>
		<div class="search-item">
			<p><strong><a href="<?php echo $node_url; ?>"><?php echo $title; ?></a></strong></p>
			<p><span class="date">Date: <?php echo date("d/m/Y", $node->created); ?></span></p>
			<?php echo render($content); ?>
		</div>
<?php
	break;
	case "webform": // contact page
		hide($content['field_bottom_content']); // hide image
?>
		<div class="contact-form">
			<?php echo render($content); ?>
			<?php echo render($content['field_bottom_content']); ?>
		</div>
<?php
	break;
	default: // default page
		hide($content['field_bottom_content']); // hide image
		echo render($content);
		$iframe_src = get_post_custom($node, 'field_iframe_src');
		$iframe_width = get_post_custom($node, 'field_iframe_width');
		$iframe_height = get_post_custom($node, 'field_iframe_height');
		$iframe_scrolling = get_post_custom($node, 'field_iframe_scrolling');
		$iframe_css_style = get_post_custom($node, 'field_iframe_css_style');

		if (!strlen($iframe_width)) { $iframe_width = '100%'; }
		if (!strlen($iframe_height)) { $iframe_height = '100%'; }
		if ($iframe_scrolling == 1) { $iframe_scrolling = 'yes'; } else { $iframe_scrolling = 'no'; }
		if (strlen($iframe_src)) { ?>
			<div class="page-iframe" style="overflow: hidden;">
				<iframe src="<?php echo $iframe_src; ?>" width="<?php echo $iframe_width; ?>" height="<?php echo $iframe_height; ?>" scrolling="<?php echo $iframe_scrolling; ?>"<?php if (strlen($iframe_css_style)) { echo ' style="'.$iframe_css_style.'"'; } ?>></iframe>
			</div>
		<?php }
	break;
}
?>