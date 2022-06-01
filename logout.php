<?php
	require "includes/config.php";

	session_destroy();

	header("Location: index.php?msg=ok_logout");
?>