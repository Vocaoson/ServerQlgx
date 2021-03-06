<div class="wrap-trum">
	<div class="container">
		<div class="alert alert-success EmailSuccess emailAlert" role="alert">
			<strong>Gửi email thành công!</strong>
		</div>
		<div class="alert alert-danger EmailError emailAlert" role="alert">
			<strong>Gửi email thất bại!</strong>
		</div>
		<div class="row">
			<div class="col-xs-6">
				<h2 class="TieuDeShow" data-name="GX">Giáo xứ trên hệ thống</h2>
			</div>
			<div class="col-xs-6">
				<div class="row">
					<div class="col-xs-8">
						<input id="contentFind" type="text" name="txtFind" class="form-control" placeholder="Nhập nội dung tìm kiếm">
					</div>
					<div class="col-xs-4">
						<b class="btn btn-secondary btnFind"><i class="fa fa-search"></i>Tìm kiếm</b>
					</div>
				</div>
			</div>
		</div>
		<div class="wrap-giaoxu">
			<hr>
			<div class="row">
				<div class="col-xs-4">
					<p>Tên giáo xứ</p>
				</div>
				<div class="col-xs-2">
					<p>Số điện thoại</p>
				</div>
				<div class="col-xs-3">
					<p>Website</p>
				</div>
				<div class="col-xs-3">
					<p>Chi tiết</p>
				</div>
			</div>
			<div class="wrap-giaoxu2">
				<?php if (isset($data)): ?>
					<?php foreach ($data as $value): ?>
						<hr>
						<div class="row">
							<div class="col-xs-4"><?= $value->TenGiaoXu ?></div>
							<div class="col-xs-2"><?= $value->DienThoai ?></div>
							<div class="col-xs-3 txtWeb">
								<a href="<?= $value->Website ?>" target="_blank"><?= $value->Website ?></a>
							</div>
							<div class="col-xs-3">
								<b class="btn btn-success btnDetail"data-name="<?= $value->TenGiaoXu ?>" data-id="<?= $value->ID ?>">Tệp</b>
								<b class="btn btn-primary btn-edit"data-name="<?= $value->TenGiaoXu ?>" data-id="<?= $value->ID ?>">Sửa giáo xứ</b>
							</div>
						</div>
					<?php endforeach ?>
				<?php endif ?>
			<?php if (isset($pagi)): ?>
				<?= $pagi ?>
			<?php endif ?>
			</div>

		</div>

		<!-- Phan trang -->
	</div>
	<div class="wrap-content">
		<div class="den">
		</div>
		<div class="content">
			<i class="fa fa-times fa-2x btnCancel"></i>
			<div class="container ml-3 mt-2">
				<h2 id="nameGx"></h2>
				<hr>
				<div class="row">
					<div class="col-xs-4">Tên file</div>
					<div class="col-xs-4">Thời gian tải lên</div>
					<div class="col-xs-4">Gửi mail</div>
				</div>
				<div class="wrap-backup">
				</div>
			</div>
		</div>

	</div>
	<footer class="footer">
		<h6 class="float-right">Version 1.0</h6>
	</footer>
</div>

	<!-- Modal -->
