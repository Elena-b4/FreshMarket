//Remove items from cart
$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
    e.preventDefault();
    var pcode = $(this).attr("data-code"); //get product code
    $(this).parent().fadeOut(); //remove item element from box
    $.getJSON( "cart_process.php", {"remove_code":pcode} , function(data){ //get Item count from Server
        $("#cart-info").html(data.items); //update Item count in cart-info
        $(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
    });
});
