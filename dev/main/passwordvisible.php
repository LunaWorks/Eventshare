function save(data) {
	// activate loading icon
	$.ajax(
	{
		url: "dataSaver.php",
		data: data
	}
	).done(function(){
		// remove loading icon
	});
}

	
	<input name="pass" onkeyup="copyPasswordToShow()"></input>
	<a class="activateShow" onclick="function(){$(".showPassword").toogleClass("hidden)}">X</a>
	</br>	
	<p class="hidden showPassword></p>
	
	
	 function(){
		
		$(".showPassword").toogleClass("hidden)
		
		}