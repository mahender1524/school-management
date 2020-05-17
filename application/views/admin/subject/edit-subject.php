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
        <h3 class="card-title">Add Subject</h3>
        </div>

        
        <?php $this->load->view('public/flashdata-message');?> 
        
        <div class="card-body">
      <?php  echo form_open('Subject/update/'. $getvalue->id, array('method'=>'post', 'name'=>'subject_from')) ;?>
          <div class="form-group">
          <?php echo form_label('Subject Name');?>
          <?php echo form_input(array('name'=>'name', 'class'=>'form-control', 'value'=>"$getvalue->name",'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter Subject Name"));?>
          </div>
          <div class=" alert-danger"><?=form_error('name'); ?></div>
          
          <div class="form-group">
          <?php echo form_label('Subject Code');?>
          <?php echo form_input(array('name'=>'subject_code', 'class'=>'form-control', 'value'=>"$getvalue->subject_code",'type'=>'text', 'id'=>'name', 'placeholder'=>"Enter  Subject Code"));?>
          </div>
          <div class=" alert-danger"><?php echo form_error('subject_code'); ?></div>
 
            <div class="form-group">
                <?php echo form_label('Class Name');?>
                <select name="class_id" class="form-control">
                  <option value="">--select Status--</option>
                  <?php foreach($class as $value) { ?>  
                  <option value="<?=$value->id; ?> " <?=($getvalue->class_id ==$value->id)? 'selected' : ''?>><?=$value->name;?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <?php echo form_label('Group Name');?>
                <select name="group_id" class="form-control">
                  <option value="">--select Status--</option>
                  <?php foreach($group as $value) { ?>  
                  <option value="<?=$value->id; ?> " <?=($getvalue->group_id ==$value->id)? 'selected' : ''?>><?=$value->name;?></option>
                  <?php } ?>
                </select>
            </div>
          <div class="form-group">
          <?php echo form_label('Marks');?>
          <?php echo form_input(array('name'=>'marks_value', 'class'=>'form-control', 'value'=>"$getvalue->marks_value",'type'=>'text', 'id'=>'marks_value', 'placeholder'=>"Enter  Marks"));?>
          </div>
          
          <!-- /.card-body -->

          <?=form_input(['type'=>'submit', 'name'=>'Update', 'value'=>'Update', 'class'=>'btn btn-warning'])?>
        <?=form_close();?></div>
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