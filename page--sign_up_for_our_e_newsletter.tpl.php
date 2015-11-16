<?php
/*
 * Main page template
*/
?>
	<?php include('block-breadcrumb.tpl.php'); ?>
	<?php include('block-left-sidebar.tpl.php'); ?>
	<div class="content-box">
		<div id="leftContent">
			<div id="sign-up-newsletter-page" class="contentBox">
				<h1><?php echo $title; ?></h1>
				<?php
				if ($_SESSION['newsletter_signup_action'] == 'success') {
					$webform_node = $variables['node'];
					echo '<p>'.$webform_node->webform['confirmation'].'</p>';
					$_SESSION['newsletter_signup_action'] = '';
				} else {
					echo render($page['content']);
				} ?>
			</div>
			<?php include('block-right-sidebar.tpl.php'); ?>
		</div>
	</div>
