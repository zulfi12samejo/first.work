<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
    </head>
    <body>
       
        <div id="wrapper-admin"  style="background-origin: inherit;  height: 450px; background-size: cover;">
            <div class="container mt-5">
                <div class="row" >
                    <div class="col-md-offset-4 col-md-8">
                        <div class="card">
                            <div class="card-body">
                        <form  action="operation/add-post.php" method ="POST" >
                                 <h3 class="heading" style="margin-top:-10px;">Publich Your Post</h3>
                                <div class="alert alert-danger" role="alert">
                            
                                </div> 
                            <div class="form-group" >
                                   
                            </div> 

                             <div class="form-group" >
                                <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title Here"   required>
                            </div>


                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>


                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </div>

                </div>                 
                     <div class="container">
                        <a href="register.php">ALready  registered</a>
                     </div>
                        </form>
                        <!-- /Form  End -->
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>

 
?>
