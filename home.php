<?php session_start(); 
include("db.php");
   if(isset($_SESSION['user'])){
       $id = $_SESSION['user'][0]['id'];
   }

   if(isset($_POST['follow'])){
      $value = $_POST['follow'];
      $u       = $_POST['userId'];
      if($value == "follow"){
         if($con){  
        $sql = "INSERT INTO follow (follow_to,follow_by)
        VALUES (:u,:p)";
        $query = $con->prepare($sql);
        $query->bindParam(':u',$u);
        $query->bindParam(':p',$id);
        $res = $query->execute();
      }
   }else{
         $sql = "DELETE from follow  WHERE follow_by = :uid";
         $query = $con->prepare($sql);
         $query->bindParam(':uid',$id);
         $res = $query->execute(); 
   }

   }
if(isset($_POST['commentBtn'])){

         $id = $_SESSION['user'][0]['id'];
        $postId = $_POST['post_id'];
        $comment = $_POST['comment'];
         if($con){  
        $sql = "INSERT INTO comment (user_id,post_id,comment)
        VALUES (:u,:p,:c)";
        $query = $con->prepare($sql);
        $query->bindParam(':u',$id);
        $query->bindParam(':p',$postId);
        $query->bindParam(':c',$comment);
        $res = $query->execute();
   }
   }
