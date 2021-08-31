<?php
    $action = isset($_GET["action"]) ? $_GET["action"] : null;
    $MaHopDong = isset($_GET["idHopDong"]) ? $_GET["idHopDong"] : null;
    $MaSinhVien = isset($_POST["idSinhVien"]) ? $_POST["idSinhVien"] : null;
    $MaPhong = isset($_POST["idPhong"]) ? $_POST["idPhong"] : null;
    $NgayLap = isset($_POST["ngayLap"]) ? $_POST["ngayLap"] : null;
    $NgayBatDau = isset($_POST["ngayBatDau"]) ? $_POST["ngayBatDau"] : null;
    $NgayKetThuc = isset($_POST["ngayKetThuc"]) ? $_POST["ngayKetThuc"] : null;
    $TrangThai = isset($_POST["status"]) ? $_POST["status"] : null;
    if($action == "add"){
        try{
                $sql = "INSERT INTO hopdong (`idHopDong`, `idSinhVien`, `idPhong`, `ngayLap`, `ngayBatDau`, `ngayKetThuc`, `status`) 
                VALUES('$MaHopDong','$MaSinhVien',$MaPhong,'$NgayLap','$NgayLap','$NgayBatDau','$NgayKetThuc', '$TrangThai');";
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
            $sql1 = "SELECT * FROM hopdong WHERE idHopDong = $MaHopDong";
            $result = mysqli_query($conn, $sql1);
            $row = mysqli_fetch_assoc($result);
            $MaHopDong = $row["idHopDong"];
            $MaSinhVien = $row["idSinhVien"];
            $MaPhong = $row["idPhong"];
            $NgayLap = $row["ngayLap"];
            $NgayBatDau = $row["ngayBatDau"];
            $NgayKetThuc = $row["ngayKetThuc"];
            $TrangThai = $row["status"];

            $sqlEdit = "UPDATE hopdong 
            SET idSinhVien = '$MaSinhVien', idPhong='$MaPhong', ngayLap=$NgayLap, ngayBatDau='$NgayBatDau', ngayKetThuc='$NgayKetThuc', status='$status'
            WHERE idHopDong = '$MaHopDong'";
            $resultEdit= mysqli_query($conn, $sqlEdit);
            if(isset($resultEdit) && $resultEdit!=""){
                echo "<script>location.href='index.php?page=QLHopDong'</script>";
            }
            mysqli_close($conn);
        }
        catch(Exception $e){
            echo "<script> alert('Xin kiểm tra lại dữ liệu vừa nhập')</script>";
        }
        
    }
    if($action == "delete"){
        try{
            $sqlDelete = "DELETE FROM hopdong WHERE idHopDong = '$MaHopDong'";
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
            <?php
                if($action == "edit"){
                    echo "<div class='row' style='margin-top:5px;'>
                            <div class='col-md-2'>Mã hợp đồng</div>
                            <div class='col-md-10'>
                                <input type='text' value='$MaHopDong' name='idHopDong' class='form-control' readonly>
                            </div>
                        </div>";
                }
            ?>
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
                    <input type="text" value="<?php echo isset($MaSinhVien)? $MaSinhVien:''; ?>" name="idSinhVien" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Mã phòng</div>
                <div class="col-md-10">
                <input type="text" value="<?php echo isset($MaPhong)? $MaPhong:''; ?>" name="idPhong" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ngày lập</div>
                <div class="col-md-10">
                    <input type="date" value="<?php echo isset($NgayLap)? $NgayLap:''; ?>" name="ngayLap" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ngày bắt đầu</div>
                <div class="col-md-10">
                    <input type="date" value="<?php echo isset($NgayBatDau)? $NgayBatDau:''; ?>" name="ngayBatDau" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ngày kết thúc</div>
                <div class="col-md-10">
                    <input type="date" value="<?php echo isset($NgayKetThuc)? $NgayKetThuc:''; ?>" name="ngayKetThuc" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Trạng thái</div>
                <div class="col-md-10">
                    <input type="number" value="<?php echo isset($status)? $status:''; ?>" name="status" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="<?php if($action == "edit") echo "Sửa"; else echo "Thêm"; ?>" class="btn btn-primary" onclick="<script>location.href='index.php?page=QLSinhVien'</script>">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>
