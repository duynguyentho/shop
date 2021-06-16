@extends('admin-layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Table</h4>
                        <a class="btn btn-success" href="javascript:void(0)" id="create"> Create</a>
                        <div class="table-responsive">
                            <form action="{{ url('admin/deleteChecked') }}" method="get">
                                <table class="table table-striped table-bordered zero-configuration" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>name</th>
                                            <th>price</th>
                                            <th>discount</th>
                                            <th>special</th>
                                            <th style="width:200px;">action</th>
                                        </tr>
                                    </thead>
                                </table>
                                <input type="submit" class="btn mb-1 btn-flat btn-danger" value="Delete">
                            </form>
                        </div>
                        @include('admin.update-product')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('product.index') }}",
                lengthMenu: [10, 15, 50],
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'price',
                        render: function(data, type, row) {
                            return data + " $";
                        }
                    },
                    {
                        data: 'discount',
                        render: function(data, type, row) {
                            return data + "%";
                        }
                    },
                    {
                        data: 'special',
                        render: function(data, type, row) {
                            if(data == 1)
                                return "<i class='fas fa-check'></i>";
                            else
                                return "";
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#create').click(function() {
                $('#bookForm').trigger("reset");
                $.get("{{ route('product.index') }}", function(data) {
                    $('#saveBtn').val("create-book");
                    $('#book_id').val('');
                    $('#bookForm').trigger("reset");
                    $('#modelHeading').html("Create New Book");
                    $('#ajaxModel').modal('show');
                    console.log(data);
                })
            });
            $('body').on('click', '.editProduct', function() {
                $('#bookForm').trigger("reset");
                var id = $(this).data('id');
                $.get("{{ route('product.index') }}" + '/' + id + '/edit', function(data) {
                    $('#ajaxModel').modal('show');
                    $('#modelHeading').html("Update Product");
                    $('#saveBtn').val("update");
                    $('#product_id').val(data.product.id);
                    $('#name').val(data.product.name);
                    $('#price').val(data.product.price);
                    $('#discount').val(data.product.discount);
                    $('#ck').val(data.product.description);
                    if(data.product.special == 1){
                        $("#special").prop("checked", true);
                    }else{
                        $("#special").prop("checked", false);
                    }
                    console.log(data.product.image)
                    for(let i = 0 ; i < data.cate_pro.length;i++){
                        if(data.cate_pro[i] != undefined){
                            $(`#cate-${data.cate_pro[i].category_id}`).prop("checked",true);
                            
                        }else{
                            $(`#cate-${data.cate_pro[i].category_id}`).prop("checked",false);
                        }
                        
                    }
                })  
            });
            $('#bookForm').submit(function(e) {
                e.preventDefault();
                // file upload
                let formData = new FormData(this);
                $.ajax({
                    data: formData,
                    url: "{{ route('product.store') }}",
                    type: "POST",
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(formData);
                        $(this).trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });
            $('body').on('click', '.deleteBook', function() {
                var id = $(this).data("id");
                confirm("Are you sure want to delete !");
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('product.index') }}" + '/' + id,
                    success: function(data) {
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });
        });

    </script>
@endsection
