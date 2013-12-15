
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src=<?php echo "'".$myheader_path_to_root."bootstrap/js/bootstrap.min.js'"; ?>></script>
    <?php
    	if(isset($myheader_src)){
    		foreach($myheader_src as $src){
    			echo $src;
    		}
    	}
    ?>
  </body>
</html>