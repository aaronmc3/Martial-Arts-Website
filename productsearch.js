$(".dropdown-menu.martial").click(function(){
	document.getElementById("Searchbar").value = $(event.target).attr('id');
	document.getElementById("mainform").submit();
});
$(".smalladd").click(function(){
	document.getElementById("Searchbar").value = $(event.target).attr('id');
	document.getElementById("mainform").submit();
});
$(".secondlayer").click(function(){
	document.getElementById("Searchbar").value = $(event.target).attr('id');
	document.getElementById("mainform").submit();
});
$(".thirdlayer").click(function(){;
	document.getElementById("Searchbar").value = $(event.target).attr('id');
	document.getElementById("mainform").submit();
});