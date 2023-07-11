<?php
    include('include/connection.php');
    include('include/header.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
?>



    <!-- Start Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-2" id="side-area">
                    <h4>Kontrol Paneli</h4>
                    <ul>
                       
                        <!-- Yazılar ve Haberler -->
                            </a>
                        </li>
                        <ul class="" id="">
                            <li>
                                <a href="new-post.php">
                                    <span><i class="yeni"></i></span>
                                    <span>Yeni Yazı</span>
                                </a>
                            </li>
                            <li>
                                <a href="posts.php">
                                    <span><i class="hepsi"></i></span>
                                    <span>Tüm Yazılar</span>
                                </a>
                            </li>
                        </ul>
                        <li>
                            <a href="index.php" target="_blank">
                                <span><i class=""></i></span>
                                <span>Haber Uzayı ---] Siteye Dön</span>
                            </a>
                        </li>
                        <li>
                            <a href="logout.php">
                                <span><i class=""></i></span>
                                <span>Çıkış Yap</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10" id="main-area"> 

                    
                <div class="display-posts mt-4">
                <?php 
                            if(isset($id)){
                                $query = "DELETE FROM news WHERE id = '$id'";
                                $delete = mysqli_query($conn,$query);
                        
                                if(isset($delete)){
                                    echo "<div class='alert alert-success'>" . "Gönderi Başarı İle Silindi" . "</div>";
                                }
                                else{
                                    echo "<div class='alert alert-danger'>" ;
                                }
                            }
                ?>
                <table class="table  table-light">
                    <tr style="background: var(--first-color) !important; color: #000;">
                        <th>Yazı ID</th>
                        <th>Yazı Başlığı</th>
                        <th>Yazı Resimi</th>
                    </tr>
                    <?php
                        $query = "SELECT * FROM news ORDER BY id desc";
                        $res = mysqli_query($conn,$query);
                        $no = 0;

                        while($row= mysqli_fetch_assoc($res)){
                        $no++;   
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $row['title'];?></td>
                            <td>
                         
                                        <?php echo $row['image']; ?>

                                </td>
                            <td><?php echo $row['published'];?></td>
                            <td><a href="posts.php?id=<?php echo $row['id'];?>"> 
                                <button class="btn-custom" >Yazıyı Sil</button></a>
                            </td>
                        </tr>
                        <?php 
                        }
                    ?>
                </table>
                </div>
                <div>
            </div>
        </div>
    </div>

