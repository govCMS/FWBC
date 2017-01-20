<?php
/*
 * Search Results page template
*/
?>
	<?php include('block-breadcrumb.tpl.php'); ?>
  <?php include('block-right-sidebar.tpl.php'); ?>
	<div id="leftContent">
		<div class="contentBox wide">
      <h1><?php echo $title; ?></h1>
			<div class="floatRight">
				<form id="search-filter" onsubmit="search_sort_by()">
					<input type="hidden" name="keys" value="<?php echo $_GET['keys']; ?>">
					<label for="search-filter-sortby">Sort by:</label>
					<select id="search-filter-sortby" name="sort_by">
						<option value="search_api_relevance">Relevance</option>
						<option value="created"<?php if ($_GET['sort_by'] == 'created') { echo ' SELECTED'; } ?>>Date added</option>
					</select>
					<input type="submit" value="Sort" class="btn" />
					<input type="hidden" name="sort_order" value="DESC" id="search-filter-sortorder">
				</form>
			</div>
			<div id="searchResults">
				<?php echo views_embed_view('search_view'); ?>
			</div>
		</div>
	</div>
