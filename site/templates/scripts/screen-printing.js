
function filmcalc (way) {
    var num2 = parseFloat(document.film.height.value);
	var num1 = 0;
	switch(way) {
		case 1:
			if (num2 < 10.64) { num2 = 10.64; }
			num1 = (num2 * 0.94) + 15;
			break;
		case 2:
			if (num2 < 8.78) { num2 = 8.78; }
			num1 = (num2 * 1.14) + 15;
			break;
		case 3:
			if (num2 < 6.22) { num2 = 6.22; }
			num1 = (num2 * 1.61) + 15;
			break;
		case 4:
			if (num2 < 4.14) { num2 = 4.14; }
			num1 = (num2 * 2.42) + 15;
			break;
		case 5:
			if (num2 < 3.55) { num2 = 3.55; }
			num1 = (num2 * 2.82) + 15;
			break;
	}
	document.film.price.value = num1.toFixed(2);
	



}

function resetvalue() {
	document.film.price.value = "";
}

function meshcalc (way) {
	var height = parseFloat(document.mesh.height.value);
	var width = parseFloat(document.mesh.width.value);
	var decimal = '.0'+way;
	
	var num1 = ((width + 3)*(height + 3))*parseFloat(decimal);
	
	document.mesh.price.value=num1.toFixed(2);
}
