<?php
include "incloud/conn.php";
include "incloud/header.php";



@$id=$_GET['id'];








?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" id="side-area">
                <h4>لوحة تحكم</h4>
                <ul>
                    <li>
                        <a href="dashbord.php">
                            <span><i class="fas fa-tags"></i></span>
                            <span>التصنيفات</span>
                        </a>
                    </li>

                    <!---->
                    <li data-toggle="collapse" data-target="#menu">
                        <a href="posts.php">
                            <span><i class="fas fa-tags"></i></span>
                            <span>المقالات</span>
                        </a>
                    </li>
           
                        <li>
                            <a href="new post.php  ">
                                <span></span>
                                <span>مقال جديد</span>
                            </a>
                        </li>

                      

                    <li>
                        <a href="indox.php" target="_blank">
                            <span><i class="fas fa-tags"></i></span>
                            <span>عرض  الموقع</span>
                        </a>
                    </li>


                    <li>
                        <a href="logout.php">
                            <span><i class="fas fa-tags"></i></span>
                            <span>تسجيل خروج</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- posts -->
            <div class="col-md-10" id="main-area">


   

            <div class="display-postsmt mt-5">
         <?php
            #حذف post 
         if(isset($id)){

            $query="DELETE FROM posts WHERE id='$id'";
            $del=mysqli_query($conn,$query);
        
            if(isset($del)){
                echo "<div class='alert alert-success'style='text-align:center;' >" ." تم حذف المنشور بنجاح"."</div>" ;
        
            }
        
        
        }
        ?>
        
            <table class="table table-ordered" >
                    <tr>
                        <th>رقم المقال</th>
                        <th>عنوان المقال</th>
                        <th>كاتب المقال</th>
                        <th>صورة المقال</th>
                        <th>تاريخ المقال</th>
                        <th>ازالة منشور</th>
                    </tr>

            <?php
            
            $query="SELECT * FROM posts ORDER BY id DESC";
            $res = mysqli_query($conn,$query);
            $no=0;

            while($row= mysqli_fetch_assoc($res)){
                $no++;
                ?>

               
                    <tr>
                        <th>  <?php echo $no;    ?></th>
                        <th>  <?php echo $row['postTitle'];    ?></th>
                        <th>  <?php echo $row['postAuthor'];    ?></th>
                        <th> <img src="uplodimg/<?php echo $row['postImage']; ?>" width="70px" height="50px"> </th>
                        <th>  <?php echo $row['postDate'];    ?></th>
                        <td><a href="posts.php?id=<?php echo $row['id'];?>"><button class="btn-custom">ازالة </button></a>  </td>
                    </tr>
              

                <?php
            }
            
            ?>
          </table>
  




            </div>

          
            </div>
         
 <!-- posts -->
            
        </div>
        
    </div>
</div>


<?php
include "incloud/foter.php";
?>