<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<h1>Form API</h1>
<p>Here is a form. It is created automatically.</p>
<p>
<? 
include_once("formapi.php");
include_once("test_myforms.php");

print formapi_print("mytestform");

?>
</p>
<p>&nbsp;</p>
</body>
</html>
