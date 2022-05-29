<!DOCTYPE html>
<html lang="en">
<head>
  <title>CRUD PROJECT CI4</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
    <div class="card">
    <div class="card-header">
        <h2>Codeigniter 4 CRUD Operations <a href="<?php echo base_url('student-create');?>" class="btn btn-primary float-end">Add Student</a></h2>
    </div>
            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Image</th>
        <!-- <th>Status</th> -->
        <th>Action</th>
      </tr>
    </thead>

    <?php foreach($student as $row):?>
        <tbody>
          <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['phone'];?></td>

            <?php if($row['image']==NULL){
              ?>
              <td><img src="<?php echo 'public/upload/images.jpg'?>"height="100" width="100"></td>
              <?php
            }else{
              ?>
              <td><img src="<?php echo 'public/upload/'.$row['image'];?>"height="100" width="100"></td>
              <?php
            }
            ?>
            <!-- <td><?php echo $row['status']? "NEW":"OLD";?></td> -->
            <td><a href="<?php echo base_url('student-edit/'.$row['id']);?>" class="btn btn-secondary">Edit</a><a href="<?php echo base_url('student-delete/'.$row['id']);?>" class="btn btn-danger ms-1">Delete</a></td>

          </tr>
        </tbody>
    <?php endforeach;?>
  </table>
</div>
</div>
</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  $(document).ready(function()
  {
    <?php
    if(session()->getFlashdata('status'))
    {
      ?>
      swal({
        title: "<?php echo session()->getFlashdata('status');?>",
        icon: "<?php echo session()->getFlashdata('status_icon');?>",
        button: "Done!",
      });
      <?php
    }
    ?>

  });
</script>
</body>
</html>
