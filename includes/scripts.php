<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>




<script>

getCart();

$(function() {
    $('#productForm').submit(function(e) {
        e.preventDefault();
        var product = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'cart_add.php',
            data: product,
            dataType: 'json',
            success: function(response) {
                $('#callout').show();
                $('.message').html(response.message);
                if (response.error) {
                    $('#callout').removeClass('callout-success').addClass('callout-danger');
                }
                else{
                    $('#callout').removeClass('callout-danger').addClass('callout-success');
				    getCart();
                }
            }
        })
    });

    $(document).on('click', '.close', function() {
        $('#callout').hide();
    });
});


function getCart() {
    $.ajax({
        type: 'POST',
        url: 'cart_fetch.php',
        dataType: 'json',
        success: function(response) {
            $('#cart_menu').html(response.list);
            $('.cart_count').html(response.count);
        }
    })
}



</script>
