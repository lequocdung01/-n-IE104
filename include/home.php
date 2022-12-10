    <!--------------------------BODY---------------------------------------->
    <!------------HÀNG MỚI VỀ-->
    <div id="wrapper">
        <?php
        $sql_cate_home = mysqli_query($conn, "SELECT*FROM tbl_category ORDER BY category_id ASC");
        while ($row_cate_home = mysqli_fetch_array($sql_cate_home)) {
            $id_category = $row_cate_home['category_id'];
        ?>
            <div class="headline">
                <h3><?php echo $row_cate_home['category_name'] ?></h3>
            </div>
            <ul class="products">
                <?php
                $sql_product = mysqli_query($conn, "SELECT*FROM tbl_sanpham where sanpham_hot = '1' ORDER BY sanpham_id ASC");
                while ($row_sanpham = mysqli_fetch_array($sql_product)) {
                    if ($row_sanpham['category_id'] == $id_category) {
                ?>
                        <li>
                            <form action="?quanly=giohang" method="post">
                                <div class="product-item">
                                    <div class="product-top">
                                        <a href="" class="product-thumd">
                                            <a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>"><img src="../img/imgindex/<?php echo $row_sanpham['sanpham_image'] ?>"></a>
                                        </a>
                                        <!-- <a href="" class="buy-now" name="themgiohang">Mua ngay</a> -->
                                        <input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" />
                                        <a href="" class="new-now">NEW</a>
                                    </div>
                                    <div class="product-info">
                                        <a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>" class="product-name"><?php echo $row_sanpham['sanpham_name'] ?></a>
                                        <div>
                                            <span class="product-price-off"><?php echo number_format($row_sanpham['sanpham_giakhuyenmai']) . 'vnđ' ?></span>
                                            <?php
                                            if ($row_sanpham['sanpham_gia'] != '') { ?>
                                                <del><?php echo number_format($row_sanpham['sanpham_gia']) . 'vnđ' ?></del>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <fieldset>
                                    <input type="hidden" name="tensanpham" value="<?php echo $row_sanpham['sanpham_name'] ?>" />
                                    <input type="hidden" name="sanpham_id" value="<?php echo $row_sanpham['sanpham_id'] ?>" />
                                    <input type="hidden" name="giasanpham" value="<?php echo $row_sanpham['sanpham_giakhuyenmai'] ?>" />
                                    <input type="hidden" name="hinhanh" value="<?php echo $row_sanpham['sanpham_image'] ?>" />
                                    <input type="hidden" name="soluong" value="1" />
                                </fieldset>
                            </form>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>
        <?php
        }
        ?>
    </div>