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
        <h1 class="post-title"><?php echo $title; ?></h1>
        <span class="post-date"><?php echo date('d F Y', $variables['node']->created); ?></span>
				<div class="post-single">
					<?php if ($tabs): ?>
					  <div class="tabs">
						<?php print render($tabs); ?>
					  </div>
					<?php endif; ?>
					<?php print render($page['content']); ?>
				</div>
			</div>
		</div>
	</div>
</div>
