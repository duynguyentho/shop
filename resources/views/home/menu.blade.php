@extends('home-layout')
@section('content')
<div class="tm-main-section light-gray-bg">
    <div class="container" id="main">
      <section class="tm-section row">
        <div class="col-lg-9 col-md-9 col-sm-8">
          <h2 class="tm-section-header gold-text tm-handwriting-font">Variety of Menus</h2>
          <h2>Cafe House</h2>
          <p class="tm-welcome-description">This is free HTML5 website template from <span class="blue-text">template</span><span class="green-text">mo</span>. Fndimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Ettiam sit amet orci eget eros faucibus tincidunt.</p>
          <a href="#" class="tm-more-button margin-top-30">Read More</a> 
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 tm-welcome-img-container">
          <div class="inline-block shadow-img">
            <img src="frontend/img/1.jpg" alt="Image" class="img-circle img-thumbnail">  
          </div>              
        </div>            
      </section>      
      <section class="tm-section row">
        <div class="col-lg-12 tm-section-header-container margin-bottom-30">
          <h2 class="tm-section-header gold-text tm-handwriting-font"><img src="frontend/img/logo.png" alt="Logo" class="tm-site-logo"> Our Menus</h2>
          <div class="tm-hr-container"><hr class="tm-hr"></div>
        </div>
        <div>
          <div class="col-lg-3 col-md-3">
            <div class="tm-position-relative margin-bottom-30">              
              <nav class="tm-side-menu">
                <ul>
                  @foreach ($categories as $items)
                  <li><a id="cat-{{$items->id}}" class="category" style="cursor: pointer;">{{$items->name}}</a></li>
                  @endforeach
                </ul>              
              </nav>    
              <img src="{{asset('frontend/img/vertical-menu-bg.png')}}" alt="Menu bg" class="tm-side-menu-bg">
            </div>  
          </div>            
          <div class="tm-menu-product-content col-lg-9 col-md-9" id="productData"> <!-- menu content -->
            @foreach ($products as $item)
            <div class="tm-product">
              <img src="{{asset('/storage/uploads/products/'.$item->image)}}" style="width:136px;" alt="Product">
              <div class="tm-product-text">
                <h3 class="tm-product-title"><a href="{{url('product/'.$item->id)}}">{{$item->name}}</a></h3>
                <p class="tm-product-description">{{$item->description}}</p>
              </div>
              <div class="tm-product-price">
                <a href="{{url('add-cart/'.$item->id)}}" class="tm-product-price-link tm-handwriting-font"><span class="tm-product-price-currency">$</span>{{$item->price}}</a>
              </div>
            </div>
            @endforeach
            
          </div>
        </div>          
      </section>
    </div>
  </div> 
  @include('home.catejs')
@endsection