<?php
    include('include/connection.php');
    include("public/header.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
?>



    <!-- Start Content -->

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <?php
                    $query = "SELECT * FROM news WHERE id='$id'";
                    $result = mysqli_query($conn,$query);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                        <div class="post">
                        <div class="post-image">
                            <a href="#"><?php echo $row['image']?></a>
                        </div>    
                        <div class="post-title">
                            <h4><a href="#"><?php echo $row['title']?></a></h4>
                        </div>    
                        <div class="post-details">
                            <p class="post-info">
                            </p>   
                            <p class="postContent">
                            <?php echo $row['summary'];?>
                            <a href=" <?php echo $row['link'];?>">devamı için tıklayın</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">

                    <!-- Start Categories -->

                    <div class="categories">
                        <h4>Kategoriler</h4>
                        <ul>
                            <?php
                            
                            $query = "SELECT * FROM categories ORDER BY id desc";
                            $result = mysqli_query($conn,$query);
                            while($row = mysqli_fetch_assoc($result)){                          
                            ?>
                            <li>
                            <a href="category.php?category=<?php echo $row['categoryName']?>">
                                    <span><i class=></i></span>
                                    <span><?php echo $row['categoryName'];?></span>    
                                    </a>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                  

                    <div class="last-posts">
                        <h4>Son Yazılanlar</h4>
                        <ul>
                        <?php
                            $query = "SELECT * FROM news ORDER BY id DESC LIMIT 5";
                            $result = mysqli_query($conn,$query);
                            while($row = mysqli_fetch_assoc($result)){                          
                            ?>
                            <li>
                                <a href="post.php?id=<?php echo $row['id'];?>">
                                    <span class="span-image"><?php echo $row['image'];?> </span>
                                </a>
                                <br>
                                <a href="post.php?id=<?php echo $row['id'];?>">
                                <span style= "color:black;" ><?php echo $row['title']?></span>
                                </a>
                            </li>
                            <?php
                            }
                            ?>
                            
                        </ul>
                    </div>

                    <!-- End Latest Posts -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Contect -->