<div id="request-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Danh sách yêu cầu</h4>
      </div>
      <div class="modal-body">
         <table class="table table-striped" id="table-request">
			 <thead>
				 <tr>
					 <th>Thời gian yêu cầu</th>
					 <th>Tên giáo xứ</th>
				 </tr>
			 </thead>
			 <tbody>
			 </tbody>
		 </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="edit-modal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">        
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title edit"></h4>
                    </div>
                    <div class="modal-body">
                       <form id="giaoxu-info-form">
                            <input type="hidden" id="isEdit" name="isEdit">
							<input type="hidden" id="txt-giaoxu-id" name="txt-giaoxu-id">
							   
							   <div  class="form-group cb">
                                    <label for="cb-giaophan-name">Thuộc giáo phận: </label>
									<select name="cb-giaophan-name" class="form-control" id="cb-giaophan-name">
										
									</select>
									<input type="hidden" id='hidden-giaophan' name="hidden-giaophan">
									<p class="text-danger giaophan-note">Lưu ý : Tác vụ sẽ tạo ra 1 giáo phận mới, hãy kiểm tra lại danh sách giáo phận và chọn ra giáo phận phù hợp nếu có.</p>
                               </div>
                               <div class="form-group cb">
                                    <label for="cb-giaohat-name">Thuộc giáo hạt: </label>
									<select name="cb-giaohat-name" class="form-control" id="cb-giaohat-name"></select>
									<input type="hidden" id='hidden-giaohat' name="hidden-giaohat">
									<p class="text-danger giaohat-note">Lưu ý : Tác vụ sẽ tạo ra 1 giáo hạt mới, hãy kiểm tra lại danh sách giáo hạt và chọn ra giáo hạt phù hợp nếu có.</p>
                               </div>

                               <div  class="form-group">
                                    <label for="txt-giaoxu-name">Tên giáo xứ: </label>
                                    <input type="text" class="form-control" id="txt-giaoxu-name" name="txt-giaoxu-name">
                               </div>
                               <div  class="form-group">
                                    <label for="txt-email">Email: </label>
                                    <input type="text" class="form-control" id="txt-email" name="txt-email">
                               </div>
                               <div  class="form-group">
                                    <label for="txt-sdt">Số diện thoại: </label>
                                    <input type="text" class="form-control" id="txt-sdt" name="txt-sdt">
							   </div>
                               <div  class="form-group">
                                    <label for="txt-website">Website: </label>
                                    <input type="text" class="form-control" id="txt-website" name="txt-website">
                               </div>

                               <div  class="form-group">
                                    <label for="txt-diachi">Địa chỉ: </label>
                                    <input type="text" class="form-control" id="txt-diachi" name="txt-diachi">
                               </div>
                               <!-- <div  class="form-group">
                                    <label for="image-giaoxu">Hình giáo xứ: </label>
                                    <input type="file" class="form-control" id="image-giaoxu" name="image-giaoxu">
                               </div> -->
                               <input type="button" id="submit-giaoxu-info" name="submit" value="Lưu" class="form-control btn btn-primary" id="submit">
                       </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Quay lại</button>
                    </div>
                  </div>
              
                </div>
              </div>

</div>
<div class="SoanEmail">
	<div class="head-email">
		<div class="container">
			<p>Thư mới</p>
		</div>
		<div class="nut-remove">
			<i class="fa fa-times"></i>
		</div>
	</div>
	<div class="container">
		<div class="form-group row">
			<label for="inputTo" class="col-xs-2 form-control-label text-muted">Tới</label>
			<div class="col-xs-10">
				<input type="email" name="txtEmail" class="form-control" id="inputTo"placeholder="Enter your email">
				<div class="tooltip">
					<span class="tooltiptext">Email không hợp lệ</span>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label for="inputSubject" class="col-xs-2 form-control-label text-muted">Chủ đề</label>
			<div class="col-xs-10">
				<input type="text" class="form-control" id="inputSubject">
			</div>
		</div>
		<div class="form-group row">
			<label  class="col-xs-2 form-control-label text-muted">Nội dung</label>
			<div class="col-xs-10">
				<textarea name="" id="txtContentEmail" rows="7" class="form-control"></textarea>
			</div>
		</div>
		<div class="form-group row">
			<label for="inputSubject" class="col-xs-2 form-control-label text-muted">File</label>
			<div class="col-xs-10">
				<p id="filekem"></p>
			</div>
		</div>
		<div class="form-group row">
			<b class="btn btn-primary" id="btnSendEmail" data-path="">Gửi</b>

		</div>
	</div>
</div>
<input type="hidden" name="" id="baseURL" value="<?= base_url()?>">