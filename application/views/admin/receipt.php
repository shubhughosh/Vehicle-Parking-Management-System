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
    
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h2 class="h6 text-muted"><i class="fas fa-receipt"></i>&nbsp; Receipt</h2>
                        <?php foreach($receipt as $r):?>
                        <table class="table mt-4 table-borderless">
                            <tr>
                                <th><small><b>Serial No. : </b></small></th>
                                <td><small><b><?=$r->id;?></b></small></td>
                            </tr>
                            <tr>
                                <th><small><b>Vehicle Number : </b></small></th>
                                <td><small><b><?=$r->vehicle_no;?></b></small></td>
                            </tr>
                            <tr>
                                <th><small><b>Vehicle Type : </b></small></th>
                                <td><small><b><?=$r->vehicle_type;?></b></small></td>
                            </tr>
                            <tr>
                                <th><small><b>Parking Area Number : </b></small></th>
                                <td><small><b><?=$r->parking_area_no;?></b></small></td>
                            </tr>
                            <tr>
                                <th><small><b>Parking Charge : </b></small></th>
                                <td><small><b><i class="fas fa-rupee-sign fa-xs text-muted"></i>&nbsp;<?=$r->parking_charge;?>/-</b></small></td>
                            </tr>
                            <tr>
                                <th><small><b>Arrival Time : </b></small></th>
                                <td><small><b><?=$r->arrival_time;?></b></small></td>
                            </tr>
                        </table>
                        <?php endforeach;?>
                        <button class="btn btn-secondary shadow-none" onclick="printpage()" id="printpagebutton"><i class="fas fa-print"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        printButton.style.visibility = 'visible';
    }
    </script>
</body>
</html>