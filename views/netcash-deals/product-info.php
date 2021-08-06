 
				<style>
	[type="checkbox"]:not(:checked), [type="checkbox"]:checked {
     position: absolute; 
   left: -372px; 
    opacity: 1;
}
				</style>
				
				
				
				
				
									<div class="tab-inn ad-tab-inn">
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Select</th>
														<th>Name</th>
														<th>Price</th>
														<th>Imi</th>
														
													</tr>
												</thead>
												<tbody>
												
												<?php 
									if(isset($product))
									{
								
										foreach($product as $pro)
										{
												?>
													
													<tr>
														<td>
					<input type="checkbox" name="select[]" value="<?=$pro->id?>" />
														</td>
														<td>
														
														<a href="#"><span class="list-enq-name"><?=$pro->name?></span></a> </td>
														
														<td>
														<?=$pro->price?>
														</td>
														<td><?=$pro->imei?>  </td>
														
													</tr>
									<?php } } ?>	
											
											
											
												</tbody>
											</table>
										</div>
									</div>
									
									
									
								
				