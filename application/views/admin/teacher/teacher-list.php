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
        <th>Phone</th>
        <th>Created Date</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if(isset($getValue)) { $i=1;  
        foreach($getValue as $value) { ?> 
        <tr>
        <td><?=$i?></td>
        <td><?=$value->name?></td>
       <td><?=$value->phone?></td>
        <td><?=date('d-m-Y',strtotime($value->created_at))?></td>
        <td>
            <a href="<?=base_url('teacher/edit/'.$value->id);?>">
                <i class="ace-icon fa fa-edit bigger-130"></i></a>
            <a href="<?=base_url('teacher/delete/'.$value->id);?>">
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
