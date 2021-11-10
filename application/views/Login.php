<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mt-5 ml-5">
      <div class="row">
       <div class="col-lg-2"></div>
       <div class="col-lg-8">
        <div class="card">
          <h5 class="card-header text-center">Form Login</h5>
            <div class="card-body">
              <form id="login">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" id="password">
                </div>
                <button type="button" id="btn-login" class="btn btn-primary">Login</button>
                <div class="mb-3">
                  <a href="<?= base_url('login/register'); ?>" class="form-check-label" >Don't have an account?</a>
                </div>
              </form>    
            </div>
          </div>
        </div>
      </div>
    </div>

   
  </body>
  <script type="text/javascript">
  $(document).ready(function () {

$("#btn-login").on('click', function () {
  var email = $("#email");
  var password = $("#password");

  $.ajax({
    url: "https://reqres.in/api/login",
    type: "POST",
    data: {
      email: email.val(),
      password: password.val()
    },
    success: function (response) {
    alert('berhasil login');window.location.href="<?php $this->session->set_flashdata('login','QpwL5tke4Pnpja7X4'); echo base_url('Dashboard/index'); ?>";
     // Cookies.set('token', response.token);
    }
  })

});
 
})
  </script>
</html>