
        </div>
        <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.5.0.min.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.add_to_cart').click(function(){
                    var product_id    = $(this).data("productid");
                    var product_name  = $(this).data("productname");
                    var product_price = $(this).data("productprice");
                    var quantity      = $('#' + product_id).val();
                    $.ajax({
                        url : "<?php echo site_url('main/add_to_cart');?>",
                        method : "POST",
                        data : {
                                product_id: product_id, 
                                product_name: product_name, 
                                product_price: product_price, 
                                quantity: quantity},
                        success: function(data){
                            $('#cart_detail').html(data);
                        }
                    });
                });
                $('#cart_detail').load("<?php echo site_url('main/load_cart');?>");

                $(document).on('click','.remove_cart',function(){
                    var row_id=$(this).attr("id"); 
                    $.ajax({
                        url : "<?php echo site_url('main/delete_cart');?>",
                        method : "POST",
                        data : {row_id : row_id},
                        success :function(data){
                            $('#cart_detail').html(data);
                        }
                    });
                });
            });
        </script>
    </body>
</html>