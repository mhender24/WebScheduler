<center><h1>Floor Plan View</h1></center>
<form method = "post" action = 'index.php?controller=floorplan&action=create'>

<h3>Select Employees</h3>
<?php foreach($employees as $employee){ ?>
	<input type = "checkbox" name = "selected_emp[]" value="<?=$employee['id']?>"/ ><?=$employee['firstName']?><br>

<?php } ?>

<br><h3>Select Sections</h3>
<?php foreach($sections as $section){ ?>
	<input type = "checkbox" name = "selected_sections[]" value="<?=$section['id']?>"/ ><?=$section['name']?><br>

<?php } ?>

<br><input type = "submit" name = "create" value = "Create">
</form>