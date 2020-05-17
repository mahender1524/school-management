<?php $this->load->view('public/header');?>
<?php $this->load->view('public/sidebar');?> 
<?php $this->load->view('public/breadcrumb');?> 
<!-- Main content -->
        <section class="content">
        <div class="container-fluid">
        <div class="row">
        <!-- left column -->
        <div class="col-md-6 mx-auto">
        <!-- Form Element sizes -->
        <div class="card card-info">
        <div class="card-header">
        <h3 class="card-title">Add Class</h3>
        </div>

        
        <?php $this->load->view('public/flashdata-message');?> 
        
        <div class="card-body">
        <?=form_open('classes/insert', array('name'=>'class', 'method'=>'post'))?>
        <div class="form-group">
        <?=form_label('Class Name');?>
        <?=form_input(array('name'=>'name', 'class'=>'form-control', 'value'=>set_value('name'),'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter Your Group Name"));?>
        
        </div>
        <div class="alert-danger"><?=form_error('name')?></div>


        <div class="form-group">
        <?php echo form_label('Group Name');?>
        <select name="group_id" class="form-control">
        <option value="">--select Group--</option>
        <?php foreach($group_name as $value) { ?>  
        <option value="<?=$value->id; ?> "><?=$value->name;?></option>

        <?php } ?>

        </select>
        </div>
         <div class="alert-danger"><?=form_error('group_id')?></div>
        <div class="form-group">
        <?=form_label('Status');?>
        <select name="is_active" class="form-control"> 
        <option value="">--select Status--</option>
        <option value="1">Active</option>
        <option value="0">Inactive</option>
        </select>
        </div>


        <?=form_input(['type'=>'submit', 'name'=>'Add', 'value'=>'Add', 'class'=>'btn btn-info'])?>
        <?=form_close();?>
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
      $("form[name='class']").validate({
        validClass: "is-valid",
        errorClass: "is-invalid",
        errorElement: "div",
        errorLabelContainer: '.invalid-feedback',
        rules: {
        name: "required",
        group_id: "required",
        },
        messages: {
        name: "Please enter your Name",
        group_id: "Please select the Group ",
        },
        submitHandler: function(form) {
        form.submit();
        }
        });
    });
</script>