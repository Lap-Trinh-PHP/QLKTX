<?php
    $action = isset($_GET["action"]) ? $_GET["action"] : null;
    $MaHopDong = isset($_GET["id"]) ? $_GET["id"] : null;
    $MaHopDong1 = isset($_POST["idHopDong"]) ? $_POST["idHopDong"] : null;
    $MaSinhVien = isset($_POST["idSinhVien"]) ? $_POST["idSinhVien"] : null;
    $MaPhong = isset($_POST["idPhong"]) ? $_POST["idPhong"] : null;
    $NgayLap = isset($_POST["ngayLap"]) ? $_POST["ngayLap"] : null;
    $NgayBatDau = isset($_POST["ngayBatDau"]) ? $_POST["ngayBatDau"] : null;
    $NgayKetThuc = isset($_POST["ngayKetThuc"]) ? $_POST["ngayKetThuc"] : null;
    $TrangThai = isset($_POST["status"]) ? $_POST["status"] : null;

    $sql1 = "SELECT * FROM sinhvien";
    $resultSV = mysqli_query($conn, $sql1);
    $sql2 = "SELECT * FROM phong";
    $resultPhong = mysqli_query($conn, $sql2);
    if($action == "add"){
        try{
                $sql = "INSERT INTO hopdong (`idHopDong`, `idSinhVien`, `idPhong`, `ngayLap`, `ngayBatDau`, `ngayKetThuc`, `status`) 
                VALUES('$MaHopDong1','$MaSinhVien','$MaPhong','$NgayLap','$NgayBatDau','$NgayKetThuc', N'$TrangThai')";
                $resultAdd = mysqli_query($conn, $sql);
                if(isset($resultAdd) && $resultAdd!=""){
                    echo "<script>location.href='index.php?page=QLHopDong'</script>";
                }
            mysqli_close($conn);
        }
        catch(Exception $e){
            echo "<script> alert('Xin kiểm tra lại dữ liệu vừa nhập')</script>";
        }
    }
    if($action == "edit"){
        try{
            $sql3 = "SELECT * FROM hopdong WHERE idHopDong = $MaHopDong";
            $resultEdit = mysqli_query($conn, $sql3);
            $rowEdit = mysqli_fetch_assoc($resultEdit);
            $MaSinhVien1 = $rowEdit["idSinhVien"];
            $MaPhong1 = $rowEdit["idPhong"];
            $NgayLap1 = $rowEdit["ngayLap"];
            $NgayBatDau1 = $rowEdit["ngayBatDau"];
            $NgayKetThuc1 = $rowEdit["ngayKetThuc"];
            $TrangThai1 = $rowEdit["status"];

            if($MaSinhVien != null){
                $sqlEdit = "UPDATE hopdong 
                SET idSinhVien = '$MaSinhVien', idPhong='$MaPhong', ngayLap='$NgayLap', ngayBatDau='$NgayBatDau', ngayKetThuc='$NgayKetThuc', status='$TrangThai'
                WHERE idHopDong = '$MaHopDong'";
                $resultEdit= mysqli_query($conn, $sqlEdit);
                if(isset($resultEdit) && $resultEdit!=""){
                    echo "<script>location.href='index.php?page=QLHopDong'</script>";
                }
            }
            mysqli_close($conn);
        }
        catch(Exception $e){
            echo "<script> alert('Xin kiểm tra lại dữ liệu vừa nhập')</script>";
        }
        
    }
    if($action == "delete"){
        try{
            $sqlDelete = "DELETE FROM hopdong WHERE idHopDong = $MaHopDong";
            $delete = mysqli_query($conn, $sqlDelete);
            mysqli_close($conn);
            if(isset($delete) && $delete != ""){
                echo "<script> alert('Xóa thành công!');location.href='index.php?page=QLHopDong';</script>";
            }
        }
        catch(Exception $e){
            echo "<script> alert('Xin kiểm tra lại dữ liệu vừa nhập')</script>";
        }
    }
?>

<div class="col-md-12">  
    <div class="panel panel-primary">
        <?php
            if($action == "add")
                echo " <div class='panel-heading'>Hợp đồng</div>";
            if($action == "edit")
                echo " <div class='panel-heading'>Sửa hợp đồng</div>";
        ?>
       
        <div class="panel-body">
        <form method="post" enctype="multipart/form-data">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Mã hợp đồng</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($MaHopDong)? $MaHopDong:''; ?>" name="idHopDong" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Mã sinh viên</div>
                <div class="col-md-10">
                    <select class="form-control selectSV" style="width: 200px;" name="idSinhVien">
                        <option >Chọn mã-tên sinh viên</option>
                        <?php
                            while($rowSV = mysqli_fetch_assoc($resultSV)){
                                if($MaSinhVien1 == $rowSV["idSinhVien"])
                                    echo "<option selected value='".$rowSV["idSinhVien"]."' >".$rowSV["idSinhVien"]." - ".$rowSV["hoTen"]."</option>";
                                else echo "<option value='".$rowSV["idSinhVien"]."' >".$rowSV["idSinhVien"]." - ".$rowSV["hoTen"]."</option>";
                            }
                        ?>
                    </select>
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
                                if($MaPhong1 == $rowP["idPhong"])
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
                <div class="col-md-2">Ngày lập</div>
                <div class="col-md-10">
                    <input type="date" value="<?php echo isset($NgayLap1)? $NgayLap1:''; ?>" name="ngayLap" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ngày bắt đầu</div>
                <div class="col-md-10">
                    <input type="date" value="<?php echo isset($NgayBatDau1)? $NgayBatDau1:''; ?>" name="ngayBatDau" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ngày kết thúc</div>
                <div class="col-md-10">
                    <input type="date" value="<?php echo isset($NgayKetThuc1)? $NgayKetThuc1:''; ?>" name="ngayKetThuc" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Trạng thái</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($TrangThai1)? $TrangThai1:''; ?>" name="status" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="<?php if($action == "edit") echo "Sửa"; else echo "Thêm"; ?>" class="btn btn-primary">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>
