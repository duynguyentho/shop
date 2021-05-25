@extends('admin-layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Table</h4>
                    <a href="#" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">Add</a>  
                    <div class="table-responsive">
                        <form action="{{url('admin/deleteChecked')}}" method="get">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <td><input type="checkbox" name="ck_all" id="checkAll"> Select All</td>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th style="width:200px;">Created at</th>
                                        <th style="width:200px;">Updated at</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                
                                <tbody>   
                                    @foreach ($categories as $rows)
                                    <tr>
                                        <td><input type="checkbox" name="ck[]" value="{{$rows->id}}" id="child" data-id="{{$rows->id}}"></td>
                                        <td>{{$rows->id}}</td>
                                        <td>{{$rows->name}}</td>
                                        <td>{{$rows->created_at}}</td>
                                        <td>{{isset($rows->updated_at) ? $rows->updated_at : ''}}</td>
                                        <td><button data-url="{{ route('category.update',$rows->id)}}" type="button" value="{{$rows->id}}" data-target="#modal-edit" data-toggle="modal" class="btn btn-info btn-edit">Edit</button>
                                            <button data-url="{{ route('category.destroy',$rows->id) }}"​ data-id="{{$rows->id}}"  type="button" data-target="#delete" id="delete"  class="btn btn-danger btn-delete">Delete</button>
                                    </tr>
                                    @endforeach
                            </table>
                            <input type="submit" class="btn mb-1 btn-flat btn-danger" value="Delete">
                        </form>
                    </div>
                    @include('admin.edit-category')
                    @include('admin.add-category')
                    <script type="text/javascript" charset="utf-8">
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                    </script>
                    {{-- {{$categories->links()}} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection