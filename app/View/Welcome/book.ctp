<?php
$i = 1;
$listBook = '';
$contentTab = '';
$imgPath = '';
$j = 0;
//while($j < 10){
//	$j++;
foreach ($albums as $album) {
	//pr($album['Picture']);
	$active = '';
	if($album['Album']['category_id'] != null){
		
		if(isset($album['Picture'][0]['picture_path']))
			$imgPath = 'img/pictures/'.$album['Picture'][0]['picture_path'];
		else
			$imgPath = 'img/noimage.png';

		if($i == 1)
			$active = 'active';
		$listBook .= '<li class="'.$active.'"><a href="#tab'.$i.'" data-toggle="tab"><center><img src="'.$imgPath.'" alt="" style="height: 50px;"></center></a></li>';
		$contentTab .= '<div class="tab-pane '.$active.'" id="tab'.$i.'" style="height: 400px; width: 100%;">
						<div class="thumbnail">
							<img src="'.$imgPath.'" alt="" style="padding: 5px; height: 250px;">
							<center><h4>'.$album['Album']['title'].'</h4>
							<p>'.$album['Album']['description'].'<br />
								<a href="#" class="btn" style="margin-top: 30px;">Ver mais fotos</a></center>
							</p>
						</div>
					   </div>';
	}
	$i++;
}
//}
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