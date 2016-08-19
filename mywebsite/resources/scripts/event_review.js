$(document).ready(function(){
    $('textarea').autosize();   
});

function changeBg(value){
	var obj = document.getElementById('star');
	var des = document.getElementById('ratingDescription');
	if (value == 1) {
		obj.style.backgroundPosition = "0 -36px";
		des.innerHTML = "Eek! Methinks not." ;
	}
	else if (value ==2) {
		obj.style.backgroundPosition = "0 -72px";
		des.innerHTML = "Meh. I've experienced better." ;
	}
		else if (value ==3) {
			obj.style.backgroundPosition = "0 -108px";
			des.innerHTML = "A-OK." ;
		}
			else if (value ==4) {
				obj.style.backgroundPosition = "0 -144px";	
				des.innerHTML = "Yay! I'm a fan." ;
			}
				else if (value ==5) {
					obj.style.backgroundPosition = "0 -180px";	
					des.innerHTML = "Woohoo! As good as it gets!" ;
				}
}
function returnBg(){
	var obj = document.getElementsByName('rating');
	var star = document.getElementById('star');
	var des = document.getElementById('ratingDescription');
	var ck = false;
	for (var i = 0; i < obj.length; i++) {
		if (obj[i].checked == true) {
			changeBg(obj[i].value);
			ck = true;
			break;
		};
		if (ck == false) {
			des.innerHTML = "Roll over stars, then click to rate." ;
			star.style.backgroundPosition = "0 0";

		};
	};
}