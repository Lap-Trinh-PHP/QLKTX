
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?page=ThemSuaTrucTQ" class="btn btn-primary">Thêm</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Danh sách trực tự quản</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="max-width: 50px;">STT</th>
                    <th style="max-width:100px;">Phòng số</th>
                    <th style="max-width: 180px;">Tầng trực</th>
                    <th >Thời gian bắt đầu</th>
                    <th >Thời gian kết thúc</th>
                    <th style="max-width:70px;"></th>
                </tr>
                <?php
                    $sql = "SELECT * FROM tructuquan";
                    $result = mysqli_query($conn, $sql);
                    $stt = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $stt++;
                        echo "<tr>
                            <td style='max-width: 50px;'>".$stt."</td>
                            <td style='max-width: 100px;'>".$row["idPhong"]."</td>
                            <td style='max-width: 100px;'>".$row["tangTruc"]."</td>
                            <td >".$row["ngayBatDau"]."</td>
                            <td >".$row["ngayKetThuc"]."</td>
                            <td  style='text-align:center;max-width:70px;'>
                                <a class='btn btn-info' href='index.php?page=ThemSuaTrucTQ'>Edit</a>&nbsp;
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