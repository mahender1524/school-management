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
        <h3 class="card-title">Add Group</h3>
        </div>

        
        <?php $this->load->view('public/flashdata-message');?> 
        
        <div class="card-body">
        <?=form_open('group/insert', array('name'=>'form_group', 'method'=>'post'))?>
        <div class="form-group">
        <?=form_label('Name');?>
        <?=form_input(array('name'=>'name', 'class'=>'form-control', 'value'=>'','type'=>'text', 'id'=>'name', 'placeholder'=>"Enter Your Group Name"));?>
        
        </div>
        <div class="alert-danger"><?=form_error('name')?></div>

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