<?php
/*
 * Main page template
*/
?>
	<?php include('block-breadcrumb.tpl.php'); ?>
	<?php include('block-left-sidebar.tpl.php'); ?>
	<div class="content-box">
		<div class="headingBox">
			<div class="corner"></div>
			<h1><span><?php echo date('d F Y', $variables['node']->created); ?></span><?php echo $title; ?></h1>
			<img src="<?php theme_url(); ?>/images/page_image_4.jpg" alt="<?php echo $title; ?>" width="685" height="158" />
		</div>
		<div id="leftContent">
			<div class="contentBox">
				<div class="post-single">
					<?php if ($tabs): ?>
					  <div class="tabs">
						<?php print render($tabs); ?>
					  </div>
					<?php endif; ?>
					<?php print render($page['content']); ?>
				</div>
			</div>
			<?php include('block-right-sidebar.tpl.php'); ?>
		</div>
	</div>
