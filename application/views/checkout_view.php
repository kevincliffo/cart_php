 
            <h1>Order Preview</h1>
            <table class="table" cellpadding="6" cellspacing="1" style="width:100%" border="0">
                <tr>
                    <th>QTY</th>
                    <th>Item Description</th>
                    <th style="text-align:right">Item Price</th>
                    <th style="text-align:right">Sub-Total</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($cart->contents() as $items): ?>
                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                    <tr>
                        <td style="text-align:center"><?php echo $items['qty']; ?></td>
                        <td>
                            <?php echo $items['name']; ?>
                            <?php if ($cart->has_options($items['rowid']) == TRUE): ?>
                                <p>
                                    <?php foreach ($cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                                        <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
                                    <?php endforeach; ?>
                                </p>
                            <?php endif; ?>
                        </td>
                        <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                        <td style="text-align:right">KSH <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
                <tr>
                    <th>TOTAL</th>
                    <th></th>
                    <th style="text-align:right"></th>
                    <th style="text-align:right">KSH <?php echo $cart->format_number($cart->total()); ?></th>
                </tr>
            </table>
            <br>
            <div class="card-body">                
                <?php 
                    echo form_open('main/add_order');
                ?>
                <h1>Payment Method</h1>
                <div style="display:none">
                    <input class="js-store" data-js-store="csrf.tokenValue" type="hidden" value="f7186e61ba28cd21645d7bba612311024564ee1b" name="YII_CSRF_TOKEN" />
                </div>
                <div class="subt color-default -fwm -pbm"><h3>How do you want to pay for your order?</h3></div>
                <?php
                    $options = array(
                        'Select Payment Method'=>'Select Payment Method',
                        'Lipa na Mpesa' => 'Lipa na Mpesa',
                        'Cash on Delivery' => 'Cash on Delivery',
                    );
                    echo form_dropdown('paymentmode', $options, 'Cash on Delivery', 'class="form-control"');                
                ?>
                <br><br>
                <center><h3>Customer Details</h3></center>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <?php
                                    $lbl = array('for' => 'customerName');
                                    echo form_label('Name', '', $lbl);   
                                    $fname = array('class' => 'form-control',
                                                'id'=>'customerName',
                                                'name'=>'customerName',
                                                'type' => 'text',
                                                'placeholder' => 'Name',
                                                'required' =>'required',
                                                'autofocus'=>'autofocus'
                                                );
                                    echo form_input($fname);                    
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <?php
                                    $lbl = array('for' => 'mobileNo');
                                    echo form_label('Mobile No.', '', $lbl);  
                                    $lname = array('class' => 'form-control',
                                                'id'=>'mobileNo',
                                                'name'=>'mobileNo',
                                                'type' => 'number',
                                                'placeholder' => 'Mobile No.',
                                                'required' =>'required'
                                                );
                                    echo form_input($lname);                     
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <?php
                            $lbl = array('for' => 'inputEmail');
                            echo form_label('Email address', '', $lbl); 
                            $email = array('class' => 'form-control',
                                        'id'=>'inputEmail',
                                        'name'=>'inputEmail',
                                        'type' => 'email',
                                        'placeholder' => 'Email address',
                                        'required' =>'required'
                                        );
                            echo form_input($email);                      
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <?php
                                    $lblpwd = array('for' => 'address');
                                    echo form_label('Address', '', $lblpwd); 
                                    $pwd = array('class' => 'form-control',
                                                'id'=>'address',
                                                'name'=>'address',
                                                'type' => 'text',
                                                'placeholder' => 'Address',
                                                'required' =>'required',
                                                'rows'=>3
                                                );
                                    echo form_textarea($pwd);                      
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    $btn = array('class' => 'btn btn-primary btn-block',
                                'value' => 'Finish Transaction',
                                'name' => 'submit',
                                'type' => 'submit');
                    echo form_submit($btn);        
                    echo form_close();
                ?>
            </div>
