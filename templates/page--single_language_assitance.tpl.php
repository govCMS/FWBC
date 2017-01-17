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
		<div id="leftContent">
			<div class="contentBox">
				<?php $la_node = node_load(theme_get_setting('fwbc_language_assitance_page')); ?>
				<h1><?php echo $la_node->title; ?></h1>
				<h2><?php echo $title; ?></h2>
				<?php if ($tabs): ?>
				  <div class="tabs">
					<?php print render($tabs); ?>
				  </div>
				<?php endif; ?>
				<?php echo render($page['content']); ?>
			</div>
			
		</div>
	</div>
</div>
