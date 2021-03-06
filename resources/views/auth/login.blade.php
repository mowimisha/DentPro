@extends('layouts.app')


@section('header')
    DMS LOGIN
@stop

@section('content')




    <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">

					<div class="m-login__container">
						<div class="m-login__logo">
							<a href="#">
								<img src="../images/logo.png" width="150" height="150">
							</a>


							<script src="../js/sweetalert2.all.js"></script>

							<!-- Include this after the sweet alert js file -->
							@if (Session::has('sweet_alert.alert'))
								<script>
									swal({!! Session::get('sweet_alert.alert') !!});
								</script>
							@endif
						</div>
						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title">
									Sign In To Dashboard
								</h3>
							</div>
							<form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

								<div class="form-group">
									<input class="form-control form-control-lg m-input" type="email" placeholder="Email" name="email" style="background-color:#f58220 !important;color:#000 !important;">
                                </div><br>

								<div class="form-group">
									<input class="form-control form-control-lg m-input m-login__form-input--last" type="password" placeholder="Password" name="password" style="background-color:#f58220 !important;color:#000 !important;">
                                </div>

								<div class="m-login__form-action">
									<button id="m_login_signin_submit" type="submit" class="btn btn-primary m-btn  m-btn--custom   m-login__btn">
										Sign In
									</button>
								</div>
							</form>
						</div>
					</div>
                </div>

@endsection
