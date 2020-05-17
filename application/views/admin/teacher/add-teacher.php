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
        <h3 class="card-title">Add Teacher</h3>
        </div>

        
        <?php $this->load->view('public/flashdata-message');?> 
        
    <div class="card-body">
        <?php  echo form_open('teacher/insert', array('method'=>'post', 'name'=>'teacher')) ;?>
        <div class ="row main-content">
        <div class="col-md-4">
        <div class="form-group">
        <?php echo form_label('Name');?>
        <?php echo form_input(array('name'=>'name', 'class'=>'form-control',  'value'=>set_value('name'),'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter Teacher Name"));?>
        </div>
        <div class=" alert-danger"><?php echo form_error('name'); ?></div>
        </div>
        
        <div class="col-md-4">
        <div class="form-group">
        <?php echo form_label('Gender');?>
        <?php echo form_input(array('name'=>'gender', 'class'=>'form-control',  'value'=>set_value('gender'),'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter  Gender"));?>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <?php echo form_label('Email');?>
        <?php echo form_input(array('name'=>'email', 'class'=>'form-control',  'value'=>set_value('email'),'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter  Email"));?>
        </div>
        <div class=" alert-danger"><?php echo form_error('email'); ?></div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <?php echo form_label('Date of birth');?>
        <?php echo form_input(array('name'=>'dob', 'class'=>'form-control',  'value'=>set_value('dob'),'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter  date of birth"));?>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <?php echo form_label('Blood Group');?>
        <?php echo form_input(array('name'=>'blood_group', 'class'=>'form-control',  'value'=>set_value('blood_group'),'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter  Blood Group"));?>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <?php echo form_label('Phone');?>
        <?php echo form_input(array('name'=>'phone', 'class'=>'form-control',  'value'=>set_value('phone'),'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter  phone"));?>
        </div>
        <div class=" alert-danger"><?php echo form_error('phone'); ?></div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <?php echo form_label('Father Name');?>
        <?php echo form_input(array('name'=>'father_name', 'class'=>'form-control',  'value'=>set_value('father_name'),'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter  Father Name"));?>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <?php echo form_label('Father Number');?>
        <?php echo form_input(array('name'=>'father_cell', 'class'=>'form-control',  'value'=>set_value('father_cell'),'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter  Father Number"));?>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <?php echo form_label('Present Address');?>
        <?php echo form_input(array('name'=>'present_address', 'class'=>'form-control',  'value'=>set_value('present_address'),'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter  Present Address"));?>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <?php echo form_label('Parmanent Address');?>
        <?php echo form_input(array('name'=>'parmanent_address', 'class'=>'form-control',  'value'=>set_value('parmanent_address'),'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter  Parmanent Address"));?>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <?php echo form_label('Religion');?>
        <?php echo form_input(array('name'=>'religion', 'class'=>'form-control',  'value'=>set_value('religion'),'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter  Religion"));?>
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <?php echo form_label('Nationality');?>
        <?php echo form_input(array('name'=>'nationality', 'class'=>'form-control',  'value'=>set_value('nationality'),'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter  Nationality"));?>
        </div>
        </div>
        <?php echo form_input(array('type'=>'submit', 'value'=>"Add", 'name'=>'add_teacher', 'id'=>"add_group", 'class'=>'btn btn-info '));?>
    
</div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->


        </div>

        <!--/.col (right) -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->


<?php $this->load->view('public/footer');?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?=base_url();?>assets/dist/js/jquery-validation/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(function() {
      $("form[name='teacher']").validate({
        validClass: "is-valid",
        errorClass: "is-invalid",
        errorElement: "div",
        errorLabelContainer: '.invalid-feedback',
        rules: {
        name: "required",
        phone: "required",
        
        email: {
            required: true,
            email: true
        },
    },
        messages: {
        name: "Please enter your Name",
        phone: "Please enter your phone",
        email: "Please enter a valid email address"
        },
        submitHandler: function(form) {
        form.submit();
        }
        });
    });
</script>