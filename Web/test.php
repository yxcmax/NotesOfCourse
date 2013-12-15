<?php
	$con = mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","notesofcourse_c","testing123","notesofcourse_nocdb");
	$s_query = "page table";
	$query = "SELECT Courses.CourseNum, CourseName, SectionName, Title, CourseNotes.Link,
						SUBSTR( Content, GREATEST(LOCATE(' ',SUBSTR(Content,LOCATE( '$s_query', Content ) -65,30)),1), 100 ) AS Preview
						FROM CourseInfo INNER JOIN CourseNotes INNER JOIN Courses
						ON CourseInfo.CourseID = CourseNotes.CourseID AND Courses.CourseNum = CourseInfo.CourseNum WHERE Content RLIKE '\133\133:<:]]heap memory\133\133:>:]]'";
	$result = mysqli_query($con, $query);
	//echo $con->error;
	while($row=mysqli_fetch_assoc($result)){
	print_r($row);
	echo "<br>";
	}

	echo "--------";
	$string = "241ahaha";
	if($string[0]>="0" && $string[0]<="9")
		echo "yes";
	echo "<br>".intval($string);
	$string = strval(intval($string));
	$string_2 = "241";
	if($string===$string_2)
		echo "haha";

	echo "<br>";
	$bool;

?>