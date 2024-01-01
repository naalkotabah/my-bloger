<?php   
include "incloud/conn.php";
include "nav/header.php";


?>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-9">

                <?php
                $cat=$_GET['category'];
                $query="SELECT * FROM posts WHERE postCat='$cat'  ORDER BY id DESC";
                $result=mysqli_query($conn,$query);


                while($row= mysqli_fetch_assoc($result)){
                ?>

                
                    <div class="post">
                        <div class="post-img">
                       <a href="post.php?id=<?php echo $row['id'];?>"> <img src="uplodimg/<?php echo $row['postImage']; ?>" width="70px" height="50px"></a>
                        </div>
                        <div class="post-title">
                            <h4><a href="post.php?id=<?php echo $row['id'];?>"><?php echo $row['postTitle'];  ?></a> </h4>
                        </div>
                        <div class="post-detalis">
                            <p class="post-info">
                                <span><i class="fas fa-user"> </i><?php echo $row['postAuthor']; ?></span>
                                <span><i class="far fa-calendar-alt"></i><?php echo $row['postDate']; ?></span>
                                <span><i class="fas fa-tags "></i><?php echo $row['postCat']; ?></span>
                            </p>
                            <p><?php echo $row['postContent']; ?></p>
                        
                   

                        </div>
                    </div>

                    


                <?php
                  

                }

                ?>







                    
              
                    


                  
                    <div class="post">
                     
                        <div class="post-detalis">
                        
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="categories">
                        <h4>التصنيفات</h4>
                        <ul>

                        <?php 
                        $query="SELECT * FROM categories ORDER BY id DESC ";
                        $result= mysqli_query($conn,$query);
                        while($row=mysqli_fetch_assoc($result)){

                            ?>







                            <li>
                                <a href="category.php?category=<?php echo $row['categoryName']; ?>">
                                    <span><i class="fas fa-tags "></i> </span>
                                    <span><?php echo $row['categoryName'];  ?></span>
                                </a>
                            </li>

                             <?php
                              

                        }

                        
                        ?>
                        </ul>
                          

                    </div>
                    <!--end-->

                    <!--start posr-->
                    <div class="last-poats">
                        <h4>احدث المنشورات</h4> 
                        <ul>

                        <?php 
                        $query="SELECT * FROM posts  ORDER BY id DESC ";
                        $result= mysqli_query($conn,$query);
                        while($row=mysqli_fetch_assoc($result)){

                            ?>




                            <li>
                                <a href="post.php?id=<?php echo $row['id']; ?>">
                                    <span class="span-imge"><img src="uplodimg/<?php echo $row['postImage'];  ?>" alt="img2" ></span>
                                    <span><?php echo $row['postTitle'];  ?></span>
                                </a>
                            </li>


                            <?php

                        }

                            ?>



                          
                        </ul>
                    </div>

                    <!--stop post-->
                </div>
            </div>
        </div>
    </div>

    <?php   
include "nav/footer.php";


?>