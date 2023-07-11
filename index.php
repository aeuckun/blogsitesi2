<?php
    include('include/connection.php'); // Bağlantı bilgilerini içerir
    include("public/header.php"); // Header'ı dahil edin
    if(isset($_GET['id'])){ // Eğer id set edilmişse
        $id = $_GET['id']; // id değerini al
    }
?>
    <!-- İçerik Başlangıcı -->

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <?php
                    $query = "SELECT * FROM news ORDER BY id desc"; // Gönderileri sorgula ve id'ye göre azalan sıralama yap
                    $res = mysqli_query($conn,$query); 
                    
                    while($row = mysqli_fetch_assoc($res)){ // Sorgu sonucundaki her satırı işle
                    ?>
                        <div class="post">
                        <div class="post-image">
                            <a href="post.php?id=<?php echo $row['id'];?>"><?php echo $row['image']?></a>
                        </div>    
                        <div class="post-title">
                            <h4><a href="post.php?id=<?php echo $row['id'];?>" ><?php echo $row['title']?></a></h4>
                        </div>    
                        <div class="post-details">
                            <p class="post-info">
                        
                            </p>   
                            <p class="summary">
                            <?php 
                                if(strlen($row['summary'])  > 150){ // Eğer içerik 150 karakterden büyükse
                                    $row['summary'] = substr($row['summary'] , 0 ,200) . "..."; // İlk 200 karakterini al ve "..." ekleyerek kırp
                                }
                                echo $row['summary'];
                            ?>
                            </p>
                            <a href="post.php?id=<?php echo $row['id'];?>"><button class="btn btn-custom">Daha Fazla Oku</button></a>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    
                </div>
                <div class="col-md-3">
        
                
                    <!-- Son Gönderiler Başlangıcı -->

                    <div class="last-posts">
                        <h4>Son Yazılan Yazılar ve Haberler</h4>
                        <ul>
                        <?php
                            $query = "SELECT * FROM news ORDER BY id DESC LIMIT 3"; // En son 5 gönderiyi sorgula
                            $result = mysqli_query($conn,$query);
                            while($row = mysqli_fetch_assoc($result)){                        
                            ?>
                            <li>
                                <a href="post.php?id=<?php echo $row['id'];?>">
                                    <span class="span-image"><?php echo $row['image'];?></span>
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

                    <!-- Son Gönderiler Sonu -->
                    
                </div>
            </div>
        </div>
    </div>
    <!-- İçerik Sonu -->

