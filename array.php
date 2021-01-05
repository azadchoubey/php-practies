<!DOCTYPE html>
<html>
<head> <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<form action="arrayresult.php" method="GET">
<h3> Add user Deatils </h3>
<input type="text" placeholder="Name" name="details" required/>
<input type="number" placeholder="Mobile number"  name="details" required/>
<input type="text" placeholder="Email id"  name="details" required />
<input type="submit" value="submit" id="press"/>


</form>

<script> let add = new Array();

$("#press").click(function()
{ 

  $("input[name*='details']").each(function(){
    add.push($(this));
    document.write(add)
});
});

  

    
  /* types = [];
$("input[name='details']").each(function() {
    types.push($(this).val());
});
console.log(types);
*/
</script>



</body>
</html>