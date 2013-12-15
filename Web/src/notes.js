//Javascript for the Notes page
$(document).ready(function(){
	//Change search button text when radio changes
	$("input[type=radio][name=optionsRadios]").change(function(){
		if(this.value == "notes"){
			$("#searchBtn").html("Get Notes");
			$("input[type=text]").attr("placeholder","Search for a keyword");
		}else if(this.value == "courses"){
			$("#searchBtn").html("Search for courses");
			$("input[type=text]").attr("placeholder","Search for a course number or course title");
		}
	});

	//Ajax search
	$("#searchForm").submit(function(){
		var actionType = "search";
		var searchType = $("input[type=radio][name=optionsRadios]:checked").val();
		var searchQuery = $("input[type=text]").val().trim();
		$.post("../src/function.php",
			{action:actionType, searchType:searchType, query:searchQuery},
			function(data){
				totable_wrapper(data,"s_result","s_result_pager",5);
		},"json");
		return false;
	});
});