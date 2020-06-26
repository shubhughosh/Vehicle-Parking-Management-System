<?php include('header.php');?>

<div class="container-fluid p-0">
    <div class="row no-gutters">
        <div class="col-3" style="position:fixed">
            <div class="card border-0 shadow-sm">
                <div class="card-body m-0 p-0">
                    <?php include('sidebar.php');?>
                </div>
            </div>
        </div>
        <div class="col-8 offset-3 mt-5 mr-5">
            <div class="row">
                <div class="col-8 ml-5">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h2 class="h6 text-muted"><i class="fas fa-file-import"></i> &nbsp;Add Vehicle</h2>
                            <form action="" method="post" class="mt-4">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                        <label for="" class="small m-0 p-0 text-muted">Vehicle Number</label>
                                        <input type="text" class="form-control form-control-sm shadow-none" name="vehicle_number" required autofocus>
                                    </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="" class="small m-0 p-0 text-muted">Vehicle Type</label>
                                            <select name="vehicle_type" class="form-control form-control-sm shadow-none">
                                                <option value="" selected disabled>select vehicle type</option>
                                                <?php foreach($parking_area_no as $p):?>
                                                <option value="<?=$p->vehicle_type;?>" <?php if($this->datawork->count_data('add_vehicle',['vehicle_type'=>$p->vehicle_type,'status'=>0])==$p->vehicle_limit){echo "disabled";}?>><?=$p->vehicle_type;?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="small m-0 p-0 text-muted">Parking Area Number</label>
                                    <select name="parking_area_number" class="form-control form-control-sm shadow-none">
                                        <option value="" selected disabled>select parking area number</option>
                                        <?php foreach($parking_area_no as $p):?>
                                        <option value="<?=$p->parking_area_no;?>" <?php if($this->datawork->count_data('add_vehicle',['vehicle_type'=>$p->vehicle_type,'status'=>0])==$p->vehicle_limit){echo "disabled";}?>><?=$p->parking_area_no;?> ------------------- <span>(<?=$p->vehicle_type;?> --- Active)</span></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="small m-0 p-0 text-muted">Parking Charge</label>
                                    <select name="parking_charge" class="form-control form-control-sm shadow-none">
                                        <option value="" selected disabled>select parking charge</option>
                                        <?php foreach($parking_area_no as $p):?>
                                        <option value="<?=$p->parking_charge;?>" <?php if($this->datawork->count_data('add_vehicle',['vehicle_type'=>$p->vehicle_type,'status'=>0])==$p->vehicle_limit){echo "disabled";}?>><?=$p->parking_charge;?>/- | ------------------- <span>(<?=$p->vehicle_type;?>)</span></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Add new vehicle" class="mt-4 btn btn-sm btn-block bg-success text-white shadow-none">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h2 class="text-muted h6 small"><b><i class="fab fa-staylinked fa-xs"></i>&nbsp; Limitation of vehicles</b></h2>
                            <hr class="m-0 p-0">
                            <?php foreach ($category as $c):?>
                            <?php $test = $c->vehicle_limit - $this->datawork->count_data('add_vehicle',['vehicle_type'=>$c->vehicle_type,'status'=>0]); ?>
                            <div class="media mt-4">
                                <div class="media-body">
                                    <small><?= $c->vehicle_type;?></small><br>
                                    <small><b>vehicle limit: </b><span class="<?php if($test==0){echo "text-danger font-weight-bold";} ?>"><?= $test;?></span> out of <?=$c->vehicle_limit;?></small>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3 ml-5">
                    <div class="card border-0 shadow-none">
                        <div class="card-body">
                            <h2 class="h6 text-muted"><i class="fas fa-receipt"></i>&nbsp; Receipts</h2>
                            <table class="table mt-4 table-borderless">
                                <tr>
                                    <th><small><b>Serial No.</b></small></th>
                                    <th><small><b>Vehicle Number</b></small></th>
                                    <th><small><b>Parking Area Number</b></small></th>
                                    <th><small><b>Arrival Time</b></small></th>
                                    <th><small><b>Status</b></small></th>
                                    <th><small><b>Action</b></small></th>
                                </tr>
                                <?php foreach($add_vehicle as $a):?>
                                <tr>
                                    <td><small><?=$a->id;?></small></td>
                                    <td><small><?=$a->vehicle_no;?></small></td>
                                    <td><small><?=$a->parking_area_no;?></small></td>
                                    <td><small><?=$a->arrival_time;?></small></td>
                                    <td><small><?php if($a->status==0):?>
                                        
                                        <small class="text-white badge badge-success badge-pill"><b>Arrive</b></small>
                                        <?php else:?>
                                        <small class="text-white badge badge-danger badge-pill"><b>Departured</b></small>
                                        
                                        <?php endif;?></small></td>
                                    <td>                                       
                                       <?= anchor_popup('admin/receipt/'.$a->id,'&nbsp; <i class="fas fa-eye fa-xs"></i> &nbsp;',['class'=>"btn btn-info btn-sm shadow-none"]);?>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php');?>
