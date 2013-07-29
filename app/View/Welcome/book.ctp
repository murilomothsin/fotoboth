<?php
$i = 1;
$listBook = '';
$contentTab = '';
foreach ($albums as $album) {
	//pr($album);
	$active = '';
	if($album['Album']['category_id'] != null){
		if($i == 1)
			$active = 'active';
		$listBook .= '<li class="'.$active.'"><a href="#tab'.$i.'" data-toggle="tab">'.$album['Album']['title'].'</a></li>';
		$contentTab .= '<div class="tab-pane '.$active.'" id="tab'.$i.'" style="height: 400px; width: 100%;">
						<div class="thumbnail">
							<img src="img/example/021.jpg" alt="" style="height: 250px;">
							<h4>'.$album['Album']['title'].'</h4>
							<p>'.$album['Album']['description'].'
								<center><a href="#" class="btn">Ver mais fotos</a></center>
							</p>
						</div>
					   </div>';
	}
	$i++;
}
?>

<div class="tabbable tabs-right"> <!-- Only required for left/right tabs -->
	<ul class="nav nav-tabs nav-stacked" style="width: 210px; height: 390px; overflow: auto;">
		<?php echo $listBook; ?>
	</ul>
	<div class="tab-content">
		<?php echo $contentTab; ?>
	</div>
</div>