<?php
use yii\widgets\ListView;
use yii\helpers\Url;
$this->title="All Products";
 ?>
				<!--== breadcrumbs ==-->
				
				<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4>All Products</h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
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
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Images</th>
														<th>Mobile</th>
														<th>Company</th>
														<th>Shop</th>
														<th>Quantity</th>
														<th>Status</th>
														<th>View</th>
														<th>Edit</th>
													</tr>
												</thead>
												<tbody>
													
                        <?= 
                        ListView::widget([
                            'dataProvider' => $dataProvider,
                            'itemView' => '_shopproductdetails',
                            'layout' => "<div class='admin-pag-na'>{pager}</div>{items}\n",
                            'pager' => [
                                'options' => ['tag' => 'div',
            'class' => 'pagination list-pagenat',
        ],
                                'nextPageLabel' => 'Next',
                                'prevPageLabel' => 'Prev',
                                'maxButtonCount' => 4,
                                'nextPageCssClass' =>'',
                                'prevPageCssClass' =>'',
                            ],
                            'emptyText'=>'No Products Found'
                        ]); 
                    ?> 
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="admin-pag-na">
									
								</div>
							</div>
						</div>
					</div>
				</div>
			