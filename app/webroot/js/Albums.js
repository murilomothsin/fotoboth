
var i = 1;

function addImage(){
	var input = new String();
	input = "<div class=\"input text\"><label for=\"Picture"+i+"Title\">Title</label><input name=\"data[Picture]["+i+"][title]\" class=\"input-xlarge\" placeholder=\"Título da foto\" maxlength=\"50\" type=\"text\" id=\"Picture"+i+"Title\"></div><div class=\"input file\"><label for=\"Picture"+i+"Img\">Img</label><input type=\"file\" name=\"data[Picture]["+i+"][Img]\" id=\"Picture"+i+"Img\" onChange=\"ImagePreview("+i+")\"></div>";
	$('#contentPictures').append(input);
	i++;
}