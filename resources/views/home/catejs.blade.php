<script>
window.onload = function() {
  //YOUR JQUERY CODE
  @foreach(App\Categories::all() as $items)
  $("#cat-{{$items->id}}").click(function(){
    alert("{{$items->name}}");
    $(this).attr("class", "active");
  })
  @endforeach
}
</script>