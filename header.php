 <?php 
	function return_back(){
		header("Location: admin.php?message=you need to login again");
	}

  ?><!DOCTYPE html>
 <html>
 <head>
 	<title>Index</title>
	 <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap" rel="stylesheet">
 </head>
 <body>
 <header>
 	<h1>Widget Corp</h1>
 </header>
 <style type="text/css">
 	h1{

 	}

 </style>
 <style type="text/css">

	*{
		margin:0;
		box-sizing: border-box;
		font-family: 'Oxygen', sans-serif;
	}
 	header{
		margin: 0;
		width: 100%;
		padding: 20px;
		background-color: #173d62;
		color: #c8ddf2;
 	}
 	#heading{

 	}
 	.main{
 		display: flex;
		width: 100%;
	    height: 513px;

 	}
 	.sidebar{
 		margin-bottom: 0px;
	    height: 109vh;
	    width: 20%;
	    background-color: maroon;
	   	color: black;
		padding: 20px;
 	}
	.sidebar a{
		color: #fff;
		text-decoration: none;
 	}
	 .sidebar a:hover{
		color: #ccc;
 	}
 	.main_content{
	    background-color: #ffffcc;
	    width: 100%;
		height: 109vh;
		padding: 20px;
 	}

	.main_content a{
		color: maroon;
		text-decoration: none;
 	}

	.admin-privileges li{
		font-size: 1.5em;
		
	}
 </style>