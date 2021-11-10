<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mt-5 ml-5">
      <div class="row">
       <div class="col-lg-2"></div>
       <div class="col-lg-8">
        <div class="card">
          <h5 class="card-header text-center">Register Account</h5>
            <div class="card-body">
              <form action="<?= base_url('API/Api_regist') ?>" method="post" name="form" onsubmit="return allnumeric(this)">
                <div class="mb-3">
                  <label  class="form-label">Input Your Age</label>
                  <input type="text" name="age" id="age" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                  <div id="emailHelp" class="form-text">@rumahweb.co.id.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="text" name="password" class="form-control" id="exampleInputPassword1" required>
                </div>
                <button type="submit" name="regist" class="btn btn-primary">Submit</button>
              </form>    
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
  <script type="text/javascript">
   function allnumeric(form)
   {
   var numbers = /^[0-9]+$/;
      var ages = form.age.value;
      var email = form.email.value;
      var password = form.password.value;
      var konfirm_pass=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{12,}$/;
      var konfirm_email ="@rumahweb.co.id";      
      var email = email.substr(-15, 15);;
      if(ages.match(numbers))
      {
      if (ages<18) {
        alert('Dibawah Umur');
        return (false);
      }
    }
      if (email!=konfirm_email) {
        alert('Gunakan email dengan domain @rumahweb.co.id');
        return(false);
      }
       if(!ages.match(numbers))
      {
      alert('Please input numeric characters only');
      return(false);
      }
      if (password.match(konfirm_pass)) {
       alert('Correct, try another...');
       return(true); 
      }      
      if (!password.match(konfirm_pass))
      { 
      alert('Wrong...!');
      return(false);
      }
} 

  </script>
</html>