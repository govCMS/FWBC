<?php
/*
 * No Permit list template
*/
$sw = trim($_GET['sw']);
$state = $_GET['state'];
$union = $_GET['union'];
?>
<?php if (isset($page['top_information_banner']) && !empty($page['top_information_banner'])) {
  print render($page['top_information_banner']);
} ?>
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
					<?php echo views_embed_view('no_permit'); ?>
					<p>&nbsp;</p>
					<p>This information was obtained by reference to annual returns filed with the Fair Work Commission, websites of relevant building associations and the <a href="http://www.fwc.gov.au/index.cfm?pagename=entryfwfind" title="Fair Work Commission website">Fair Work Commission website</a>.  The <a href="http://www.fwc.gov.au/index.cfm?pagename=entryfwfind" title="Fair Work Commission website">Fair Work Commission website</a> enables you to check if a union official holds a valid entry permit.</p>

					<p>FWBC obtained this information for the purposes of carrying out its functions to the industry under section 10 of the Fair Work (Building Industry) Act 2012, including:</p>
					<ul>
						<li>Providing education, assistance and advice</li>
						<li>Promoting and monitoring compliance with designated building laws</li>
						<li>Promoting productive workplaces in the building industry</li>
					</ul>
					<p>See the <a href="http://www.fwbc.gov.au/right-of-entry">Right of entry</a> section for more information about your rights and responsibilities.</p>
					<p>If you believe your name should not appear on the above list, please <a href="http://www.fwbc.gov.au/contact-us/">contact FWBC</a>.</p>
				</div>
				<div class="refineSearch">
					<form name="legal_cases_filter" id="legal-cases-filter">
						<h2>Refine Search</h2>
						<h3><label for="key-search">Keyword Search</label></h3>
						<p><input id="key-search" type="text" name="sw" value="<?php echo $sw; ?>"></p>
						<?php
						$filter_states = fwbc_get_taxonomies('state_no_permit', 'no_permit');
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
						$filter_unions = fwbc_get_taxonomies('union_no_permit', 'no_permit');
						if ($filter_unions) {
							$union_all = 0;
							foreach ($filter_unions as $filter_union) {
								$union_all = $union_all + $filter_union->pcount;
							}
						?>
						<h3>Union</h3>
						<ul>
							<li>
								<input id="union-all" name="uall" type="checkbox" class="filter-all" rel="funion" value="true"<?php if (!$union) { echo ' CHECKED'; } ?>>
								<label for="union-all">All (<?php echo $union_all; ?>)</label>
							</li>
							<?php foreach ($filter_unions as $filter_union) {
								$ch = ''; if (is_array($union) && in_array($filter_union->tid, $union)) { $ch = ' CHECKED'; }
								$dz = ''; if ($filter_union->pcount == 0) { $dz = ' disabled'; }
							?>
							<li>
								<input  id="<?php $str_id = str_replace(" ", "-", $filter_union->name); echo strtolower($str_id); ?>" name="union[]" type="checkbox" value="<?php echo $filter_union->tid; ?>" class="filter-item funion"<?php echo $ch.$dz; ?>>
								<label for="<?php $str_id = str_replace(" ", "-", $filter_union->name); echo strtolower($str_id); ?>"><?php echo $filter_union->name; ?> (<?php echo $filter_union->pcount; ?>)</label>
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
