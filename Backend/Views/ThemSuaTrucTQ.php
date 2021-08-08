<div class="col-md-12">  
    <div class="panel panel-primary">
        <div class="panel-heading">Thêm sửa kỷ luật</div>
        <div class="panel-body">
        <form method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Số phòng</div>
                <div class="col-md-10">
                    <select class="form-control" style="width: 200px;" name="idPhong">
                        <option value="" selected>Chọn phòng</option>
                        <option value="100" >100</option>
                    </select>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Tầng trực</div>
                <div class="col-md-10">
                    <select class="form-control" style="width: 200px;" name="tangTruc">
                        <option value="" selected>Chọn Tầng</option>
                        <option value="1" >1</option>
                    </select>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ngày bắt đầu</div>
                <div class="col-md-10 ">
                    <input type="date" value="" name="ngayBatDau" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ngày kết thúc</div>
                <div class="col-md-10">
                    <input type="date" value="" name="ngayKetThuc" class="form-control" required>
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