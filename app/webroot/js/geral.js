!function ($) {
	$(function(){
		// carousel demo
		$('#myCarousel').carousel()
	})
}(window.jQuery)

$( "#CloseModal" ).click(function() {
	$( '#contentView' ).empty();
});




function getAjax(id){
	$.get("/fotoboth/welcomes/ajax/"+id, 
			null, 
			function(data) {
				$("#contentView").html(data); 
			} 
		);
}

/*
function getAjax(id){
	div = '#contentView';
	$.ajax({
		type: 'POST',
		url: 'files/ajax/albums.php',
		data: 'id='+id,
		cache: false,
		beforeSend: function(){				
			$(div).html('<center><img src="img/load.gif" /></center>');
		},
		success: function(txt){
			//alert(txt);
			$(div).html(txt);
			
		},
		error: function(){
			$(div).html('Não foi possível carregar!');
		}
	});
} */