<?php
/*
 * Fact Sheets page template
*/
?>
	<?php include('block-breadcrumb.tpl.php'); ?>
	<?php include('block-left-sidebar.tpl.php'); ?>
	<div class="content-box">
		<div class="headingBox">
			<div class="corner"></div>
			<h1><?php echo $title; ?></h1>
			<img src="<?php theme_url(); ?>/images/page_image_3.jpg" alt="<?php echo $title; ?>" width="685" height="158" />
		</div>
		<div id="leftContent" class="rights-and-responsibilities">
			<div class="contentBox">
				<?php if ($tabs): ?>
				  <div class="tabs">
					<?php print render($tabs); ?>
				  </div>
				<?php endif; ?>
				<?php echo render($page['content']); ?>
				<?php
				$pnid = $variables['node']->nid;
				$landing_subpages = get_child_pages(get_mlid_by_nid($pnid), $pnid);
				if ($landing_subpages) {
					$total_nmb = count($landing_subpages) - 1;
					foreach($landing_subpages as $lp_nid => $lp_data) {
						$lp_node = node_load($lp_nid);
						$lp_summary = get_post_custom($lp_node, 'body', 'summary');
						if (!strlen($lp_summary)) {
							$lp_summary = limit_content(strip_tags(get_post_custom($lp_node, 'body')), 200);
						}
				?>
						<h3><a href="<?php echo page_url('node/'.$lp_nid); ?>"><?php echo $lp_data['title']; ?></a></h3>
						<p><?php echo $lp_summary; ?></p>
						<?php if ($total_nmb > 0) { ?><div class="line">&nbsp;</div><?php } ?>
				<?php
						$total_nmb--;
					}
				}
				?>
				<?php
				$node = node_load($pnid);
				$values = field_get_items('node', $node, 'field_bottom_content');
				if ($values != FALSE) {
				  echo $values[0]['value'];
				}
				else {
				  // no result
				}
				?>
			</div>
			<?php include('block-right-sidebar.tpl.php'); ?>
		</div>
	</div>
