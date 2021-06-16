
    @foreach ($products as $item)
    <div class="tm-product">
      <img src="{{asset('/storage/uploads/products/'.$item->image)}}" style="width:136px;" alt="Product">
      <div class="tm-product-text">
        <h3 class="tm-product-title">{{$item->name}}</h3>
        <p class="tm-product-description">{{$item->description}}</p>
      </div>
      <div class="tm-product-price">
        <a href="#" class="tm-product-price-link tm-handwriting-font"><span class="tm-product-price-currency">$</span>{{$item->price}}</a>
      </div>
    </div>
    @endforeach  