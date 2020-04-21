            <center>
                <h2>Order Status</h2>
                <p class="ord-succ">Your order has been placed successfully.</p>
                <!-- Order status & shipping info -->
                <div class="row col-lg-12 ord-addr-info">
                    <div class="col-sm-6 adr">
                        <div class="hdr">Customer Details</div>
                        <p><?php echo $orderdetails['customername']; ?></p>
                        <p><?php echo $orderdetails['mobileNo']; ?></p>
                        <p><?php echo $orderdetails['email']; ?></p>
                        <p><?php echo $orderdetails['address']; ?></p>
                        <p><?php echo $orderdetails['paymentmode']; ?></p>

                    </div>
                    <div class="col-sm-6 info">
                        <div class="hdr">Order Info</div>
                        <p><?php echo $orderdetails['address']; ?></p>
                        <p><?php echo $orderdetails['paymentmode']; ?></p>
                    </div>
                </div>
            </center>
            <!-- Order items -->
            <div class="row ord-items">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Sub Total</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>                
                        <?php
                            $counter = 1;
                            foreach($orderdetails['orders'] as $order)
                            {
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $counter;?></th>
                                    <td><?php echo $order['product_name'];?></td>
                                    <td><?php echo $order['product_price'];?></td>
                                    <td><?php echo $order['product_qty'];?></td>
                                    <td><?php echo $order['product_total_price'];?></td>
                                    <td></td>
                                </tr>                                
                        <?php
                                $counter = $counter + 1;
                            }
                        ?>
                        <tr>
                            <th>TOTAL</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="text-align:right"></th>
                            <th style="text-align:right">KSH <?php echo number_format($orderdetails['total']); ?></th>
                        </tr>                        
                    </tbody>
                </table>                        
            </div>