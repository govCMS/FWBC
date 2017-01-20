<?php
/*
 * Newsletters list page template
*/
?>
<div>
	<?php include('block-breadcrumb.tpl.php'); ?>
	<?php include('block-left-sidebar.tpl.php'); ?>
	<div class="content-box">
    <h1><?php echo $title; ?></h1>
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
</div>
