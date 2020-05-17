<?php $this->load->view('public/header');?>
<?php $this->load->view('public/sidebar');?> 
<?php $this->load->view('public/breadcrumb');?> 
<!-- Main content -->
        <section class="content">
        <div class="container-fluid">
        <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- Form Element sizes -->
        <div class="card card-info">
        <div class="card-header">
        <h3 class="card-title">Add Student</h3>
        </div>

        
        <?php $this->load->view('public/flashdata-message');?> 
       
        <div class="card-body">
        
        <button class="accordion"><p class="badge badge-success" >Student  Personal Details</p></button>
        <div class="panel">
        
            <div class="row main-content">
            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Registration Number');?>
            <?= form_input(array( 'class'=>'form-control', 'value'=>set_value(''),'type'=>'text', 'id'=>'name', 'placeholder'=>"Registration Number Auto Fill" , 'disabled'=>'disabled'));?>
            <div class="text-danger"><?=form_error('')?></div>
            </div> 
            </div>

            <div class="col-md-3">
            <div class="form-group">
            <?= form_label(' Stuent Name');?>  
            <?= form_input(array('name'=>'name', 'class'=>'form-control', 'value'=>set_value('name'), 'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter Your Name"));?>
            <div class="text-danger"><?=form_error('name')?></div>
            </div>
            </div>

            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Roll Number');?>
            <?= form_input(array('name'=>'roll_no', 'class'=>'form-control', 'value'=>set_value('roll_no'), 'type'=>'text', 'id'=>'roll_no', 'placeholder'=>"Enter Your Roll Number"));?>
            <div class="text-danger"><?=form_error('roll_no')?></div>
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
            <?php echo form_label('Student Profile:');?>
            <?php echo form_input(array('name'=>'userfile', 'value'=>set_value('userfile'), 'type'=>'file', 'class'=>'form-control'));?>

            </div></div>

            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Email');?>
            <?= form_input(array('name'=>'email', 'class'=>'form-control', 'value'=>set_value('email'), 'type'=>'text', 'id'=>'email', 'placeholder'=>"Enter Your Email Id"));?>
            <div class="text-danger"><?=form_error('email')?></div>
            </div>
            </div>


            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Gender');?>
            <select name="gender" class="form-control">
            <option value="">--select Gender--</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
            </select>
            </div>
            </div>

            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Date Of Birth');?>
            <?= form_input(array('name'=>'dob', 'class'=>'form-control', 'value'=>set_value('dob'), 'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter Date Of Birth"));?>
            <div class="text-danger"><?=form_error('dob')?></div>
            </div>
            </div>

            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Class Name');?>
            <select name="class_id" class="form-control">
            <option value="">--select Status--</option>
            <?php foreach($class as $value) { ?>  
            <option value="<?=$value->id; ?> "><?=$value->name;?></option>
            <?php } ?>
            </select>
            </div>
            </div>


            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Section Name');?>
            <select name="section_id" class="form-control">
            <option value="">--select Status--</option>
            <?php foreach($section as $value) { ?>  
            <option value="<?=$value->id; ?> "><?=$value->name;?></option>
            <?php } ?>
            </select> 
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Group Name');?>
            <select name="group_id" class="form-control">
            <option value="">--select Status--</option>
            <?php foreach($group as $value) { ?>  
            <option value="<?=$value->id; ?> "><?=$value->name;?></option>
            <?php } ?>
            </select>
            </div>
            </div>

            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Blood Group');?>
            <?= form_input(array('name'=>'blood_group', 'class'=>'form-control', 'value'=>set_value('blood_group'), 'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter Blood Group"));?>
            <div class="text-danger"><?=form_error('blood_group')?></div>
            </div>
            </div>

            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Session Start');?>
            <?= form_input(array('name'=>'session', 'class'=>'form-control', 'value'=>set_value('session'),'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter Your Session "));?>
            <div class="text-danger"><?=form_error('session')?></div>
            </div> 
            </div>

            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Discount');?>
            <?= form_input(array('name'=>'discount', 'class'=>'form-control', 'value'=>set_value('discount'),'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter Your Discount"));?>
            <div class="text-danger"><?=form_error('discount')?></div>
            </div> 
            </div>

            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Religion');?>
            <?= form_input(array('name'=>'religion', 'class'=>'form-control', 'value'=>set_value('religion'), 'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter Religion "));?>
            <div class="text-danger"><?=form_error('religion')?></div>
            </div>
            </div>

            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Cast');?>
            <?= form_input(array('name'=>'cast', 'class'=>'form-control', 'value'=>set_value('cast'),'type'=>'text', 'id'=>'cast', 'placeholder'=>"Enter Cast"));?>
            <div class="text-danger"><?=form_error('cast')?></div>
            </div> 
            </div>

            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Nationality');?>
            <?= form_input(array('name'=>'nationality', 'class'=>'form-control', 'value'=>set_value('nationality'),'type'=>'text', 'id'=>'cast', 'placeholder'=>"Enter Nationality"));?>
            <div class="text-danger"><?=form_error('nationality')?></div>
            </div> 
            </div>

            </div>
        </div>

        <button class="accordion"><span class="badge badge-secondary">Parents Information</span></button>
        <div class="panel">
        
            <div class="row main-content">
            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Father Name');?>
            <?= form_input(array('name'=>'father_name', 'class'=>'form-control', 'value'=>set_value('father_name'), 'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter Father Name"));?>
            <div class="text-danger"><?=form_error('father_name')?></div>
            </div>
            </div>

            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Father cell Number');?>
            <?= form_input(array('name'=>'father_cell_no', 'class'=>'form-control', 'value'=>set_value('father_cell_no'),'type'=>'text', 'id'=>'cast', 'placeholder'=>"Enter Father cell Number"));?>
            <div class="text-danger"><?=form_error('father_cell_no')?></div>
            </div> 
            </div>

            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Mother Name');?>
            <?= form_input(array('name'=>'mother_name', 'class'=>'form-control', 'value'=>set_value('mother_name'), 'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter Mother Name"));?>
            <div class="text-danger"><?=form_error('mother_name')?></div>
            </div>
            </div>

            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Mother cell Number');?>
            <?= form_input(array('name'=>'mother_cell_no', 'class'=>'form-control', 'value'=>set_value('mother_cell_no'),'type'=>'text', 'id'=>'cast', 'placeholder'=>"Enter Mother cell Number"));?>
            <div class="text-danger"><?=form_error('mother_cell_no')?></div>
            </div> 
            </div>

            </div>

        </div>

        <button class="accordion"><span class="badge badge-secondary">Address Information</span></button>
        <div class="panel">

            <div class="row main-content">
            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Local Guardian');?>
            <?= form_input(array('name'=>'local_guardian', 'class'=>'form-control', 'value'=>set_value('local_guardian'), 'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter Local Guardian"));?>
            <div class="text-danger"><?=form_error('local_guardian')?></div>
            </div>
            </div>

            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Local Guardian cell');?>
            <?= form_input(array('name'=>'local_guardian_cell', 'class'=>'form-control', 'value'=>set_value('local_guardian_cell'),'type'=>'text', 'id'=>'cast', 'placeholder'=>"Enter Mother cell Number"));?>
            <div class="text-danger"><?=form_error('local_guardian_cell')?></div>
            </div> 
            </div>

            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Present Address');?>
            <?= form_input(array('name'=>'present_address', 'class'=>'form-control', 'value'=>set_value('present_address'), 'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter Present Address"));?>
            <div class="text-danger"><?=form_error('present_address')?></div>
            </div>
            </div>

            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Parmanent Address');?>
            <?= form_input(array('name'=>'parmanent_address', 'class'=>'form-control', 'value'=>set_value('parmanent_address'),'type'=>'text', 'id'=>'cast', 'placeholder'=>"Enter Parmanent Address"));?>
            <div class="text-danger"><?=form_error('parmanent_address')?></div>
            </div> 
            </div>
            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Status');?>
            <select name=" is_active" class="form-control"> 
            <option value="">--select Status--</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
            </select>
            </div>
            </div>
            <div class="col-md-3">
            <div class="form-group">
            <?= form_label('Remarks');?>
            <?= form_input(array('name'=>'remarks', 'class'=>'form-control', 'value'=>set_value('remarks'),'type'=>'text', 'id'=>'cast', 'placeholder'=>"Enter Remarks"));?>
            <div class="text-danger"><?=form_error('remarks')?></div>
            </div> 
            </div>

            </div>
        
        </div>


       
        </div>

        <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>

        <!--/.col (right) -->
        </div>
        <!-- /.row -->

  <div class="card" id="accordion">
      <div class="card-header card-info">
        <h4 class="card-title collapse-card-head"  data-card-body="#collapse1">
          <a>Collapsible Group 1</a>
        </h4>
      </div>
      <div id="collapse1" class="card-body hide-body">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
 </div> 
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->


<?php $this->load->view('public/footer');?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?=base_url();?>assets/dist/js/jquery-validation/jquery.validate.min.js"></script>
<script type="text/javascript">
    $('.collapse-card-head').click(function(e){
        var body = $(this).data('card-body');
        $(body).toggleClass('show-body hide-body');
    })
    $(function() {
      $("form[name='form_group']").validate({
        validClass: "is-valid",
        errorClass: "is-invalid",
        errorElement: "div",
        errorLabelContainer: '.invalid-feedback',
        rules: {
        name: "required",
        is_active: "required",
        },
        messages: {
        name: "Please enter your Name",
        is_active: "Please select the status",
        },
        submitHandler: function(form) {
        form.submit();
        }
        });
    });
</script>

