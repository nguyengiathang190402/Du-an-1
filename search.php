

<?php 
include "connect_search.php";
include "index.php";


?>

<main class="container" >
    
    <?php
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $sqlsearch = "SELECT * FROM sanpham WHERE ten_sp LIKE '%$search%'";
        $result = $conn->prepare($sqlsearch);
        $result->execute();
        $count = $result->rowCount();
        if ($count == 0) {
            echo '<div class="shop__products grid grid-cols-5">
            <p style="border:unset;">Không tìm thấy sản phẩm phù hợp !</p>
            <a class="btn btn-danger" href="javascript:history.back()"><i class="fas fa-undo-alt"></i> Quay lại</a>
            ';
        } else {
            echo '<div class="shop__products grid grid-cols-5">
            <p  style="border:unset; margin-top: 20px; color: red;">Tìm thấy ' . $count . ' sản phẩm phù hợp</p>';
            echo '<p  style="border:unset; color: red;">Kết quả tìm kiếm cho từ khóa <span style="font-weight: bold;">\'' . $search . '\'</span> </p>';
        };
    }
    ?>
    
</div>

<div class="shop__products grid grid-cols-5">


                

<div class="shop__product">
                <?php
                    if (isset($_GET['id'])) {
                        $cateid = $_GET["id"];
                        
                    } elseif (isset($_GET['search'])) {
                        $search = $_GET['search'];
                        foreach (selectAll("SELECT * FROM sanpham WHERE ten_sp LIKE '%$search%'ORDER BY ma_sp ") as $row) {
                ?>
                    <!-- Stats -->
                    <div class="product">
                        <div class="items">
                            <div class="image">
                            <?php 
                               $hinhpath = "./images/".$row['image'];
                               if(is_file($hinhpath)){
                                   $anh = $hinhpath;
                               }else {
                                   $anh = "no photo";
                               }
        
                            ?>
                                <a href="chi-tiet-san-pham.php?id=<?php echo $s['ma_sp']?>"><img src="<?=$s['anh']?>" alt=""></a>
                            </div>
                        </div>
                        <div class="name-product">
                        <a href="chi-tiet-san-pham.php?id=<?php echo $s['ma_sp']?>"><?=$s['ten_sp']?></a>
                        </div>
                        <div class="price">
                        <a href="chi-tiet-san-pham.php?id=<?php echo $s['ma_sp']?>"><?=$s['gia']?>đ</a>
                        </div>
                    </div>
                    <!-- End product -->
                    <?php
                            }
                        } 
                        ?>
                    

                </div>
</main>

<?php



?>