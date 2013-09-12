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