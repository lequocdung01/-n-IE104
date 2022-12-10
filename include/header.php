<header>
    <div class="top-bar">
            <li><a href=""><i class="fa-sharp fa-solid fa-location-dot"></i>LOCATION</a></li>
            <li><a href=""><i class="fa-solid fa-phone"></i>0866145458</a></li>
            <li><a href="?quanly=nhanthongbao"><i class="fa fa-user"></i> ĐĂNG KÝ</a>
            </li>
        </div>
        <div class="header">
            <div class="logo">
                <img src="../img/Screenshot 2022-11-15 195621.png">
            </div>
            <div class="menu">
                <li><a href="../html/index.php">TRANG CHỦ</a></li>
                <?php
                        $sql_category_danhmuc = mysqli_query($conn, "SELECT*FROM tbl_category ORDER BY category_id ASC");
                        while ($row_category_danhmuc = mysqli_fetch_array($sql_category_danhmuc)) {
                ?>
                <li><a href="?quanly=danhmuc&id=<?php echo $row_category_danhmuc['category_id']?>">
                <?php echo $row_category_danhmuc['category_name']?></a></li>
                <?php
                   }
                ?>
                <li><a href="?quanly=gioithieu">GIỚI THIỆU</a></li>
            </div>
            <div class="others">
                <li><input placeholder="Tim kiem" type="text"><i class="fa-solid fa-magnifying-glass"></i></li>
                <li><a class="fa-solid fa-heart" href="#"></a></li>
                <li><a class="fa-solid fa-cart-shopping" href="?quanly=giohang"></a></li>
            </div>
        </div>
    </header>