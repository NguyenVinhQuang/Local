function displayInput(number){
	var txt = "";
	for (var i = 0; i < number; i++) {
		txt += 		'<div class="field  " >'
		txt +=			'<div class="label">'
		txt +=				 '<label for="input-small-'+i+'">Answer '+(i+1)+':</label>'
		txt +=			'</div>'
		txt +=			'<div class="input">'
		txt +=				'<input type="text" id="input-small-'+i+'" name="txtName'+i+'" class="small" />'
		txt +=			'</div>'
		txt +=		'</div>';
	}

	obj = document.getElementById('anser_field').innerHTML = txt;
}