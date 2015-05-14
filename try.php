<!DOCTYPE html>
<html>
<body>

<p>Click the button to trigger a function that will output "Hello World" in a p element with id="demo".</p>

				<div class="search-title-name">
					<h2>Search By Name</h2>
				</div>
				<form method="POST" id="search-form-name" name="search-form-name" class="navbar-form navbar-left" role="search">
					
					<div class="form-group">
						<input onclick="myFunction(this.form.searchName.value)"  type="button">click</button>
						<input type="hidden" name="userid"/>
						<input type="text" class="form-control" name="searchName" placeholder="Search for members by NAME" style="width:300px;height:50px;border-radius:0;"/>
					</div>
				</form>

<div id="txtHint"><b>Person info will be listed here...</b></div>

<script>


function myFunction(str) {
     if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

</body>
</html>
