<!DOCTYPE html> 
<html> 
	<head> 
		<meta charset=utf-8 /> 
		<title>Change the content of a cell</title> 
		<style type="text/css"> 
			body {margin: 30px;} 
		</style>  
	</head>
	<body> 
		<table id="myTable" border="1"> 
			<tr>
				<td>Row1 cell1</td> 
				<td>Row1 cell2</td>
			</tr> 
			<tr>
				<td>Row2 cell1</td> 
				<td>Row2 cell2</td>
			</tr> 
			<tr>
				<td>Row3 cell1</td> 
				<td>Row3 cell2</td>
			</tr> 
		</table></br>
		<input type="number" name="row" id="idRow" min="1" max="3">
		<input type="number" name="col" id="idCol" min="1" max="2">
		<input type="text" name="text" id="idText">
		<input type="button" id="idBtn" value="valider">
	</body>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="scriptTab.js" type="text/javascript"></script>
</html>