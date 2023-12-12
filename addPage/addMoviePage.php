<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="addAction.php" method="post" name="add" enctype="multipart/form-data">
			<table width="25%" border="0">
				<tr> 
					<td>Name</td>
					<td><input type="text" name="name" style="background-color: #B7CECE; border-radius:10px; padding:3px; margin-left:20px"></td>
				</tr>
				<tr> 
					<td>Age</td>
					<td><input type="text" name="age" style="background-color: #B7CECE; border-radius:10px; padding:3px; margin-left:20px"></td>
				</tr>
				<tr> 
					<td>Email</td>
					<td><input type="text" name="email" style="background-color: #B7CECE; border-radius:10px; padding:3px; margin-left:20px"></td>
				</tr>
				<tr> 
					<td>Photo</td>
					<td>
					<input type="file" name="foto" style="margin-left:20px">	
					</td>
				</tr>
				<tr> 
					<td></td>
					<td>
						<!-- <input type="submit" value="Upload"> -->
						<button class="btn btn-dark" type="submit" name="submit">Add</button>
					</td>
				</tr>
			</table>
		</form>
</body>
</html>