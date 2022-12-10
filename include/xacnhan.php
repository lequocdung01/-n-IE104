<?php
include('../inc/myconnect.php');
include('../include/header.php');
?>
<?php
$sql_lay_giohang = mysqli_query($conn, 'SELECT*FROM tbl_giohang ORDER BY giohang_id DESC');
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fontawesome-free-6.2.1-web/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <section class="delivery">
        <div class="container">
            <div class="pt-tt">
                <div>
                    <input name="method-payment" type="radio">
                    <label for="">Thanh toán bằng momo</label>
                </div>
                <div>
                    <input name="method-payment" type="radio">
                    <label for="">Thanh toán bằng tài khoản ngân hàng</label>
                </div>
                <div>
                    <input name="method-payment" type="radio" checked>
                    <label for="">Thanh toán khi nhận hàng</label>
                </div>
            </div>
            <div class="delivery-content row">
                <form action="../include/thanhtoan_tc.php" class="delivery-content-left">
                    <p>Vui lòng chọn địa chỉ giao hàng</p>
                    <div class="delivery-content-left-input-top row">
                        <div class="delivery-content-left-input-top-item">
                            <label for="">Họ tên<span style="color:red">*</span></label>
                            <input type="text" required>
                        </div>
                        <div class="delivery-content-left-input-top-item">
                            <label for="">Điện thoại<span style="color:red">*</span></label>
                            <input type="text" required>
                        </div>
                        <div class="delivery-content-left-input-top-item">
                            <label for="">Tỉnh/tp<span style="color:red">*</span></label>
                            <input type="text" required>
                        </div>
                        <div class="delivery-content-left-input-top-item">
                            <label for="">Quận/huyện<span style="color:red">*</span></label>
                            <input type="text" required>
                        </div>
                    </div>
                    <div class="delivery-content-left-input-bottom">
                        <label for="">Địa chỉ<span style="color:red">*</span></label>
                        <input type="text" required>
                    </div>
                    <div class="delivery-content-left-button row">
                        <a href="../include/thanhtoan_tc.php"><button type="submit" name="thanhtoan">
                                <p style="font-weight: bold;">THANH TOÁN VÀ GIAO HÀNG</p>
                            </button></a>
                        <a href="?quanly=giohang" class="ql"><span>&#171;</span>
                            <p>Quay lại giỏ hàng</p>
                        </a>
                    </div>
                </form>
                <div class="delivery-content-right">
                    <table>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php
                        $i = 0;
                        $total = 0;
                        while ($row_fetch_giohang = mysqli_fetch_array($sql_lay_giohang)) {
                            $subtotal = $row_fetch_giohang['soluong'] * $row_fetch_giohang['giasanpham'];
                            $total += $subtotal;
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $row_fetch_giohang['tensanpham'] ?></td>
                                <td><?php echo $row_fetch_giohang['soluong'] ?></td>
                                <td><?php echo number_format($subtotal) . 'vnđ' ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        <?php
                        $tong = $total + 20000;
                        ?>
                        <tr>
                            <td style="font-weight: bold;" colspan="2">Tổng</td>
                            <td style="font-weight: bold;"><?php echo number_format($total) . 'vnđ' ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;" colspan="2">Thuế VAT</td>
                            <td style="font-weight: bold;">
                                <p>20,000vnđ</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;" colspan="2">Tổng tiền hàng</td>
                            <td style="font-weight: bold;"><?php echo number_format($tong) . 'vnđ' ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<?php
include('../include/footer.php');
?>