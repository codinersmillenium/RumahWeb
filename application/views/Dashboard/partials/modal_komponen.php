<?php foreach ($parseData as $key => $value){
                ?>
<div class="modal fade" id="detail<?= $value['id'];?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Detail User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card">
  <img src="<?= $value['avatar']; ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $value['email']; ?></h5>
    <p class="card-text">
      First Name: <?= $value['first_name']; ?> <br>
      Last Name: <?= $value['last_name']; ?>
    </p>
  </div>
</div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_add" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('API/Add_user') ?>" method="post">
        <div class="modal-body">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Job</label>
                  <input type="text" name="job" class="form-control" id="exampleInputPassword1">
                </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" name="submit_add" type="submit">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- update data -->
<div class="modal fade" id="modal_update<?= $value['id'];?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Update User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('API/Update_user') ?>" method="post">
        <div class="modal-body">
                <div class="mb-3">
                  <input type="text" disabled="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $value['email'];  ?>">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <input type="hidden" name="id" value="<?= $value['id'];  ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Job</label>
                  <input type="text" name="job" class="form-control" id="exampleInputPassword1">
                </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" name="submit_update" type="submit">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>