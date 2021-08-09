<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?page=ThemSuaTaiSan" class="btn btn-primary">Thêm</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Danh sách mượn tài sản của sinh viên KTX</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="max-width: 50px;">Mã tài sản</th>
                    <th style="max-width:100px;">Mã sinh viên</th>
                    <th style="max-width: 180px;">Mã phòng</th>
                    <th style="max-width: 150px;">Số lượng mượn</th>
                    <th style="max-width: 50px;">Ngày mượn</th>
                    <th style="max-width: 50px;">Ngày trả</th>
                    <th style="max-width:70px;"></th>
                </tr>
                <?php
                    $sql = "SELECT * FROM taisan";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        $sql2 = "SELECT * FROM taisan WHERE idTaiSan = '". $row["idTaiSan"] ."'";
                        $result2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        echo "<tr>
                            <td style='max-width: 50px;'>".$row2["idTaiSan"]."</td>
                            <td style='max-width: 100px;'>".$row2["idSinhVien"]."</td>
                            <td style='max-width: 100px;'>".$row["idPhong"]."</td>
                            <td style='max-width: 150px;'>".$row["soLuong"]."</td>
                            <td style='max-width: 50px;'>".$row["ngayMuon"]."</td>
                            <td style='max-width: 50px;'>".$row["ngayTra"]."</td>
                            <td  style='text-align:center;max-width:70px;'>
                                <a class='btn btn-info' href='index.php?page=ThemSuaTaiSan'>Edit</a>&nbsp;
                                <a class='btn btn-danger' href='#' onclick='return window.confirm('Are you sure?');'>Delete</a>
                            </td>
                        </tr>";
                    };
                    mysqli_close($conn);
                ?>
            </table>
        </div>
    </div>
</div>