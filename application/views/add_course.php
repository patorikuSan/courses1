<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<style>
		*{
			font-family: 'helvetica';
		}
		form{
			margin: 0 auto;
			width: 400px;
			height: 300px;
			vertical-align: top;
			border: 1px solid green;
			border-radius: 20px;
			box-shadow: 5px 5px;

		}
		h2{
			margin-left: 20px;
		}
		input[type="text"]{
			margin-left: 110px;
			margin-bottom: 10px;
			display: block;
			margin-top: -20px;
			width: 225px;
		}
		textarea{
			margin-left: 110px;
			margin-bottom: 45px;
			margin-top: -20px;
		}
		label{
			margin-left: 20px;
			display: block;
		}
		input[type="submit"]{
			width: 80px;
			height: 40px;
			margin-left: -90px;
			display: inline-block;
			background-color: green;
			padding: 5px;
			text-align: center;
			color: white;
			box-shadow: 5px 5px rgba(0,0,0,.9);

		}
	/**
	-----------------------------------------
	 */

/*  
		input[type="submit"]{
			margin-top: 20px;
			margin-left: 310px;
		} */
		h3{
			margin-left: 40px;
		}
		h4{
			margin-left: 84px;
		}
		table{
			width: 700px;
			margin-left: 80px;
			border-spacing: 0px;

		}
		td,th{
			border: 1px solid black;
			border-spacing: 0;
			text-align: left;
			padding-left: 20px;

		}
		table{
			margin: 0 auto;
		}
		h4{
			margin-left: 380px;
		}
	</style>
</head>
	<body>
	<?php 
	$this->load->library("session");
	$error = $this->session->userdata("error");
?>
		<!-- php form_validation -->
		<form action="courses/add_course" method="post">
		<!-- form_open('form') -->
			<h2>Add a new course</h2>

			<label for="name">Name:</label>
			<input type="text" name="name">
			<label for="desc">Description:</label>
			<textarea name="desc" id="desc" cols="30" rows="5"></textarea>
			<input type="submit" name="add" value="Add">
		</form>
		<div id="container">
			
			<table>
			<h4>Courses</h4>
				<thead>
					<tr>
						<th>Course Name</th>
						<th>Description</th>
						<th>Date Added</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
		<?php  
				foreach ($courses->result() as $course)  
				{  
					?><tr>  
					<td><?= $course->title;?></td>  
					<td><?= $course->description;?></td> 
					<td><?= date("F jS Y h:iA", strtotime($course->created_at)); ?></td>
					<td><a href="courses/destroy/<?=$course->id?>">remove</a></td>
					</tr>  
				<?php }  
				// var_dump($courses);
				?> 

				</tbody>
			</table>
		</div>
	</body>
</html>



