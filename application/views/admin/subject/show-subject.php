<?php $this->load->view('public/header');?>
<?php $this->load->view('public/sidebar');?> 
<?php $this->load->view('public/breadcrumb');?> 

    <section class="content">
        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-header">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <?php $this->load->view('public/flashdata-message');?> 
        <thead>
        <tr>
        <th>S. No. </th>
        <th>Name</th>
        <th>Group Name</th>
        <th>Class Name</th>
        <th>Subject Code</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php  if(isset($get_subject)) { $i=1;  
        foreach($get_subject as $value) { ?> 
        <tr>
        <td><?=$i?></td>
        <td><?=$value->name?></td>
        <td><?=$value->group_name?></td>
        <td><?=$value->class_name?></td>
        <td><?=$value->subject_code?></td>
        <td>
            <a href="<?=base_url('subject/edit/'.$value->id);?>">
                <i class="ace-icon fa fa-edit bigger-130"></i></a>
            <a id="swldelete" href="<?=base_url('subject/delete/'.$value->id);?>">
                <i class="ace-icon fa fa-trash bigger-130 btn-dlete"></i></a>
        </td>

        </tr> <?php $i++; } } else {  ?>
        <tr>
        <td colspan="5">No Data Available</td>
        </tr>
        <?php } ?>
        </tbody>
        </table>

        </div>
        <p><?=$links; ?></p>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->

        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
<?php $this->load->view('public/footer');?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
 swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your imaginary file is safe!");
  }
});
 
</script>