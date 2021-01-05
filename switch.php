<!DOCTYPE html>
<html><title> Switch</title>
<body>

<h2>Please enter the 2  numbers you want to calculate</h2>

<form action="switchresult.php" method="POST">
<input type="number" placeholder="Please Enter first number" name="ist" required/><br>
<input type="text" name="2nd" placeholder="Please Enter 2nd number" required/><br>

<input type="text" placeholder="+,-,*,/,%" pattern="[+,-,*,/,%" name="cal" required />


<input type="submit" value="Calculate" name="submit" />

</form>






</body>
</html>