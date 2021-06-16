@extends('home-layout')
@section('content')
@php
    $cart_item = Session('cart') ? Session('cart'):array();
@endphp
<div class="tm-main-section light-gray-bg">
  <div class="container" id="main">
    <div class="col-lg-12" style="padding-bottom:200px;">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Bordered Table</h4>
                <div class="table-responsive">
                    <form action="">
                    <table class="table table-bordered verticle-middle">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart_item as $item)
                            <tr>
                                <td><img style="width:100px;" src="{{asset('storage/uploads/products/'.$item['product_image'])}}"></img></td>
                                <td>{{$item['product_name']}}</td>
                                <td id="price_{{$item['product_id']}}" >{{$item['product_price']}}$</td>
                                <td><input type="number" name="quantity" value="{{$item['product_quantity']}}" id="{{$item['product_id']}}">
                                </td>
                                <td class="price" id="total_{{$item['product_id']}}">{{$item['product_price']* $item['product_quantity']}}$</td>
                                <td><span><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a><a href="{{url('delete-item/'.$item['session_id'])}}" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close color-danger"></i></a></span>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>Tổng cộng</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td id="total"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                </div>
            </div>
        </div>
    </div>  
  </div>
  {{Session('cart') == null ? "a":"b"}}
</div> 
<script>
    window.onload = function(){
        var total = 0;
        $("tr .price").each(function(index,value){
                currentRow = parseFloat($(this).text());
                total += currentRow
            });
            $("#total").text(total+ "$");
        $("input[name='quantity']").on('keyup mouseup', function(){
            let id = this.id;
            console.log(id);
            let price = $("#price_"+id).text().replace("$","");
            let newPrice = parseInt(this.value)*parseInt(price);
            $("#total_"+ id).text(newPrice+ '$')
            total += parseInt(price);
            $("#total").text(total+"$");
        });
    }
</script>
@endsection