<?php
    $action = isset($_GET["action"]) ? $_GET["action"] : null;
    $HoTen = isset($_POST["HoTen"]) ? $_POST["HoTen"] : null;
    $NgaySinh = isset($_POST["NgaySinh"]) ? $_POST["NgaySinh"] : null;
    $GioiTinh = isset($_POST["GioiTinh"]) ? $_POST["GioiTinh"] : null;
    $CMND = isset($_POST["CMND"]) ? $_POST["CMND"] : null;
    $SĐT = isset($_POST["SĐT"]) ? $_POST["SĐT"] : null;
    $NganhHoc = isset($_POST["NganhHoc"]) ? $_POST["NganhHoc"] : null;
    $LopHoc = isset($_POST["LopHoc"]) ? $_POST["LopHoc"] : null;
    if($action == "add"){
        try{
            $sql = "INSERT INTO sinhvien (`hoTen`, `ngaySinh`, `gioiTinh`, `soCMND`, `SDT`, `nganhHoc`, `lopHoc`) 
            VALUES('$HoTen','$NgaySinh',$GioiTinh,'$CMND','$SĐT','$NganhHoc','$LopHoc');";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
        }
        catch(Exception $e){
            echo "Lỗi".$e;
        }
        
    }
?>

<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Thêm sửa sinh viên</div>
        <div class="panel-body">
        <form method="post" enctype="multipart/form-data" >
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Họ tên</div>
                <div class="col-md-10">
                    <input type="text" value="" name="HoTen" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ngày sinh</div>
                <div class="col-md-10">
                    <input type="date" value="" name="NgaySinh" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Giới tính</div>
                <div class="col-md-10 input-control-sv">
                    <input type="radio" name="GioiTinh" value="0" checked>Nam
                    <input type="radio" value="1" name="GioiTinh" >Nữ
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Số chứng minh thư</div>
                <div class="col-md-10">
                    <input type="number" value="" name="CMND" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Số điện thoại</div>
                <div class="col-md-10">
                    <input type="number" value="" name="SĐT" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ngành học</div>
                <div class="col-md-10">
                    <select class="form-control" style="width: 200px;" name="NganhHoc">
                        <option value="" selected>Chọn ngành học</option>
                        <option value="CNTT" >CNTT</option>
                    </select>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Lớp học</div>
                <div class="col-md-10">
                    <select class="form-control" style="width: 200px;" name="LopHoc">
                        <option value="" selected>Chọn lớp học</option>
                        <option value="KTPM" >KTPM1</option>
                    </select>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="Thêm" class="btn btn-primary">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>
