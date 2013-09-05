<?php
	$i = 1;
	$listBook = '';
	$contentTab = '';
	$imgPath = '';
	$active = 'active';
	foreach ($videos as $video) {
		$listBook .= '<li class="'.$active.'"><a href="#tab'.$video['Video']['id'].'" data-toggle="tab" id="'.$video['Video']['id'].'" onclick="clickOnTab(this);"><center>'.$video['Video']['video'].'</center></a></li>';
		$contentTab .= '<div class="tab-pane '.$active.'" value="'.$video['Video']['id'].'" id="tab'.$video['Video']['id'].'" style="height: 500px; width: 100%;"></div>';
		$active = '';
	}
?>
<div style="min-height: 450px;" align="center">
	<div class="tabbable tabs-right"> <!-- Only required for left/right tabs -->
		<ul class="nav nav-tabs nav-stacked" style="width: 250px; max-height: 390px; overflow: auto;">
			<?php echo $listBook; ?>
		</ul>
		<div class="tab-content">
			<?php echo $contentTab; ?>
		</div>
	</div>
</div>

<style type="text/css">
body .modal {
	width: 75%;
	margin-left: -36%;
}
</style>
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-body" style="overflow: hidden;">
    <div id="contentView" ></div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true" id="CloseModal">Close</button>
  </div>
</div>

<script type="text/javascript">
	var contents = new Array();
	<?php
	foreach ($videos as $video) {
		echo 'contents['.$video['Video']['id'].'] = "<div class=\"tab-pane '.$active.'\" id=\"tab'.$video['Video']['id'].'\" style=\"height: 500px; width: 100%;\">
					<div class=\"thumbnail\">
					'.addslashes($video['Video']['embed']).'
					</div>
				   </div>";';
	}
	?>
	function clickOnTab(component) {
		var target = getElementById('tab'+component);
		alert(target.value);

	}
</script>