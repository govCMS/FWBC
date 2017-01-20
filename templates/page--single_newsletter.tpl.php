<?php
/*
 * Main page template
*/
?>
<div>
	<?php include('block-breadcrumb.tpl.php'); ?>
	<?php include('block-left-sidebar.tpl.php'); ?>
  <?php include('block-right-sidebar.tpl.php'); ?>
	<div class="content-box">
		<?php
		$parent_node = node_load(fwbc_get_nid_by_mlid($node->book['plid']));
		?>
		<div id="leftContent">
			<div class="contentBox">
        <h1><span><?php echo fwbc_get_post_custom($parent_node, 'field_subtitle'); ?></span>Industry Update</h1>
				<?php if ($tabs): ?>
				  <div class="tabs">
					<?php print render($tabs); ?>
				  </div>
				<?php endif; ?>
				<?php print render($page['content']); ?>
				<p><a class="button" href="<?php echo fwbc_page_url('node/'.$parent_node->nid); ?>">Return to newsletters</a></p>
			</div>
		</div>
	</div>
</div>
