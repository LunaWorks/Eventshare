<!DOCTYPE html>
<html>
<head><meta charset='UTF-8'/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){

        $("p").show();

});

var timeLeft, id;

function startCountDown()
{
    timeLeft = 5;
    id = setInterval(countDown, 500);
}

function countDown()
{
    timeLeft -= 1;


    //Update the text which states how much time is remaining until the
    //user is redirected here..

    if(timeLeft==0)
    {

         $("p").hide();

		  
    }
}
</script>
 
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>
<body>




  <p><i class="glyphicon glyphicon-refresh w3-spin w3-jumbo"></i></p>

</body>
</html> 
