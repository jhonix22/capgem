<?php
$p = (isset($_GET['p']) && $_GET['p'] != '') ? $_GET['p'] : '';
$action = (!empty($_GET['action'])) ? $_GET['action'] : '';
include 'config/config.php';
if(!empty($action)):
    switch($action){
        case 'login':  $capgem->login($_POST['username'], $_POST['password']); break;
        case 'logout': $capgem->logout(); break;
    }
endif;
if(!defined('BASEPATH')) { die('No direct script access'); }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo ($p != '') ? ucfirst($p) : 'Home'.' - Capgem'; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- CUSTOM CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/simple-sidebar.css" rel="stylesheet">
	
	<link href='assets/css/fullcalendar.min.css' rel='stylesheet' />
	<link href='assets/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper" class="toggled">

        <?php
			include 'templates/header.php';
		?>
		
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?php 
							if($p != ''){
								include 'templates/'.$p.'/index.php';
							}else{
								include 'templates/content.php';
							}
						?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
	
    <!-- Custom JavaScript -->
    <script src="assets/js/admin.js"></script>
	
	
	<script src='assets/js/lib/moment.min.js'></script>
	<script src='assets/js/fullcalendar.min.js'></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        // $("#wrapper").toggleClass("toggled");
    });
	
	$(document).ready(function() {

		$('#calendar').fullCalendar({
			defaultDate: '2017-05-12',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
				{
					title: 'All Day Event',
					start: '2017-05-01'
				},
				{
					title: 'Long Event',
					start: '2017-05-07',
					end: '2017-05-10'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2017-05-09T16:00:00'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2017-05-16T16:00:00'
				},
				{
					title: 'Conference',
					start: '2017-05-11',
					end: '2017-05-13'
				},
				{
					title: 'Meeting',
					start: '2017-05-12T10:30:00',
					end: '2017-05-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2017-05-12T12:00:00'
				},
				{
					title: 'Meeting',
					start: '2017-05-12T14:30:00'
				},
				{
					title: 'Happy Hour',
					start: '2017-05-12T17:30:00'
				},
				{
					title: 'Dinner',
					start: '2017-05-12T20:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2017-05-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2017-05-28'
				}
			]
		});
		
	});
	
    </script>

</body>

</html>
