$(function() {
    $('.dropdown-item').on('click', function (e) {
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/logout',
            type: 'POST',
            cache: false,
            success: function(data){
                location.reload();
            }
        });
    });
});
