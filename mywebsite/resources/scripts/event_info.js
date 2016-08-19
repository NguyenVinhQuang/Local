	function getValue(id){
	var base_url = 'http://localhost/mywebsite/';
	if (id=="")
	  {
	  document.getElementById("displayInfo").innerHTML="";
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
	    	document.getElementById("displayInfo").innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET",base_url+"index.php/info/delete/"+id,true);
	xmlhttp.send();
}

function confirmDelete(id){
	var base_url = 'http://localhost/mywebsite/';
	if (id=="")
	  {
	  document.getElementById(id).innerHTML="";
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
	    	document.getElementById(id).innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET",base_url+"index.php/info/confirmDelete/"+id,true);
	xmlhttp.send();
}

function returnDelete(id){
	var base_url = 'http://localhost/mywebsite/';
	if (id=="")
	  {
	  document.getElementById(id).innerHTML="";
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
	    	document.getElementById(id).innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET",base_url+"index.php/info/returnDelete/"+id,true);
	xmlhttp.send();
}

function loadEdit(id){
	var base_url = 'http://localhost/mywebsite/';
	window.location.assign(base_url+'index.php/info/displayEdit/'+id);
}
function displayAnswer(id){
	var mul = document.getElementById('answerMultichoices');
	if(id.toLowerCase() == 'mc' ){
		mul.style.display="block";
	}
	else{
		mul.style.display="none";
	}
}
function submitValue(id,value){
	document.getElementById(id).setAttribute("value",value);
}
function showMore(count){
	var dem = count;
	var countplus = ++count;
	var obj = document.getElementById('more');
	obj.innerHTML += '<div class="field"><div class="label"><label for="answer'+dem+'">Answer '+dem+':</label></div><div class="input"><input type="text" id="answer'+dem+'" name="txtAnswer'+dem+'" class="small" onkeyup="submitValue(this.id,this.value);"/><input type="hidden" id="" name="txtHide'+dem+'" value=""/></div></div>';
	var btn = document.getElementById('btnshowmore').value=countplus;
	var btnHide = document.getElementById('btnHide').value = countplus;
}
