<h1>QL Điện Nước</h1>
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?page=ThemSuaDienNuoc" class="btn btn-primary">Thêm </a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Danh sách điện nước các phòng</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="max-width: 100px;">Mã hóa đơn</th>
                    <th style="max-width: 180px;">Mã phòng</th>
                    <th style="max-width: 100px;">Số điện vào</th>
                    <th style="max-width:100px;">Số điện ra</th>
                    <th style="max-width: 100px;">Số nước vào</th>
                    <th style="max-width:100px;">Số nước ra</th>
                    <!-- <th style="max-width: 100px;">Số điện sử dụng</th>
                    <th style="max-width:100px;">Số nước sử dụng</th> -->
                    <th style="max-width:100px;"></th>
                </tr>
                <?php
                    $sql = "SELECT * FROM diennuoc";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        //$soDien=$row["soDienOut"]-$row["soDienIN"];
                        //$soNuoc=$row["soNuocOut"]-$row["soNuocIn"];
                        
                        echo "<tr>
                            <td style='max-width: 100px;'>".$row["idHoaDon"]."</td>
                            <td style='max-width: 180px;'>".$row["idPhong"]."</td>
                            <td style='max-width: 100px;'>".$row["soDienIn"]."</td>
                            <td style='max-width: 100px;'>".$row["soDienOut"]."</td>
                            <td style='max-width: 100px;'>".$row["soNuocIn"]."</td>
                            <td style='max-width: 100px;'>".$row["soNuocOut"]."</td>
                            
                            <td  style='text-align:center;max-width:150px;'>
                                <a class='btn btn-info' href='index.php?page=ThemSuaDienNuoc'>Edit</a>&nbsp;
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