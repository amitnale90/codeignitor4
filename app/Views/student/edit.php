<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Student</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <?php if(isset($validation)):?>
                <div class="alert alert-danger">
                <strong><?php echo $validation->listErrors()?></strong>
                </div>
            <?php endif;?>
            <div class="card shadow">
        <div class="card-body">
  <h2>Add Student <a href="<?php echo base_url('student');?>" class="btn btn-primary float-end">Back</a></h2>
  <form action="<?php echo base_url('student/update/'.$studentmodel['id']);?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
        <label for="name">Name:</label>
        <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" value="<?= $studentmodel['name']?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?= $studentmodel['email']?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="phone">Phone:</label>
        <input type="phone" class="form-control" id="phone" placeholder="Enter phone" name="phone" value="<?= $studentmodel['phone']?>">
    </div>
    <div class="mb-3 mt-3">
        <label for="image">Image:</label>
        <input type="file" class="form-control" id="image" placeholder="Enter image" name="image" accept="image/*">
    </div>
    <!-- <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="status"> Status
      </label>
    </div> -->
    <button type="submit" class="btn btn-primary" name="submit">Update</button>
  </form>
  </div>
  </div>
</div>
</div>
</div>

</body>
</html>
