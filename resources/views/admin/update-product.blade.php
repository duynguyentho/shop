
<div class="modal fade"  id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width:700px;">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="bookForm"  method="post" name="bookForm" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                   <input type="hidden" name="product_id" id="product_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Price</label>
                        <div class="col-sm-12">
                            <input type="number" id="price" class="form-control" name="price" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="discount" style="max-width:100%" class="col-sm-2 control-label">Discount (%)</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="discount" name="discount" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-12">
                            <textarea id="ck" name="description" required="" placeholder="" class="form-control"></textarea>
                            {{-- <script>
                                CKEDITOR.replace('ck');
                                var data = CKEDITOR.instances.editor1.getData();
                            </script> --}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Details</label>
                        <div class="col-sm-12" style="display:flex; flex-direction:row;flex-wrap:wrap;">
                            @foreach (App\Categories::all() as $items)
                            <div style="min-width: 40%">
                                <input type="checkbox" class="chk" name="category_product[]" id="cate-{{$items->id}}" value="{{$items->id}}"> &nbsp;{{$items->name}}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Details</label>
                        <div class="col-sm-12">
                            <div>
                                <input type="file" name="image" id="image">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Details</label>
                        <div class="col-sm-12">
                            <div>
                                <input type="checkbox" name="special" value="1" id="special">&nbsp;Special
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>