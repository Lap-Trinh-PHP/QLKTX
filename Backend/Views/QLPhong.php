<h1>QL phòng</h1>
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?page=ThemSuaPhong" class="btn btn-primary">Thêm phòng</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Danh sách phòng</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="max-width: 100px;">Mã phòng</th>
                    <th style="max-width: 180px;">Số lượng sinh viên</th>
                    <th style="max-width: 100px;">Tình trạng</th>
                    <th style="max-width:100px;">Option</th>
                    <th style="max-width:100px;"></th>
                </tr>
                <?php
                    $sql = "SELECT * FROM phong";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>
                            <td style='max-width: 100px;'>".$row["idPhong"]."</td>
                            <td style='max-width: 180px;'>".$row["soLuongSv"]."</td>
                            <td style='max-width: 100px;'>".$row["tinhTrang"]."</td>
                            <td style='max-width: 100px;'>".$row["option"]."</td>
                            <td  style='text-align:center;max-width:150px;'>
                                <a class='btn btn-info' href='index.php?page=ThemSuaPhong'>Edit</a>&nbsp;
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