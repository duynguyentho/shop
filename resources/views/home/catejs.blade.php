<script>
window.onload = function() {
  //YOUR JQUERY CODE
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  @foreach(App\Categories::all() as $items)
  $("#cat-{{$items->id}}").click(function(){
    $(".category").removeClass("active");
    let id = {{$items->id}}
    $(this).addClass("active")
    $.ajax({
      type: "GET",
      dataType:'html',
      url: "{{url('/products')}}",
      data: {cat_id:id},
      success: function(response){
        console.log(response)
        $("#productData").html(response)
      },
      error: function(data) {
        console.log('Error:', data);
      },
    });
  })
  @endforeach
}
</script>
