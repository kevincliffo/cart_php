            <h2>Order</h2>
            <p class="ord-succ">Your order has been placed successfully.</p>
            <!-- Order status & shipping info -->
            <div class="row col-lg-12 ord-addr-info">
                <div class="col-sm-6 adr">
                    <div class="hdr">Shipping Address</div>
                    <p><?php echo $order['name']; ?></p>
                    <p><?php echo $order['email']; ?></p>
                    <p><?php echo $order['phone']; ?></p>
                    <p><?php echo $order['address']; ?></p>
                </div>
                <div class="col-sm-6 info">
                    <div class="hdr">Order Info</div>
                    <p><b>Reference ID</b> #<?php echo $order['id']; ?></p>
                    <p><b>Total</b> <?php echo '$'.$order['grand_total'].' USD'; ?></p>
                </div>
            </div>
            <!-- Order items -->
            <div class="row ord-items">

            </div>