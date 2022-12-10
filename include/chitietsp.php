<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}
$sql_chitiet = mysqli_query($conn, "SELECT*FROM tbl_sanpham where sanpham_id='$id'");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/product-male.css">
    <link rel="stylesheet" href="../fontawesome-free-6.2.1-web/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <?php
    while ($row_chitiet = mysqli_fetch_array($sql_chitiet)) {
    ?>
        <section class="Product">
            <div class="container">
                <div class="product-top row">
                </div>
                <div class="product-content row">
                    <div class="product-content-left ">
                        <div class="product-content-left-big-img">
                            <img src="../img/imgindex/<?php echo $row_chitiet['sanpham_image'] ?>" alt="">
                        </div>
                        <div class="product-content-left-small-img">
                            <img src="../img/imgindex/<?php echo $row_chitiet['sanpham_image'] ?>" alt="">
                            <img src="../img/imgindex/spchaybo_06.jpg" alt="">
                            <img src="../img/imgindex/spchaybo_08.jpg" alt="">
                            <img src="../img/imgindex/spchaybo_09.jpg" alt="">
                        </div>
                    </div>
                    <div class="product-content-right">
                        <div class="product-content-right-product-name">
                            <h1><?php echo $row_chitiet['sanpham_name'] ?></h1>
                        </div>
                        <div class="product-content-right-product-price">
                            <span class="product-price-off"><?php echo number_format($row_chitiet['sanpham_giakhuyenmai']) . 'vnđ' ?></span>
                            <?php
                            if ($row_chitiet['sanpham_gia'] != '') { ?>
                                <del><?php echo number_format($row_chitiet['sanpham_gia']) . 'vnđ' ?></del>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="product-content-right-product-size">
                            <p style="font-weight: bold">Size: </p>
                            <div class="size">
                                <span>38</span>
                                <span>39</span>
                                <span>40</span>
                                <span>41</span>
                                <span>42</span>
                                <span>43</span>
                            </div>
                        </div>
                        <form action="?quanly=giohang" method="post">
                            <fieldset>
                                <input type="hidden" name="tensanpham" value="<?php echo $row_chitiet['sanpham_name'] ?>" />
                                <input type="hidden" name="sanpham_id" value="<?php echo $row_chitiet['sanpham_id'] ?>" />
                                <input type="hidden" name="giasanpham" value="<?php echo $row_chitiet['sanpham_giakhuyenmai'] ?>" />
                                <input type="hidden" name="hinhanh" value="<?php echo $row_chitiet['sanpham_image'] ?>" />
                                <input type="hidden" name="soluong" value="1" />
                                <input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" />
                            </fieldset>
                        </form>
                        <div class="product-content-right-product-bottom">
                            <div class="product-content-right-product-bottom-content-big">
                                <div class="product-content-right-product-bottom-content-title row">
                                    <div class="product-content-right-product-bottom-content-title-title chitiet">
                                        <p>Chi tiết</p>
                                    </div>
                                </div>
                                <div class="product-content-right-product-bottom-content">
                                    <div class="product-content-right-product-bottom-content-chitiet">
                                        <?php echo $row_chitiet['sanpham_chitiet'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
    ?>
    <script src="../js/main.js"></script>
</body>

</html>