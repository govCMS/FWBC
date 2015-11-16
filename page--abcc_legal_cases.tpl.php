<?php
/*
 * ABCC Legal Cases list template
*/
$sw = trim($_GET['sw']);
$status = $_GET['status'];
$state = $_GET['state'];
$abreach = $_GET['abreach'];
?>
	<?php include('block-breadcrumb.tpl.php'); ?>
	<?php include('block-left-sidebar.tpl.php'); ?>
	<div class="content-box">
		<div class="headingBox">
			<div class="corner"></div>
			<h1><?php echo $title; ?></h1>
			<img src="<?php theme_url(); ?>/images/page_image_4.jpg" alt="<?php echo $title; ?>" width="685" height="158" />
		</div>
		<div id="leftContent" class="legal-cases-list">
			<div class="contentBox wide">
				<div class="content-block">
					<?php if ($tabs): ?>
					  <div class="tabs">
						<?php print render($tabs); ?>
					  </div>
					<?php endif; ?>
					<?php echo render($page['content']); ?>
					<?php echo views_embed_view('abcc_legal_cases'); ?>
					<br /><br />
					<h2>Need more information about legal cases?</h2><p>For further information or assistance contact the FWBC Hotline on <strong>1800 003 338.</strong></p>
				</div>
				<div class="refineSearch">
					<form name="legal_cases_filter" id="legal-cases-filter">
					<h2>Refine Search</h2>
					<h3><label for="key-search">Keyword Search</label></h3>
					<p><input id="key-search" type="text" name="sw" value="<?php echo $sw; ?>"></p>

					<?php
					$filter_states = get_taxonomies('state', 'abcc_legal_case');
					if ($filter_states) {
						$state_all = 0;
						foreach ($filter_states as $filter_state) {
							$state_all = $state_all + $filter_state->pcount;
						}
					?>
					<h3>State</h3>
					<ul>
						<li>
							<input id="state-all" name="stall" type="checkbox" class="filter-all" rel="fstate" value="true"<?php if (!$state) { echo ' CHECKED'; } ?>> 
							<label for="state-all">All (<?php echo $state_all; ?>)</label>
						</li>
						<?php foreach ($filter_states as $filter_state) {
							$ch = ''; if (is_array($state) && in_array($filter_state->tid, $state)) { $ch = ' CHECKED'; }
							$dz = ''; if ($filter_state->pcount == 0) { $dz = ' disabled'; }
						?>
							<li>
								<input id="<?php $str_id = str_replace(" ", "-", $filter_state->name); echo strtolower($str_id); ?>" name="state[]" type="checkbox" value="<?php echo $filter_state->tid; ?>" class="filter-item fstate"<?php echo $ch.$dz; ?>> 
								<label for="<?php $str_id = str_replace(" ", "-", $filter_state->name); echo strtolower($str_id); ?>"><?php echo $filter_state->name; ?> (<?php echo $filter_state->pcount; ?>)</label>
							</li>
						<?php } ?>
					</ul>
					<?php } ?>

					<?php
					$filter_abreaches = get_taxonomies('alleged_breach', 'abcc_legal_case');
					if ($filter_abreaches) {
						$abreach_all = 0;
						foreach ($filter_abreaches as $filter_abreach) {
							$abreach_all = $abreach_all + $filter_abreach->pcount;
						}
					?>
					<h3>Breach</h3>
					<ul>
						<li>
							<input id="breach-all" name="alall" type="checkbox" class="filter-all" rel="fabreach" value="true"<?php if (!$abreach) { echo ' CHECKED'; } ?>> 
							<label for="breach-all">All (<?php echo $abreach_all; ?>)</label>
						</li>
						<?php foreach ($filter_abreaches as $filter_abreach) {
							$ch = ''; if (is_array($abreach) && in_array($filter_abreach->tid, $abreach)) { $ch = ' CHECKED'; }
							$dz = ''; if ($filter_abreach->pcount == 0) { $dz = ' disabled'; }
						?>
						<li>
							<input id="<?php $str_id = str_replace(" ", "-", $filter_abreach->name); echo strtolower($str_id); ?>" name="abreach[]" type="checkbox" value="<?php echo $filter_abreach->tid; ?>" class="filter-item fabreach"<?php echo $ch.$dz; ?>> 
							<label for="<?php $str_id = str_replace(" ", "-", $filter_abreach->name); echo strtolower($str_id); ?>"><?php echo $filter_abreach->name; ?> (<?php echo $filter_abreach->pcount; ?>)</label>
						</li>
						<?php } ?>
					</ul>
					<?php } ?>

					<p><a href="#update" class="button" id="update-results" rel="legal-cases-filter">Update results</a></p>
					<p><a href="#reset" id="reset-selection" rel="legal-cases-filter">Reset Selection</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>
