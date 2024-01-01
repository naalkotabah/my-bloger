<?php
session_start();
include "incloud/conn.php";
include "incloud/header.php";

@$pTitle=$_POST['title'];
@$pCat=$_POST['cotegory'];
@$pContent=$_POST['content'];
@$pAuther='نائل قتيبة';
@$pAdd=$_POST['add'];


//session


if(!@$_SESSION['id']){
    echo "<div class='alert alert-danger'>"." لايمكن العبور  "."</div>";
header('REFRESH:2;URL=login.php');

}else{






///ss
//حفظ صورة في قاعدة البيانات

@$imageName=$_FILES['postImage']['name'];
@$imageTmp=$_FILES['postImage']['tmp_name'];
 

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
                                <a href="new post.html">
                                    <span></span>
                                    <span>مقال جديد</span>
                                </a>
                            </li>
    
                           
    
                        <li>
                            <a href="indox.php"target="_blank">
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

                <div class="col-md-10" id="main-area">
                    
                <?php
                    
                    if(isset($pAdd)){
                        if(empty($pTitle) || empty($pContent)){
                            echo "<div class='alert alert-danger'style='text-align:center;' >" ."الحقل فارغ"."</div>" ;
                        }
                        elseif($pContent >1000){
                            echo "<div class='alert alert-danger'style='text-align:center;' >" ." النص كبير جدا"."</div>" ;
                        }
                        else{
                            $postImage = rand(0,1000)."_".$imageName;
                            move_uploaded_file($imageTmp,"uplodimg\\".$postImage);
                    
                            $query="INSERT INTO posts(postTitle,postCat,postImage,postContent,postAuthor)
                            VALUES('$pTitle','$pCat','$postImage','$pContent','$pAuther')";
                            $res=mysqli_query($conn,$query);
                    
                            if(isset($res)){
                                echo "<div class='alert alert-success'style='text-align:center;' >" ."تم اضافة المنشور بنجاح "."</div>" ;
                    
                    
                            }else{
                                echo "<div class='alert alert-danger'style='text-align:center;' >" ." يوجد خطاء ما"."</div>";
                            }
                        }
                    
                    }
                    
                                        
                                        ?>
                    <button class="btn-custom">مقال جديد</button>
                    <div class="add-category">




                     <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
     
                         <div class="form-group">
                             <label for="title">عنوان المقال</label>
                             <input type="text" name="title" class="form-control">
                         </div>

                         
                         <div class="form-group">
                            <label for="cate"> التصنيف</label>
                            <select name="cotegory" id="cate" class="form-control"> 
                                
                            <?php
                            $query="SELECT * FROM categories"; 
                            $res= mysqli_query($conn,$query);

                            while($row=mysqli_fetch_assoc($res)){
                                ?>
                                <option>
                                    <?php echo $row['categoryName'];  ?>
                                </option>
                                <?php

                            }

                            
                            ?>
                             
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">صورة المقال</label>
                                <input type="file" name="postImage" id="image" class="form-control" > 
                                

                            

                        </div>
                        <div class="form-group">
                            <label for="content">نص المقال</label>
                            <textarea class="form-control id=" cols="30" rows="10" name="content"></textarea>
                               
                            
                        </div> 

                  
                         <button class="btn-custom" name="add">نشر المقال</button>
     
     
                     </form>
                    </div>
                 </div>


                 <?php
                  }
                 
                 ?>

<?php
include "incloud/foter.php";
?>