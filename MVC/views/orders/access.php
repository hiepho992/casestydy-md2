<!-- <div class="cart">

    <table class="orderdetail">

        <tr>
            <th colspan="7">Thông tin đơn hàng</th>
        </tr>

        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá bán</th>
            <th>Hình ảnh</th>
            <th>Thành tiền (VND)</th>

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

            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="5">Tổng tiền</td>
            <td><?= $_SESSION['total'] = number_format(array_sum($sum)); ?></td>
        </tr>
        <tr>
            <th colspan="7">Thông tin người nhận</th>
        </tr>
        <tr>
            <td colspan="2">Họ tên</td>
            <td colspan="2">Địa chỉ</td>
            <td colspan="2">Số điện thoại</td>
        </tr>
        <?php foreach ($orders as $val) : ?>
            <tr>
                <td colspan="2"><?=$val['customers_name'];?></td>
                <td colspan="2"><?=$val['customers_address'];?></td>
                <td colspan="2"><?=$val['customers_phone'];?></td>

            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="6"><a href="./index.php?controller=Order&action=access">Xác nhận</a></td>
            
        </tr>


    </table>

</div> -->