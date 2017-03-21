<?php

    require("includes/connect.php");
function felvetel(){
	$task = $_POST['new-task'];
	   require("includes/connect.php");
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
if(isset($_POST['new-task'])){
	felvetel();
}
?>
<html>
<head>
    <title>Simple To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
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


	   <form method="POST" action="" >
	    <input type="text" name="new-task" />
 </form>
 </div>
           
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