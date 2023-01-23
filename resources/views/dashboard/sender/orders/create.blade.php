@extends('dashboard.layouts.master')
@section('content')

	<div class="nk-content ">
		<div class="container-fluid">
			<div class="nk-content-inner">
				<div class="nk-content-body">
					<div class="components-preview wide-md mx-auto">
						<div class="nk-block nk-block-lg">
							<div class="nk-block-head">
								<div class="nk-block-head-content">
									<h4 class="title nk-block-title">Create Order</h4>
								</div>
							</div>
							<div class="card card-preview">

								<div class="card-inner">
									<form action="{{route('sender.orders.store')}}" method="post">
										@csrf
										<div class="preview-block">
											<div class="row gy-4">
												<div class="col-sm-6">
													<div class="form-group">
														<label for="parcel_description" class="control-label">Parcel Description</label>
														<div class="form-control-wrap">
															<input type="text" name="parcel_description" class="form-control">
														</div>
													</div>
												</div>
											</div>
											<div class="row gy-4">
												<div class="col-sm-6">
													<div class="form-group">
														<label for="pickup_address" class="control-label">Pickup Address</label>
														<div class="form-control-wrap">
															<input type="text" name="pickup_address" class="form-control">
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<label for="drop_address" class="control-label">Drop-off Address</label>
														<div class="form-control-wrap">
															<input type="text" name="drop_address" class="form-control">
														</div>
													</div>
												</div>
											</div>
											<div class="row g-3">
												<div class="col-sm-6">
													<div class="form-group mt-2">
														<button type="submit" name="add" class="btn btn-lg btn-primary">Create</button>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div><!-- .card-preview -->
						</div><!-- .nk-block -->
					</div><!-- .components-preview -->
				</div>
			</div>
		</div>
	</div>
@endsection
