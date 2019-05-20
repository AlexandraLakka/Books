document.getElementById("searchbook").addEventListener("click", function(){
	var keyword = document.getElementsByName("bookkeyword");
	if(!keyword.value){
	    var a;
		var xhttp = new XMLHttpRequest();
		var url = "http://booksapp.azurewebsites.net:443/books/" + keyword;//couldn't find how to use the url

		xhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status ==200){
				document.getElementById("search").innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", "searchBooks.php?a=" + keyword, true);
		xhttp.send();
	}else{
		alert("Please use a keyword.");
	}
});
/*sources: https://www.w3schools.com (javascript, ajax)*/		
