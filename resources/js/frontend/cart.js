
$(document).ready(function(){
    load_cart_data();
    function load_cart_data()
    {
        $.ajax({
            url:"fetch_cart.php",
            method:"POST",
            dataType:"json",
            success:function(data)
            {	$('#cart_details').html(data.cart_details);
                $('#data-div').html(data.cart_details);
                $('#data-div-main').html(data.main_cart);
                $('.basket').text(data.total_item);
                $(".qty-input").each(function (index) {
                    $(this).val(data.main_cart[index].product_quantity);
                });
            }
        });
    }

    $(document).on('click', '.add_to_cart', function(){
        var product_id = $(this).attr("id");
        var product_name = $('#name'+product_id+'').val();
        var product_image = $('#image'+product_id+'').val();
        var product_quantity = $('#quantity'+product_id).val();
        var action = "add";
        if(product_quantity > 0)
        {
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{product_id:product_id, product_name:product_name, product_image:product_image, product_quantity:product_quantity, action:action},
                success:function(data)
                {   load_wish_data();
                    load_cart_data();
                    $('.cart-plus-minus-box').val('0');
                    $('#add_to_cart_modal').modal('show');
                }
            });
        }
        else
        {
            swal("Please","Lease Enter Number of Quantity","warning");
        }
    });



    $(document).on('click', '.delete', function(){
        var product_id = $(this).attr("id");
        var action = 'remove';
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{product_id:product_id, action:action},
            success:function()
            {   load_wish_data();
                load_cart_data();
            }
        })


    });





    $(document).on('click', '.update-cart', function(){
        var product_id = $(this).attr("id");
        var product_quantity = $('#quantityU'+product_id).val();
        var action = "update";
        if(product_quantity > 0)
        {
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{product_id:product_id, product_quantity:product_quantity, action:action},
                success:function(data)
                {
                    load_cart_data();
                    //swal("Good Job!","Product  successfully added to your Cart.","success")
                }
            });
        }
        else
        {
            alert("lease Enter Number of Quantity");
        }
    });
    $(document).on('click', '.azalt-cart', function(){
        var product_id = $(this).attr("id");
        var product_quantity = $('#quantityU'+product_id).val();
        var action = "azalt";
        if(product_quantity > 0)
        {
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{product_id:product_id, product_quantity:product_quantity, action:action},
                success:function(data)
                {
                    load_cart_data();
                    /*	swal("Good Job!","Product  successfully added to your Cart.","success"); */
                }
            });
        }
        else
        {
            alert("lease Enter Number of Quantity");
        }
    });



    $(document).on('click', '#clear_cart', function(){
        var action = 'empty';
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{action:action},
            success:function()
            {
                load_cart_data();
                $('#cart-popover').popover('hide');
                alert("Your Cart has been clear");
            }
        });
    });


    $("#live_search").keyup(function(){
        var input=$(this).val();
        if(input!=""){
            $.ajax({
                url:"livesearch.php",
                method:"POST",
                data:{input:input},
                success:function(data){
                    $("#searchresult").html(data);
                    $("#denemeler").html(data);

                }
            })
        } else {
            $("searchresult").css("display","none");
        }
    });

    $(document).on('click', '.order-detail-button', function(){
        $('#add_to_cart_delete').modal('show');
    });
    $(document).on('click', '.order-detail-delete-button', function(){
        $('#order_delete').modal('show');
    });
    $(document).on('click', '.order-info-button', function(){
        $('#order_info').modal('show');
    });

});


