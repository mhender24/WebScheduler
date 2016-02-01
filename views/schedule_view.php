<?php

foreach($schedules as $schedule){
?>
	<a href = "index.php?controller=scheduler&action=viewDetailSchedule&id=<?=$schedule['id']?>"><?=$schedule['startDate']?><br/>
<?php	
}
?>