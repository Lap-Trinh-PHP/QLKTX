<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Thêm cho mượn tài sản</div>
        <div class="panel-body">
        <form method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Mã tài sản</div>
                <div class="col-md-10">
                    <input type="text" value="" name="maTaiSan" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Mã sinh viên</div>
                <div class="col-md-10">
                    <input type="text" value="" name="maSinhVien" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Mã phòng</div>
                <div class="col-md-10">
                    <input type="text" value="" name="maPhong" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ngày mượn</div>
                <div class="col-md-10">
                    <input type="date" value="" name="ngayMuon" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ngày trả</div>
                <div class="col-md-10">
                    <input type="date" value="" name="ngayTra" class="form-control" required>
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