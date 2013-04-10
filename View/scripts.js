function load_page(page, div)
{
	var request ;
	if(window.XMLHttpRequest)
	{
		request = new XMLHttpRequest() ;
	}
	else
	{
		request = new ActiveXObject(Microsoft.XMLHTTP) ;
	}
	request.open("GET", page, true) ;
	request.send() ;
	request.onreadystatechange = function()
	{
		if(request.readyState == 4 && request.status == 200)
		{
			document.getElementById(div).innerHTML = request.responseText ;
		}
	}
}

function load_page_get(page, div, args)
{
	var request ;
	if(window.XMLHttpRequest)
	{
		request = new XMLHttpRequest() ;
	}
	else
	{
		request = new ActiveXObject(Microsoft.XMLHTTP) ;
	}
	request.open("GET", page+"?"+args, true) ;
	request.send() ;
	request.onreadystatechange = function()
	{
		if(request.readyState == 4 && request.status == 200)
		{
			document.getElementById(div).innerHTML = request.responseText ;
		}
	}
}

function load_page_post(page, div, args)
{
	var request ;
	if(window.XMLHttpRequest)
	{
		request = new XMLHttpRequest() ;
	}
	else
	{
		request = new ActiveXObject(Microsoft.XMLHTTP) ;
	}
	request.open("POST", page, true) ;
	request.send(args) ;
	request.onreadystatechange = function()
	{
		if(request.readyState == 4 && request.status == 200)
		{
			document.getElementById(div).innerHTML = request.responseText ;
		}
	}
}

function check_pass()
{
	if(document.getElementById("pass_a").value != document.getElementById("pass").value)
	{
		document.getElementById("subm").disabled = true ;
	}
	else
	{
		document.getElementById("subm").disabled = false ;
	}
}

