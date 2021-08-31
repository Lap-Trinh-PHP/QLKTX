
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?page=ThemSuaHopDong&action=add" class="btn btn-primary">Thêm hợp đồng</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Danh sách hợp đồng</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="max-width: 100px;">Mã hợp đồng</th>
                    <th style="max-width: 180px;">Mã sinh viên</th>
                    <th style="max-width: 100px;">Mã phòng</th>
                    <th style="max-width:100px;">Ngày lập</th>
                    <th style="max-width: 100px;">Ngày bắt đầu</th>
                    <th style="max-width: 150px;">Ngày kết thúc</th>
                    <th style="max-width: 150px;">Trạng thái</th>
                </tr>
                <?php
                    $sql = "SELECT * FROM hopdong";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>
                            <td style='max-width: 100px;'>".$row["idHopDong"]."</td>
                            <td style='max-width: 180px;'>".$row["idSinhVien"]."</td>
                            <td style='max-width: 100px;'>".$row["idPhong"]."</td>
                            <td style='max-width: 100px;'>".$row["ngayLap"]."</td>
                            <td style='max-width: 100px;'>".$row["ngayBatDau"]."</td>
                            <td style='max-width: 150px;'>".$row["ngayKetThuc"]."</td>
                            <td style='max-width: 150px;'>".$row["status"]."</td>
                            <td  style='text-align:center;max-width:150px;'>
                                <a class='btn btn-info' href='index.php?page=ThemSuaHopDong&action=edit&id=".$row["idHopDong"]."'>Edit</a>&nbsp;
                                <a class='btn btn-danger' href='index.php?page=ThemSuaHopDong&action=delete&id=".$row["idHopDong"]."' onclick='return window.confirm('Are you sure?');'>Delete</a>
                            </td>
                        </tr>";
                    };
                    mysqli_close($conn);
                ?>
            </table>
        </div>
    </div>
</div>