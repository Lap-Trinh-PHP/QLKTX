
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?page=ThemSuaKyLuat&action=add" class="btn btn-primary">Thêm</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Danh sách sinh viên bị kỷ luật</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="max-width: 50px;">Mã sinh viên</th>
                    <th style="max-width:100px;">Tên sinh viên</th>
                    <th style="max-width: 180px;">Hình thức kỷ luật</th>
                    <th style="max-width: 150px;">Lý do kỷ luật</th>
                    <th style="max-width: 50px;">Ngày lập</th>
                    <th style="max-width:70px;"></th>
                </tr>
                <?php
                    $sql = "SELECT * FROM kyluat";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        $sql2 = "SELECT * FROM sinhvien WHERE idSinhVien = '". $row["idSinhVien"] ."'";
                        $result2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        echo "<tr>
                            <td style='max-width: 50px;'>".$row2["idSinhVien"]."</td>
                            <td style='max-width: 100px;'>".$row2["hoTen"]."</td>
                            <td style='max-width: 100px;'>".$row["tenKyLuat"]."</td>
                            <td style='max-width: 150px;'>".$row["chiTiet"]."</td>
                            <td style='max-width: 50px;'>".$row["ngayLap"]."</td>
                            <td  style='text-align:center;max-width:70px;'>
                                <a class='btn btn-info' href='index.php?page=ThemSuaKyLuat&action=edit&id=".$row['idKyLuat']."'>Edit</a>&nbsp;
                                <a class='btn btn-danger' href='index.php?page=ThemSuaKyLuat&action=delete&id=".$row['idKyLuat']."'>Delete</a>
                            </td>
                        </tr>";
                    };
                    mysqli_close($conn);
                ?>
            </table>
        </div>
    </div>
</div>