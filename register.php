<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  
</head>
<body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-3 mt-5">
        <div class="card">
          <div class="card-body">
             <h3 class="text-center">Register</h3>
              <form method="post" action="insert.php">
                <div class="form-group">
                  <label>User Name </label>
                  <input type="text" class="form-control" name="username">
                </div>

                <div class="form-group">
                  <label>User Email </label>
                  <input type="text" class="form-control" name="email">
                </div>

                <div class="form-group">
                  <label>User Password </label>
                  <input type="password" class="form-control" name="password">
                </div>
              
                <div class="form-group">
                 <button class="btn btn-primary">Register</button>
                </div>

              </form>

          </div>
        </div>
</div>
      </div>
      </div>
</body>
</html>