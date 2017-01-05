<?php
$right_sidebar_widgets = $variables["page"]["sidebar_second"];
$fid = theme_get_setting('fwbc_newsletter_signup_form'); // newsletter sign up form ID
?>
<?php if (isset($variables["page"]["sidebar_second"]) && !empty($right_sidebar_widgets)): ?>
<div id="rightContent">
	<?php if ($right_sidebar_widgets) {
		foreach($right_sidebar_widgets as $right_sidebar_widget) {
			if ($right_sidebar_widget["#block"]->delta) {
				if ($right_sidebar_widget["#block"]->delta == 'client-block-'.$fid) {
	?>
				<div id="newsletter-signup-box" class="box">
					<div class="corner"></div>
					<?php $signup_newsletter_block = _block_render_blocks(array(block_load('webform', 'client-block-'.$fid))); ?>
					<h2><?php echo $signup_newsletter_block['webform_client-block-'.$fid]->subject; ?></h2>
					<?php
					if ($_SESSION['newsletter_signup_action'] == 'success') {
						$webform_node = node_load($fid);
						echo '<p>'.$webform_node->webform['confirmation'].'</p>';
						$_SESSION['newsletter_signup_action'] = '';
					} else {
						echo render($signup_newsletter_block['webform_client-block-'.$fid]->content);
					} ?>
				</div>
	<?php		} else { ?>
				<div class="box">
					<div class="corner"></div>
					<h2><?php echo $right_sidebar_widget["#block"]->title; ?></h2>
					<?php echo $right_sidebar_widget["#markup"]; ?>
					<?php if ($right_sidebar_widget["#block"]->title == 'QUESTIONS') { ?><a class="button" href="<?php echo page_url('faqs'); ?>">More FAQs</a><?php } ?>
				</div>
	<?php
				}
			}
		}
	}
	?>
</div>
<?php endif; ?>
