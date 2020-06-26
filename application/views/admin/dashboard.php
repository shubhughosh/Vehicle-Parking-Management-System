<?php include('header.php');?>

<div class="container-fluid p-0">
    <div class="row no-gutters">
        <div class="col-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body m-0 p-0">
                    <?php include('sidebar.php');?>
                </div>
            </div>
        </div>
        <div class="col-7 offset-1 mt-5">
          <h6 class="alert alert-danger mb-4" id="notification"><b>NOTE : &nbsp;</b><span class="text-danger">O</span>nly the records of the last 30 days are available here... <span class="float-right"><a href="#" class="btn-flat border-0"><i class="fas fa-times text-danger" onclick="myFunction();"></i></a></span></h6>
           <div class="row">
               <div class="col-6">
                   <div class="card rounded-0 border-0 shadow-sm bg-success text-white">
                       <div class="card-body">
                          <div class="row">
                              <div class="col-7"><br>
                                 <h1 class="ml-2"><?=$this->datawork->count_data('add_vehicle',['id!='=>0]);?></h1>
                                 <h6 class="my-3">Total Records</h6>
                              </div>
                              <div class="col-5"><br>
                                  <ul class="ml-auto my-2">
                                    <i class="fas fa-layer-group fa-4x"></i>
                                  </ul>
                              </div>
                          </div>
                       </div>
                       <br>
                   </div>
               </div>
               <div class="col-6">
                   <div class="card rounded-0 border-0 shadow-sm bg-info text-white">
                       <div class="card-body">
                          <div class="row">
                              <div class="col-7"><br>
                                 <h1 class="ml-2"><?=$this->datawork->count_data('add_vehicle',['status'=>0]);?></h1>
                                 <h6 class="my-3">Total parked vehicles</h6>
                              </div>
                              <div class="col-5"><br>
                                  <ul class="ml-auto my-2">
                                    <i class="fas fa-anchor fa-4x"></i>
                                  </ul>
                              </div>
                          </div>
                       </div>
                       <br>
                   </div>
               </div>
               <div class="col-6">
                   <div class="card rounded-0 border-0 shadow-sm bg-primary text-white mt-4">
                       <div class="card-body">
                          <div class="row">
                              <div class="col-7"><br>
                                 <h1 class="ml-2"><?=$this->datawork->count_data('category',['cat_id!='=>NULL]);?></h1>
                                 <h6 class="my-3">Total Category</h6>
                              </div>
                              <div class="col-5"><br>
                                  <ul class="ml-auto my-2">
                                    <i class="fas fa-th-list fa-4x"></i>
                                  </ul>
                              </div>
                          </div>
                       </div>
                       <br>
                   </div>
               </div>
               <div class="col-6">
                   <div class="card rounded-0 border-0 shadow-sm bg-secondary text-white mt-4">
                       <div class="card-body">
                          <div class="row">
                              <div class="col-7">
                                 <br>
                                 <h1 class="ml-2"><i class="fas fa-rupee-sign fa-xs"></i>&nbsp;<?=$this->datawork->column_sum('parking_charge','add_vehicle');?>/-</h1>
                                 
                                 <h6 class="my-3">Total Income</h6>
                              </div>
                              <div class="col-5"><br>
                                  <ul class="ml-auto my-2">
                                    <i class="fas fa-money-check-alt fa-4x"></i>
                                  </ul>
                              </div>
                          </div>
                       </div>
                       <br>
                   </div>
               </div>
           </div> 
        </div>
    </div>
</div>

<script>
function myFunction() {
    var x = document.getElementById("notification");
    if (x.style.display === "block") {
        x.style.display = "none";
    } 
    else {
        x.style.display = "none";
    }
}
</script>

<?php include('footer.php');?>
