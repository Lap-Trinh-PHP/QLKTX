<?php
    $actionT=isset($_GET["action"]) ? $_GET["action"] : null;
    $idHoaDon=isset($_GET["id"]) ? $_GET["id"] : null;
    $mahoadon=isset($_POST["maHoaDon"]) ? $_POST["maHoaDon"] :null;
    $maphong=isset($_POST["maPhong"]) ? $_POST["maPhong"] : null;
    $sodiencu=isset($_POST["soDienCu"]) ? $_POST["soDienCu"] : null;
    $sodienmoi=isset($_POST["soDienMoi"]) ? $_POST["soDienMoi"] : null;
    $sonuoccu=isset($_POST["soNuocCu"]) ? $_POST["soNuocCu"] : null;
    $sonuocmoi=isset($_POST["soNuocMoi"]) ? $_POST["soNuocMoi"] : null;
    $sql2 = "SELECT * FROM phong";
    $resultPhong = mysqli_query($conn, $sql2);
    if($actionT=="add"){
        
        try{
            $sqlInsertDN="INSERT INTO `diennuoc`(`idHoaDon`, `idPhong`, `soDienIn`, `soDienOut`, `soNuocIn`, `soNuocOut`) 
            VALUES ($mahoadon,$maphong,$sodiencu,$sodienmoi,$sonuoccu,$sonuocmoi)";
            $resultAddDN=mysqli_query($conn,$sqlInsertDN);
            if(isset($resultAddDN) && $resultAddDN != ""){
                echo "<script>location.href='index.php?page=QLDienNuoc'</script>";
            }
            mysqli_close($conn);
        }
        catch(Exception $ex){
            echo "<script> alert('Xin kiểm tra lại dữ liệu vừa nhập')</script>";
        }
    }

    if($actionT=="edit"){
        try {
            $sqlSelectDN="SELECT * FROM `diennuoc` WHERE idHoaDon=$idHoaDon";
            $resultSelectDN=mysqli_query($conn,$sqlSelectDN);
            $row=mysqli_fetch_assoc($resultSelectDN);
            $mahoadon1=$row["idHoaDon"];
            $maphong1=$row["idPhong"];
            $sodiencu1=$row["soDienIn"];
            $sodienmoi1=$row["soDienOut"];
            $sonuoccu1=$row["soNuocIn"];
            $sonuocmoi1=$row["soNuocOut"];
            $sqlEditDN="UPDATE `diennuoc` SET `soDienIn`=$sodiencu,`soDienOut`=$sodienmoi,`soNuocIn`=$sonuoccu,`soNuocOut`=$sonuocmoi WHERE `idHoaDon`=$idHoaDon";
            $resultEditDN=mysqli_query($conn,$sqlEditDN);
            if(isset($resultEditDN) && $resultEditDN != ""){
                echo "<script>location.href='index.php?page=QLDienNuoc'</script>";
            }
            mysqli_close($conn);
        } catch (Exception $ex) {
            echo "<script> alert('Xin kiểm tra lại dữ liệu vừa nhập')</script>";
        }
    }

    if($actionT=="delete"){
        try {
            $sqlDeleteDN="DELETE FROM `diennuoc` WHERE idHoaDon='$idHoaDon'";
            $resultDeleteDN=mysqli_query($conn,$sqlDeleteDN);
            mysqli_close($conn);
            if(isset($resultDeleteDN) && $resultDeleteDN != ""){
                echo "<script> alert('Xóa thành công!');location.href='index.php?page=QLDienNuoc';</script>";
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
                <div class="col-md-2">Mã hóa đơn</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($idHoaDon)? $idHoaDon :''; ?>" name="maHoaDon" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Mã phòng</div>
                <div class="col-md-10">
                    <select class="form-control selectSV" style="width: 200px;" name="idPhong">
                        <option >Chọn mã phòng</option>
                        <?php
                            while($rowP = mysqli_fetch_assoc($resultPhong)){
                                if($maphong1 == $rowP["idPhong"])
                                    echo "<option selected value='".$rowP["idPhong"]."' >".$rowP["idPhong"]."</option>";
                                else echo "<option value='".$rowP["idPhong"]."' >".$rowP["idPhong"]."</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Số điện cũ</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($sodiencu1)? $sodiencu1 :''; ?>" name="soDienCu" class="form-control" required>
                </div>
            </div> 
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Số điện mới</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($sodienmoi1)? $sodienmoi1 :''; ?>" name="soDienMoi" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Số nước cũ</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($sonuoccu1)? $sonuoccu1 :''; ?>" name="soNuocCu" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Số nước mới</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($sonuocmoi1)? $sonuocmoi1 :''; ?>" name="soNuocMoi" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="<?php if($actionT=="edit") echo "Sửa"; else echo "Thêm" ?>" class="btn btn-primary" onclick="<script>location.href='index.php?page=QLDienNuoc'</script>">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>