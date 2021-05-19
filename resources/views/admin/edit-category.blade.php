<div class="modal fade" id="modal-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="" id="form-edit"  method="POST" role="form">
				@csrf
				<div class="modal-header">
					<h4 class="modal-title">Cập nhật</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="">Tên danh mục</label>
						<input type="text" class="form-control" name="name" id="name-edit" placeholder="Nhập tên danh mục">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Edit</button>
				</div>
			</form>
		</div>
	</div>
</div>
