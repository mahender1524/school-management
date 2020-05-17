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
        <h3 class="card-title">Add Section</h3>
        </div>

        
        <?php $this->load->view('public/flashdata-message');?> 
        
        <div class="card-body">
        <?=form_open('section/insert', array('name'=>'section', 'method'=>'post'))?>
        <div class="form-group">
        <?=form_label('Section Name');?>
        <?=form_input(array('name'=>'name', 'class'=>'form-control', 'value'=>set_value('name'),'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter Your Group Name"));?>
        
        </div>
        <div class="alert-danger"><?=form_error('name')?></div>

            <div class="form-group">
            <?php echo form_label('Section Description');?>
            <?php echo form_input(array('name'=>'description', 'class'=>'form-control', 'value'=>set_value('description'), 'type'=>'text', 'id'=>'description', 'placeholder'=>"Enter Your Class Description"));?>
            <div class="alert-danger"><?=form_error('description')?></div>
            </div>

            <div class="form-group">
            <?php echo form_label('Class Name');?>
            <select name="class_id" class="form-control">
            <option value="">--select Status--</option>
            <?php foreach($class as $value) { ?>  
            <option value="<?=$value->id; ?> "><?=$value->name;?></option>

            <?php } ?>
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