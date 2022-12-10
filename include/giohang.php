<?php
if (isset($_POST['themgiohang'])) {
    $tensanpham = $_POST['tensanpham'];
    $sanpham_id = $_POST['sanpham_id'];
    $hinhanh = $_POST['hinhanh'];
    $gia = $_POST['giasanpham'];
    $soluong = $_POST['soluong'];
    $sql_select_giohang = mysqli_query($conn, "SELECT*FROM tbl_giohang where sanpham_id='$sanpham_id'");
    $count = mysqli_num_rows($sql_select_giohang);
    if ($count > 0) {
        $row_sanpham = mysqli_fetch_array($sql_select_giohang);
        $soluong = $row_sanpham['soluong'] + 1;
        $sql_giohang = "UPDATE tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id'";
    } else {
        $soluong = $soluong;
        $sql_giohang = "INSERT INTO tbl_giohang(tensanpham,sanpham_id,giasanpham,hinhanh,soluong) 
		value('$tensanpham','$sanpham_id','$gia','$hinhanh','$soluong')";
    }
    $insert_row = mysqli_query($conn, $sql_giohang);
    if ($insert_row == 0) {
        header('Location:index.php?quanly=chitietsp&id=' . $sanpham_id);
    }
}

if (isset($_POST['capnhatsoluong'])) {
    for ($i = 0; $i < count($_POST['product_id']); $i++) {
        $sanpham_id = $_POST['product_id'][$i];
        $soluong = $_POST['soluong'][$i];
        if ($soluong == 0) {
            $sql_delete = mysqli_query($conn, "DELETE FROM tbl_giohang where sanpham_id='$sanpham_id'");
        } else {
            $sql_update = mysqli_query($conn, "UPDATE tbl_giohang SET soluong='$soluong' where sanpham_id='$sanpham_id'");
        }
    }
}

if (isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    $sql_delete = mysqli_query($conn, "DELETE FROM tbl_giohang where giohang_id='$id'");
}
?>
<section class="cart">
    <?php
    $sql_lay_giohang = mysqli_query($conn, 'SELECT*FROM tbl_giohang ORDER BY giohang_id DESC');
    ?>
    <div class="container">
        <div class="cart-content row">
            <div class="cart-content-left">
                <form action="" method="POST">
                    <table>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Size</th>
                            <th>SL</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
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
                                <td><img src="../img/imgindex/<?php echo $row_fetch_giohang['hinhanh'] ?>" alt=""></td>
                                <td>
                                    <p><?php echo $row_fetch_giohang['tensanpham'] ?></p>
                                </td>
                                <td>
                                    <p>40</p>
                                </td>
                                <td><input type="number" min="0" name="soluong[]" value="<?php echo $row_fetch_giohang['soluong'] ?>">
                                    <input type="hidden" name="product_id[]" value="<?php echo $row_fetch_giohang['sanpham_id'] ?>">
                                </td>
                                <td>
                                    <p><?php echo number_format($row_fetch_giohang['giasanpham']) . 'vnđ' ?></p>
                                </td>
                                <td>
                                    <p><?php echo number_format($subtotal) . 'vnđ' ?></p>
                                </td>
                                <td>
                                    <a href="?quanly=giohang&xoa=<?php echo $row_fetch_giohang['giohang_id']?>" class="product-delete">xóa</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="6">
                                <button type="submit" name="capnhatsoluong" class="capnhat">Cập nhật giỏ hàng</button>
                            </td>
                        </tr>
                </form>
                </table>
            </div>
            <div class="cart-content-right">
                <table>
                    <tr>
                        <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
                    </tr>
                    <tr>
                        <td>TỔNG SẢN PHẨM</td>
                        <td><?php echo $i ?></td>
                    </tr>
                    <tr>
                        <td>TỔNG TIỀN HÀNG</td>
                        <td>
                            <p><?php echo number_format($total) . 'vnđ' ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>TẠM TÍNH</td>
                        <td>
                            <p style="color: black; font-weight: bold;"><?php echo number_format($total) . 'vnđ' ?></p>
                        </td>
                    </tr>
                </table>
                <div class="cart-content-right-button">
                    <a href="../html/index.php"><button class="keep-shopping">Tiếp tục mua sắm</button></a>
                    <a href="?quanly=xacnhan"><button class="confirm">Xác nhận giỏ hàng</button></a>
                </div>
            </div>
        </div>
    </div>
</section>