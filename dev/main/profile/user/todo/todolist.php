<?php

    require("todo/includes/connect.php");
function felvetel(){
    require("todo/includes/connect.php");
	$task = $_POST['new-task'];
	$date = date('Y-m-d');
	$time = date('H:i:s');
		$sql = "INSERT INTO tasks (task,date,time) VALUES ('$task', '$date', '$time')";
		$result = $conn->query($sql);
		
		if($result === true){
			echo "Felvéve!";
		}else {
			echo "Failed!";
		}

}
if(isset($_POST['add'])){
	felvetel();
}
?>
<html>
<head>
	<meta charset='UTF-8'/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
@import "css/reset.css";

@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);



.wrap {
	width: 400px;
	margin: 0 auto;
}

.task-list {
	width: 88%;
	min-height: 300px;
	background: #fff;
	box-shadow: 2px 2px 0px #ddd;
	margin-top: 40px;
	padding: 22px 6%;
}

.task-list li {
	font-size: 1.2em;
	padding: 8px 0;
	overflow: hidden;
}

.task-list li span {
	width: 86%;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
	float: left;
}

.task-list li .delete-button {
	width: 10px;
	height: auto;
	padding-top: 7px;
	float: right;
	vertical-align: top;
	opacity: 0.5;
	cursor: pointer;
}

.task-list li .delete-button:hover {
	opacity: 0.85;
}

.add-new-task {
	margin-top: 20px;
	padding-bottom: 60px;
}

.add-new-task input[type='text'] {
	width: 100%;
	font: normal 1.2em 'Open Sans', Arial, sans-serif;
	color: #999;
	box-shadow: 2px 2px 0px #ddd;
	border: none;
	border-radius: none;
	display: block;
	padding: 12px 6%;
	-webkit-appearance: none;
	   -moz-appearance: none;
			appearance: none;
	-webkit-box-sizing: border-box;
	   -moz-box-sizing: border-box;
			box-sizing: border-box;
}

:focus {
	outline: 0;
}

@media all and (max-width: 425px) {
	.wrap {
		width: 90%;
		margin: 0 auto;
	}
}


</style>
</head>
<style>




</style>
<body>

    <div class="wrap">
  <div class="task-list">
     <ul>
<?php


    $query = "SELECT * FROM tasks ORDER BY date ASC, time ASC";
    $numrows = $conn->query($query);

    if($numrows->num_rows > 0){
while($row = $numrows->fetch_assoc()) {

      $task_id = $row['id'];
      $task_name = $row['task'];

      echo '<li>
                    <span>'.$task_name.'</span> 
        <img id="'.$task_id.'" class="delete-button" width="10px" src="images/close.svg" />
     </li>';
  }
    }
?>
     </ul>
 </div>
 </div>
<form class="add-new-task">
      <input type="text" name="new-task" placeholder="Add a new item..." required />
	   </form>
	   <form method="POST" action="">
	    <input type="text" name="new-task" />
 <input type="submit" name="add" value="Lista felvétele"/>  
 </form>

</body>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
    add_task(); // Call the add_task function
    delete_task(); // Call the delete_task function

    function add_task() {
        $('.add-new-task').submit(function(){
     var new_task = $('.add-new-task input[name=new-task]').val();

     if(new_task != ''){
   $.post('includes/add-task.php', { task: new_task }, function( data ) {
        $('.add-new-task input[name=new-task]').val('');
        $(data).appendTo('.task-list ul').hide().fadeIn();
                    delete_task();
                });
     }
     return false; // Ensure that the form does not submit twice
        });
    }

    function delete_task() {
        $('.delete-button').click(function(){
      var current_element = $(this);
      var id = $(this).attr('id');

      $.post('includes/delete-task.php', { task_id: id }, function() {
    current_element.parent().fadeOut("fast", function() { $(this).remove(); });
     });
        });
    }
</script>
</html>