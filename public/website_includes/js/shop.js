// var snackbar = document.getElementById("snackbar");
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$('#post_review').unbind('click').bind('click', function (e) {
    var product_id = $.trim($('#product_review_id').val());
    var review = $.trim($('#review').val());
    if (product_id && review !== '') {
        var data = { review: review, product_id: product_id };
        $.ajax({
            url: '/world/review/post',
            type: 'POST',
            data: data,
            success: function (data) {
                $('#review').val('');
                $('#reviews_show').append(data);

                console.log(data);

                //snackbar.innerHTML = 'your review posted successfully';
                //snackbar.className = "show";
                //setTimeout(function () { snackbar.className = snackbar.className.replace("show", ""); }, 2500);
            }, error: function (error) {
                console.log('asdsa');
                //snackbar.innerHTML = 'something went wrong';
                //snackbar.className = "show";
                //setTimeout(function () { snackbar.className = snackbar.className.replace("show", ""); }, 2500);
            }
        })
    } 
})