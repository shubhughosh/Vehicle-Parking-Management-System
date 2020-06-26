<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VPMS - Vehicle Parking Management System</title>
    <link rel="icon" href="<?=base_url('assets/images/ico.png');?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css');?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
</head>
<body class="bg-light" style="font-family: Quicksand;">
    <style>
        .list-group>.active{
            background-color:#1286a8;
        }
        #size{
            width: 85px;
            margin-top: 5px;
        }
        #more_info{
            text-decoration:none;
        }
        #more_info:hover{
            opacity: 0.7
        }
    </style>
    
   <nav class="navbar navbar-expand-lg navbar-dark bg-white shadow-sm sticky-top">
    <div class="navbar-brand text-dark mt-1 ml-1">
        <h5><i class="fas fa-car text-info"></i>&nbsp; <span class="text-danger">V</span>PMS Administration</h5>
    </div>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <h6 class="nav-link text-dark mt-2 mr-3" id="font_size">
               <?php foreach($user as $u):?>
                <i class="fas fa-user-circle text-info"></i>&nbsp; Hii.. <?=$u->username;?>
                <?php endforeach;?>
            </h6>
        </li>
        <li class="nav-item text-dark">
            <h6>
                <a href="<?=base_url('admin/logout');?>" class="nav-link text-white btn btn-sm bg-danger border-0" id="size">
                    <i class="fas fa-power-off text-white fa-xs"></i>&nbsp; Logout
                </a>
            </h6>
        </li>
    </ul>
</nav>