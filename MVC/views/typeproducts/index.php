<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>   
    <h3 class="pro">Danh sách sản phẩm</h3>
    <div class="products">
        <?php foreach ($results as $val) : ?>

            <div class="product-pro">
                <a href="index.php?controller=product&action=detail&id=<?= $val["idbooks"] ?>"><img src="<?= "./" . $val["book_image"]; ?>" title="Kick ảnh xem chi tiết"></a>
                <p><?= $val["book_name"] ?></p>
                <p><?= number_format($val["book_price"]); ?> VND</p>
                <p class="idproduct"><?= $val["idbooks"] ?></p>
                <div class="buynow">
                    <a href="./index.php?controller=Cart&action=cart&id=<?= $val["idbooks"] ?>"><i class="fas fa-cart-arrow-down"></i></a>
                    <a href="./index.php?controller=Cart&action=buyNow&id=<?= $val["idbooks"] ?>">Mua ngay</a>
                </div>

            </div>


        <?php endforeach; ?>
    </div>
</body>

</html>