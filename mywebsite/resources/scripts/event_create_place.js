var dem;
function rmv(count){
	var childNode = document.getElementById("new-cate-"+count+"");
	var txtdem = document.getElementById('txtdem');
	var obj = document.getElementById('btn-add-category');
	childNode.parentNode.removeChild(childNode);
	dem = txtdem.value;
	--dem;
	txtdem.value=dem;
	if (dem < 3 ) {obj.style.visibility = 'visible'};
}

function rmvHours(count){
	var childNode = document.getElementById("hours-"+count+"");
	childNode.parentNode.removeChild(childNode);
}
function displayChild(id,count){
	var x = document.getElementById('sl-parent-'+count+'').selectedIndex;
	var y = document.getElementById('sl-parent-'+count+'').options;
	y[x].setAttribute("selected",'selected');

	var child = document.getElementById('child-cate-'+count+'');
	var base_url = 'http://localhost/mywebsite/';
	if (id=="")
	  {
	  document.getElementById('child-cate-1').innerHTML="";
	  return;
	  } 
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    	document.getElementById('child-cate-'+count+'').innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET",base_url+"index.php/place/displaySelectChild/"+id+"/"+count,true);
	xmlhttp.send();
}

function addCategory(count){
	dem = document.getElementById('txtdem').value;
	++dem;
	document.getElementById('txtdem').value = dem;
	countplus = ++count;
	var obj = document.getElementById('btn-add-category');
	obj.value = countplus;
	var txtcount = document.getElementById('txtCount');
	txtcount.value= countplus;
	if (dem >= 3) {obj.style.visibility = 'hidden';}
	var base_url = 'http://localhost/mywebsite/';
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    	document.getElementById('add-new').innerHTML+=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET",base_url+"index.php/place/addChildCategory/"+countplus,true);
	xmlhttp.send();
}

function submitSelectChild(count){
	var x = document.getElementById('sl-child-'+count+'').selectedIndex;
	var y = document.getElementById('sl-child-'+count+'').options;
	y[x].setAttribute("selected",'selected');
}
function addHours(count){
	var x = document.getElementById('sl-weekday').selectedIndex;
	var y = document.getElementById('sl-weekday').options;
	var weekday = y[x].text;
	x = document.getElementById('sl-hours-start').selectedIndex;
	y = document.getElementById('sl-hours-start').options;
	var start = y[x].text;
	x = document.getElementById('sl-hours-end').selectedIndex;
	y = document.getElementById('sl-hours-end').options;
	var end = y[x].text;
	var obj = document.getElementById('btn-add-hours');
	var countplus = ++count;
	obj.value = countplus;
	var base_url = 'http://localhost/mywebsite/';

	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    	document.getElementById('add-hours').innerHTML+=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET",base_url+"index.php/place/addHours/"+weekday+"/"+start+"/"+end+"/"+count,true);
	xmlhttp.send();
}