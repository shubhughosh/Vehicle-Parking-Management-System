<?php
class Admin Extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('admin')){
			redirect('home/index');
		}
        else{
            $data['test'] = $this->datawork->calling_data('add_vehicle');
            foreach ($data['test'] as $t){
                $date_on_record = date_create($t->arrival_time);
                $date_now = date_create(date('y-m-d'));
                $days = date_diff($date_on_record,$date_now);
                if($days->format("%a")>=31){
                    $this->datawork->delete_data('add_vehicle',['id'=>$t->id]);
                }
            }
        }
	}
    public function logout(){
		$this->session->unset_userdata('admin');
		redirect('home/index');
	}
    
    public function index(){
        $data['user'] = $this->datawork->calling_data('admin');
        $data['add_vehicle'] = $this->datawork->calling_data('add_vehicle');
        $this->load->view('admin/dashboard',$data);
    }
    public function category(){
        $this->form_validation->set_rules('parking_area_no','parking_area_no','required');
        $this->form_validation->set_rules('vehicle_type','vehicle_type','required');
        $this->form_validation->set_rules('parking_charge','parking_charge','required');
        $this->form_validation->set_rules('vehicle_limit','vehicle_limit','required');
        if($this->form_validation->run()){
            $data = [
                'parking_area_no' => $_POST['parking_area_no'],
                'vehicle_type' => $_POST['vehicle_type'],
                'parking_charge' => $_POST['parking_charge'],
                'vehicle_limit' => $_POST['vehicle_limit'],
            ];
            $this->datawork->insert_data('category',$data);
            redirect('admin/category');
        }
        else{
            $data['category'] = $this->datawork->calling_data('category');
            $data['categoryy'] = $this->datawork->calling_data('category',['status'=>1]);
            $data['user'] = $this->datawork->calling_data('admin');
            $this->load->view('admin/category',$data);
        }
    }
    function status($action=NULL,$id=NULL,$status=NULL){
        if($action=="status_active"){
            $this->datawork->update_data('category',['status'=>$status+=1],['cat_id'=>$id]);
            redirect('admin/category');
        }
        elseif($action=="status_deactivate"){
            $this->datawork->update_data('category',['status'=>$status-=0],['cat_id'=>$id]);
            redirect('admin/category');
        }
    }
    public function delete($action=NULL,$id=NULL){
        if($action=="category"){
            $this->datawork->delete_data('category',['cat_id'=>$id]);
            redirect('admin/category');
        }
    }
    public function edit($action=NULL,$id=NULL){
        if($action=="edit_category"){
            $this->form_validation->set_rules('parking_area_no','parking_area_no','required');
            $this->form_validation->set_rules('vehicle_type','vehicle_type','required');
            $this->form_validation->set_rules('parking_charge','parking_charge','required');
            $this->form_validation->set_rules('vehicle_limit','vehicle_limit','required');
            if($this->form_validation->run()){
                $data = [
                    'parking_area_no'=>$_POST['parking_area_no'],
                    'vehicle_type'=>$_POST['vehicle_type'],
                    'parking_charge'=>$_POST['parking_charge'],
                    'vehicle_limit'=>$_POST['vehicle_limit'],
                ];
                $this->datawork->update_data('category',$data,['cat_id'=>$id]);
                redirect('admin/category');
            }
            $data['category'] = $this->datawork->calling_data('category',['cat_id'=>$id]);
            $this->load->view('admin/edit_category',$data);
        }
    }
    public function add_vehicle(){
        $this->form_validation->set_rules('vehicle_number','vehicle_number','required');
        $this->form_validation->set_rules('vehicle_type','vehicle_type','required');
        $this->form_validation->set_rules('parking_area_number','parking_area_number','required');
        $this->form_validation->set_rules('parking_charge','parking_charge','required');
        if($this->form_validation->run()){
            $data = [
                'vehicle_no' => $_POST['vehicle_number'],
                'vehicle_type' => $_POST['vehicle_type'],
                'parking_area_no' => $_POST['parking_area_number'],
                'parking_charge' => $_POST['parking_charge'],
            ];
            $this->datawork->insert_data('add_vehicle',$data);
            redirect('admin/add_vehicle');
        }
        else{            
            $data['parking_area_no'] = $this->datawork->calling_data('category',['status'=>1]);
            $data['category'] = $this->datawork->calling_data('category',['status'=>1]);
            $data['add_vehicle'] = $this->datawork->calling_data('add_vehicle',['status'=>0],['id'=>'DESC']);
            $data['user'] = $this->datawork->calling_data('admin');
            $this->load->view('admin/add_vehicle',$data);
        }
    }
    public function receipt($id=NULL){
        $data['receipt'] = $this->datawork->calling_data('add_vehicle',['id'=>$id]);
        $this->load->view('admin/receipt',$data);
    }
    public function manage_vehicle(){
        if(isset($_GET['find'])){
            $search = $_GET['search'];
            $data['manage_vehicle'] = $this->datawork->search_data('add_vehicle',['vehicle_no'=>$search]);
            $data['user'] = $this->datawork->calling_data('admin');
            $this->load->view('admin/manage_vehicle',$data);
        }
        else{
            $data['manage_vehicle'] = $this->datawork->calling_data('add_vehicle');
            $data['user'] = $this->datawork->calling_data('admin');
            $this->load->view('admin/manage_vehicle',$data);
        }
    }
    function vehicle_outgoing($id=NULL,$status=NULL){
        $this->datawork->update_data('add_vehicle',['status'=>$status+=1],['id'=>$id]);
        redirect('admin/manage_vehicle');
    }
    public function reports(){
        $data['add_vehicle'] = $this->datawork->calling_data('add_vehicle');
        $data['user'] = $this->datawork->calling_data('admin');
        $this->load->view('admin/reports',$data);
    }
    public function search(){
        if(isset($_GET['find'])){
            $search = $_GET['search'];
            $data['vehicle_details'] = $this->datawork->search_data('add_vehicle',['vehicle_no'=>$search,'id'=>$search]);
            $data['user'] = $this->datawork->calling_data('admin');
            $this->load->view('admin/search',$data);
        }
        else{
            $data['user'] = $this->datawork->calling_data('admin');
            $this->load->view('admin/search',$data);
        }
    }
    public function setting(){
//        if($action=='change_username'){
//            $this->form_validation->set_rules('new_username','new_username','required');
//            $this->form_validation->set_rules('password','password','required');
//            if($this->form_validation->run()){
//                if($this->datawork->check_data('admin',['password'=>$_POST['password']])){
//                    $this->datawork->update_data('admin',['username'=>$_POST['new_username']],['username'=>$_SESSION['admin']]);
//                    redirect('admin/setting');
//                }
//                else{
//                    $this->session->set_flashdata("message","<div class='alert alert-danger'><i class='fas fa-times-circle'></i>&nbsp; <b>Incorrect password, please try again...</b></div>");
//                }
//            }
//        }
        
        
        $this->form_validation->set_rules('current_password','current_password','required');
        $this->form_validation->set_rules('new_password','new_password','required');
        $this->form_validation->set_rules('reenter_password','reenter_password','required');
        if($this->form_validation->run()){
            if($this->datawork->check_data('admin',['password'=>$_POST['current_password']])){
                if($_POST['new_password']==$_POST['reenter_password']){
                    $this->datawork->update_data('admin',['password'=>$_POST['new_password']],['username'=>$_SESSION['admin']]);
                    $this->session->set_flashdata("message","<div class='alert alert-success'><i class='fas fa-check-double'></i>&nbsp; <b>Your password is successfully changed.</b></div>");
                    redirect('admin/setting');
                }
                else{
                    $this->session->set_flashdata("message","<div class='alert alert-danger'><i class='fas fa-times text-danger'></i>&nbsp; <b>Your password does not match with confirm password, please try again...</b></div>");
                }
            }
            else{
                $this->session->set_flashdata("message","<div class='alert alert-danger'><i class='fas fa-times text-danger'></i>&nbsp; <b>Your password does not match with current password, please try again...</b></div>");
            }
        }
        $data['user'] = $this->datawork->calling_data('admin');
        $this->load->view('admin/setting',$data);
    }
    
}
?>