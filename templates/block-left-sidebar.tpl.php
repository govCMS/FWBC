	<div class="box" id="subNav">
		<?php
		$curr_nid = $node->nid;
		$root_title = $node->title;
		$node_book = @$node->book;
		$node_type = $node->type;
		$child_pages = array();
    $root_url = $node->url;

		$list_page = get_list_page($node_type);
		if ($list_page) {
			$curr_nid = $list_page;
			$node_data = node_load($curr_nid);
			$node_book = $node_data->book;
			$root_title = $node_data->title;
      $root_url = $node_data->url;
		}
		if ($node_book) {
			$parent_mlid = $node_book['p1'];
			if ($parent_mlid != $node_book['mlid']) {
				$parent_nid = get_nid_by_mlid($parent_mlid);
				$parent_data = node_load($parent_nid);
				$root_title = $parent_data->title;
        $root_url = drupal_get_path_alias($parent_data->book['link_path']);
			}
			$child_pages = get_child_pages($parent_mlid, $parent_nid);
		}
    $grampa = array_values($child_pages)[0]['parent'];
		?>
    
    <h2><a href="<?php echo $root_url; ?>"><?php echo $root_title; ?></a></h2>
    <div class="corner"></div>
    
		<?php if (count($child_pages)) { ?>
    <ul <?php if (empty($grampa)) { echo ' class="top-level-selected"'; } ?>>
			<?php
			// first level
			foreach($child_pages as $first_nid => $first_data) {
				$s = '';
				if ($curr_nid == $first_nid) {
					$s = ' class="selected "';
				} else if (count($first_data['childs'])) {
					foreach($first_data['childs'] as $second_nid => $second_data) {
						if ($curr_nid == $second_nid) {
							$s = ' class="selected parent"';
						} else if (count($second_data['childs'])) {
							foreach($second_data['childs'] as $third_nid => $third_data) {
								if ($curr_nid == $third_nid) {
									$s = ' class="selected parent"';
								}
							}
						}
					}
				}
			?>
    
			<li<?php echo $s; ?>><a href="<?php echo page_url('node/'.$first_nid); ?>"><span></span><?php echo $first_data['title']; ?></a>
				<?php if (count($first_data['childs'])) { ?>
				<ul class="secondLevel">
					<?php
					// second level
					foreach($first_data['childs'] as $second_nid => $second_data) {
						$s = '';
						if ($curr_nid == $second_nid) {
							$s = ' class="selected"';
						} else if (count($second_data['childs'])) {
							foreach($second_data['childs'] as $third_nid => $third_data) {
								if ($curr_nid == $third_nid) {
									$s = ' class="selected parent"';
								}
							}
						}
					?>
					<li<?php echo $s; ?>><a href="<?php echo page_url('node/'.$second_nid); ?>"><span></span><?php echo $second_data['title']; ?></a>
						<?php if (count($second_data['childs'])) { ?>
						<ul class="thirdLevel">
							<?php
							// third level
							foreach($second_data['childs'] as $third_nid => $third_data) {
								$s = '';
								if ($curr_nid == $third_nid) { $s = ' class="selected"'; }
								//echo '<pre>'; var_dump($third_data['childs']); echo '</pre>';
							?>
							<li<?php echo $s; ?>><a href="<?php echo page_url('node/'.$third_nid); ?>"><span></span><?php echo $third_data['title']; ?></a>
								<?php if (count($third_data['childs'])): ?>
									<ul class="forthLevel">
										<?php
										// third level
										foreach($third_data['childs'] as $forth_nid => $forth_data) {
											$s = '';
											if ($curr_nid == $forth_nid) { $s = ' class="selected"'; }
											?>
											<li<?php echo $s; ?>><a href="<?php echo page_url('node/'.$forth_nid); ?>"><span></span><?php echo $forth_data['title']; ?></a></li>
										<?php } // foreach($third_data['childs'] as $forth_nid => $forth_data) { ?>
									</ul>
								<?php endif; ?>
							</li>
							<?php } // foreach($second_data['childs'] as $third_nid => $third_data) { ?>
						</ul>
						<?php } // if (count($second_data['childs'])) { ?>
					</li>
					<?php } // foreach($first_data['childs'] as $second_nid => $second_data) { ?>
				</ul>
				<?php } // if (count($first_data['childs'])) { ?>
			</li>
			<?php } // foreach($child_pages as $first_nid => $first_data) { ?>
		</ul>
		<?php } // if (count($child_pages)) { ?>
	</div>