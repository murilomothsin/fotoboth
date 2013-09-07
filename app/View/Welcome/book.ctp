<?php
	$i = 1;
	$listBook = '';
	$contentTab = '';
	$imgPath = '';
	$active = 'active';
	foreach ($albums as $album) {
		//pr($album);
		
		$imgPath = 'img/noimage.png';
		$dir = null;
		foreach ($album['Picture'] as $key => $value) {
			$dir = $value['dir'];
			if($value['is_principal'] == '1')
				$imgPath = 'img/pictures/'.$value['dir'].'/'.$value['picture_path'];
		}
		
		$listBook .= '<li class="'.$active.'"><a href="#tab'.$i.'" data-toggle="tab"><center><img src="'.$imgPath.'" alt="" style="height: 50px;"></center></a></li>';
		$contentTab .= '<div class="tab-pane '.$active.'" id="tab'.$i.'" style="height: 400px; width: 100%;">
						<div class="thumbnail">
							<img src="'.$imgPath.'" alt="" style="padding: 5px; height: 250px;">
							<center><h4>'.$album['Album']['title'].'</h4>
							<p>'.$album['Album']['description'].'<br />
								<a href="#myModal" role="button" class="btn" data-toggle="modal" onclick="getAjax('.$dir.');">Ver mais fotos</a></center>
							</p>
						</div>
					   </div>';
		$i++;
		$active = '';
	}
?>
<div style="min-height: 435px;" align="center">
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
    <button class="btn" data-dismiss="modal" aria-hidden="true" id="CloseModal" onclick="return $('#contentView').empty();">Close</button>
  </div>
</div>