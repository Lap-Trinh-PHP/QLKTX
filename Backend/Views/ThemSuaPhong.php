<?php
    $actionP=isset($_GET["action"]) ? $_GET["action"] : null;
    $maphongP=isset($_GET["id"]) ? $_GET["id"] : null;
    $maphongmoi=isset($_POST["idPhong"]) ? $_POST["idPhong"] : null;
    $soluong=isset($_POST["soLuongSv"]) ? $_POST["soLuongSv"] : null;
    $tinhtrang=isset($_POST["tinhTrang"]) ? $_POST["tinhTrang"] : null;
    $option = isset($_POST["Option"]) ? $_POST["Option"] : null;
    if($actionP=="add"){
        try{
            $sqlInsertPhong="INSERT INTO `phong`(`idPhong`, `soLuongSv`, `tinhTrang`, `option`) 
            VALUES ($maphongmoi,$soluong,'$tinhtrang','$option');";
            $resultAddPhong=mysqli_query($conn,$sqlInsertPhong);
            if(isset($resultAddPhong) && $resultAddPhong != ""){
                echo "<script>location.href='index.php?page=QLPhong'</script>";
            }
            mysqli_close($conn);
        }
        catch(Exception $ex){
            echo "<script> alert('Xin kiểm tra lại dữ liệu vừa nhập')</script>";
        }
    }
    if($actionP=="edit"){
        try {
            $sqlSelectPhong="SELECT * FROM phong WHERE idPhong= $maphongP";
            $resultSelect=mysqli_query($conn,$sqlSelectPhong);
            $row=mysqli_fetch_assoc($resultSelect);
            $soluong1=$row["soLuongSv"];
            $tinhtrang1=$row["tinhTrang"];
            $option1=$row["option"];

            $sqlEditPhong="UPDATE `phong` SET `soLuongSv`=$soluong,`tinhTrang`='$tinhtrang',`option`='$option' WHERE `idPhong`='$maphongP'";
            $resultEditPhong=mysqli_query($conn,$sqlEditPhong);
            if(isset($resultEditPhong) && $resultEditPhong != ""){
                echo "<script>location.href='index.php?page=QLPhong'</script>";
            }
            mysqli_close($conn);
        } catch (Exception $ex) {
            echo "<script> alert('Xin kiểm tra lại dữ liệu vừa nhập')</script>";
        }
    }
    
    if($actionP=="delete"){
        try {
            $sqlDeletePhong="DELETE FROM `phong` WHERE idPhong='$maphongP'";
            $resultDeletePhong=mysqli_query($conn,$sqlDeletePhong);
            mysqli_close($conn);
            if(isset($resultDeletePhong) && $resultDeletePhong != ""){
                echo "<script> alert('Xóa thành công!');location.href='index.php?page=QLPhong';</script>";
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
            if($actionP=="add"){
                echo "Thêm phòng";
            }
            if($actionP=="edit"){
                echo "Sửa phòng";
            }
            ?>
        </div>
        <div class="panel-body">
        <form method="post" enctype="multipart/form-data" >
            <?php
                if($actionP=="edit"){
                    echo "<div class='row' style='margin-top:5px;'>
                            <div class='col-md-2'>Mã phòng</div>
                            <div class='col-md-10'>
                                <input type='text' value='$maphongP' name='idPhong' class='form-control' readonly>
                            </div>
                        </div>";    
                }
                if($actionP=="add"){
                    echo "<div class='row' style='margin-top:5px;'>
                            <div class='col-md-2'>Mã phòng</div>
                            <div class='col-md-10'>
                                <input type='text' value='' name='idPhong' class='form-control' required>
                            </div>
                        </div>";    
                }
            ?>
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Số lượng sinh viên</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($soluong1)? $soluong1 :''; ?>" name="soLuongSv" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Tình trạng</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($tinhtrang1)? $tinhtrang1 :''; ?>" name="tinhTrang" class="form-control" required>
                    <!-- <input type="radio" name="tinhTrang" value="Trống" checked>Trống
                    <input type="radio" value="Đã full" name="tinhTrang" >Full -->
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Option</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($option1)? $option1 :''; ?>" name="Option" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="<?php if($actionP=="edit") echo "Sửa"; else echo "Thêm" ?>" class="btn btn-primary" onclick="<script>location.href='index.php?page=QLPhong'</script>">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>