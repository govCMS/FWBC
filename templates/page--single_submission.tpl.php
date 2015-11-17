<?php
/*
 * Single Submission page template
*/
?>
	<?php include('block-breadcrumb.tpl.php'); ?>
	<?php include('block-left-sidebar.tpl.php'); ?>
	<div class="content-box">
		<div id="leftContent">
			<div class="contentBox">
				<h1><?php echo $title; ?></h1>
				<?php if ($tabs): ?>
				  <div class="tabs">
					<?php print render($tabs); ?>
				  </div>
				<?php endif; ?>
				<?php print render($page['content']); ?>
			</div>
			<?php include('block-right-sidebar.tpl.php'); ?>
		</div>
	</div>