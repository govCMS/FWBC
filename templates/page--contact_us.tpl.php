<?php
/*
 * Contact page template
*/
?>
<div>
	<?php include('block-breadcrumb.tpl.php'); ?>
	<?php include('block-left-sidebar.tpl.php'); ?>
	<div class="content-box">
		<div id="leftContent">
			<div class="contentBox wide">
        <h1><?php echo $title; ?></h1>
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
</div>
