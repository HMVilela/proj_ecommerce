var CartService = {

    addToCart: function(cart, callback){
        $.ajax({
            type: 'POST',
            contentType: 'application/json',
            url: 'api/CartDAO.php/addToCart',
            data: JSON.stringify(cart),
            success: function(response){
                callback(response);
            },
            error: function(response){
                callback(response);
            }
        });
    }
};