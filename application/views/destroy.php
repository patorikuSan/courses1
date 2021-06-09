<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel ="stylesheet" type ="text/css" href ="<?= base_url(); ?>courses1/css/remove.css">
	<title>Delete</title>
</head>
<body>
	<div class="container">
		<h2>Please confirm if you want delete this Course</h2>
		<?php foreach($courses as $item){ ?>
			<p>Name: <?= $item->title ?></p>
			<p>Description: <?= $item->description ?></p>
		<?php } ?>
		
		<form action="<?= base_url(); ?>courses1/courses/delete/<?= $id ?>" method="post">
			<input type="hidden" name="id" value="<?= $id ?>">
			<a href="<?= base_url(); ?>courses1" class="cancel" name="cancel">No</a>
			<input class="danger" name="danger" type="submit" value="Yes! I want to delete this">
		</form>
	</div>
</body>
</html>