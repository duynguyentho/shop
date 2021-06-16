@extends('home-layout')
@section('content')
<link rel='stylesheet' id='wsl-widget-css'  href='https://mdbcdn.b-cdn.net/wp-content/plugins/wordpress-social-login/assets/css/style.css?ver=5.7.2' type='text/css' media='all' />
<div class="tm-main-section light-gray-bg" style="padding-bottom:200px">
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
            <img src="{{asset('frontend/img/1.jpg')}}" alt="Image" class="img-circle img-thumbnail">  
          </div>              
        </div>            
      </section>      
      <section class="tm-section row">
        <div class="col-lg-12 tm-section-header-container margin-bottom-30">
          <h2 class="tm-section-header gold-text tm-handwriting-font"><img src="{{asset('frontend/img/logo.png')}}" alt="Logo" class="tm-site-logo"> Our Menus</h2>
          <div class="tm-hr-container"><hr class="tm-hr"></div>
        </div>
        <div>
        </div>
        <div>          
        </div>          
      </section>
      {{-- detail --}}
      <section class="mb-5">
        <div class="row">
          <div class="col-md-6 mb-4 mb-md-0">
            <div id="mdb-lightbox-ui"></div>
            <div class="mdb-lightbox">
              <div class="row product-gallery mx-1">
                <div class="col-12 mb-0">   
                      <img style="width:500px;margin-left:-100px;" src="{{asset('storage/uploads/products/'.$product->image)}}">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <h5 style="font-size:25px;font-weight:400">{{$product->name}}</h5>
            <p class="mb-2 text-muted text-uppercase small"></p>
            <p><span class="mr-1"><strong>${{$product->price}}</strong></span></p>
            <p class="pt-1">{{$product->description}}</p>
            <div class="table-responsive">
              <table class="table table-sm table-borderless mb-0">
                <tbody>
                  <tr>
                    <th class="pl-0 w-25" scope="row"><strong>Model</strong></th>
                    <td>Shirt 5407X</td>
                  </tr>
                  <tr>
                    <th class="pl-0 w-25" scope="row"><strong>Color</strong></th>
                    <td>Black</td>
                  </tr>
                  <tr>
                    <th class="pl-0 w-25" scope="row"><strong>Delivery</strong></th>
                    <td>USA, Europe</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <hr>
            <div class="table-responsive mb-2">
            </div>
            <button type="button" data-toggle="modal" data-target="#basicModal" class="btn btn-light btn-md mr-1 mb-2"><i
                class="fas fa-shopping-cart"></i>Add to cart</button>
          </div>
          <div class="bootstrap-modal">
            <!-- Button trigger modal -->
            <!-- Modal -->
            <div class="modal fade" id="basicModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <form>
                          @csrf
                          <input type="hidden" id="product_id" value="{{$product->id}}">
                          <input type="hidden" id="product_name" value="{{$product->name}}">
                          <input type="hidden" id="product_image" value="{{$product->image}}">
                          <input type="hidden" id="product_quantity" value="1">
                          <input type="hidden" id="product_price" value="{{$product->price}}">
                        <div class="modal-body">
                          <table class="table table-sm table-borderless">
                            <tbody>
                              <tr>
                                <td class="pb-0">Select size</td>
                                <td class="pb-0">Select Sweeteners</td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="mt-1">
                                    <div class="form-check form-check-inline pl-0">
                                      <input type="radio" class="form-check-input" value="0" name="size" id="small" 
                                        checked>
                                      <label class="form-check-label small text-uppercase card-link-secondary"
                                        for="small">Small</label>
                                    </div>
                                    <div class="form-check form-check-inline pl-0">
                                      <input type="radio" class="form-check-input" value="1" id="medium" name="size">
                                      <label class="form-check-label small text-uppercase card-link-secondary"
                                        for="medium">Medium</label>
                                    </div>
                                    <div class="form-check form-check-inline pl-0">
                                      <input type="radio" class="form-check-input" value="2" id="large" name="size">
                                      <label class="form-check-label small text-uppercase card-link-secondary"
                                        for="large">Large</label>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <div class="mt-2">
                                    <div class="form-check form-check-inline pl-0">
                                      <input type="radio" class="form-check-input" value="0" name="sugar" 
                                        checked>
                                      <label class="form-check-label small text-uppercase card-link-secondary"
                                        for="small">30%</label>
                                    </div>
                                    <div class="form-check form-check-inline pl-0">
                                      <input type="radio" class="form-check-input" value="1" name="sugar">
                                      <label class="form-check-label small text-uppercase card-link-secondary"
                                        for="medium">50%</label>
                                    </div>
                                    <div class="form-check form-check-inline pl-0">
                                      <input type="radio" class="form-check-input" value="2" name="sugar">
                                      <label class="form-check-label small text-uppercase card-link-secondary"
                                        for="large">70%</label>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary add-to-cart" data-id="{{$product->id}}">Add to cart</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
      </section>
    </div>
  </div> 
  <script>
    window.onload = function(){
      $(".add-to-cart").click(function(){
        let product = {}
         product.id = $("#product_id").val();
        product.name = $("#product_name").val();
        product.image = $("#product_image").val();
        product.price = $("#product_price").val();
        product.quantity = $("#product_quantity").val();
        product._token = $("input[name='_token']").val();
        product.size = $("input[name*='size']:checked").val();
        product.sugar = $("input[name*='sugar']:checked").val();
        console.log(product);
          $("#basicModal").modal("hide");
          $.ajax({
            url: "{{url('/add-cart')}}",
            method: "post",
            data: product,
            success: function(response){
              console.log(response)
              $(".cart-quantity").text()
              swal({
                title: "Good job!",
                text: `${product.name}`,
                icon: "success",
              });
            },
          });
      });
    };
  </script>
@endsection