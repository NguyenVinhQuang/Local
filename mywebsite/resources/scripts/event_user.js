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


function change_level(id,level){
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
	    	document.getElementById('set-level').innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET",base_url+"index.php/user/change_level/"+level+"/"+id,true);
	xmlhttp.send();
}