function changeBtn(value,id){
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
	    	document.getElementById('btn_vote_'+id+'').innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET",base_url+"index.php/place/button/"+value+"/"+id,true);
	xmlhttp.send();
}

function changeStatus(value,id){
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
		    	document.getElementById('btn_status_'+id+'').innerHTML=xmlhttp.responseText;
		    }
		  }
		xmlhttp.open("GET",base_url+"index.php/place/status/"+value+"/"+id,true);
		xmlhttp.send();
}

function confirm_delete(place_id){
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
		    	document.getElementById('modify-place').innerHTML=xmlhttp.responseText;
		    }
		  }
		xmlhttp.open("GET",base_url+"index.php/place/confirm_delete/"+place_id,true);
		xmlhttp.send();
}
function cancel_delete(place_id){
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
		    	document.getElementById('modify-place').innerHTML=xmlhttp.responseText;
		    }
		  }
		xmlhttp.open("GET",base_url+"index.php/place/cancel_delete/"+place_id,true);
		xmlhttp.send();
}

function delete_place(place_id){
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
		    	window.location.assign(base_url+"index.php/home");
		    }
		  }
		xmlhttp.open("GET",base_url+"index.php/place/delete/"+place_id,true);
		xmlhttp.send();
}
function remove_review(review_id){
	//thuc hien load ajax va xoa review
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
	    }
	  }
	xmlhttp.open("GET",base_url+"index.php/review/delete/"+review_id,true);
	xmlhttp.send();		
	$( "#review_"+review_id ).fadeOut();
}