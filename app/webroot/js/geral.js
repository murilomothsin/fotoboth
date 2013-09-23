!function ($) {
	$(function(){
		$('#myCarousel').carousel()

		$('#lojaCarousel').carousel({
			interval: 10000
		})
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