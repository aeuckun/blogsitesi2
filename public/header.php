<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haber Uzayı</title>
    <!-- Bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Özel css-->
    <link rel="stylesheet" href="css/custom.css?v=<?php echo time();?>">
    <!-- Font awesome ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css"></link>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>

<!-- Başlangıç navbar -->
<nav class="navbar navbar-dark bg-dark navbar-expand-sm">
    <div class="container">
        <a href="index.php" class="navbar-brand">Haber Uzayı</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="menu">
            <ul class="navbar-nav" >
                <li class="navbar-item "><a href="login.php" class="nav-link">Giriş Yap</a></li>
                
                <li  class="navbar-item " >
                    <form action="include/ml.php" method="get">
                    <a href="#" class="nav-link" onclick="parentNode.submit(); return false;">
                        Yenile
                    </a>
                </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Bitiş navbar -->
</body>
</html>