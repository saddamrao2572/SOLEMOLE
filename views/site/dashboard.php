<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="#!">Add New</a> </li>
							<li><a href="#!">Edit</a> </li>
							<li><a href="#!">Update</a> </li>
							<li class="divider"></li>
							<li><a href="#!"><i class="material-icons">delete</i>Delete</a> </li>
							<li><a href="#!"><i class="material-icons">subject</i>View All</a> </li>
							<li><a href="#!"><i class="material-icons">play_for_work</i>Download</a> </li>
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">

<div class="site-about">
   

							   <div class="tz-2 tz-2-admin">		
							   <div class="tz-2-com tz-2-main">			
							   <h4>Show Today  Total</h4>					
							   <div class="tz-2-main-com bot-sp-20">	
							   <div class="tz-2-main-1 tz-2-main-admin">
							   <div class="tz-2-main-2"> <img src="/uploads/dashboard_icon/sale.png" alt=""><span style="font-size: 17px !important;">Today Sale</span>								
								<?php if(isset($sales) && !empty($sales))
								{?>
								   <h2 style="font-size: 30px !important;"><?= $sales?></h2> 	

								 <?php } else{ ?>
								 <h2 style="font-size: 30px !important;">0</h2>
								 <?php }?>
							   </div>						
							   </div>							
							   <div class="tz-2-main-1 tz-2-main-admin">	
							   <div class="tz-2-main-2"> <img src="/uploads/dashboard_icon/purchase.png"alt="">
							   <span style="font-size: 17px !important;">Today Purchase</span>									
							   <?php if(isset($purchase) && !empty($purchase))
								{?>
								   <h2 style="font-size: 30px !important;"><?= $purchase?></h2> 	

								 <?php } else{ ?>
								 <h2 style="font-size: 30px !important;">0</h2>
								 <?php }?>
								
							   </div>		
							   </div>				
							   <div class="tz-2-main-1 tz-2-main-admin">					
							   <div class="tz-2-main-2"> <img src="/uploads/dashboard_icon/paid.png" alt=""><span style="font-size: 17px !important;">Today Net Sale</span>												
							   
							   <?php if(isset($sales_paid) && !empty($sales_paid))
								{?>
								   <h2 style="font-size: 30px !important;"><?= $sales_paid?></h2> 	

								 <?php } else{ ?>
								 <h2 style="font-size: 30px !important;">0</h2>
								 <?php }?>
							   
							   </div>							
							   </div>							
							   <div class="tz-2-main-1 tz-2-main-admin">
							   <div class="tz-2-main-2"> <img src="/uploads/dashboard_icon/pur_paid.png" alt=""><span style="font-size: 17px !important;">Purchase Payed</span>									
							  
							<?php if(isset($purchase_paid) && !empty($purchase_paid))
								{?>
								   <h2 style="font-size: 30px !important;"><?= $purchase_paid?></h2> 	

								 <?php } else{ ?>
								 <h2 style="font-size: 30px !important;">0</h2>
								 <?php }?>
							   </div>							
							   </div>
							   
							<div class="tz-2-main-1 tz-2-main-admin">
							   <div class="tz-2-main-2"> <img src="/uploads/dashboard_icon/remaining.png" alt=""><span style="font-size: 17px !important;">Remaining Cash</span>									
							  
							<?php if(isset($remaining_sale) && !empty($remaining_sale))
								{?>
								   <h2 style="font-size: 30px !important;"><?= $remaining_sale?></h2> 	

								 <?php } else{ ?>
								 <h2 style="font-size: 30px !important;">0</h2>
								 <?php }?>
							   </div>							
							   </div> 
							<div class="tz-2-main-1 tz-2-main-admin">
							   <div class="tz-2-main-2"> <img src="/uploads/dashboard_icon/payable.png" alt=""><span style="font-size: 17px !important;">Payable Cash</span>									
							  
							<?php if(isset($remaining_purchase) && !empty($remaining_purchase))
								{?>
								   <h2 style="font-size: 30px !important;"><?= $remaining_purchase?></h2> 	

								 <?php } else{ ?>
								 <h2 style="font-size: 30px !important;">0</h2>
								 <?php }?>
							   </div>							
							   </div> 
							   
							   <div class="tz-2-main-1 tz-2-main-admin">
							   <div class="tz-2-main-2"> <img src="/uploads/dashboard_icon/expance.png" alt=""><span style="font-size: 17px !important;">Today Expance</span>									
							  
							<?php if(isset($expances) && !empty($expances))
								{?>
								   <h2 style="font-size: 30px !important;"><?= $expances?></h2> 	

								 <?php } else{ ?>
								 <h2 style="font-size: 30px !important;">0</h2>
								 <?php }?>
							   </div>							
							   </div> 
							   
							   <div class="tz-2-main-1 tz-2-main-admin">
							   <div class="tz-2-main-2"> <img src="/uploads/dashboard_icon/stock.png" alt=""><span style="font-size: 17px !important;">Available Stock</span>									
							  
							<?php if(isset($stock) && !empty($stock))
								{?>
								   <h2 style="font-size: 30px !important;"><?= $stock?></h2> 	

								 <?php } else{ ?>
								 <h2 style="font-size: 30px !important;">0</h2>
								 <?php }?>
							   </div>							
							   </div> 
							   
							   
							   <div class="tz-2-main-1 tz-2-main-admin">
							   <div class="tz-2-main-2"> <img src="/uploads/dashboard_icon/customer.png" alt=""><span style="font-size: 17px !important;">Today Customers</span>									
							  
							<?php if(isset($customers) && !empty($customers))
								{?>
								   <h2 style="font-size: 30px !important;"><?= $customers?></h2> 	

								 <?php } else{ ?>
								 <h2 style="font-size: 30px !important;">0</h2>
								 <?php }?>
							   </div>							
							   </div> 
							   
							   <div class="tz-2-main-1 tz-2-main-admin">
							   <div class="tz-2-main-2"> <img src="/uploads/dashboard_icon/saleproduct.png" alt=""><span style="font-size: 17px !important;">Today Sale Product</span>									
							  
							<?php if(isset($sales_product) && !empty($sales_product))
								{?>
								   <h2 style="font-size: 30px !important;"><?= $sales_product?></h2> 	

								 <?php } else{ ?>
								 <h2 style="font-size: 30px !important;">0</h2>
								 <?php }?>
							   </div>							
							   </div>

                               <div class="tz-2-main-1 tz-2-main-admin">
							   <div class="tz-2-main-2"> <img src="/uploads/dashboard_icon/purchaseproduct.png" alt=""><span style="font-size: 17px !important;">Purchase Product</span>									
							  
							<?php if(isset($purchase_products) && !empty($purchase_products))
								{?>
								   <h2 style="font-size: 30px !important;"><?= $purchase_products?></h2> 	

								 <?php } else{ ?>
								 <h2 style="font-size: 30px !important;">0</h2>
								 <?php }?>
							   </div>							
							   </div> 
                              <div class="tz-2-main-1 tz-2-main-admin">
							   <div class="tz-2-main-2"> <img src="/uploads/dashboard_icon/view.png" alt=""><span style="font-size: 17px !important;">Profile Views</span>									
							  
							<?php if(isset($stock) && !empty($stock))
								{?>
								   <h2 style="font-size: 30px !important;">left</h2> 	

								 <?php } else{ ?>
								 <h2 style="font-size: 30px !important;">0</h2>
								 <?php }?>
							   </div>							
							   </div>							   
   
							   </div>			
							   <div class="split-row">							<!--== Country Campaigns ==-->	<div class="col-md-6">			
							   <div class="box-inn-sp">		
							   <div class="inn-title">			
							   <h4>Current Month Total</h4>		
								<a class="dropdown-button drop-down-meta" href="#" data-activates="dropdown1">
								<i class="material-icons">more_vert</i></a>							
								<ul id="dropdown1" class="dropdown-content">					
								<li><a href="#!">Add New</a> </li>								
								<li><a href="#!">Edit</a> </li>								
								<li><a href="#!">Update</a> </li>							
								<li class="divider"></li>									
								<li><a href="#!"><i class="material-icons">delete</i>Delete</a>
								</li>					
								<li><a href="#!"><i class="material-icons">subject</i>View All</a>
								</li>										
								<li><a href="#!"><i class="material-icons">play_for_work</i>Download</a>
								</li>										
								</ul>						
								<!-- Dropdown Structure -->		
								</div>							
								<div class="tab-inn">			
								<div class="table-responsive table-desi">				
								<table class="table table-hover">						
								<thead>												
								<tr>											
								<th>Title</th>											
								<th>Total</th>								
								</tr>									


								</thead>								
								<tbody>									
								<tr>				
								<td>
								<span class="txt-dark weight-500 list-enq-name">Sale This Month</span> 
								</td>												
																						
								<?php if(isset($current_month_sal) && !empty($current_month_sal))
								{?>
								<td> <span class="list-enq-name"><?=$current_month_sal?></span>
								</td>
                                 <?php } else{ ?>
								 <td> <span class="list-enq-name">0</span>
								</td>
								 <?php }?>								
								</tr>	
								
								<tr>				
								<td>
								<span class="txt-dark weight-500 list-enq-name">Purchase This Month</span> 
								</td>												
								<?php if(isset($current_month_purchase) && !empty($current_month_purchase))
								{?>
								<td> <span class="list-enq-name"><?=$current_month_purchase?></span>
								</td>
                                 <?php } else{ ?>
								 <td> <span class="list-enq-name">0</span>
								</td>
								 <?php }?>												
								</tr>
								
								<tr>				
								<td>
								<span class="txt-dark weight-500 list-enq-name">Sale Net Cash This Month</span> 
								</td>												
																						
								<?php if(isset($current_month_sale_net_cash) && !empty($current_month_sale_net_cash))
								{?>
								<td> <span class="list-enq-name"><?=$current_month_sale_net_cash?></span>
								</td>
                                 <?php } else{ ?>
								 <td> <span class="list-enq-name">0</span>
								</td>
								 <?php }?>													
								</tr>
								
								<tr>				
								<td>
								<span class="txt-dark weight-500 list-enq-name">Purchase Paid This Month</span> 
								</td>												
																						
								<?php if(isset($current_month_purchhase_paid) && !empty($current_month_purchhase_paid))
								{?>
								<td> <span class="list-enq-name"><?=$current_month_purchhase_paid?></span>
								</td>
                                 <?php } else{ ?>
								 <td> <span class="list-enq-name">0</span>
								</td>
								 <?php }?>	
																				
								</tr>
								
								<tr>				
								<td>
								<span class="txt-dark weight-500 list-enq-name">Remaining Cash This Month</span> 
								</td>												
																						
								<?php if(isset($remaining_this_month_sale_cash) && !empty($remaining_this_month_sale_cash))
								{?>
								<td> <span class="list-enq-name"><?=$remaining_this_month_sale_cash?></span>
								</td>
                                 <?php } else{ ?>
								 <td> <span class="list-enq-name">0</span>
								</td>
								 <?php }?>												
								</tr>
								
								<tr>				
								<td>
								<span class="txt-dark weight-500 list-enq-name">Payable Cash This Month</span> 
								</td>												
																						
								<?php if(isset($payable_cash) && !empty($payable_cash))
								{?>
								<td> <span class="list-enq-name"><?=$payable_cash?></span>
								</td>
                                 <?php } else{ ?>
								 <td> <span class="list-enq-name">0</span>
								</td>
								 <?php }?>													
								</tr>
								<tr>				
								<td>
								<span class="txt-dark weight-500 list-enq-name">Expance This Month</span> 
								</td>												
																						
								<?php if(isset($current_month_expance) && !empty($current_month_expance))
								{?>
								<td> <span class="list-enq-name"><?=$current_month_purchase?></span>
								</td>
                                 <?php } else{ ?>
								 <td> <span class="list-enq-name">0</span>
								</td>
								 <?php }?>													
								</tr>
								<tr>				
								<td>
								<span class="txt-dark weight-500 list-enq-name">Sale Return This Month</span> 
								</td>												
																						
								<?php if(isset($current_month_purchase) && !empty($current_month_purchase))
								{?>
								<td> <span class="list-enq-name">left</span>
								</td>
                                 <?php } else{ ?>
								 <td> <span class="list-enq-name">left</span>
								</td>
								 <?php }?>												
								</tr>
								<tr>				
								<td>
								<span class="txt-dark weight-500 list-enq-name">Purchase Return This Month</span> 
								</td>												
																						
								<?php if(isset($current_month_purchase) && !empty($current_month_purchase))
								{?>
								<td> <span class="list-enq-name">left</span>
								</td>
                                 <?php } else{ ?>
								 <td> <span class="list-enq-name">left</span>
								</td>
								 <?php }?>													
								</tr>
								
								
								</tbody>										
								</table>										
								</div>							
								</div>						
								</div>							
								</div>	
								<!--== Country Campaigns ==-->	
								<div class="col-md-6">			
								<div class="box-inn-sp">		
								<div class="inn-title">		
								<h4>Current Month Product Information</h4>							
								<a class="dropdown-button drop-down-meta" href="#" data-activates="dropdown2">
								<i class="material-icons">more_vert</i></a>			
								<ul id="dropdown2" class="dropdown-content">
								<li><a href="#!">Add New</a> </li>				
								<li><a href="#!">Edit</a> </li>					
								<li><a href="#!">Update</a> </li>				
								<li class="divider"></li>						
								<li><a href="#!"><i class="material-icons">delete</i>Delete</a> </li>											
								<li><a href="#!"><i class="material-icons">subject</i>View All</a> </li>										
								<li><a href="#!"><i class="material-icons">play_for_work</i>Download</a> 
								</li>									
								</ul>										<!-- Dropdown Structure -->									
								</div>								
								<div class="tab-inn">				
								<div class="table-responsive table-desi">											
								<table class="table table-hover">						
								<thead>												
								<tr>											
								<th>Title</th>											
								<th>Total</th>								
								</tr>									


								</thead>								
								<tbody>									
								<tr>				
								<td>
								<span class="txt-dark weight-500 list-enq-name">Total Stock</span> 
								</td>												
																						
								
																						
								<?php if(isset($current_month_total_Stock) && !empty($current_month_total_Stock))
								{?>
								<td> <span class="list-enq-name"><?=$current_month_total_Stock?></span>
								</td>
                                 <?php } else{ ?>
								 <td> <span class="list-enq-name">0</span>
								</td>
								 <?php }?>												
								</tr>	
								
								<tr>				
								<td>
								<span class="txt-dark weight-500 list-enq-name">Available Stock</span> 
								</td>												
																						
								
																						
								<?php if(isset($current_month_Stock) && !empty($current_month_Stock))
								{?>
								<td> <span class="list-enq-name"><?=$current_month_Stock?></span>
								</td>
                                 <?php } else{ ?>
								 <td> <span class="list-enq-name">0</span>
								</td>
								 <?php }?>												
								</tr>
								
								<tr>				
								<td>
								<span class="txt-dark weight-500 list-enq-name">Sale Product</span> 
								</td>												
																						
								
																						
								<?php if(isset($current_month_sale_product) && !empty($current_month_sale_product))
								{?>
								<td> <span class="list-enq-name"><?= $current_month_sale_product?></span>
								</td>
                                 <?php } else{ ?>
								 <td> <span class="list-enq-name">0</span>
								</td>
								 <?php }?>												
								</tr>
								
								<tr>				
								<td>
								<span class="txt-dark weight-500 list-enq-name">Purchase Product</span> 
								</td>												
																						
								
																						
								<?php if(isset($current_month_purchase_product) && !empty($current_month_purchase_product))
								{?>
								<td> <span class="list-enq-name"><?=$current_month_purchase_product?></span>
								</td>
                                 <?php } else{ ?>
								 <td> <span class="list-enq-name">0</span>
								</td>
								 <?php }?>												
								</tr>
								
								<tr>				
								<td>
								<span class="txt-dark weight-500 list-enq-name">Total Customers</span> 
								</td>												
																						
								
																						
								<?php if(isset($current_month_customers) && !empty($current_month_customers))
								{?>
								<td> <span class="list-enq-name"><?=$current_month_customers?></span>
								</td>
                                 <?php } else{ ?>
								 <td> <span class="list-enq-name">0</span>
								</td>
								 <?php }?>												
								</tr>
								
								
								<tr>				
								<td>
								<span class="txt-dark weight-500 list-enq-name">Sale Product Return</span> 
								</td>												
																						
																						
								<?php if(isset($current_month_purchase) && !empty($current_month_purchase))
								{?>
								<td> <span class="list-enq-name">left</span>
								</td>
                                 <?php } else{ ?>
								 <td> <span class="list-enq-name">left</span>
								</td>
								 <?php }?>												
								</tr>
								<tr>				
								<td>
								<span class="txt-dark weight-500 list-enq-name">Purchase Product Return</span> 
								</td>												
																						
								
																						
								<?php if(isset($current_month_purchase) && !empty($current_month_purchase))
								{?>
								<td> <span class="list-enq-name">left</span>
								</td>
                                 <?php } else{ ?>
								 <td> <span class="list-enq-name">left</span>
								</td>
								 <?php }?>												
								</tr>
								<tr>				
								<td>
								<span class="txt-dark weight-500 list-enq-name">Imported Products</span> 
								</td>												
																						
								
																						
								<?php if(isset($current_month_imported_product) && !empty($current_month_imported_product))
								{?>
								<td> <span class="list-enq-name"><?=$current_month_imported_product?></span>
								</td>
                                 <?php } else{ ?>
								 <td> <span class="list-enq-name">0</span>
								</td>
								 <?php }?>												
								</tr><tr>				
								<td>
								<span class="txt-dark weight-500 list-enq-name">Imported Brands</span> 
								</td>												
																						
								
																						
								<?php if(isset($current_month_imported_brand) && !empty($current_month_imported_brand))
								{?>
								<td> <span class="list-enq-name"><?=$current_month_imported_brand?></span>
								</td>
                                 <?php } else{ ?>
								 <td> <span class="list-enq-name">0</span>
								</td>
								 <?php }?>												
								</tr>
								
								
								</tbody>										
								</table>										</div>									</div>								</div>							</div>						</div>						<div class="split-row">							<div class="col-md-12">								<div class="box-inn-sp">									<div class="inn-title">										<h4>New Listing Details</h4>										<p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> <a class="dropdown-button drop-down-meta" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>										<ul id="dr-list" class="dropdown-content">											<li><a href="#!">Add New</a> </li>											<li><a href="#!">Edit</a> </li>											<li><a href="#!">Update</a> </li>											<li class="divider"></li>											<li><a href="#!"><i class="material-icons">delete</i>Delete</a> </li>											<li><a href="#!"><i class="material-icons">subject</i>View All</a> </li>											<li><a href="#!"><i class="material-icons">play_for_work</i>Download</a> </li>										</ul>										<!-- Dropdown Structure -->									</div>									<div class="tab-inn">										<div class="table-responsive table-desi">											<table class="table table-hover">												<thead>													<tr>														<th>Listing</th>														<th>Name</th>														<th>Phone</th>														<th>Exp Date</th>														<th>Country</th>														<th>Payment</th>														<th>Listing Type</th>														<th>Status</th>													</tr>												</thead>												<tbody>													<tr>														<td><span class="list-img"><img src="images/icon/dbr1.jpg" alt=""></span> </td>														<td><a href="#"><span class="list-enq-name">Property Luxury Homes</span><span class="list-enq-city">Illunois, United States</span></a> </td>														<td>+01 3214 6522</td>														<td>24 Dec 2017</td>														<td>Australia</td>														<td> <span class="label label-primary">Pending</span> </td>														<td> <span class="label label-danger">Premium</span> </td>														<td> <span class="label label-primary">Pending</span> </td>													</tr>													<tr>														<td><span class="list-img"><img src="images/icon/dbr2.jpg" alt=""></span> </td>														<td><a href="#"><span class="list-enq-name">Effi Furniture Dealers</span><span class="list-enq-city">Illunois, United States</span></a> </td>														<td>+01 6541 8541</td>														<td>01 Jan 2018</td>														<td>Norway</td>														<td> <span class="label label-success">Done</span> </td>														<td> <span class="label label-danger">Premium Plus</span> </td>														<td> <span class="label label-success">Active</span> </td>													</tr>													<tr>														<td><span class="list-img"><img src="images/icon/dbr3.jpg" alt=""></span> </td>														<td><a href="#"><span class="list-enq-name">NIID Job Training</span><span class="list-enq-city">Express Avenue Mall, Los Angeles</span></a> </td>														<td>+62 6541 6528</td>														<td>24 Apr 2017</td>														<td>England</td>														<td> <span class="label label-success">Done</span> </td>														<td> <span class="label label-danger">Free</span> </td>														<td> <span class="label label-success">Active</span> </td>													</tr>													<tr>														<td><span class="list-img"><img src="images/icon/dbr4.jpg" alt=""></span> </td>														<td><a href="#"><span class="list-enq-name">Property Luxury Homes</span><span class="list-enq-city">Illunois, United States</span></a> </td>														<td>+01 3214 6522</td>														<td>24 Dec 2017</td>														<td>Australia</td>														<td> <span class="label label-primary">Pending</span> </td>														<td> <span class="label label-danger">Premium</span> </td>														<td> <span class="label label-primary">Pending</span> </td>													</tr>													<tr>														<td><span class="list-img"><img src="images/icon/dbr5.jpg" alt=""></span> </td>														<td><a href="#"><span class="list-enq-name">Effi Furniture Dealers</span><span class="list-enq-city">Illunois, United States</span></a> </td>														<td>+01 6541 8541</td>														<td>01 Jan 2018</td>														<td>Norway</td>														<td> <span class="label label-success">Done</span> </td>														<td> <span class="label label-danger">Premium Plus</span> </td>														<td> <span class="label label-success">Active</span> </td>													</tr>												</tbody>											</table>										</div>									</div>								</div>							</div>						</div>						<div class="split-row">							<div class="col-md-12">								<div class="box-inn-sp">									<div class="inn-title">										<h4>New Leads</h4>										<p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> <a class="dropdown-button drop-down-meta" href="#" data-activates="dr-list-ad"><i class="material-icons">more_vert</i></a>										<ul id="dr-list-ad" class="dropdown-content">											<li><a href="#!">Add New</a> </li>											<li><a href="#!">Edit</a> </li>											<li><a href="#!">Update</a> </li>											<li class="divider"></li>											<li><a href="#!"><i class="material-icons">delete</i>Delete</a> </li>											<li><a href="#!"><i class="material-icons">subject</i>View All</a> </li>											<li><a href="#!"><i class="material-icons">play_for_work</i>Download</a> </li>										</ul>										<!-- Dropdown Structure -->									</div>									<div class="tab-inn">										<div class="table-responsive table-desi">											<table class="table table-hover">												<thead>													<tr>														<th>User</th>														<th>Name</th>														<th>Phone</th>														<th>Email</th>														<th>Category</th>														<th>Status</th>														<th>View</th>													</tr>												</thead>												<tbody>													<tr>														<td><span class="list-img"><img src="images/users/1.png" alt=""></span> </td>														<td><a href="#"><span class="list-enq-name">Kimberly</span><span class="list-enq-city">Illunois, United States</span></a> </td>														<td>+01 3214 6522</td>														<td>chadengle@dummy.com</td>														<td>Hotel</td>														<td> <span class="label label-primary">Un Read</span> </td>														<td> <span class="label label-primary">View</span> </td>													</tr>													<tr>														<td><span class="list-img"><img src="images/users/2.png" alt=""></span> </td>														<td><a href="#"><span class="list-enq-name">	Thomas</span><span class="list-enq-city">Illunois, United States</span></a> </td>														<td>+01 3214 6522</td>														<td>chadengle@dummy.com</td>														<td>Education</td>														<td> <span class="label label-success">Read</span> </td>														<td> <span class="label label-primary">View</span> </td>													</tr>													<tr>														<td><span class="list-img"><img src="images/users/5.png" alt=""></span> </td>														<td><a href="#"><span class="list-enq-name">Charles</span><span class="list-enq-city">Illunois, United States</span></a> </td>														<td>+01 3214 6522</td>														<td>chadengle@dummy.com</td>														<td>Shops</td>														<td> <span class="label label-success">Read</span> </td>														<td> <span class="label label-primary">View</span> </td>													</tr>													<tr>														<td><span class="list-img"><img src="images/users/3.png" alt=""></span> </td>														<td><a href="#"><span class="list-enq-name">Brittney</span><span class="list-enq-city">Illunois, United States</span></a> </td>														<td>+01 3214 6522</td>														<td>chadengle@dummy.com</td>														<td>Hotel</td>														<td> <span class="label label-primary">Un Read</span> </td>														<td> <span class="label label-primary">View</span> </td>													</tr>													<tr>														<td><span class="list-img"><img src="images/users/4.png" alt=""></span> </td>														<td><a href="#"><span class="list-enq-name">Paul</span><span class="list-enq-city">Illunois, United States</span></a> </td>														<td>+01 3214 6522</td>														<td>chadengle@dummy.com</td>														<td>Education</td>														<td> <span class="label label-success">Read</span> </td>														<td> <span class="label label-primary">View</span> </td>													</tr>												</tbody>											</table>										</div>									</div>								</div>							</div>						</div>						<div class="split-row">							<div class="col-md-12">								<div class="box-inn-sp">									<div class="inn-title">										<h4>New User Details</h4>										<p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> <a class="dropdown-button drop-down-meta" href="#" data-activates="dr-users"><i class="material-icons">more_vert</i></a>										<ul id="dr-users" class="dropdown-content">											<li><a href="#!">Add New</a> </li>											<li><a href="#!">Edit</a> </li>											<li><a href="#!">Update</a> </li>											<li class="divider"></li>											<li><a href="#!"><i class="material-icons">delete</i>Delete</a> </li>											<li><a href="#!"><i class="material-icons">subject</i>View All</a> </li>											<li><a href="#!"><i class="material-icons">play_for_work</i>Download</a> </li>										</ul>										<!-- Dropdown Structure -->									</div>									<div class="tab-inn">										<div class="table-responsive table-desi">											<table class="table table-hover">												<thead>													<tr>														<th>User</th>														<th>Name</th>														<th>Phone</th>														<th>Email</th>														<th>Country</th>														<th>Listings</th>														<th>Enquiry</th>														<th>Bookings</th>														<th>Reviews</th>													</tr>												</thead>												<tbody>													<tr>														<td><span class="list-img"><img src="images/users/1.png" alt=""></span> </td>														<td><a href="#"><span class="list-enq-name">Marsha Hogan</span><span class="list-enq-city">Illunois, United States</span></a> </td>														<td>+01 3214 6522</td>														<td>chadengle@dummy.com</td>														<td>Australia</td>														<td> <span class="label label-primary">02</span> </td>														<td> <span class="label label-danger">12</span> </td>														<td> <span class="label label-success">24</span> </td>														<td> <span class="label label-info">36</span> </td>													</tr>													<tr>														<td><span class="list-img"><img src="images/users/2.png" alt=""></span> </td>														<td><a href="#"><span class="list-enq-name">Marsha Hogan</span><span class="list-enq-city">Illunois, United States</span></a> </td>														<td>+01 3214 6522</td>														<td>chadengle@dummy.com</td>														<td>Australia</td>														<td> <span class="label label-primary">02</span> </td>														<td> <span class="label label-danger">12</span> </td>														<td> <span class="label label-success">24</span> </td>														<td> <span class="label label-info">36</span> </td>													</tr>													<tr>														<td><span class="list-img"><img src="images/users/3.png" alt=""></span> </td>														<td><a href="#"><span class="list-enq-name">Marsha Hogan</span><span class="list-enq-city">Illunois, United States</span></a> </td>														<td>+01 3214 6522</td>														<td>chadengle@dummy.com</td>														<td>Australia</td>														<td> <span class="label label-primary">02</span> </td>														<td> <span class="label label-danger">12</span> </td>														<td> <span class="label label-success">24</span> </td>														<td> <span class="label label-info">36</span> </td>													</tr>													<tr>														<td><span class="list-img"><img src="images/users/4.png" alt=""></span> </td>														<td><a href="#"><span class="list-enq-name">Marsha Hogan</span><span class="list-enq-city">Illunois, United States</span></a> </td>														<td>+01 3214 6522</td>														<td>chadengle@dummy.com</td>														<td>Australia</td>														<td> <span class="label label-primary">02</span> </td>														<td> <span class="label label-danger">12</span> </td>														<td> <span class="label label-success">24</span> </td>														<td> <span class="label label-info">36</span> </td>													</tr>													<tr>														<td><span class="list-img"><img src="images/users/5.png" alt=""></span> </td>														<td><a href="#"><span class="list-enq-name">Marsha Hogan</span><span class="list-enq-city">Illunois, United States</span></a> </td>														<td>+01 3214 6522</td>														<td>chadengle@dummy.com</td>														<td>Australia</td>														<td> <span class="label label-primary">02</span> </td>														<td> <span class="label label-danger">12</span> </td>														<td> <span class="label label-success">24</span> </td>														<td> <span class="label label-info">36</span> </td>													</tr>												</tbody>											</table>										</div>									</div>								</div>							</div>						</div>					</div>				</div>

								
							</div>
							</div>
							</div>
							</div>
							</div>
							</div>
							</div>
							</div>
