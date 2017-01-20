<?php
/*
 * Fact Sheets page template
*/
?>
<div>
	<?php include('block-breadcrumb.tpl.php'); ?>
	<?php include('block-left-sidebar.tpl.php'); ?>
  <?php include('block-right-sidebar.tpl.php'); ?>
	<div class="content-box">
		<div id="leftContent" class="rights-and-responsibilities">
			<div class="contentBox">
        <h1><?php echo $title; ?></h1>
				<?php if ($tabs): ?>
				  <div class="tabs">
					<?php print render($tabs); ?>
				  </div>
				<?php endif; ?>
				<?php echo render($page['content']); ?>
				<?php
				$pnid = $variables['node']->nid;
				$landing_subpages = fwbc_get_child_pages(fwbc_get_mlid_by_nid($pnid), $pnid);
				if ($landing_subpages) {
					$total_nmb = count($landing_subpages) - 1;
					foreach($landing_subpages as $lp_nid => $lp_data) {
						$lp_node = node_load($lp_nid);
						$lp_summary = fwbc_get_post_custom($lp_node, 'body', 'summary');
						if (!strlen($lp_summary)) {
							$lp_summary = fwbc_limit_content(strip_tags(fwbc_get_post_custom($lp_node, 'body')), 200);
						}
				?>
						<h2><a href="<?php echo fwbc_page_url('node/'.$lp_nid); ?>"><?php echo $lp_data['title']; ?></a></h2>
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
		</div>
	</div>
</div>
