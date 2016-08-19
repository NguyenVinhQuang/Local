/*
**************
* vb_add_childCategories
**************
*/

function displayInput(number){
	var txt = "";
	for (var i = 0; i < number; i++) {
		txt += 		'<div class="field  " >'
		txt +=			'<div class="label">'
		txt +=				 '<label for="input-small-'+i+'">Name:</label>'
		txt +=			'</div>'
		txt +=			'<div class="input">'
		txt +=				'<input type="text" id="input-small-'+i+'" name="txtName'+i+'" class="small" />'
		txt +=			'</div>'
		txt +=		'</div>';
	}

	obj = document.getElementById('input_field').innerHTML = txt;
}

function changeLable(value){
	var obj = document.getElementById('lblParent');
	obj.innerHTML = 'Parent: ' + '<span style="color:#336699; font-size:20px;">'+value+'</span>';
}

window.onload = function() {
	//lay so luong input
	var val = document.getElementById('select').value;
	//hien thi input theo so luong
	displayInput(val);

	//lay gia tri parent

	var parentName = document.getElementById('selectParent').value;
	//hien thi label theo parent
	changeLable(parentName);

};
