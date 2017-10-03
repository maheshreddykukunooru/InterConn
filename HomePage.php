<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	session_start();
	include_once "./services/WebService.php";
	$web_service = new WebService();
	
    $userDetails = json_decode($web_service->getUserDetails($_SESSION['emailid']));
    $workspaceDetails = json_decode($web_service->getWorkspaceDetails($_SESSION['userid']));
    $workspaceName=$workspaceDetails[0]->workspace_name;

    $channelDetails = json_decode($web_service->getChannelsDetails($_SESSION['userid']));
    $directMessagesDetails = json_decode($web_service->getDirectMessagesDetails($workspaceDetails[0]->workspace_id));

   	$channelstr='';
   	$directMessagestr='';
   foreach($channelDetails as $channel)
   {
   		$channelstr.=' <li channelid="" class="active"><a href="#"> <span class="channelPrivacyLevel"> </span><span class="'.$channel->channel_id.'" >'.$channel->channel_name.'</span></a></li>';
   }

   foreach($directMessagesDetails as $directMessage)
   {
   		$directMessagestr.=' <li touserid="" class="active"><a href="#"> <span class="channelPrivacyLevel"> </span><span class="'.$directMessage->first_name.'" >'.$directMessage->first_name.'</span></a></li>';
   }
?>
<html>
	<head>
		<title>InterConn</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="./scripts/home_sitescript.js"></script>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="./CSS/home_site.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

	<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-1 verticle_navbar_HP">

				<div class="row menu_leftMain_HP">
					<div class="leftMenuContentWrapper_HP" >
						<div class="row title_main_HP"> <h3> InterConn  </h3>
							<span class="loggedIn_user"> <?php  echo $workspaceName; ?></span> <br>
							<span class="loggedIn_user"><?php  echo $userDetails[0]->first_name; ?> </span><br>
							<span class="loggedIn_user"> All Threads</span><br>
						</div>

						<div class="row channelsContainer_menu_HP">
							<div class="categoryTitle_HP channelTitle"> Channels <span class="noOfChannels_HP numberCount_badge"> 2</span></div>
							<ul class="nav navbar-nav channels_UL_List">
								<?php echo $channelstr;?>

						    </ul>

						</div>

						<div class="row directMessageContainer_menu_HP">
							<div class="categoryTitle_HP channelTitle"> Direct Messages <span class="noOfDirectMessages_HP numberCount_badge"> 3</span></div>
							<ul class="nav navbar-nav directmessages_UL_List">
						        <?php echo $directMessagestr;?>
						    </ul>
						</div>
						<div class="row dummyBlock">

						</div>

					</div>

				</div>

			</div>
			<div class="col-lg-11 mainContent_HP">
				<div class="headerSpace_HP row"> </div>
				<form>
					<div class=" "></div>
				</form>				
			</div>
		</div>
	</div>
	</body>
</html>