if(isset($_POST['btnLike'])){

      $id = $_SESSION['user'][0]['id'];
$postId = $_POST['post_id'];
   $value =  $_POST['isLiked'];
   if($value == 'y'){
      $likeId = $_POST['likeId'];
      if($con){
      $sql = "DELETE from like_post  WHERE like_id= :lid";
      $query = $con->prepare($sql);
      $query->bindParam(':lid',$likeId);
      $res = $query->execute();
   }
   }
   else if($value=='n'){
    if($con){  
        $sql = "INSERT INTO like_post (user_id,post_id)
        VALUES (:t,:d)";
        $query = $con->prepare($sql);
        $query->bindParam(':t',$id);
        $query->bindParam(':d',$postId);
        $res = $query->execute();
   }
  }
}
?>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>home</title>
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="css/style.css">
   
    <title>home</title>
 </head>
    <body>
            <div class="container mt-5">
               <div class="row">

                  
                      <?php 
                           if(isset($_SESSION['user'])) {?>
                           <div class="col-md-2">
                     <div class="col-md-12">
                           <?php
                               $USER = $_SESSION['user'];
                              ?> <h6 class="text-center">   <?php echo $USER[0]['name'];?>
                              </h6>
                        
                        </div>
                              <div class="col-md-12 text-center">  
                                <img src="default.png" class="text-center rounded" style="width:10vh;"></img>
                             </div>
                                <div class="row">
                                 <div class="col-md-6">Followers</div>
                                 <div class="col-md-6">Following</div>
                                </div> 
                                 <hr>
                                <div class="row">
                                 <div class="col-md-6">
                               <b>
                                 <?php 
                                   $ID =  $_SESSION['user'][0]['id'];
                                    $sql = "SELECT * from follow WHERE follow_by=:ui";
                                 $query = $con->prepare($sql);
                                 $query->bindParam(':ui',$ID);
                                 $res = $query->execute();
                                 $userData = $query->fetchAll();
                                 echo count($userData);
                                 ?>
                              </b>
                           </div>
                                 <div class="col-md-6"><b>7</b></div>
                                </div>

                                <div class="form-control">
                                  <a href="dashboard.php"> Dashboard </a>
                                </div>

                                 <br>
                                <div class="form-control">
                                 Liked POST
                                  <?php
                                    $sql = "SELECT * from like_post WHERE user_id=:ui";
                                 $query = $con->prepare($sql);
                                 $query->bindParam(':ui',$id);
                                 $res = $query->execute();
                                 $u = $query->fetchAll();
                                 echo count($u);
                                  ?>
                                </div>
 <br>

 <br>
                                <div class="form-control">
                                  <a href="operation/logout.php"> Log out </a>
                                </div>


                           <?php
                                 }
                                 else{
                                    echo "<a href='login.php'> Login </a>";
                                 }
                              ?>
                  </div>
                  <div class="col-md-8">
                  <div class="card" style="border:1px solid black;">
                     <div class="card-body">
                        <?php 
                            $sql = "Select * from post";
                            $query = $con->prepare($sql);
                            $res   = $query->execute();
                            $data  = $query->fetchAll();
                        for($i=0; $i<count($data); $i++){ 
                        ?>
                        <div class="card m-2">
                              <div class="card-body">
                               <?php 
                              if(count($data)>0){
                           $sql = "SELECT * from user WHERE id=:ui";
                                 $query = $con->prepare($sql);
                                 $query->bindParam(':ui',$data[$i]['user_id']);
                                 $res = $query->execute();
                                 $userData = $query->fetchAll();
                               ?>
                                 <h6> Posted by <b><a><?php echo $userData[0]['name'];?></a>
                                 </b> 
                                    on <i class="text-muted"><?php
                                       echo $data[$i]['time'];
                                    ?></i>
                                 </h6>
                                  <form method="post">
                             <?php      
                                     $sql = "SELECT follow_to from follow where follow_by =:id";
                                     $query = $con->prepare($sql);
                                     $query ->bindParam(":id",$_SESSION['user'][0]['id']);
                                     $res   = $query->execute();
                                     $follow  = $query->fetchAll();
                                     if(count($follow)>0){
                                  ?>
                                      <input type="submit" class="text-primary" value="followed" name="follow"> 
                                      </b>
                                       <?php } 
                                          else{
                                        ?>
                                          <input type="submit" class="text-primary" value="follow" name="follow"> 
                                       <?php } 
                                          $id = $data[$i]['user_id'];
                                       ?>
                                       <input type="hidden" name="userId"
                                          value="<?php echo $id ?>" 
                                       >
                                   </form>
                              
                                 <h4><?php echo $data[$i]['post_title'] ?></h4>
                                 <p>
                                    <?php echo $data[$i]['post_description'] ?>
                                 </p>
                                 </div>
                                    <div class="card-footer">

                                       <?php
                                             $sql = "SELECT * from like_post WHERE post_id = :lid";
                                                $query = $con->prepare($sql);
                                                $query->bindParam(':lid',$data[$i]['post_id']);
                                                $res = $query->execute();
                                                $lik= $query->fetchAll();
                                                print_r(count($lik));
                                        ?>
 
                                       <div class="row">
                                          <div class="col-md-3">
                                       <a href="ViewPost.php?id=<?php echo $data[$i]['post_id'] ?>">   View</a>
                                       </div>
                                          <div class="col-md-3">
                                                <form method="post">
                                             <?php
                                                $sql = "SELECT * from like_post WHERE user_id=:uid AND post_id=:pid";
                                                $query = $con->prepare($sql);
                                                $query->bindParam(':uid',$id);
                                                $query->bindParam(':pid',$data[$i]['post_id']);
                                                $res = $query->execute();
                                                $d = $query->fetchAll();
                                             if(count($d)>0){
                                                ?>
                                                   <button class="btn btn-primary" name="btnLike" value="liked"/>   
                                                   <input type="hidden" name="isLiked" value="y">

                                                   <input type="hidden" name="likeId" value="<?php  echo $d[0]['like_id']?>">
                                                <?php
                                                }
                                                else{
                                             ?>
                                               <button name="btnLike" value="like"/>   
                                                   <input type="hidden" name="isLiked" value="n">
                                             <?php } ?>

                                            <input type="hidden" name="post_id" value="<?php echo $data[$i]['post_id'] ?>"/> 
                                                  Like
                                               </button>
                                             </form>
                                       </div>
                                       </div>
                                       <form method="post">
                                           <input type="hidden" name="post_id" value="<?php echo $data[$i]['post_id'] ?>"/> 
                                          <textarea class="form-control" name="comment"></textarea>
                                             <div class="container text-center mt-3 ml-5">
                                                <button name="commentBtn" class="btn btn-primary offset-9">Comment</button>
                                             </div>
                                          </form>   
                                    </div>

                        </div>
   <?php } }  ?>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
    </body>
 </html>

 <style type="text/css">

    .form-control:hover{
      background-color: skyblue;
    }
 </style>
