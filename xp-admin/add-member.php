<?php
    include('include/header.php');
    include('include/sidebar.php');
?>
<div class="main-content">

	<div class="page-content">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0 font-size-18">Profile</h4>
				</div>
			</div>
		</div>
		<form action="">
			<div class="col-1g-6 mx-3 my-3">
				<div class="card px-3 py-3">
					<div class="card-body">

						<div class="row">

							<div class="col-12">
								<div class="page-title-box d-sm-flex align-items-center justify-content-between">
									<h4 class="mb-sm-0 font-size-18"> Sai Kumar</h4>
								</div>
							</div>
						</div>
						<div class="row">

							<div class="col-lg-4">
								<div class="mb-3">
									<label for="name" class="form-label">USER NAME</label>
									<input type="text" class="form-control" name="name" id="name"
										placeholder="user name" for="name" required>
									<span class="error nameError"></span>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="mb-3">
									<label for="first name" class="form-label">FIRST NAME</label>
									<input type="text" class="form-control" name="firstname" id="firstname"
										placeholder="first name" for="first name" required>
									<span class="error firstnameError"></span>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="mb-3">
									<label for="first name" class="form-label">LAST NAME</label>
									<input type="text" class="form-control" name="lastname" id="lastname"
										placeholder="last name" for="first name" required>
									<span class="error lastnameError"></span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-4">
								<div class="mb-3">
									<label for="Email id" class="form-label">EMAIL ID</label>
									<input type="text" class="form-control" name="email" id="email"
										placeholder="Email id" for="Email id" required>
									<span class="error emailError"></span>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="mb-3">
									<div class="form-group">
										<label class="control-label" for="password">Password</label>
										<input type="password" name="password1" id="password1" class="form-control"
											value="password" for="password" required>
										<span class="error password1Error"></span>
										<i class="toggle-password fa fa-fw fa-eye-slash"></i>
									</div>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="mb-3">
									<div class="form-group">
										<label class="control-label" for="password">CONFIRM PASSWORD</label>
										<input type="password" name="password2" id="password2" class="form-control"
											value="password" for="password" required>
										<span class="error password2Error"></span>
										<i class="toggle-password fa fa-fw fa-eye-slash"></i>
									</div>
								</div>
							</div>
						</div>


						<div>
							<button type="submit" class="btn btn-add w-md btn-primary" name="update-btn" id="update-btn"
								required><i class="fa fa-plus-circle mx-2" aria-hidden="true"></i>Update
								User</button>
						</div>


					</div>


					<!-- end card body -->
				</div>


				<!-- end card -->
			</div>

			<div class="row">
				<div class="col-xl-6">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Report</h5>

							<div class="row">

								<div class="col-lg-12">
									<div class="form-floating mb-3">

										<label for="select">Select Tasks</label>
										<select class="form-select" id="select" name="select"
											aria-label="Floating label select example" for="select" required>
											<option selected></option>
											<option value="1">One</option>
											<option value="2">Two</option>
											<option value="3">Three</option>
										</select>
										<span class="error selectError"></span>
									</div>
								</div>
							</div>

							<div class="form-floating mb-3">
								<input type="text" class="form-control" id="note" name="note" placeholder="Enter Name">
								<label for="floatingnameInput">Note</label>
							</div>
							<div>
								<button type="submit" class="btn btn-add w-md btn-primary" id="submit-btn"
									name="submit-btn"><i class="fa fa-plus-circle mx-2"
										aria-hidden="true"></i>Submit</button>
							</div>

						</div>
						<!-- end card body -->
					</div>
					<!-- end card -->
				</div>
				<!-- end col -->

				<div class="col-lg-6">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title mb-4">Tasks</h5>

							<div class="d-flex flex-wrap gap-2">


								<!-- Large modal button -->
								<button type="button" class="btn btn-primary waves-effect" data-bs-toggle="modal"
									data-bs-target=".bs-example-modal-lg" id="add-task" name="add-task">ADD
									TASK</button>
							</div>
							<div class="d-flex justify-content-md-between">
								<div class="d-flex my-3 ">
									<input type="radio" name="TeamMeeting1" id="TeamMeeting1" class="my-1">
									<div class="mx-4">
										<p class="m-0">Team Meeting</p>
										<p>Thursday at 3:30 PM</p>
									</div>
								</div>
								<div>
									<button class="btn btn-danger my-3" id="urgent1" name="urgent1">URGENT</button>
								</div>
							</div>
							<div class="d-flex justify-content-md-between">
								<div class="d-flex my-3">
									<input type="radio" name="TeamMeeting2" id="TeamMeeting2" class="my-1">
									<div class="mx-4">
										<p class="m-0">Team Meeting</p>
										<p>Thursday at 3:30 PM</p>
									</div>
								</div>
								<div>
									<button class="btn btn-warning my-2" id="urgent2" name="urgent2">URGENT</button>
								</div>
							</div>

							<div class="d-flex justify-content-md-between">
								<div class="d-flex my-2">
									<input type="radio" name="TeamMeeting3" id="TeamMeeting3" class="my-1">
									<div class="mx-4">
										<p class="m-0">Team Meeting</p>
										<p>Thursday at 3:30 PM</p>
									</div>
								</div>
								<div>
									<button class="btn btn-secondary my-2" id="urgent3" name="urgent3">URGENT</button>
								</div>
							</div>
						</div>
						<!--  Large modal example -->
						<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
							aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="myLargeModalLabel">Add Task</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-lg-12">
												<div class="card">
													<div class="card-body">
														<h4 class="card-title mb-4">Create New Task</h4>
														<div class="outer-repeater" method="post">
															<div data-repeater-list="outer-group" class="outer">
																<div data-repeater-item class="outer">
																	<div class="form-group row mb-4">
																		<label for="taskname"
																			class="col-form-label col-lg-2">Task
																			Name</label>
																		<div class="col-lg-10">
																			<input id="taskname" name="taskname"
																				type="text" class="form-control"
																				placeholder="Enter Task Name..."
																				for="taskname" required>
																			<span class="error TaskNameError"></span>
																		</div>
																	</div>
																	<div class="form-group row mb-4">
																		<label for="taskDescription"
																			class="col-form-label col-lg-2">Task
																			Description</label>
																		<div class="col-lg-10">
																			<div class="form-floating mb-3">
																				<input type="text" class="form-control"
																					id="taskDescription"
																					placeholder="Enter Name">
																				<label for="taskDescription">Task
																					Description</label>
																			</div>
																		</div>
																	</div>

																	<div class="form-group row mb-4">
																		<label for="date"
																			class="col-form-label col-lg-2">Task
																			Date</label>
																		<div class="col-lg-10">
																			<div class="input-daterange input-group"
																				data-provide="datepicker">
																				<input type="text" class="form-control"
																					placeholder="Start Date"
																					name="start" id="start" required>
																				<span class="error startError"></span>
																				<input type="text" class="form-control"
																					placeholder="End Date" name="end"
																					id="end" required>
																				<span class="error endError"></span>
																			</div>
																		</div>
																	</div>


																	<div class="form-group row mb-4">
																		<label for="taskbudget"
																			class="col-form-label col-lg-2">Budget</label>
																		<div class="col-lg-10">
																			<input id="taskbudget" name="taskbudget"
																				type="text"
																				placeholder="Enter Task Budget..."
																				class="form-control" for="taskbudget"
																				required>
																			<span class="error taskbudgetError"></span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="row justify-content-end">
															<div class="col-lg-10">
																<button type="submit" class="btn btn-primary"
																	id="createtask" name="createtask">Create
																	Task</button>
															</div>
														</div>

													</div>
												</div>
											</div>
										</div>
		</form>
	</div>
</div>
<?php
	include('include/footer.php');	
?>