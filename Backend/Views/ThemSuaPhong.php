<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Thêm sửa phòng</div>
        <div class="panel-body">
        <form method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Số lượng sinh viên</div>
                <div class="col-md-10">
                    <input type="text" value="" name="SoLuongSV" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Tình trạng</div>
                <div class="col-md-10">
                    <input type="text" value="" name="TinhTrang" class="form-control" required>
                    <input type="radio" name="TinhTrang" value="Trống" checked>Trống
                    <input type="radio" value="Đã full" name="Trình trạng" >Full
                </div>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Option</div>
                <div class="col-md-10">
                    <input type="text" value="" name="option" class="form-control" required>
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