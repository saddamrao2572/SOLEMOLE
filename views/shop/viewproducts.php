<?php

use yii\helpers\Url;
$this->title="View Product";
 ?>
				<!--== breadcrumbs ==-->
				<div class="sb2-2-2">
					<ul>
						<li><a href="main.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a> </li>
						<li class="active-bre"><a href="#"> View Listing</a> </li>
						<li class="page-back"><a href="<?=url::to(['/shop/viewproduct','pid'=>$shopproduct->id])?>"><i class="fa fa-backward" aria-hidden="true"></i> Back</a> </li>
					</ul>
				</div>
				<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4>View Listing</h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="#!">Add New</a> </li>
							<li><a href="<?=url::to(['/shop/updateproduct','pid'=>$shopproduct->id])?>">Edit</a> </li>
							
							
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
										<table class="responsive-table bordered">
											<tbody>
												<tr>
													<td>Mobile</td>
													<td>:</td>
													<td><span class="label label-success"><?=$product->name?></span></td>
												</tr>
												<tr>
													<td>Date</td>
													<td>:</td>
													<td><span class="label label-success"><?=$shopproduct->created_at?></span></td>
												</tr>
												
												<tr>
													<td>Price</td>
													<td>:</td>
													<td><span class="label label-success"><?=$shopproduct->price?></span></td>
												</tr>
												<tr>
													<td>Company</td>
													<td>:</td>
													<td><span class="label label-success"><?=$brand->name?></span></td>
												</tr>
												<tr>
													<td>Shop</td>
													<td>:</td>
													<td><span class="label label-danger"><?=$shop->name?></span>
													</td>
												</tr>
												
												
												<tr>
													<td>Same EMEI</td>
													<td>:</td>
													<td><span class="label label-success"><?=$shopproduct->sameimei?></span></td>
												</tr>
												<tr>
													<td>Paid Amount</td>
													<td>:</td>
													<td><span class="label label-success"><?=$shopproduct->paid?></span> </td>
												</tr>
												
											</tbody>
										</table>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
		