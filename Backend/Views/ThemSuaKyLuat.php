<?php
    $action = isset($_GET["action"]) ? $_GET["action"] : null;
    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    $TenKyLuat = isset($_POST["TenKyLuat"]) ? $_POST["TenKyLuat"] : null;
    $MaSV = isset($_POST["MaSV"]) ? $_POST["MaSV"] : null;
    $ChiTiet = isset($_POST["ChiTiet"]) ? $_POST["ChiTiet"] : null;
    $NgayLap = isset($_POST["NgayLap"]) ? $_POST["NgayLap"] : null;
    $sql1 = "SELECT * FROM sinhvien";
    $resultSV = mysqli_query($conn, $sql1);
    if($action == "add" && $MaSV != ""){
        try{
            $sql = "INSERT INTO kyluat (`tenKyLuat`, `idSinhVien`, `chiTiet`, `ngayLap`) 
            VALUES('$TenKyLuat','$MaSV','$ChiTiet','$NgayLap');";
            $resultAdd = mysqli_query($conn, $sql);
            if(isset($resultAdd) && $resultAdd!=""){
                echo "<script>location.href='index.php?page=QLKyLuat'</script>";
            }
            mysqli_close($conn);
        }
        catch(Exception $e){
            echo "<script> alert('Xin kiểm tra lại dữ liệu vừa nhập')</script>";
        }
    }
    if($action == "edit"){
        try{
            $sql2 = "SELECT * FROM kyluat WHERE idKyLuat = $id";
            $getKyLuat = mysqli_query($conn, $sql2);
            $rowEdit = mysqli_fetch_assoc($getKyLuat);
            $MaSV1 = $rowEdit["idSinhVien"];
            $TenKyLuat1 = $rowEdit["tenKyLuat"];
            $ChiTiet1 = $rowEdit["chiTiet"];
            $NgayLap1 = $rowEdit["ngayLap"];
            if(!$TenKyLuat){
                $sqlEdit = "UPDATE kyluat 
                SET tenKyLuat='$TenKyLuat', idSinhVien='$MaSV', chiTiet='$ChiTiet', ngayLap='$NgayLap'
                WHERE idKyLuat = '$id'";
                $resultEdit= mysqli_query($conn, $sqlEdit);
                if(isset($resultEdit) && $resultEdit!=""){
                    echo "<script>location.href='index.php?page=QLKyLuat'</script>";
                }
            }else{
                echo "<script> alert('Xin kiểm tra lại dữ liệu vừa nhập')</script>";
            }
            mysqli_close($conn);
        }
        catch(Exception $e){
            echo "<script> alert('Xin kiểm tra lại dữ liệu vừa nhập')</script>";
        }
    }
    if($action == "delete"){
        try{
            $sqlDelete = "DELETE FROM kyluat WHERE idKyLuat = '$id'";
            $delete = mysqli_query($conn, $sqlDelete);
            mysqli_close($conn);
            if(isset($delete) && $delete != ""){
                echo "<script> alert('Xóa thành công!');location.href='index.php?page=QLKyLuat';</script>";
            }
        }
        catch(Exception $e){
            echo "Lỗi".$e;
        }
    }
?>
<div class="col-md-12">  
    <div class="panel panel-primary">
        <?php
            if($action == "add")
                echo "<div class='panel-heading'>Thêm kỷ luật</div>";
            if($action == "edit")
                echo "<div class='panel-heading'>Sửa kỷ luật</div>";
        ?>
        
        <div class="panel-body">
        <form method="post" enctype="multipart/form-data">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Mã-Tên sinh viên</div>
                <div class="col-md-10">
                    <select class="form-control selectSV" style="width: 200px;" name="MaSV">
                        <option >Chọn mã-tên sinh viên</option>
                        <?php
                            while($rowSV = mysqli_fetch_assoc($resultSV)){
                                if($MaSV1 == $rowSV["idSinhVien"])
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
                <div class="col-md-2">Hình thức kỷ luật</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($TenKyLuat1)? $TenKyLuat1:''; ?>" name="TenKyLuat" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Lý do</div>
                <div class="col-md-10 ">
                    <textarea name="ChiTiet" rows="5" style="width:100%"><?php echo isset($ChiTiet1)? $ChiTiet1:''; ?></textarea>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ngày lập</div>
                <div class="col-md-10">
                    <input type="date" value="<?php echo isset($NgayLap1)? $NgayLap1:''; ?>" name="NgayLap" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="<?php if($action == "edit") echo "Sửa"; else echo "Thêm"; ?>" class="btn btn-primary" />
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>