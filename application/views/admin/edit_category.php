<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VPMS - Vehicle Parking Management System</title>
    <link rel="icon" href="<?=base_url('assets/images/ico.png');?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css');?>">
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body class="bg-light" style="font-family: Quicksand;">
    <div class="container my-3">
        <div class="row">
            <div class="col-11 mx-auto mt-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h2 class="h6 text-muted"><i class="fas fa-edit"></i> &nbsp;Edit Details</h2>
                        <?php foreach($category as $c):?>
                        
                        <form action="<?=base_url('admin/edit/edit_category/'.$c->cat_id);?>" method="post" class="mt-4">
                            <div class="form-group">
                              <label class="text-muted small m-0 p-0">Parking Area Number</label>
                              <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control form-control-sm shadow-none" name="parking_area_no" value="<?=$c->parking_area_no;?>" autofocus>
                           </div>
                            <div class="form-group">
                               <label class="text-muted small m-0 p-0">Vehicle Type</label>
                               <input type="text" class="form-control form-control-sm shadow-none" name="vehicle_type" value="<?=$c->vehicle_type;?>">
                            </div>
                            <div class="form-group">
                               <label class="text-muted small m-0 p-0">Vehicle limit</label>
                               <input onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" class="form-control form-control-sm shadow-none" name="vehicle_limit" value="<?=$c->vehicle_limit;?>">
                            </div>
                            <div class="form-group">
                               <label class="text-muted small m-0 p-0">Parking Charge</label>
                               <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control form-control-sm shadow-none" name="parking_charge" value="<?=$c->parking_charge;?>">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="send" class="btn btn-sm text-white mt-4 btn-block shadow-none border-0 bg-success">
                            </div>
                        </form>
                        
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>