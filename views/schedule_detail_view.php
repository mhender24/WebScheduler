<table border = "1">
	<tr>
		<th></th>
		<th>Monday: <?php echo(date('m-d', strtotime($schedule['startDate']))) ?></th>
		<th>Tuesday: <?php echo(date('m-d', strtotime("+1 day", strtotime($schedule['startDate'])))) ?></th>
		<th>Wednesday: <?php echo(date('m-d', strtotime("+2 day", strtotime($schedule['startDate'])))) ?></th>
		<th>Thursday: <?php echo(date('m-d', strtotime("+3 day", strtotime($schedule['startDate'])))) ?></th>
		<th>Friday: <?php echo(date('m-d', strtotime("+4 day", strtotime($schedule['startDate'])))) ?></th>
		<th>Saturday:<?php echo(date('m-d', strtotime("+5 day", strtotime($schedule['startDate'])))) ?></th>
		<th>Sunday:<?php echo(date('m-d', strtotime("+6 day", strtotime($schedule['startDate'])))) ?></th>
	</tr>
	<form action="index.php?controller=scheduler&action=updateDays&id=<?=$schedule['id']?>" method="POST">
<?php 
	
	$count = 0;
	foreach($allEmpSchedule as $value){	
		if($count == 7){
			echo("</tr>");
			$count = 0;
		}
		if($count == 0){
			echo("<tr>");
			echo("<th>".$value['firstName']."</th>");
		}
		if($value['startTime'] != null){
			echo('<input type = "hidden" value="'.$value['day_id'].'" name="day_id_arr[]" />');
			echo('<td><input type = "text" value ="'.$value['startTime'].'" name="start_time_arr[]" /></td>');
			$count++;
		} 
		else{
			echo('<input type = "hidden" value="'.$value['day_id'].'" name="day_id_arr[]" />');
			echo('<td><input type = "text" value ="X" name="start_time_arr[]"/></td>');
			$count++;
		}
	}
	while($count < 7){
		echo('<td><input type = "text" value ="X"/></td>');
		$count++;
	}
	echo('<input type = "submit" value = "Submit Changes" name = "scheduler_sbumit" />');

	
/*
		$emp_f_name = $allEmpSchedule[0]['firstName'];
		$emp_l_name = $allEmpSchedule[0]['lastName'];
		$count = 0;
		foreach($allEmpSchedule as $value){
			if($count == 0){
				echo("<tr>");
				echo("<th>".$value['firstName']."</th>");
			}
			if($emp_f_name == $value['firstName'] && $emp_l_name == $value['lastName']){
				while($count<7){
					if(strtotime("+".$count." day", strtotime($schedule['startDate'])) == strtotime($value['shiftDate'])){
						echo('<input type = "hidden" value="'.$value['day_id'].'" name="hidden[]" />');
						echo('<td><input type = "text" value ="'.$value['startTime'].'" name="arr[]" /></td>');
						$count++;
						break;
					} else{
						echo('<td><input type = "text" value ="X" /></td>');
						$count++;
					}
				}
			 }
			else{
				while($count < 7){
					echo('<td><input type = "text" value ="X" /></td>');
					$count++;
				}
				echo("</tr>");
				$count = 0;
				echo("<tr>");
				echo("<th>".$value['firstName']."</th>");
				while($count < 7){
					if(strtotime("+".$count." day", strtotime($schedule['startDate'])) == strtotime($value['shiftDate'])){
						echo('<input type = "hidden" value="'.$value['day_id'].'" name="hidden[]" />');
						echo('<td><input type = "text" value ="'.$value['startTime'].'" name = "arr[]" /></td>');
							$count++;
							break;
						}
					else{
						echo('<td><input type = "text" value ="X" /></td>');
						$count++;
					}
				}
			}
			$emp_f_name = $value['firstName'];
			$emp_l_name = $value['lastName'];
		}
		while($count < 7){
			echo('<td><input type = "text" value ="X"/></td>');
			$count++;
		}
		echo('<input type = "submit" value = "Submit Changes" name = "scheduler_sbumit" />');
		*/
?>
	</form>
</table>

<!-- ALL employees name, ALL employees days attached to a a week, thats attached to schedule selected.

Select * from day left join week on day.weekId = week.id left join employee on week.empId = employee.id
	ORDER BY employee.firstName, day.shiftDate ;  -->