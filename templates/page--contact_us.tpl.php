<?php
/*
 * Contact page template
*/
?>
	<?php include('block-breadcrumb.tpl.php'); ?>
	<?php include('block-left-sidebar.tpl.php'); ?>
	<div class="content-box">
		<div class="headingBox">
			<div class="corner"></div>
			<h1><?php echo $title; ?></h1>
			<img src="<?php theme_url(); ?>/images/page_image_1.jpg" alt="<?php echo $title; ?>" width="685" height="158" />
		</div>
		<div id="leftContent">
			<div class="contentBox wide">
				<?php if ($tabs): ?>
				  <div class="tabs">
					<?php print render($tabs); ?>
				  </div>
				<?php endif; ?>
                <!-- error message if any -->
                <?php print $messages; ?>
				<?php echo render($page['content']); ?>
		  </div>
	   </div>
	</div>