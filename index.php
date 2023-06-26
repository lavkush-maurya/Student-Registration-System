<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HOMEPAGE</title>
	<style type="text/css">
		body{
			padding: 0;
			margin: 0;
			background: rgb(0, 16, 36);
		}
		.titlebar{
			border-bottom: 1px solid white;
			background: linear-gradient(90deg,#000000,black);
			height: 70px;
		}
		.bodies{
			
			width: 99.8%;
			height: 99.8%;
	
		}
		.ab{
			width: 300px;
			height: 40px;
			margin: 0px 20px 20px 20px;
			font-size: 25px;
			padding: 5px 20px;
			font-weight: 600;
			border: 1px solid black;
			text-decoration: none;
		}
		.ab:hover{
			background: rgb(0, 89, 255);
			color: white;
		}
	</style>
</head>
<body>
	<div class="titlebar">
		<h1 style="margin-left: 40%;color: white;margin: top 25px; ;position: absolute;">Student Registration System</h1>
	</div>

	<div class="bodies" style="margin-top:150px"> 
		<center><div>

			<form>
				<table>
				<tr>
					<td><a href="admin/index1.php" class="ab">Admin</a></td>
                </tr>
                <br>
               
				</table>
                <br>
                <tr>
					<td><a href="student/login.php" class="ab">Student</a></td>
				</tr>
			</form>

		</div></center>
	</div>
</body>
</html>