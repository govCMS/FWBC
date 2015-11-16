<?php
/*
 * Main page template
*/
?>
	<?php include('block-breadcrumb.tpl.php'); ?>
	<?php include('block-left-sidebar.tpl.php'); ?>
	<div class="content-box">
		<?php
		$parent_node = node_load(get_nid_by_mlid($node->book['plid']));
		?>
		<div class="headingBox">
			<div class="corner"></div>
			<h1><span><?php echo get_post_custom($parent_node, 'field_subtitle'); ?></span>Industry Update</h1>
			<img src="<?php theme_url(); ?>/images/page_image_4.jpg" alt="<?php echo get_post_custom($parent_node, 'field_subtitle'); ?> Industry Update" width="685" height="158" />
		</div>
		<div id="leftContent">
			<div class="contentBox">
				<?php if ($tabs): ?>
				  <div class="tabs">
					<?php print render($tabs); ?>
				  </div>
				<?php endif; ?>
				<?php print render($page['content']); ?>
				<p><a class="button" href="<?php echo page_url('node/'.$parent_node->nid); ?>">Return to newsletters</a></p>
			</div>
			<?php include('block-right-sidebar.tpl.php'); ?>
		</div>
	</div>
