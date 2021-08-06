<div class="input-field col s12 m3">
                  	<span>Discount </span>
                    <input type="text" class="validate" name="discount" id="discount" placeholder="Discount">
                  </div>

					

                  <style type="text/css">
                    .fileinput-upload-button
                    {
                      display: none;
                    }
                    .btn-file
                    
                      {
                          background: #253d52;
                          color: white;
                      }
                      .hidden-xs
                      {
                        color: white;
                      }

                  </style>
                <div class="row">
                	<div class="input-field col s12 m4">
                		<span>Paid Amount </span>
                    	<input type="text" class="validate" placeholder="Paid Amount" id="paid" name="paid" value="<?= $shoproduct->paid; ?>">
                    
                  	</div>
                  	<div class="input-field col s12 m3 sell">
	                  	<span>Seller Name </span>
	                    <input type="text" class="validate" id="sellername" name="sellername" placeholder="Seller  Name">
                  
                  	</div>
                  	<div class="input-field col s12 m3 buy" >
	                  	<span>Buyer Name </span>
	                    <input type="text" class="validate" name="customername" id="customername" placeholder="Customer Name">
	                    
	                </div>
	               	<div class="input-field col s12 m3">
	                  	<span>Enter CNIC </span>
	                    <input type="text" class="validate" placeholder=" CNIC" name="cnic" id="cnic">
	                </div>
            	</div>
              