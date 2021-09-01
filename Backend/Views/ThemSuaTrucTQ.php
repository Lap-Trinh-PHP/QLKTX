<?php
    $action = isset($_GET["action"]) ? $_GET["action"] : null;
    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    $idPhong = isset($_POST["idPhong"]) ? $_POST["idPhong"] : null;
    $tangTruc = isset($_POST["tangTruc"]) ? $_POST["tangTruc"] : null;
    $ngayBatDau = isset($_POST["ngayBatDau"]) ? $_POST["ngayBatDau"] : null;
    $ngayKetThuc = isset($_POST["ngayKetThuc"]) ? $_POST["ngayKetThuc"] : null;

    if($action == "add"){
        try{
            if($tangTruc != 0){
                $sql = "INSERT INTO tructuquan (`idPhong`, `tangTruc`, `ngayBatDau`, `ngayKetThuc`) 
                VALUES('$idPhong','$tangTruc','$ngayBatDau','$ngayKetThuc');";
                $resultAdd = mysqli_query($conn, $sql);
                if(isset($resultAdd) && $resultAdd!=""){
                    echo "<script> alert('Thêm thành công !!!')</script>";
                    echo "<script>location.href='index.php?page=QLTrucTQ'</script>";
                }
                mysqli_close($conn);
            }
        }
        catch(Exception $e){
            echo "<script> alert('Xin kiểm tra lại dữ liệu vừa nhập')</script>";
        }
    }
    if($action == "edit"){
        try{
            $sql1 = "SELECT * FROM tructuquan WHERE idTruc = $id";
            $getEdit = mysqli_query($conn, $sql1);
            $rowEdit = mysqli_fetch_assoc($getEdit);
            $idPhong1 = $rowEdit["idPhong"];
            $tangTruc1 = $rowEdit["tangTruc"];
            $ngayBatDau1 = $rowEdit["ngayBatDau"];
            $ngayKetThuc1 = $rowEdit["ngayKetThuc"];
            if($tangTruc != 0){
                $sqlEdit = "UPDATE tructuquan 
                SET idPhong='$idPhong', tangTruc='$tangTruc', ngayBatDau='$ngayBatDau', ngayKetThuc='$ngayKetThuc'
                WHERE idTruc = '$id'";
                $resultEdit= mysqli_query($conn, $sqlEdit);
                if(isset($resultEdit) && $resultEdit!=""){
                    echo "<script> alert('Sửa thành công !!!')</script>";
                    echo "<script>location.href='index.php?page=QLTrucTQ'</script>";
                }
                mysqli_close($conn);
            }
        }
        catch(Exception $e){
            echo "<script> alert('Xin kiểm tra lại dữ liệu vừa nhập')</script>";
        }
        
    }
    if($action == "delete"){
        try{
            $sqlDelete = "DELETE FROM tructuquan WHERE idTruc = '$id'";
            $delete = mysqli_query($conn, $sqlDelete);
            mysqli_close($conn);
            if(isset($delete) && $delete != ""){
                echo "<script> alert('Xóa thành công!');location.href='index.php?page=QLTrucTQ';</script>";
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
                echo " <div class='panel-heading'>Thêm trực tự quản</div>";
            if($action == "edit")
                echo " <div class='panel-heading'>Sửa trực tự quản</div>";
        ?>
        <div class="panel-body">
        <form method="post" enctype="multipart/form-data">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Số phòng</div>
                <div class="col-md-10">
                    <select class="form-control" style="width: 200px;" name="idPhong">
                        <option value="">Chọn phòng</option>
                        <?php
                            include "../Application/Connection.php";
                            $getPhong = "SELECT * FROM phong";
                            $resultPhong = mysqli_query($conn, $getPhong);
                            while($row1 = mysqli_fetch_assoc($resultPhong)){
                                if($row1['idPhong'] == $idPhong1)
                                    echo "<option selected value='".$row1['idPhong']."' >".$row1['idPhong']."</option>";
                                else echo "<option value='".$row1['idPhong']."' >".$row1['idPhong']."</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Tầng trực</div>
                <div class="col-md-10">
                    <select class="form-control" style="width: 200px;" name="tangTruc">
                        <option >Chọn Tầng</option>
                        <?php
                            for($i = 0; $i < 10; $i++)
                                if($i+1 == $tangTruc1)
                                    echo "<option selected value='".($i+1)."' >".($i+1)."</option>";
                                else echo "<option value='".($i+1)."' >".($i+1)."</option>";
                        ?>
                    </select>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ngày bắt đầu</div>
                <div class="col-md-10 ">
                    <input type="date" value="<?php echo isset($ngayBatDau1)? $ngayBatDau1:''; ?>" name="ngayBatDau" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ngày kết thúc</div>
                <div class="col-md-10">
                    <input type="date" value="<?php echo isset($ngayKetThuc1)? $ngayKetThuc1:''; ?>" name="ngayKetThuc" class="form-control" required>
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