
<!DOCTYPE html>
<html lang="en">
<head>




<title>SearchManager</title>
</head>
<body>
<div class="add">
<form>
<input type="text" name="users" id="users" placeholder="Search by name" oninput="showUser(this.value)">
</form>
<br>
<div id="txtHint"><b>Person info will be listed here.</b></div>
</div>
</body>


<script>
function showUser(str) {
if (str=="") {
document.getElementById("txtHint").innerHTML="";
return;
}
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function() {
if (this.readyState==4 && this.status==200) {
document.getElementById("txtHint").innerHTML=this.responseText;
}
}
xmlhttp.open("GET","Managerinfo.php?q="+str,true);
xmlhttp.send();
}
</script>



</html>