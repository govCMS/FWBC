<?php
/*
 * News list page template
*/
?>
<div>
	<?php include('block-breadcrumb.tpl.php'); ?>
	<?php include('block-left-sidebar.tpl.php'); ?>
  <?php include('block-right-sidebar.tpl.php'); ?>
	<div class="content-box">
		<div id="leftContent" class="latest-news-list">
			<div class="contentBox">
        <h1><?php echo $title; ?></h1>
				<?php if ($tabs): ?>
				  <div class="tabs">
					<?php print render($tabs); ?>
				  </div>
				<?php endif; ?>
				<?php echo render($page['content']); ?>
				<?php echo views_embed_view('latest_news'); ?>
			</div>
		</div>
	</div>
</div>
