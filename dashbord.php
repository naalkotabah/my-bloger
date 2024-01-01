<?php
session_start();
include "incloud/conn.php";
include "incloud/header.php";



@$cName= $_POST['category'];
@$cAdd= $_POST['add'];
@$id=$_GET['id'];


if(!@$_SESSION['id']){
    echo "<div class='alert alert-danger'>"." لايمكن العبور  "."</div>";
header('REFRESH:2;URL=login.php');

}else{




         #حذف تصنيف 
         if(isset($id)){

            $query="DELETE FROM categories WHERE id='$id'";
            $del=mysqli_query($conn,$query);
        
            if(isset($del)){
                echo "<div class='alert alert-success'style='text-align:center;' >" ." تم حذف التصنيف بنجاح"."</div>" ;
        
            }
        
        
        }
        




?>

<div class="content">
    <div class="container-fluid">
        <div class="row" >
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




            <div class="col-md-10" id="main-area">
               <div class="add-category">

               <?php
               #اضافة تصنيف الى قاعدة البينات
               if(isset($cAdd)){
                if(empty($cName)){
                    echo "<div class='alert alert-danger'style='text-align:center;' >" ."الحقل فارغ"."</div>" ;
                }
                elseif($cName > 100){
                    echo "<div class='alert alert-danger'style='text-align:center;' >" ." اسم تصنيف كبير جدا"."</div>" ;
            
                }else{
                    $query="INSERT INTO categories(categoryName) VALUES('$cName')";
                    mysqli_query($conn,$query);
                    echo "<div class='alert alert-success'style='text-align:center;' >" ." تم اضافة التصنيف بنجاح"."</div>" ;
                }
            }
               
               
               ?>




                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

                    <div class="form-group">
                        <label for="category">تصنيف جديد</label>
                        <input type="text" name="category" class="form-control">
                    </div>
             
                    <button class="btn-custom" name="add">اضافة</button>


                </form>
               </div>

           
      
               
               
               
          


<!--عرض التصنيفات في لوحة التحكم -->
            <div class="display-cat">
                 <table class="table table-borderd  mt5 ">
                    <tr>
                        <th>رقم الفئة</th>
                        <th>اسم الفئة</th>
                        <th>تاريخ الاضافة</th>
                        <th>ازالة التصنيف</th>
                    </tr>





                    <?php
                    #order by ... معناهة جلب معلومات تنازلي
                    $query="SELECT * FROM categories  ORDER BY id DESC";
                    $res= mysqli_query($conn,$query);
                    $no=0;

                    while($row=mysqli_fetch_assoc($res)){
                        $no++
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['categoryName']; ?></td>
                            <td><?php echo $row['categoryDate']; ?></td>
                            <td><a href="dashbord.php?id=<?php echo $row['id'];?>"><button class="btn-custom">ازالة </button></a>  </td>
                        </tr>
                        <?php
                        

                    }

                    
                    ?>
                 </table>
                 <!--ينتهي-->
            </div>   
            </div>

            
        </div>
        
    </div>
</div>

    <?php 
    }
    
    ?>
<?php
include "incloud/foter.php";
?>