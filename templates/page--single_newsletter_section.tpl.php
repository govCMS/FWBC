<?php
/*
 * Newsletter Section page template
*/
$node_data = $variables['node'];
?>
	<?php include('block-breadcrumb.tpl.php'); ?>
	<?php include('block-left-sidebar.tpl.php'); ?>
	<div class="content-box">
		<div id="newsletterContent">
			<div class="newsletterHeadingBox">
				<div class="social"><a href="http://www.facebook.com/share.php?u=<?php echo page_url('node/'.$node_data->nid); ?>&t=<?php echo urlencode($node_data->title); ?>" target="_blank"><img src="<?php theme_url(); ?>/images/facebook.png" width="16" height="16" alt="facebook button" /></a> <a href="http://twitter.com/share?url=<?php echo page_url('node/'.$node_data->nid); ?>&title=<?php echo urlencode($node_data->title); ?>" target="_blank"><img src="<?php theme_url(); ?>/images/twitter.png" width="16" height="16" alt="twitter button" /></a> <a href="http://www.addthis.com/bookmark.php" class="addthis_button_email"><img src="<?php theme_url(); ?>/images/email.png" width="16" height="16" alt="Email Button"></a></div>
				<img src="<?php theme_url(); ?>/images/industry_update.jpg" alt="Industry Update" width="685" height="125" />
				<h1>Industry <br />Update</h1>
			</div>
			<a name="top"></a>
			<?php if ($tabs): ?>
			  <div class="tabs">
				<?php print render($tabs); ?>
			  </div>
			<?php endif; ?>
			<?php echo render($page['content']); ?>
		</div>
	</div>
