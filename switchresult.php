<?php
 $istnumber = $_POST['ist'];
$secnumber= $_POST['2nd'];
$cal= $_POST['cal'];
 switch($cal)
{ case "+":
    echo ($istnumber+$secnumber);
    break;
    case "-":
        echo ($istnumber-$secnumber);
        break;
    case "*":
        echo ($istnumber*$secnumber);
        break;
    case "/":
        echo ($istnumber/$secnumber);
        break; 
        
        case "%":
            echo ($istnumber%$secnumber);
            break;
            default:
            echo "Please enter vaild details";
}




?>