
@extends('layouts.admin')

@section('header')
    Add New Appointment
@endsection

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        Add Appointment (<small>Existing patients</small>)
                    </h3>
                </div>
                <div>
                    <span class="m-subheader__daterange" >
                        <span class="m-subheader__daterange-label">
							<strong> Hello {{ Auth::user()->name }} </strong>
                            <span class="m-subheader__daterange-title"></span>
                            <span class="m-subheader__daterange-date  m--font-brand"></span>
                        </span>
                    </span>
                </div>&nbsp;&nbsp;&nbsp;
                <div>
                    <span class="m-subheader__daterange">
                        <span class="m-subheader__daterange-label">
							<strong>{{ date('d M Y h:i a') }}</strong>
                            <span class="m-subheader__daterange-title"></span>
                            <span class="m-subheader__daterange-date  m--font-brand"></span>
                        </span>
                    </span>
                </div>
            </div>
        </div>
		<!-- END: Subheader -->
		
		


        <div class="m-content">
			<!--begin::Portlet-->
				<div class="m-portlet">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon m--hide">
									<i class="la la-gear"></i>
								</span>
								
								<span class="text-center">
									<br>
									<div class="col-md-12 ">
										<script src="../js/sweetalert2.all.js"></script>

										<!-- Include this after the sweet alert js file -->
										@if (Session::has('sweet_alert.alert'))
											<script>
												swal({!! Session::get('sweet_alert.alert') !!});
											</script>
										@endif
									</div>
								</span>
							</div>
						</div>
					</div>
					<!--begin::Form-->
					<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="{{ url('new-appointment-existing-admin') }}">
						{{ csrf_field() }}
						<div class="m-portlet__body">
							
							<div class="form-group m-form__group row">
								
								<div class="col-lg-4 col-md-9 col-sm-12">
									<label class="">
										Patient FileNo:
									</label>
										<select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="patient_id">
											@foreach($patients as $patient)
											<option value='{{ $patient->id }}'>
												{{ $patient->id }}
											</option>
											@endforeach
										</select>
									<span class="m-form__help">
										Search user by searching File No.
									</span>
								</div>
                                
                                
                                <div class="col-lg-4">
									<label>
										Appointment Date:
									</label>
									<div class="input-group date" >
										<input class="flatpickr flatpickr-input form-control input active" placeholder="Select Date..." tabindex="0" type="text" readonly="readonly" name="appointment_date">
		       					        <script>
		       					            flatpickr(".flatpickr", {
		       					                enableTime: false,
		       					                altInput: true,
		       					                altFormat: "Y-m-d",
		       					            });
		       					        </script>
       					    		</div>
									
                                </div>
                                

								<div class="col-lg-4">
									<label>
										Appointment Status:
									</label>
									<select name="appointment_status" class="form-control" id="m_notify_state">
										<option value="">
											Select Status
										</option>
										<option value="Pending">
											Pending
										</option>
										<option value="Complete">
											Complete
										</option>
									</select>
								</div>
								
							</div>
						</div>
						<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
							<div class="m-form__actions m-form__actions--solid">
								<div class="row">
									<div class="col-lg-4"></div>
									<div class="col-lg-8">
										<button type="submit" class="btn btn-primary">
											Add Appointment
										</button>
										<button type="reset" class="btn btn-secondary">
											Cancel
										</button>
									</div>
								</div>
							</div>
						</div>
					</form>
					<!--end::Form-->
				</div>
				<!--end::Portlet-->

						
						
						
						
						<!--End::Section-->
                    </div>
                </div>
			</div>
            <!-- end:: Body -->



@endsection

































