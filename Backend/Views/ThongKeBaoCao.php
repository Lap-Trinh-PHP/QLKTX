<h1>Thống kê báo cáo điện nước</h1>
<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">Danh sách điện nước các phòng</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="max-width: 180px;">Mã phòng</th>
                    <th style="max-width:100px;">Số điện</th>
                    <th style="max-width: 100px;">Số nước</th>
                    <th style="max-width:100px;"></th>
                </tr>
                <?php
                    $sql = "SELECT * FROM diennuoc";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>
                            <td style='max-width: 180px;'>".$row["idPhong"]."</td>
                            <td style='max-width: 100px;'>".$row["soDienOut"] - $row["soDienIn"]."</td>
                            <td style='max-width: 100px;'>".$row["soNuocOut"] - $row["soNuocIn"]."</td>
                        </tr>";
                    };
                    mysqli_close($conn);
                ?>
            </table>
        </div>
    </div>
</div>