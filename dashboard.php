<?php 	session_start(); ?>
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
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

 <div class="container-fluid mt-4">
 	 <nav class="navbar col-md-12">
  <a href="" class="brand-title">DASHBOARD</a>
  <a href="#" class="toggle-button">
    <i class="ri-layout-grid-fill"></i>
  </a>
  <div class="navbar-links">
    <ul>
      <?php if(isset($_SESSION['user'])) { 
        ?> 
          <li><a href="dashboard.php"><?php  echo $_SESSION['user'][0]['name']; ?></a></li>
          <li><a href="operation/logout.php" class="btn btn-outline-danger">  Logout </a></li>
        
  </div>
</nav>

  <div class="row">
  <div class="col-md-10 offset-1">
  <div class="card">
  <div class="card-body">      
<h1> Your Posts </h1>
<a  href="addPost.php" class="btn btn-primary">Add Post</a>
<?php
	include('db.php');
			$id = $_SESSION['user'][0]['id'];
			$sql = "SELECT * FROM post WHERE user_id=:e";
			$query = $con->prepare($sql);
			$query->bindParam(":e",$id);
			$exe = $query->execute();
			$data  = $query->fetchAll();
		?>

			<table class="table table-striped">
				<thead>
				<tr>
					<th>Id</th>
					<th>Post Title</th>
					<th>Description</th>
          <th>Dated</th>
					<th>Operation</th>
				</tr>
			</thead>
				<?php
					for($i=0; $i<count($data); $i++){
						?>
						<tr>
							<tbody>
								<td><?php echo $data[$i]['post_id']; ?></td>
								<td><?php echo $data[$i]['post_title']; ?></td>
								<td><?php echo $data[$i]['post_description'] ; ?></td>
								<td><?php echo $data[$i]['time'];  ?></td>
                <td>

             <a href="edit-post.php?id=<?php echo $data[$i]['post_id'];?>" 
              class="btn btn-primary"> 
                      Update
                   </button>
                  <a class="btn btn-danger"> 
                      Delete
                   </button>
                </td>
							</tbody>
						</tr>

						<?php
			
					}
				?>

			</table>
	<?php
	}else{
		header("location:login.php");
	}

?>
</div>
</div>
</div>
</div>
</div>

</body>
</html>


<style type="text/css">
	

body {
  //background: #1f253d;
}
/*------------Google Font------------*/
@import url("https://fonts.googleapis.com/css?family=Montserrat:400,400i,700");
/*------------Bases------------*/
*
{
  margin:0;
  padding:0;
  box-sizing:border-box;
}
body
{
  font-family: Montserrat, sans-serif;
}
ul
{
  list-style:none;
}
a
{
  text-decoration:none;
  color:black;
}
/*------------Navbar------------*/
.navbar
{
  display:flex;
  justify-content:space-between;
  align-items:center;
  background-color:#fefefe;
  color:black;
  min-height:10vh;
  border-bottom:1px solid black;
}
.brand-title
{
  font-size:1.5rem;
  margin:0.5rem;
}
.navbar-links
{
  margin:0 15px;
}
.navbar-links ul 
{
  display:flex;
}
.navbar-links li a 
{
  color:black;
  padding:1rem;
  display:block;
}
.navbar-links li a:hover
{
  background-color:#555;
  color:white;
}
.toggle-button 
{
  position:absolute;
  top:0.55rem;
  right:1rem;
  display:none;
  flex-direction:column;
  justify-content:space-between;
  width:20px;
  height:16px;
}
.toggle-button i 
{
  color:black;
  font-size:25px;
}

@media (max-width:850px)
{
   .navbar
  {
    flex-direction:column;
    align-items:flex-start;
    min-height:10vh;
  }
  .toggle-button 
  {
    display:flex;
  }
  .navbar-links
  {
    display:none;
    width:100%;
  }
  .navbar-links ul 
  {
    width:100%;
    flex-direction:column;
  }
  .navbar-links li 
  {
    text-align:center;
  }
  .navbar-links li a 
  {
    padding: 0.5rem 1rem;
  }
  .navbar-links.active
  {
    display:flex;
  }
 
  
}


</style>

</style>