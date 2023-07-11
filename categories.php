<?php
    session_start();
    include('include/connection.php'); // Bağlantı bilgilerini dahil edin
    include('include/header.php'); // Header'ı dahil edin


    if (isset($_POST['category'])){
        $cName = $_POST['category'] ;
    }
    if(isset($_POST['add'])){
    $cAdd = $_POST['add'];
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    
    // Kullanıcının oturum açıp açmadığını kontrol et
    if(!isset($_SESSION['id'])){
        header('REFRESH:2; URL=login.php');
    }
    else{
    
    
?>

    <!-- İçerik Başlangıcı -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2" id="side-area">
                    <h4>Kontrol Paneli</h4>
                    <ul>
                        <li>
                            <a href="">
                                <span><i class=""></i></span>
                                <span>Kategoriler</span>
                            </a>
                        </li>
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
                    <div class="add-category">
                        <?php 
                        if(isset($cAdd)){
                            if(empty($cName)){
                                echo "<div class='alert alert-danger'>" . "Kategori alanı boş" . "</div>";
                            }
                            elseif(strlen($cName) > 100){
                                echo "<div class='alert alert-danger'>" ."Kategori adı çok UZUN" . "</div>";
                            }
                            else{
                                $query = "INSERT INTO categories(categoryName) VALUES ('$cName')";
                               Devamı:


                                mysqli_query($conn,$query);
                                echo "<div class='alert alert-success'>" ."Yeni Kategori eklendi" . "</div>";
                            }}
                        ?>  
                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                            <div class="mb-3">
                                <label for="category" style="color: black;">Yeni Kategori</label>
                                <input type="text" name="category" class="form-control" >
                            </div>
                            <button class="btn-custom" name ="add">Ekle</button>
                        </form>
                    </div>

                    <!-- Kategorileri Göster -->
                    <div class="display-cat mt-5">
                        <?php 
                            if(isset($id)){
                                $query = "DELETE FROM categories WHERE id = '$id'";
                                $delete = mysqli_query($conn,$query);
                        
                                if(isset($delete)){
                                    echo "<div class='alert alert-success'>" . "Kategori Silindi" . "</div>";
                                }
                                else{
                                    echo "<div class='alert alert-danger'>" . "Bir hata oluştu" . "</div>";
                                }
                            }
                        ?>
                        <table class="table table-white" style= "color: black">
                            <tr>
                                <th>Kategori No</th>
                                <th>Kategori Adı</th>
                                <th>Eklenme Tarihi</th>
                                <th>Kategori Sil</th>
                            </tr>
                            <?php
                                $query = "SELECT * FROM categories ORDER BY id desc";
                                $res = mysqli_query($conn,$query);
                                $no = 0;
                                while($row = mysqli_fetch_assoc($res)){
                                    $no++;
                                    ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row['categoryName'];?></td>
                                            <td><?php echo $row['categoryDate'];?></td>
                                            <td><a href="categories.php?id=<?php echo $row['id'];?>"> 
                                                <button class="btn-custom">Sil</button></a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- İçerik Sonu -->
<?php
    }
?>
