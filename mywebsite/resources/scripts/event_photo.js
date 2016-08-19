$(document).ready(function(){
	$("#all-link a").click(function(){	
		var url = $(this).attr("href");
			$.ajax({
				type: "POST",
				url: url,
				data: "ajax",
				async: true,
				success: function(kq){
					$("#content-all").html(kq);
				}
			})
			return false;
	});		
})
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
	xmlhttp.open("GET",base_url+"index.php/photo/vote/"+value+"/"+id,true);
	xmlhttp.send();
}

function confirm(id){
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
	    	document.getElementById('remove_'+id+'').innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET",base_url+"index.php/photo/confirm_remove/"+id,true);
	xmlhttp.send();
}

function cancel(id){
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
	    	document.getElementById('remove_'+id+'').innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET",base_url+"index.php/photo/cancel_remove/"+id,true);
	xmlhttp.send();	
}
function delete_img(id){
	//thuc hien load ajax va xoa anh
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
	xmlhttp.open("GET",base_url+"index.php/photo/delete/"+id,true);
	xmlhttp.send();		
	$( "#photo_"+id ).fadeOut();
}