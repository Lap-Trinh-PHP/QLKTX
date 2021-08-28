<?php
    $actionT=isset($_GET["action"]) ? $_GET["action"] : null;
    $mataisan=isset($_GET["id"]) ? $_GET["id"] : null;
    $matsmoi=isset($_POST["maTaiSan"]) ? $_POST["maTaiSan"] :null;
    $masinhvien=isset($_POST["maSinhVien"]) ? $_POST["maSinhVien"] : null;
    $maphong=isset($_POST["maPhong"]) ? $_POST["maPhong"] : null;
    $soluong=isset($_POST["soLuong"]) ? $_POST["soLuong"] : null;
    $ngaymuon=isset($_POST["ngayMuon"]) ? $_POST["ngayMuon"] : null;
    $ngaytra=isset($_POST["ngayTra"]) ? $_POST["ngayTra"] : null;

    if($actionT=="add"){
        
        try{
            $sqlInsertTS="INSERT INTO `taisan`(`idTaiSan`, `idSinhVien`, `idPhong`, `soLuong`, `ngayMuon`, `ngayTra`) 
            VALUES ($matsmoi,$masinhvien,$maphong,$soluong,'$ngaymuon','$ngaytra')";
            $resultAddTS=mysqli_query($conn,$sqlInsertTS);
            if(isset($resultAddTS) && $resultAddTS != ""){
                echo "<script>location.href='index.php?page=QLTaiSan'</script>";
            }
            mysqli_close($conn);
        }
        catch(Exception $ex){
            echo "<script> alert('Xin kiểm tra lại dữ liệu vừa nhập')</script>";
        }
    }

    if($actionT=="edit"){
        try {
            $sqlSelectTS="SELECT * FROM `taisan` WHERE idTaiSan=$mataisan";
            $resultSelect=mysqli_query($conn,$sqlSelectTS);
            $row=mysqli_fetch_assoc($resultSelect);
            $masinhvien1=$row["idSinhVien"];
            $maphong1=$row["idPhong"];
            $soluong1=$row["soLuong"];
            $ngaymuon1=$row["ngayMuon"];
            $ngaytra1=$row["ngayTra"];

            $sqlEditTS="UPDATE `taisan` SET `idSinhVien`=$masinhvien,`idPhong`=$maphong,`soLuong`=$soluong,`ngayMuon`='$ngaymuon',`ngayTra`='$ngaytra' WHERE `idTaiSan`=$mataisan";
            $resultEditTS=mysqli_query($conn,$sqlEditTS);
            if(isset($resultEditTS) && $resultEditTS != ""){
                echo "<script>location.href='index.php?page=QLTaiSan'</script>";
            }
            mysqli_close($conn);
        } catch (Exception $ex) {
            echo "<script> alert('Xin kiểm tra lại dữ liệu vừa nhập')</script>";
        }
    }

    if($actionT=="delete"){
        try {
            $sqlDeleteTS="DELETE FROM `taisan` WHERE idTaiSan='$mataisan'";
            $resultDelete=mysqli_query($conn,$sqlDeleteTS);
            mysqli_close($conn);
            if(isset($resultDelete) && $resultDelete != ""){
                echo "<script> alert('Xóa thành công!');location.href='index.php?page=QLTaiSan';</script>";
            }
        } catch (Exception $ex) {
            echo "<script> alert('Xin kiểm tra lại dữ liệu cần xóa')</script>";
        }
    }

?>

<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">
        <?php
            if($actionT=="add"){
                echo "Thêm";
            }
            if($actionT=="edit"){
                echo "Sửa";
            }
            ?>
        </div>
        <div class="panel-body">
        <form method="post" enctype="multipart/form-data">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Mã tài sản</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($mataisan)? $mataisan :''; ?>" name="maTaiSan" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Mã sinh viên</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($masinhvien1)? $masinhvien1 :''; ?>" name="maSinhVien" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Mã phòng</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($maphong1)? $maphong1 :''; ?>" name="maPhong" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Số lượng</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($soluong1)? $soluong1 :''; ?>" name="soLuong" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ngày mượn</div>
                <div class="col-md-10">
                    <input type="date" value="<?php echo isset($ngaymuon1)? $ngaymuon1 :''; ?>" name="ngayMuon" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ngày trả</div>
                <div class="col-md-10">
                    <input type="date" value="<?php echo isset($ngaytra1)? $ngaytra1 :''; ?>" name="ngayTra" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="<?php if($actionT=="edit") echo "Sửa"; else echo "Thêm" ?>" class="btn btn-primary" onclick="<script>location.href='index.php?page=QLTaiSan'</script>">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>