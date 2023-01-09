<?php
include('include/header.php');
include('include/sidenav.php');
include('include/config.php');
?>
<?php if (!empty ($_SESSION['admin_is_login'])){ ?>
	<div class="main-content">
		<div class="page-content">
			<div class="container-fluid">
				<div class="row">	<!--start page title -->
					<div class="col-12">
						<div class="page-title-box d-sm-flex align-items-center justify-content-between">
							<div>
								<h4 class="mb-sm-0 font-size-18">Enquiry Trash List</h4></div>
							<div class="page-title-right">
								
							</div>
						</div>
					</div>
				</div><!-- end page title -->
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<div id="datatable_wrapper" class="bloglisting dataTables_wrapper dt-bootstrap4 no-footer">
									<div class="row">
										<div class="col-sm-12" style="overflow-y:auto;">
											<table id="datatable" class="table table-bordered">
												<thead>
													<tr role="row">
														<th>Sr No.</th>
														<th>Name</th>
														<th>Email</th>
														<th>Contact</th>
														<th>Msg</th>													
														<th>Delete</th>
													</tr>
												</thead>
												<tbody>
													<?php
															$per_page = 10;
																$stmt = $conn->prepare("SELECT * FROM `enquiry` WHERE status=0 ORDER BY id DESC");
																$stmt->execute();
																$number_of_rows = $stmt->fetchColumn();
																$page = ceil($number_of_rows/$per_page);
																$start=0;	
																$current_page=1;
																if(isset($_GET['start'])){
																	$start= $_GET['start'];
																	$current_page=$start;	
																	$start--;
																	$start = $start*$per_page;
																}
																	$sql = "SELECT * FROM `enquiry` WHERE status=0 ORDER BY id DESC LIMIT $start,$per_page";
																	$stmt = $conn->prepare($sql);
																	$stmt->execute();
																	$i=1;
																	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
																	if (!empty($data)) {
																	foreach ($data as $data)
																	{  ?>
														<tr class="odd">
															<td class="sorting_1 dtr-control" tabindex="0">
																<?php echo $i; ?>
															</td>
															<td>
																<?php echo $data['name'] ?>
															</td>
															<td>
																<?php echo $data['email'] ?>
															</td>
															<td>
																<?php echo $data['contact'] ?>
															</td>
															<td>
																<?php echo $data['msg'] ?>
															</td>
															<td><a class="btn btn-danger" href="javascript:void(0)" onclick="deleteEnquiry(<?php echo $data['id']; ?>)"><i class="fas fa-trash-alt"></i></a></td>
														</tr>
														<?php $i++; } }?>
												</tbody>
											</table>
										</div>
										<p class="pagination_status">Showing 1 to 10 of 10 entries</p>
										<ul class="pagination pagination justify-content-end mt-3">
											<li class="page-item <?php if($current_page <= 1){ echo 'disabled'; } ?>"><a class="page-link" href="category_listing.php?start=<?php echo $current_page-1 ?>" class='button'>Previous</a></li>
											<?php for($j=1; $j<=$page; $j++){
															$class="";
															if($current_page == $j){
															$class = "active";
											?>
												<li class="page-item <?php echo $class; ?>">
													<a class="page-link" href="category_listing.php?start=<?php echo $j; ?>">
														<?php echo $j ?>
													</a>
												</li>
												<?php } }?>
												<li class="page-item <?php if($current_page >= $page) { echo 'disabled'; } ?>"><a class="page-link" href="category_listing.php?start=<?php echo $current_page+1 ?>" class='button'>NEXT</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
include('include/footer.php');
					}else{
		echo "<script>window.location='http://localhost/augs/admin/index.php'</script>";
	}
?>