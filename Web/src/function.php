<?php
	$function_file=1;//Tell login.php to only check login, and ignore other requests
	include "../auth/login.php";

	if(!isset($_POST["action"]))
		handle_error();

	switch ($_POST["action"]) {
		case "search":  
			search();
			break;
		default:
			handle_error();
	}

	//No requests or w/e
	function handle_error()
	{
		echo 'huh?';
		exit();
	}

	//The search function
	function search()
	{
		$con = mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","notesofcourse_c","testing123","notesofcourse_nocdb");
		$s_type = $_POST["searchType"];
		$s_query = $_POST["query"];

		global $login;
		if(isset($login)){
			$query = "INSERT INTO SearchHistory(UID,Query,Date) SELECT UID,'$s_query','".date("Y-m-d")."' FROM Users WHERE Email='xyuan12@illinois.edu'";
			mysqli_query($con, $query);
		}

		//2 Options for searching notes: 1.MATCH AGAINST 2.LIKE
		if($s_type == "notes"){
			$query = "SELECT Courses.CourseNum, CourseName, SectionName, Title, CourseNotes.Link, CourseInfo.Link AS CourseLink,
						SUBSTR( Content, GREATEST(LOCATE( '$s_query', Content ) -75,1), 125 ) AS Preview
						FROM CourseInfo INNER JOIN CourseNotes INNER JOIN Courses
						ON CourseInfo.CourseID = CourseNotes.CourseID AND Courses.CourseNum = CourseInfo.CourseNum WHERE Content RLIKE '\133\133:<:]]$s_query\133\133:>:]]'";
			$results = mysqli_query($con, $query);
			$return = array();
			while($row = mysqli_fetch_assoc($results)){
				if(is_null($row["SectionName"]))
					$row["SectionName"]=$row["CourseName"];
				$row["Preview"]=strstr($row["Preview"]," ");
				$last = strrpos($row["Preview"], " ");
				$row["Preview"]=substr($row["Preview"],0,$last)."...";
				$return[] = $row;
			}
			echo json_encode($return);
		}else if($s_type == "courses"){
			$s_all = false;
			if(strlen($s_query)==0){
				$s_all = true;
			}
			if(!$s_all && $s_query[0]>="0" && $s_query[0]<="9"){
				$s_query = strval(intval($s_query));
			}
			$query = "SELECT Courses.CourseNum, CourseName, SectionName, CourseInfo.Link AS CourseLink
						FROM Courses INNER JOIN CourseInfo ON Courses.CourseNum = CourseInfo.CourseNum
						WHERE Courses.CourseNum LIKE '%$s_query%' OR Courses.CourseName LIKE '%$s_query%' OR CourseInfo.SectionName LIKE '%$s_query%'";
			$results = mysqli_query($con, $query);
			$return = array();
			while($row = mysqli_fetch_assoc($results)){
				if(is_null($row["SectionName"]))
					$row["SectionName"]=$row["CourseName"];
				$return[] = $row;
			}
			echo json_encode($return);
		}
	}
?>