<?php
include('include/header.php');
include('include/sidenav.php');
include('include/config.php');
?>
	<?php if (!empty ($_SESSION['admin_is_login'])){ ?>
		<div class="main-content">
			<div class="page-content">
				<div class="container-fluid">
					<div class="row">
						<!-- start page title -->
						<div class="col-12">
							<div class="page-title-box d-sm-flex align-items-center justify-content-between">
								<div>
									<h4 class="mb-sm-0 font-size-18 mx-2">Add Post</h4></div>
							</div>
						</div>
					</div>
					<!-- end page title -->
				<form id="updatePost">
						<?php 
                                $stmt= $conn->prepare("SELECT * FROM `post` WHERE id=?");                               
                                $stmt->execute([$_GET['id']]);
                                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach($result as $row_post)
                                { ?>
							<div class="row">
								<div class="col-xl-8">
									<div class="card">
										<div class="card-body">
											<h4 class="card-title mb-4">Content</h4>
											<div class="form-group mx-2" style="position: relative;">
												<textarea id="content" name="content" class="form-control" rows="50">
													<?php echo $row_post['content'] ?>
												</textarea>
												<div style="position: absolute;top: 3px;right: 307px;z-index:1;">
													<div class="btn upload-btn content_upload ml-2" data-toggle="modal" data-target="#postModalContent">Image <i class="fa-solid fa-arrow-up-from-bracket"></i> </div>
												</div>
											</div>
										</div>
										<!-- end card body -->
									</div>
									<!-- end card -->
								</div>
								<!-- end col -->
								<div class="col-xl-4">
									<div class="card">
										<div class="card-body" id="accordion">
											<div class="header">
												<h4 class="card-title mb-4">Features</h4></div>
											<section>
												<article>
													<div class="content">
														<div class="accordion">
															<div class="title active">Content Title</div>
															<div class="desc active">
																<div class="form-group">
																	<label for="Title" class="form-label">Title</label>
																	<input type="text" class="form-control" id="title" name="title" value="<?php echo $row_post['title'] ?>"> </div>
																<div class="form-group">
																	<label for="horizontal-firstname-input" class="col-sm-3 col-form-label">SEO Title</label>
																	<input type="text" class="form-control" id="seo_title" name="seo_title" value="<?php echo $row_post['seo_title'] ?>"> </div>
																<div class="form-group">
																	<label for="horizontal-email-input" class="col-sm-3 col-form-label">Slug</label>
																	<br>
																	<input type="text" class="form-control" id="slug" name="slug" value="<?php echo $row_post['slug'] ?>"> </div>
																<div class="form-group">
																	<label class="form-label">Meta Description</label>
																	<textarea class="form-control" rows="3" id="meta_desc" name="meta_desc">
																		<?php echo $row_post['description'] ?>
																	</textarea>
																</div>
															</div>
															<div class="title">Featured Image</div>
															<div class="desc">
																<?php
                                                                        $stmt_img = $conn->prepare("SELECT * FROM `images` WHERE id=? AND status=?");
                                                                        $stmt_img->execute([$row_post['img_id'],1]);
                                                                        $img_data = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
                                                                        if(!empty($img_data)){
                                                                            $image = $img_data[0]['path'];
                                                                            $alt = $img_data[0]['alt'];
                                                                            $img_id = $img_data[0]['id'];
                                                                        }else{
                                                                            $image="https://spruko.com/demo/sash/sash/assets/plugins/fancyuploder/fancy_upload.png";
                                                                            $alt="feature click image";
                                                                            $img_id = 0;
                                                                        }
                                                                        ?>
																	<?php
                                                                            $stmt1 = $conn->prepare("SELECT * FROM `images` WHERE id=?");
                                                                            $stmt1->execute([$row_post['img_id']]);
                                                                            $img_data = $stmt1->fetchAll(PDO::FETCH_ASSOC);
                                                                    ?>
																		<div class="blog-img-box" data-toggle="modal" data-target="#exampleModal">
																			<?php if(!empty($img_data[0]['path'])){ ?> <img src="<?php echo $img_data[0]['path']; ?>" alt="<?php echo $img_data[0]['alt'] ?>" class="image_path">
																				<div class=" d-flex justify-content-center">
																					<button type="button" id="remove_btn" class="btn btn-danger float-center my-3" onclick="removeFeatureimage(<?php echo $row_post['id'] ?>)">Remove Image</button>
																				</div>
																				<?php }else{ ?> <img src="https://spruko.com/demo/sash/sash/assets/plugins/fancyuploder/fancy_upload.png" alt="feature click image" class="image_path">
																					<?php } ?>
																						<h5>Set Feature Image</h5> </div>
																		<input type="hidden" class="image_id" name="img_id" value="<?php echo $row_post['img_id'] ?>" />
																		<div class="customefeature_image"> <img src="" alt="" class="image_path"> </div>
															</div>
															<div class="title">Category</div>
															<div class="desc">
																<div class="form-group">
																	<label class="form-label"> Select Category </label>
																	<?php $stmt = $conn->prepare("SELECT * FROM `category` WHERE status=?");
                                                                        $stmt->execute([1]);
                                                                        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                                    ?>
																		<select class="form-control sel_cat" id="category" name="category" title="Please select Category">
																			<option value="">Select a Category... </option>
																			<?php foreach ($data as $data) { ?>
																				<option value="<?php echo $data['id']; ?>" <?php if($data['id']==$row_post[ 'cat_id']) echo ' selected="selected"'; ?> >
																					<?php echo $data['name']; ?>
																				</option>
																				<?php } ?>
																		</select>
																</div>
															</div>
															<div class="title" data-image="images/app-capture-04.png">Rank Math Advance</div>
															<div class="desc">
																<div class="tab-pane" id="profile1" role="tabpanel">
																	<p class="mt-2">
																		<div class="d-flex mx-1 rank-math-checkbox">
																			<div class="checkbox-left-section">
																				<ul class="check-box-ul">
																					<li>
																						<input type="checkbox" value="index" name="bot_robot[]" class="radio-btn" id="index" <?php if( "index"=="index" ){ echo 'checked="checked"'; }?>/>
																						<label class="btn btn-outline-primary mr-2" for="index" style="font-size: 11px; !important">Index</label>
																					</li>
																					<li>
																						<input type="checkbox" value="follow" name="bot_robot[]" class="radio-btn" id="follow" <?php if( "follow"=="follow" ){ echo 'checked="checked"'; }?>/>
																						<label class="btn btn-outline-primary mr-2" for="follow" style="font-size: 11px; !important"> Follow</label>
																					</li>
																					<li>
																						<input type="checkbox" value="no-image-index" name="bot_robot[]" class="radio-btn" id="no_image_index">
																						<label class="btn btn-outline-primary mr-2" for="no_image_index" style="font-size: 11px; !important"> No Image Index </label>
																					</li>
																				</ul>
																			</div>
																			<div class="checkbox-right-section">
																				<ul class="check-box-ul">
																					<li>
																						<input type="checkbox" value="no-index" name="bot_robot[]" class="radio-btn" id="no_index">
																						<label class="btn btn-outline-primary mr-2" for="no_index" style="font-size: 11px; !important">No Index</label>
																					</li>
																					<li>
																						<input type="checkbox" value="no-archive" name="bot_robot[]" class="radio-btn" id="no_archive">
																						<label class="btn btn-outline-primary mr-2" for="no_archive" style="font-size: 11px; !important">No Archive</label>
																					</li>
																					<li>
																						<input type="checkbox" value="no-snippet" name="bot_robot[]" class="radio-btn" id="no_snippet">
																						<label class="btn btn-outline-primary mr-2" for="no_snippet" style="font-size: 11px; !important">No Snippet </label>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<label for="" class=""> Advance Robots Meta </label>
																		<div>
																			<ul class="advancce-robots-meta">
																				<li>
																					<input type="checkbox" class="radio-btn" name="max_snippet" id="max_snippet" value="max-snippet:" <?php if( "max-snippet:"=="max-snippet:" ){ echo 'checked="checked"'; }?>/>
																					<label class="btn btn-outline-primary mr-2" for="max_snippet" style="font-size: 12px; !important">Max Snippet</label>
																					<input class="counter" type="number" placeholder="1" name="max_snippet_value" id="max_snippet_value" value="-1"> </li>
																				<li>
																					<input type="checkbox" class="radio-btn" name="max_video" id="max_video" value="max-video-preview:" <?php if( "max-video-preview:"=="max-video-preview:" ){ echo 'checked="checked"'; }?>/>
																					<label class="btn btn-outline-primary mr-2" for="max_video" style="font-size: 12px; !important">Max Video Preview</label>
																					<input class="counter" type="number" name="max_video_value" id="max_video_value" value="-1"> </li>
																				<li>
																					<input type="checkbox" class="radio-btn" name="max_image" id="max_image" value="max-image-preview:" <?php if( "max-image-preview:"=="max-image-preview:" ){ echo 'checked="checked"'; }?>/>
																					<label class="btn btn-outline-primary mr-2" for="max_snippet" style="font-size: 12px; !important">Max Image Preview</label>
																					<select name="max_image_value" class="max_image_select">
																						<option value="large">Large</option>
																						<option value="standar">Standard</option>
																						<option value="none">None</option>
																					</select>
																				</li>
																			</ul>
																		</div>
																	</p>
																</div>
															</div>
														</div>
													</div>
												</article>
											</section>
											<div class="form-group">
												<label class="form-label">Description</label>
												<textarea class="form-control" rows="6" id="description" name="description">
													<?php echo $row_post['description'] ?>
												</textarea>
											</div>
											<div class="form-group d-flex clearfix">
												<div class="float-left saveDraft">
													<p class="text-center">Save To Draft</p>
												</div>
												<div class="float-right">
													<label class="switch">
														<input type="checkbox" name="draft" id="draft" value="2"> <span class="slider round"></span> </label>
												</div>
											</div>
											<div class="form-group showDate" style="display:none;">
												<input type="text" name="PostDate" class="form-control d-block mt-2" value="Set Upload Date" id="datetimepicker" /> 
                                            </div>
											<div class="submit-btns clearfix d-flex">
												<input type="hidden" name="post_id" value="<?php echo $row_post['id'] ?>">
												<input type="hidden" name="btn" value="updatePost">
												<input type="submit" class="post-btn float-left" name="blog_publish" value="Publish"> 
                                            </div>
										</div>
									</div>
								</div>
							</div>
						<?php  } ?>
				</form>
		    </div>
		</div>
	</div>

		<script>
		function blog_img_pathUrl(input) {
			$('#blog-img_url')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
		}
		</script>
		<?php
    include('include/footer.php');
}else{
    echo "<script>window.location='http://localhost/augs/admin/index.php'</script>";
    }
 ?>