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
        <div class="col-8 offset-3 mr-5 mt-5">
            <div class="row">
                <div class="col-12 ml-5">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h2 class="h6 text-muted"><i class="fas fa-search"></i> &nbsp;Search For Any Purpose | <small><span class="text-danger">O</span>nly the records of the last 30 days are available here</small></h2>
                            <div class="row">
                                <div class="col-8 mx-auto">
                                    <form action="<?=base_url('admin/search/'.'searching'.'/');?>" method="get" class="mt-5">
                                       <div class="input-group mb-3">
                                          <input type="search" name="search" class="form-control shadow-none rounded-0" placeholder="Search by vehicle no. OR Receipt serial no.">
                                          <div class="input-group-append">
                                            <button class="btn btn-secondary shadow-none rounded-0" type="submit" name="find"><i class="fas fa-search"></i></button>
                                          </div>
                                        </div>
                                   </form>
                                </div>
                            </div> <br>
                            <?php if($this->uri->segment(3)=='searching'):?>
                                <table class="table mt-4 table-borderless">
                                <tr>
                                    <th><small><b>S.No.</b></small></th>
                                    <th><small><b>Vehicle Number</b></small></th>
                                    <th><small><b>Vehicle Type</b></small></th>
                                    <th><small><b>Parking Area Number</b></small></th>
                                    <th><small><b>Parking Charge</b></small></th>
                                    <th><small><b>Arrival Time</b></small></th>
                                    <th><small><b>Status</b></small></th>
                                </tr>
                                <?php foreach($vehicle_details as $v):?>
                                <tr>
                                    <td><small><?=$v->id;?></small></td>
                                    <td><small><?=$v->vehicle_no;?></small></td>
                                    <td><small><?=$v->vehicle_type;?></small></td>
                                    <td><small><?=$v->parking_area_no;?></small></td>
                                    <td><small><i class="fas fa-rupee-sign fa-xs text-muted"></i>&nbsp;<?=$v->parking_charge;?>/-</small></td>
                                    <td><small><?=$v->arrival_time;?></small></td>
                                    <td><small><?php if($v->status==0):?>
                                        
                                        <small class="text-white badge badge-success badge-pill"><b>Arrive</b></small>
                                        <?php else:?>
                                        <small class="text-white badge badge-danger badge-pill"><b>Departured</b></small>
                                        
                                    <?php endif;?></small></td>
                                </tr>
                                <?php endforeach;?>
                            </table>
                            <?php else:?>
                            <h5 class="text-center text-danger mt-5 mb-5">
                                No results temporarily, please search here and get results.
                            </h5>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php');?>
