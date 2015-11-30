<?php
/*
 * Search Results page template
*/
?>
	<?php include('block-breadcrumb.tpl.php'); ?>
	<div class="headingBox fullWidth">
		<div class="corner"></div>
		<h1><?php echo $title; ?></h1>
		<img src="<?php theme_url(); ?>/images/page_image_6.jpg" alt="<?php echo $title; ?>" width="927" height="95" />
	</div>

	<div id="leftContent">
		<div class="contentBox wide">
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
		<?php include('block-right-sidebar.tpl.php'); ?>
	</div>
