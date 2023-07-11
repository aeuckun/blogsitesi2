<?php
    include('include/connection.php');
    include('include/header.php');

    if (isset($_POST['title'])){
        $pTitle = $_POST['title'];
    }
    if(isset($_POST['content'])){
        $pContent = $_POST['content'];
    }
    if(isset($_POST['add'])){
        $pAdd = $_POST['add'];
    }
    //resimler 
    if(isset($_FILES['postImage']['name'])){
        $imageName = $_FILES['postImage']['name'];
    }
    if(isset($_FILES['postImage']['tmp_name'])){
        $imageTmp = $_FILES['postImage']['tmp_name'];
    }
   
?>

    
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
                    <div class="add-category">
                        <?php
                            if(isset($pAdd)){
                                if(empty($pTitle) || empty($pContent)){
                                    echo "<div class='alert alert-danger'>" . "Alanı Doldur"."</div>";
                                }
                                elseif(strlen($pContent) > 10000){
                                    echo "<div class='alert alert-danger'>" . "Çok Uzun" . "</div>";
                                }
                                else{
                                    $postImage = rand(0,1000) . "_" . $imageName;
                                    move_uploaded_file($imageTmp, "uploads\\" . $postImage);
                                    $postImageTag='<img src="uploads/' .$postImage.'">';
                                     $query = "INSERT INTO news(title,image,summary) 
                                     VALUES ('$pTitle','$postImageTag','$pContent')";
                                    $res = mysqli_query($conn,$query);
                        
                                    if(isset($res)){
                                        echo  "<div class='alert alert-success'>" . "Başarı İle Yüklendi" . "</div>";
                                    }
                                  
                                    }
                                
                                }
                        ?>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                            <label for="category" style="color: black;">Yazının Başlığı</label>
                                <input type="text" name="title" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="category" style="color: black;">Resimler</label>
                                <input type="file" id="image" class="form-control" name ="postImage">
                            </div>
                            <div class="mb-3">
                            <label for="content">Yazı</label>
                                <textarea id="" cols="30" rows="10" class="form-control" name="content"></textarea>
                            </div>
                            <button class="btn-custom" name="add">Paylaş</button>
                        </form>
                    </div>
                </div>
