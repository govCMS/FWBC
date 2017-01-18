<?php
/*
 * FWBC Legal Cases list template
*/
$sw = trim($_GET['sw']);
$status = $_GET['status'];
$state = $_GET['state'];
$abreach = $_GET['abreach'];
?>
<div>
	<?php include('block-breadcrumb.tpl.php'); ?>
	<?php include('block-left-sidebar.tpl.php'); ?>

	<div class="content-box">
		<div id="leftContent" class="legal-cases-list">
			<div class="contentBox wide">
				<div class="content-block">
          <h1><?php echo $title; ?></h1>
					<?php if ($tabs): ?>
					  <div class="tabs">
						<?php print render($tabs); ?>
					  </div>
					<?php endif; ?>
					<?php echo render($page['content']); ?>
					<?php echo views_embed_view('legal_cases'); ?>
					<br /><br />
					<h2>Need more information about legal cases?</h2><p>For further information or assistance contact the FWBC Hotline on <strong>1800 003 338.</strong></p>
				</div>
				<div class="refineSearch">
					<form name="legal_cases_filter" id="legal-cases-filter">
					<h2>Refine Search</h2>
					<h3><label for="key-search">Keyword Search</label></h3>
					<p><input id="key-search" type="text" name="sw" value="<?php echo $sw; ?>"></p>
					<?php
					$filter_statuses = fwbc_get_taxonomies('status');
					if ($filter_statuses) {
					?>
					<h3>Status</h3>
					<ul>
						<li>
							<input id="status_all" type="radio" name="status-all" class="filter-all" rel="fstatus" value="true"<?php if ($status == '' || $status == 'All') { echo ' CHECKED'; } ?>>
							<label for="status_all">All</label>
						</li>
						<?php foreach ($filter_statuses as $filter_status) { $ch = ''; if ($filter_status->tid == $status) { $ch = ' CHECKED'; } ?>
							<li>
								<input id="<?php $str_id = str_replace(" ", "-", $filter_status->name); echo strtolower($str_id); ?>" type="radio" name="status" value="<?php echo $filter_status->tid; ?>" class="filter-item fstatus"<?php echo $ch; ?>>
								<label for="<?php $str_id = str_replace(" ", "-", $filter_status->name); echo strtolower($str_id); ?>"><?php echo $filter_status->name; ?></label>
							</li>
						<?php } ?>
					</ul>
					<?php } ?>

					<?php
					$filter_states = fwbc_get_taxonomies('state', 'legal_case');
					if ($filter_states) {
						$state_all = 0;
						foreach ($filter_states as $filter_state) {
							$state_all = $state_all + $filter_state->pcount;
						}
					?>
					<h3>State</h3>
					<ul>
						<li>
							<input id="state_all" name="stall" type="checkbox" class="filter-all" rel="fstate" value="true"<?php if (!$state) { echo ' CHECKED'; } ?>>
							<label for="state_all">All (<?php echo $state_all; ?>)</label>
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
					$filter_abreaches = fwbc_get_taxonomies('alleged_breach', 'legal_case');
					if ($filter_abreaches) {
						$abreach_all = 0;
						foreach ($filter_abreaches as $filter_abreach) {
							$abreach_all = $abreach_all + $filter_abreach->pcount;
						}
					?>
					<h3>Alleged breach</h3>
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
</div>
