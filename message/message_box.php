<?php
	if(!isset($_SESSION)){session_start();}
	include("message_functions.php");
	$message_array = get_messages();
?>


<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/message.css?v=<?php echo time(); ?>">

	<style>
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}
	</style>
</head>
<body>

	<div class="message-iframe">
		<?php
			if(isset($message_array) and count($message_array)>0){
				$keys = array_keys($message_array);
				rsort($keys);
				
				for($i=0; $i < count($keys); $i++) {
					if (!isset($message_array[$keys[$i]]["received"])) {
						continue;
					}
					
					if($message_array[$keys[$i]]["received"]){
						echo '<div class="msg-received-row"><p class="msg-received">' . $message_array[$keys[$i]]["msg"] . '<p></div>';
					}
					else {
						echo '<div class="msg-sent-row"><p class="msg-sent">' . $message_array[$keys[$i]]["msg"] . '<p></div>';
					}
					
				}
			}
		?>
	</div>
			
</body>
</html>
<?php
	header("Refresh: 5");
?>