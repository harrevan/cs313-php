function prob1() {
   alert("You have clicked me!");
}

function changeColor(color){
	document.getElementById('div1').style.backgroundColor = color;
}

$("changeColor").click(function(){
	$("div1").hide();
}