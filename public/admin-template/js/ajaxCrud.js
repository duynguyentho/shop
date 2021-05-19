$(document).ready(function(){
    $(".cart-title").click(function(){
            alert("you");
        });
    // add category
    
        // 
        // 
    $('.btn-delete').click(function(){
            confirm("abcdef");
            var url = $(this).attr('data-url');
            var _this = $(this);
            if (confirm('May co chac muon xoa khong?')) {
                $.ajax({
                    type: 'delete',
                    url: url,
                    success: function(response) {
                        toastr.success('Delete student success!')
                        _this.parent().parent().remove();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //xử lý lỗi tại đây
                    }
                })
            }
        });
    $('#mew').click(function(){
        alert("hêllo");
    })
});