<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Thêm sửa kỷ luật</div>
        <div class="panel-body">
        <form method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Mã sinh viên</div>
                <div class="col-md-10">
                    <input type="text" value="" name="idSinhVien" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Hình thức kỷ luật</div>
                <div class="col-md-10">
                    <input type="text" value="" name="tenKyLuat" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Lý do</div>
                <div class="col-md-10 ">
                    <textarea name="chiTiet" rows="5" style="width:100%"></textarea>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ngày lập</div>
                <div class="col-md-10">
                    <input type="date" value="" name="ngayLap" class="form-control" required>
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