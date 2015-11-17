<?php
/*
 * Newsletters list page template
*/
?>
	<?php include('block-breadcrumb.tpl.php'); ?>
	<?php include('block-left-sidebar.tpl.php'); ?>
	<div class="content-box">
		<div class="headingBox">
			<div class="corner"></div>
			<h1><?php echo $title; ?></h1>
			<img src="<?php theme_url(); ?>/images/page_image_5.jpg" alt="<?php echo $title; ?>" width="685" height="158" />
		</div>
		<div id="newsletterContent">
			<div class="inThisIssue whiteCorner">
				<?php if ($tabs): ?>
				  <div class="tabs">
					<?php print render($tabs); ?>
				  </div>
				<?php endif; ?>
				<?php echo render($page['content']); ?>
			</div>
			<div class="newsletterStories">
				<div class="clear"></div>
			</div>
		</div>
	</div>
