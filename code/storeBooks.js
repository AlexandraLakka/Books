document.getElementById("savebook").addEventListener("click", function(){
		var id, b, txt="";
		var text = '{ "books":[' +
					'{"author":"' + document.getElementsByName("author") + '"},' +  
					'{"title":"' + document.getElementsByName("title") + '"},' + 
					'{"genre":"' + document.getElementById("genreselect") + '"},' + 
					'{"price":"' + document.getElementsByName("price") + '"} ]}';
		var JSONstr = JSON.stringify(text);//convert javascript value to JSON string
		var url = "http://booksapp.scm.azurewebsites.net:443/books/backend.php?author=" + document.getElementsByName("author") 
																		+ "&title=" + document.getElementsByName("title")
																		+ "&genre=" + document.getElementById("genreselect")
																		+ "&price=" + document.getElementsByName("price");//couldn't find how to use the url
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status ==200){
				var bookObj = JSON.parse(this.responseText);//convert JSON string to javascript object
				for(b in bookObj){
					txt += bookObj[b].author + "<br>";
					txt += bookObj[b].title  + "<br>";
					txt += bookObj[b].genreselect + "<br>";
					txt += bookObj[b].price + "<br>";
				}
				document.getElementById("store").innerHTML = txt;
			}
		};
		
		xhttp.open("POST", "storeBooks.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("b=" + JSONstr);
		
});

/*sources: https://www.w3schools.com (javascript, ajax, json)*/
