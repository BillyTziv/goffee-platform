<!-- Top debug bar according to error messages and codes -->
<div id="debug_monitor">
	<?php if( isset($debug_msg) ) { echo $_POST['debug_msg']; }else { echo "Platform is online. Any error codes will be displayed here."; } ?>
</div>