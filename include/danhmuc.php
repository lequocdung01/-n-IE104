<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}


$sql_cate = mysqli_query($conn, "SELECT*FROM tbl_category , tbl_sanpham where tbl_category.category_id = tbl_sanpham.category_id
    and tbl_sanpham.category_id='$id' order by tbl_sanpham.sanpham_id desc");
$sql_category = mysqli_query($conn, "SELECT*FROM tbl_category , tbl_sanpham where tbl_category.category_id = tbl_sanpham.category_id
    and tbl_sanpham.category_id='$id' order by tbl_sanpham.sanpham_id desc");
$row_title = mysqli_fetch_array($sql_category);
$title = $row_title['category_name'];
?>


<div class="title">
    <a href="../html/index.php">Trang chủ</a><i class="fa-solid fa-chevron-right"></i><a href="" class="tl-dc"><?php echo $title ?></a>
</div>
<div class="search-product">
    <div class="search-product-content">
        <p>Chọn size dày</p>
        <select name="" id="">
            <option value="">Chọn size giày</option>
            <option value="">40</option>
            <option value="">41</option>
            <option value="">42</option>
            <option value="">43</option>
            <option value="">44</option>
        </select>
    </div>
    <div class="search-product-content">
        <p>Khoảng giá</p>
        <select name="" id="">
            <option value="">Chọn khoảng giá</option>
            <option value="">Dưới 200.000vnđ</option>
            <option value="">Từ 200.000vnđ đến 500.000vnđ</option>
            <option value="">Từ 500.000vnđ đến 1.000.000vnđ</option>
            <option value="">Trên 1.000.000vnđ</option>
        </select>
    </div>
    <div class="search-product-content">
        <p>Sắp xếp theo</p>
        <select name="" id="">
            <option value="">Giá từ thấp đến cao</option>
            <option value="">Giá từ cao đến thấp</option>
        </select>
    </div>
    <div class="search-product-content">
        <div class="search-product-ngay">
            <div class="button">Tìm Giày Ngay<i class="fa-solid fa-magnifying-glass"></i></div>
        </div>
    </div>
</div>

<!------------------------->
<div class="sell">
    <div id="wrapper-male">
        <div class="headline">
            <h3><?php echo $title ?></h3>
        </div>
        <ul class="products">
            <?php
            while ($row_cate = mysqli_fetch_array($sql_cate)) {
            ?>
                <li>
                    <form action="?quanly=giohang" method="post">
                        <div class="product-item">
                            <div class="product-top">
                                <a href="" class="product-thumd">
                                    <a href="?quanly=chitietsp&id=<?php echo $row_cate['sanpham_id'] ?>"><img src="../img/imgindex/<?php echo $row_cate['sanpham_image'] ?>"></a>
                                </a>
                                <!-- <a href="" class="buy-now" name="themgiohang">Mua ngay</a> -->
                                <input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" />
                                <a href="" class="new-now">NEW</a>
                            </div>
                            <div class="product-info">
                                <a href="?quanly=chitietsp&id=<?php echo $row_cate['sanpham_id'] ?>" class="product-name"><?php echo $row_cate['sanpham_name'] ?></a>
                                <div>
                                    <span class="product-price-off"><?php echo number_format($row_cate['sanpham_giakhuyenmai']) . 'vnđ' ?></span>
                                    <?php
                                    if ($row_cate['sanpham_gia'] != 0) { ?>
                                        <del><?php echo number_format($row_cate['sanpham_gia']) . 'vnđ' ?></del>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <fieldset>
                            <input type="hidden" name="tensanpham" value="<?php echo $row_cate['sanpham_name'] ?>" />
                            <input type="hidden" name="sanpham_id" value="<?php echo $row_cate['sanpham_id'] ?>" />
                            <input type="hidden" name="giasanpham" value="<?php echo $row_cate['sanpham_giakhuyenmai'] ?>" />
                            <input type="hidden" name="hinhanh" value="<?php echo $row_cate['sanpham_image'] ?>" />
                            <input type="hidden" name="soluong" value="1" />
                        </fieldset>
                    </form>
                </li>
            <?php
            }
            ?>
    </div>
    <div class="news">
        <div class="news-headline">
            <h2>Tin tức nổi bật</h2>
        </div>
        <div class="news-tt">
            <img src="../img/product-male/quangcao_01.jpg" alt="" class="feature">
            <p>Cách đo kích thước dày bằng size bàn chân</p>
        </div>
        <div class="news-tt">
            <img src="../img/product-male/quangcao_02.jpg" alt="" class="feature">
            <p>TỔng hợp những mẫu giày được yêu thích của năm</p>
        </div>
        <div class="news-tt">
            <img src="../img/product-male/quangcao_03.jpg" alt="" class="feature">
            <p>Adidas thương hiệu được mọi khách hàng yêu thích</p>
        </div>
        <div class="news-tt">
            <img src="../img/product-male/quangcao_04.jpeg" alt="" class="feature">
            <p>Shop giày tốt nơi người dùng đặt niềm tin</p>
        </div>
        <div class="news-tt">
            <img src="../img/product-male/quangcao_05.jpg" alt="" class="feature">
            <p>Cách diệt khuẩn cho giày</p>
        </div>
        <div class="news-tt">
            <img src="../img/product-male/quangcao_06.jpg" alt="" class="feature">
            <p>Cách vệ sinh giày sao cho không bị rách</p>
        </div>
        <div class="news-tt">
            <img src="../img/product-male/quangcao_02.jpg" alt="" class="feature">
            <p>TỔng hợp những mẫu giày được yêu thích của năm</p>
        </div>
        <div class="news-tt">
            <img src="../img/product-male/quangcao_03.jpg" alt="" class="feature">
            <p>Adidas thương hiệu được mọi khách hàng yêu thích</p>
        </div>
    </div>
</div>