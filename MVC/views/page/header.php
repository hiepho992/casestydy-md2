<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= 'http://' . $_SERVER['HTTP_HOST'] . '/css/style.css' ?>">
    <script src="https://kit.fontawesome.com/91752fb16b.js" crossorigin="anonymous"></script>
    <title>BOOK STORE</title>
</head>

<body>
    <nav class="navbar">
        <div class="img"></div>
    </nav>
    <header>
        <div class="header">
            <a href="./index.php?controller=Product&action=index"><img src="../icon/LogoMakr_2wEt8z.png" alt="image" srcset="" id="logomark" title="Click về trang chủ"></a>
            <div class="search">
                <form action="./index.php" method="get">
                    <input type="hidden" name="controller" value="Product">
                    <input type="hidden" name="action" value="search">
                    <input type="text" name="search" id="search" placeholder="Search">
                    <button type="submit"><img src="./icon/search-solid.svg" alt="seach"></button>
                </form>
                <div class="user">
                    <p>
                        <?php if (isset($_SESSION['user'])) : ?>
                            <span><?= 'xin chào ' . $_SESSION['user']['user_name'] ?><?= '<a href="./index.php?controller=User&action=logout">LOG OUT </a>' ?></span>
                        <?php else : ?>
                            <?= '<a href="./index.php?controller=User&action=index">LOG IN</a>' ?>
                        <?php endif; ?>
                    </p>


                    <a href="./index.php?controller=Cart&action=index" target="_blank">
                        <img src="./icon/cart-arrow-down-solid.svg" alt="icon">

                        <?php if (isset($_SESSION['cart'])) : ?>
                            <?php $i = 0; ?>

                            <?php foreach ($_SESSION['cart'] as $key => $val) : ?>
                                <?php $i++ ?>
                            <?php endforeach; ?>
                            <b id="count" style="color: red;"><span><?= $i ?></span></b>

                        <?php else : ?>
                            <b id="count"></b>
                        <?php endif; ?>
                    </a>
                </div>

            </div>
        </div>
        <div class="list">
            <ul>
                <li><a href="./index.php?controller=Product&action=index">TRANG CHỦ</a></li>
                <li><a href="#">GIỚI THIỆU</a></li>
                <li><a href="#">TIN TỨC</a></li>
                <li><a href="#">THỂ LOẠI SÁCH</a>
                    <ul>
                        <li><a href="./index.php?controller=Product&action=listproduct&id=1">Ẩm Thực</a></li>
                        <li><a href="./index.php?controller=Product&action=listproduct&id=2">Du Lịch</a></li>
                        <li><a href="./index.php?controller=Product&action=listproduct&id=3">Lịch Sử Việt Nam</a></li>
                        <li><a href="./index.php?controller=Product&action=listproduct&id=4">Lịch Sử Thế Giới</a></li>
                        <li><a href="./index.php?controller=Product&action=listproduct&id=5">Nghệ Thuật</a></li>
                        <li><a href="./index.php?controller=Product&action=listproduct&id=6">Truyện</a></li>
                        <li><a href="./index.php?controller=Product&action=listproduct&id=7">Văn Hóa</a></li>

                    </ul>
                </li>
                <li>


                </li>

            </ul>
        </div>
        <div class="slide">
            <div class="move-icons">
                <i class="fas fa-chevron-circle-left" onclick="back()"></i>
                <i class="fas fa-chevron-circle-right" onclick="next()"></i>
            </div>
            <div class="move-slide">
                <img src="../icon/slide1.jpg" alt="image" srcset="">
                <img src="../icon/slide2.jpg" alt="image" srcset="">
                <img src="../icon/slide3.jpg" alt="image" srcset="">
                <img src="../icon/slider_2.jpg" alt="image" srcset="">
            </div>

        </div>
    </header>