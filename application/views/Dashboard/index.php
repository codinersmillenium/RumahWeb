<!-- <?php 
// if ($token!="QpwL5tke4Pnpja7X4") {
//     redirect('Login');    
// }
 ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>


</head>

<body>

    <div class="container bg-warning text-white">
        <div class="row">
    <div class="col-12 py-4 text-center">
        <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
      <a class="navbar-brand" >    
    Home
</a>
    <form class="d-flex">
      <input class="form-control me-2" type="text" placeholder="Search ID Users" id="search" aria-label="Search">
      <button class="btn btn-outline-success" disabled="" style="margin-right: 10px;">Search</button>
      <a href="<?= base_url('Login/logout')  ?>"><button type="button" class="btn btn-danger">Logout</button></a>
    </form>
  </div>
</nav>
            </div>
        </div>
    </div>
    <div class="container col-lg-12 mt-3 mb-3" style="background-color:#E6E6FA;">
        <div class="form-group">
        <a href="#modal_add" data-bs-toggle="modal" title="Add User" >
            <img src="https://img.icons8.com/external-bearicons-blue-bearicons/64/000000/external-sign-up-call-to-action-bearicons-blue-bearicons-1.png">
        </a>
    </div>
    </div>
    <div class="container border p-md-5 p-2">
    <div class="row g-md-4">
         <nav aria-label="Page navigation example">
  <ul class="pagination" style="float: right;">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
     <?php
        for ($i=1; $i <= intval($total_pages) ; $i++) {         
                ?>

    <li class="page-item"><a class="page-link" href="<?= base_url('Dashboard/index?total_pages=8&pages='.$i.'') ?>"><?= $i; ?></a></li>
<?php } ?>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
    </div>
        <div class="row g-2 g-md-4" id="result">
             <?php foreach ($parseData as $key => $value){
                ?>
            <div class="col-6 col-md-3">
                <img class="w-100" src="<?= $value['avatar']; ?>" alt="gambar alam">
            <div class="d-grid gap-2 mt-2">
                <div class="btn-group dropup">
  <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Option
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" data-bs-toggle="modal" href="#modal_update<?= $value['id'];?>" role="button">Update</a></li>
    <li><a class="dropdown-item" style="color:red;" href="<?= base_url('API/Delete_user?delete='.$value['id'].'') ?>">Delete</a></li>
    <li><a class="dropdown-item" data-bs-toggle="modal" href="#detail<?= $value['id'];?>" role="button">Detail</a></li>
  </ul>
</div>
            </div>
            </div>
        <?php } ?>
        </div>
<!-- search live ajax -->
 <div class="row g-2 g-md-4">
    <div id="result_ajax"></div>
</div>
    </div>

</body>
<script type="text/javascript">
$(document).ready(function () {
$("#result_ajax").hide();
$( "#search" ).keyup(function() {
let search = $("#search").val();
if (search=="") {
$("#result").show();
$("#result_ajax").hide();
}else{
$("#result_ajax").show();
$.ajax({
        url: '<?php echo base_url();?>/API/get?search='+search,
        type: 'GET',
        dataType: "JSON",
         beforeSend : function(e)
        {
            $("#result_ajax").html('<tr> <td class="text-center" colspan="7">Memproses ....<td><tr>');
        },
        success: function (response) {
            console.log(response);
            let result='';
             $.each(response,function(d,i){
                    result += `<div class="col-6 col-md-3">
                             <img class="w-100" src="${i.avatar}" alt="gambar alam">
            <div class="d-grid gap-2 mt-2">
                <div class="btn-group dropup">
  <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Option
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" data-bs-toggle="modal" href="#modal_update${i.id}" role="button">Update</a></li>
    <li><a class="dropdown-item" style="color:red;" href="<?= base_url('')?>API/Delete_user?delete=${i.id}">Delete</a></li>
    <li><a class="dropdown-item" data-bs-toggle="modal" href="#detail${i.id}" role="button">Detail</a></li>
  </ul>
</div>
            </div>
            </div>`;
                })
            $("#result_ajax").html(result);
            $("#result").hide();
        },
        error: function (err) {
            console.log(err)
        },
    });
}
});
})
</script>

</html>