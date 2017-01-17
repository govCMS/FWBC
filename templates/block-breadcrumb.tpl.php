	<div id="breadCrumbs">
		<div class="breadcrumbs-list">
			<div class="breadcrumbs-list-title">You are here: </div>
			<ul class="breadcrumbs-list-links">
				<li><a href="<?php echo fwbc_home_url(); ?>">Home</a></li>
				<?php
				//$node_parents = get_node_parents($node->nid, $node->type);
				$node_parents = fwbc_get_node_parents($node->nid);
				if ($node_parents) {
					foreach($node_parents as $npid => $nptitle) {
						echo '<li><a href="'.fwbc_page_url('node/'.$npid).'">'.$nptitle.'</a></li>';
					}
				}
				echo '<li>'.$title.'</li>';
				?>
				<!-- <?php print_r($node_parents); ?> -->
			</ul>
		</div>
		<div id="pageTools">
			<!-- AddThis Button BEGIN -->
			<div class="addthis_toolbox addthis_default_style"><a class="addthis_button_compact"></a></div>
			<script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50ac4079486b648f"></script>
			<!-- AddThis Button END -->
			<a id="printBtn" href="javascript:window.print();" title="Print"><img src="<?php fwbc_theme_url(); ?>/images/assets/printer.png" alt="Print" width="16" height="16" /><span class="hidden">Print</span></a>
			<a id="smallTextIcon" class="selected" href="#" title="Text Normal"><img src="<?php fwbc_theme_url(); ?>/images/assets/text-normal.png" alt="Text Normal" width="auto" height="20" /><span class="hidden">Text Normal</span></a>
			<a id="mediumTextIcon" href="#" title="Text Large"><img src="<?php fwbc_theme_url(); ?>/images/assets/text-medium.png" alt="Text Large" width="auto" height="20" /><span class="hidden">Text Large</span></a>
			<a id="bigTextIcon" href="#" title="Text Larger" ><img src="<?php fwbc_theme_url(); ?>/images/assets/text-large.png" alt="Text Larger" width="auto" height="20" /><span class="hidden">Text Larger</span></a>
		</div>
	</div>
