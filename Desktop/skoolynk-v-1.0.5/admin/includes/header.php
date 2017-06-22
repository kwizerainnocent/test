<?php 
session_start();
include_once("../classes/DbClass.php");
$db = new DbClass();
$db->connect();
if(!isset($_SESSION['Administrator']))
 {
    header("Location:index.php");
   exit();
 }else
 {
    $data = unserialize($_SESSION['Administrator']);
    $schoolInfo = $db->select("schools", "id='".$data['school_id']."'");
    $schoolInfo = $schoolInfo[0];
    if($schoolInfo["activated"]=="no")
    {
      header("Location:../public/activate-account-now.php");
      exit();
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Skoolynk Administrator</title>
    <link href="../css/material.css" rel="stylesheet">
    <script type="text/javascript" src="../js/material.min.js"></script>
    <link href="../css/material-design-iconic-font.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="../css/skoolynk.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../css/jquery-ui.css" rel="stylesheet"/>
    <style>
        .side-nav .active{background:#fff !important; color:#517fa4 !important; border-bottom:3px solid lightcyan; font-weight:lighter; text-shadow: none !important;
            padding-left:35px !important;
        }
        .side-nav .active:hover{color:#fff !important;}
        .side-nav li a{
            color:#fff;
            font-size: 12px !important;
            text-transform: uppercase;
            padding: 10px 10px 10px;
            text-shadow: 1px 1px 1px #aaa;
            transition-property: padding,background,color;
            transition-duration: .4s;
        }
        .side-nav li a:hover{
            color:#fff;
            padding-left:30px;
            background: rgba(0,0,0,.1) !important;
            padding:10px 35px 10px;
            text-transform: uppercase;
            font-weight:lighter; 
            text-shadow: 1px 1px 1px #aaa;
        }
        .dropdown-toggle{
            background: none !important;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-fixed-top" role="navigation" id="header">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <i class="fa fa-ellipsis-v" style="color:#fff;"></i>
                </button>
                <a class="navbar-brand animated flipInX" href="home.php">
                    <font color="white">
                    Skoolynk Administrator <font style="margin-left:50px; font-weight: lighter; font-size: 14px;">@ <?php echo $schoolInfo['name']; ?></font>
                    </font>
                </a>
            </div>
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown animated flipInX">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="notification.php">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $data['first_name'] ." ".$data['second_name']; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu animated bounceInRight">
                        <li>
                            <a href="inbox.php"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="home.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="schoolProfile.php"><i class="fa fa-fw fa-bar-chart-o"></i> School Profile</a>
                    </li>
                    <li>
                        <a href="academics.php"><i class="fa fa-fw fa-table"></i> Academics</a>
                    </li>
                    <li>
                        <a href="staff.php"><i class="fa fa-users"></i> Staff and directory</a>
                    </li>
                    <li>
                        <a href="events.php"><i class="fa fa-fw fa-wrench"></i> Events and holidays</a>
                    </li>

                    <li>
                        <a href="inbox.php"><i class="fa fa-fw fa-wrench"></i> Inbox</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
