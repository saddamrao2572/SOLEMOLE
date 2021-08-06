<?php use yii\helpers\Url; ?>
<?//= Url::to(['site/activate/','key'=>$user->password_reset_token],true) ?>

		<center style="background-color: white;">
			<img src="https://solemole.com/img/logo-dark.png" style="width: 250px; height: 100px">
			<table id="bodyTable" style="table-layout: fixed;max-width:100% !important;width: 100% !important;min-width: 100% !important;" width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
				<tbody><tr>
					<td id="bodyCell" valign="top" align="center">

						
						<table id="emailHeader" width="500" cellspacing="0" cellpadding="0" border="0" bgcolor="#E1E1E1">

							<!-- HEADER ROW // -->
							<tbody>
							<!-- // END -->

						</tbody></table><table id="emailBody" width="500" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">

							<tbody><tr>
								<td valign="top" align="center">
								
									<table style="color:#FFFFFF;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#bc0a7">
										<tbody><tr>
											<td valign="top" align="center">
												
												<table class="flexibleContainer" width="500" cellspacing="0" cellpadding="0" border="0">
													<tbody><tr>
														<td class="flexibleContainerCell" width="500" valign="top" align="center">
															<table width="100%" cellspacing="0" cellpadding="30" border="0">
																<tbody><tr>
																	<td class="textContent" valign="top" align="center">
																		<h1 style="color:#FFFFFF;line-height:100%;font-family:fantasy;font-size:35px;font-weight:normal;margin-bottom:5px;text-align:center;"> Welcome </h1>
																		<h2 style="text-align:center;font-weight:normal;font-family:fantasy;font-size:23px;margin-bottom:10px;color: black;line-height:135%;"><?= $user->username ?></h2>
																		<div style="text-align:center;font-family:monospace;font-size:15px;margin-bottom:0;color:#FFFFFF;line-height:135%;">
																			Email Verification is required for access the Solemole Membership
																		</div>
																	</td>
																</tr>
															</tbody></table>
															<!-- // CONTENT TABLE -->

														</td>
													</tr>
												</tbody></table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
						
							<tr mc:hideable="">
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												<table class="flexibleContainer" width="500" cellspacing="0" cellpadding="30" border="0">
													<tbody><tr>
														<td class="flexibleContainerCell" width="500" valign="top">

															

														</td>
													</tr>
												</tbody></table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->


							<!-- MODULE ROW // -->
							<tr>
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr style="padding-top:0;">
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												<table class="flexibleContainer" width="500" cellspacing="0" cellpadding="30" border="0">
													<tbody><tr>
														<td style="padding-top:0;" class="flexibleContainerCell" width="500" valign="top" align="center">

															<!-- CONTENT TABLE // -->
															<table class="emailButton" style="background-color: #17115b;" width="50%" cellspacing="0" cellpadding="0" border="0">
																<tbody><tr>
																	<td class="buttonContent" style="padding-top:15px;padding-bottom:15px;padding-right:15px;padding-left:15px;" valign="middle" align="center">
																		<a style="color:#FFFFFF;text-decoration:none;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:135%;" href="<?= Url::to(['site/activate/','key'=>$user->password_reset_token],true) ?>" target="_blank">Activate Account</a>
																	</td>
																</tr>
															</tbody></table>
															<!-- // CONTENT TABLE -->

														</td>
													</tr>
												</tbody></table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->


							<!-- MODULE ROW // -->
							<tr>
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#F8F8F8">
										<tbody><tr>
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												<table class="flexibleContainer" width="500" cellspacing="0" cellpadding="0" border="0">
													<tbody><tr>
														<td class="flexibleContainerCell" width="500" valign="top" align="center">
															<table width="100%" cellspacing="0" cellpadding="30" border="0">
																<tbody><tr>
																	<td valign="top" align="center">

																		<!-- CONTENT TABLE // -->
																		<table width="100%" cellspacing="0" cellpadding="0" border="0">
																			<tbody><tr>
																				<td class="textContent" valign="top">
																					
																					<h3 mc:edit="header" style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">Email Details</h3>
																					<div mc:edit="body" style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;">
																						<p>
																						Click on the activate button below to activate your account <br/> Or Copy and Paste the link given below in your browser. </p>
																						<p><?= Url::to(['site/activate/','key'=>$user->password_reset_token],true) ?></p>
																					</div>
																				</td>
																			</tr>
																		</tbody></table>
																		<!-- // CONTENT TABLE -->

																	</td>
																</tr>
															</tbody></table>
														</td>
													</tr>
												</tbody></table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->


							<!-- MODULE ROW // -->
							<tr>
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->


							<!-- MODULE ROW // -->
							<tr>
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												<table class="flexibleContainer" width="500" cellspacing="0" cellpadding="0" border="0">
													<tbody><tr>
														<td class="flexibleContainerCell" width="500" valign="top" align="center">

															<!-- CONTENT TABLE // -->
															
															<!-- // CONTENT TABLE -->

														</td>
													</tr>
												</tbody></table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->

							<!-- MODULE ROW // -->
							<tr>
								
							</tr>
							<!-- // MODULE ROW -->


							<!-- MODULE DIVIDER // -->
							<tr>
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												<table class="flexibleContainer" width="500" cellspacing="0" cellpadding="0" border="0">
													<tbody><tr>
														<td class="flexibleContainerCell" width="500" valign="top" align="center">
															<table class="flexibleContainerCellDivider" width="100%" cellspacing="0" cellpadding="30" border="0">
																<tbody><tr>
																	<td style="padding-top:0px;padding-bottom:0px;" valign="top" align="center">

																		<!-- CONTENT TABLE // -->
																		
																		<!-- // CONTENT TABLE -->

																	</td>
																</tr>
															</tbody></table>
														</td>
													</tr>
												</tbody></table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // END -->


							<!-- MODULE ROW // -->
							<tr>
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->


							<!-- MODULE DIVIDER // -->
							<tr>
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												<table class="flexibleContainer" width="500" cellspacing="0" cellpadding="0" border="0">
													<tbody><tr>
														<td class="flexibleContainerCell" width="500" valign="top" align="center">
															<table class="flexibleContainerCellDivider" width="100%" cellspacing="0" cellpadding="30" border="0">
																<tbody><tr>
																	<td style="padding-top:0px;padding-bottom:0px;" valign="top" align="center">

																		<!-- CONTENT TABLE // -->
																		
																		<!-- // CONTENT TABLE -->

																	</td>
																</tr>
															</tbody></table>
														</td>
													</tr>
												</tbody></table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // END -->


							<!-- MODULE ROW // -->
							<tr>
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->


							<!-- MODULE DIVIDER // -->
							<tr>
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												<table class="flexibleContainer" width="500" cellspacing="0" cellpadding="0" border="0">
													<tbody><tr>
														<td class="flexibleContainerCell" width="500" valign="top" align="center">
															<table class="flexibleContainerCellDivider" width="100%" cellspacing="0" cellpadding="30" border="0">
																<tbody><tr>
																	
																</tr>
															</tbody></table>
														</td>
													</tr>
												</tbody></table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // END -->


							<!-- MODULE ROW // -->
							<tr>
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->


							<!-- MODULE DIVIDER // -->
							<tr>
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												<table class="flexibleContainer" width="500" cellspacing="0" cellpadding="0" border="0">
													<tbody><tr>
														<td class="flexibleContainerCell" width="500" valign="top" align="center">
															<table class="flexibleContainerCellDivider" width="100%" cellspacing="0" cellpadding="30" border="0">
																<tbody><tr>
																	<td style="padding-top:0px;padding-bottom:0px;" valign="top" align="center">

																		<!-- CONTENT TABLE // -->
																		
																		<!-- // CONTENT TABLE -->

																	</td>
																</tr>
															</tbody></table>
														</td>
													</tr>
												</tbody></table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // END -->


							<!-- MODULE ROW // -->
							<tr>
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->


							<!-- MODULE DIVIDER // -->
							<tr>
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												<table class="flexibleContainer" width="500" cellspacing="0" cellpadding="0" border="0">
													<tbody><tr>
														<td class="flexibleContainerCell" width="500" valign="top" align="center">
															<table class="flexibleContainerCellDivider" width="100%" cellspacing="0" cellpadding="30" border="0">
																<tbody><tr>
																	
																</tr>
															</tbody></table>
														</td>
													</tr>
												</tbody></table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // END -->


							<!-- MODULE ROW // -->
							<tr>
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->


							<!-- MODULE DIVIDER // -->
							<tr>
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												<table class="flexibleContainer" width="500" cellspacing="0" cellpadding="0" border="0">
													<tbody><tr>
														<td class="flexibleContainerCell" width="500" valign="top" align="center">
															<table class="flexibleContainerCellDivider" width="100%" cellspacing="0" cellpadding="30" border="0">
																<tbody><tr>
																	<td style="padding-top:0px;padding-bottom:0px;" valign="top" align="center">

																		<!-- CONTENT TABLE // -->
																		
																		<!-- // CONTENT TABLE -->

																	</td>
																</tr>
															</tbody></table>
														</td>
													</tr>
												</tbody></table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // END -->


							<!-- MODULE ROW // -->
							<tr>
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->


							<!-- MODULE ROW // -->
							<tr>
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->


							<!-- MODULE ROW // -->
							<tr>
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												<table class="flexibleContainer" width="500" cellspacing="0" cellpadding="0" border="0">
													<tbody><tr>
														<td class="flexibleContainerCell" width="500" valign="top">

															<!-- CONTENT TABLE // -->
															<table width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
																<tbody><tr>
																	<td class="flexibleContainerBox" style="background-color:#5F5F5F;" valign="top" align="left">
																		
																	</td>
																	<td class="flexibleContainerBox" style="background-color:#27ae60;" valign="top" align="right">
																		<table class="flexibleContainerBoxNext" style="max-width:100%;" width="100%" cellspacing="0" cellpadding="30" border="0">
																			<tbody><tr>
																				
																			</tr>
																		</tbody></table>
																	</td>
																</tr>
															</tbody></table>
															<!-- // CONTENT TABLE -->

														</td>
													</tr>
												</tbody></table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->


							<!-- MODULE ROW // -->
							<tr>
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												<table class="flexibleContainer" width="500" cellspacing="0" cellpadding="0" border="0">
													<tbody><tr>
														<td class="flexibleContainerCell" width="500" valign="top" align="center">
															
														</td>
													</tr>
												</tbody></table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>
							<!-- // MODULE ROW -->

						</tbody></table>
						
						<table id="emailFooter" width="500" cellspacing="0" cellpadding="0" border="0" bgcolor="#E1E1E1">

						
							<tbody><tr>
								<td valign="top" align="center">
									<!-- CENTERING TABLE // -->
									<table width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody><tr>
											<td valign="top" align="center">
												<!-- FLEXIBLE CONTAINER // -->
												<table class="flexibleContainer" width="500" cellspacing="0" cellpadding="0" border="0">
													<tbody><tr>
														<td class="flexibleContainerCell" width="500" valign="top" align="center">
															<table width="100%" cellspacing="0" cellpadding="30" border="0">
																<tbody><tr>
																	<td valign="top" bgcolor="#E1E1E1">

																		<div style="font-family:Helvetica,Arial,sans-serif;font-size:13px;color:#828282;text-align:center;line-height:120%;">
																				<div><a href="https://www.facebook.com/Find-CuT-389550161555592/" class="fa fa-facebook" target="_blank"></a>
<a href="https://www.twitter.com" target="_blank" class="fa fa-twitter"></a>
</div>
																		</div>

																	</td>
																</tr>
															</tbody></table>
														</td>
													</tr>
												</tbody></table>
												<!-- // FLEXIBLE CONTAINER -->
											</td>
										</tr>
									</tbody></table>
									<!-- // CENTERING TABLE -->
								</td>
							</tr>

						</tbody></table>
						<!-- // END -->

					</td>
				</tr>
			</tbody></table>
		</center>
	

<div id="des_xnba_ewn"></div>