<div class="cart">

    <table class="orderdetail">
        <div>
            <?php if (isset($_SESSION['success'])) : ?>
                <p id="success"><?= $_SESSION['success'] ?></p>
            <?php endif;
            unset($_SESSION['success']); ?>
        </div>
        <?php if (isset($_SESSION['cart'])) : ?>
            <tr>
                <th colspan="7">Thông tin giỏ hàng</th>
            </tr>

            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá bán</th>
                <th>Hình ảnh</th>
                <th>Thành tiền (VND)</th>
                <th>Thay đổi</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($_SESSION['cart'] as $key => $val) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $val['name']; ?></td>
                    <td>
                        <?= $val['quantity'] ?>
                    </td>
                    <td><?= number_format($val['price']); ?></td>
                    <td><img src="<?= $val['image']; ?>" alt="" srcset="" id="orderdetailimg"></td>
                    <td><?= number_format($sum[] = $val['quantity'] * $val['price']); ?></td>
                    <td>

                        <a href="./index.php?controller=Cart&action=delete&id=<?= $key; ?>" class="delete" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                        <!-- <a href="./index.php?controller=Cart&action=upDate&id=<?= $key; ?>" class="delete">Cập Nhật</a> -->
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="2"><a href="./index.php?controller=Product&action=index" class="buyproduct"><i class="fas fa-chevron-circle-left"></i>Tiếp tục mua hàng </a></td>
                <td colspan="3">Tổng tiền</td>
                <td><?= $_SESSION['total'] = number_format(array_sum($sum)); ?></td>
                <td>
                    <button onclick="show()"><span id="buyproduct">Mua hàng <i class="fas fa-chevron-circle-right"></i></span></button>
                </td>

            </tr>

        <?php else : ?>
            <p>Không tồn tại giỏ hàng</p>
        <?php endif; ?>
    </table>
</div>
<div class="cart" id="showtable">

    <table class="orderdetail">

        <tr>
            <th colspan="7">Thông tin giao hàng</th>
        </tr>

        <tr>
            <th colspan="2">Họ tên</th>
            <th colspan="3">Địa chỉ</th>
            <th colspan="2">Số điện thoại</th>
        </tr>
        <form action="./index.php?controller=Order&action=store" method="post">
            <tr>
                <td colspan="2"><input type="text" name="name" id=""></td>
                <td colspan="3"><input type="text" name="address" id=""></td>
                <td colspan="2"><input type="number" name="phone" id=""></td>
            </tr>
            <tr>
                <td colspan="7">
                    <input type="submit" value="Xác nhận" id="buyproduct">
                </td>

            </tr>

        </form>


    </table>
</div>