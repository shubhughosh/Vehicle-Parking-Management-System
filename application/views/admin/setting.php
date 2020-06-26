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
<!--
                <div class="col-12 ml-5">
                   <?=$this->session->flashdata('message');?>
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h2 class="h6 text-muted"><i class="fas fa-cog"></i> &nbsp;Easily Change Your Username</h2>
                            <form action="<?=base_url('admin/setting/change_username');?>" method="post" class="mt-4">
                                <div class="form-group">
                                    <label class="small m-0 p-0 text-muted">New Username</label>
                                    <input type="text" name="new_username" class="form-control form-control-sm shadow-none" autofocus>
                                </div>
                                <div class="form-group">
                                    <label class="small m-0 p-0 text-muted">Enter Password</label>
                                    <input type="password" name="password" class="form-control form-control-sm shadow-none">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="send" class="btn btn-sm btn-block bg-success text-white shadow-none mt-4" value="Change Username">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
-->
                <div class="col-12 ml-5">
                   <?=$this->session->flashdata('message');?>
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h2 class="h6 text-muted"><i class="fas fa-cog"></i> &nbsp;Change Your Password</h2>
                            <form action="<?=base_url('admin/setting');?>" method="post" class="mt-4">
                                <div class="form-group">
                                    <label class="small m-0 p-0 text-muted">Current Password</label>
                                    <input type="password" name="current_password" class="form-control form-control-sm shadow-none" autofocus>
                                </div>
                                <div class="form-group">
                                    <label class="small m-0 p-0 text-muted">New Password</label>
                                    <input type="password" name="new_password" class="form-control form-control-sm shadow-none">
                                </div>
                                <div class="form-group">
                                    <label class="small m-0 p-0 text-muted">Re enter Password</label>
                                    <input type="password" name="reenter_password" class="form-control form-control-sm shadow-none">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="send" class="btn btn-sm btn-block bg-success text-white shadow-none mt-4" value="Change Password">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php');?>
