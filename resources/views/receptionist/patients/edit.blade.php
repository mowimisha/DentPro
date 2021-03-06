
@extends('layouts.receptionist')

@section('header')
    Patient Profile
@endsection

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        My Profile
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
            @foreach($patients as $patient)
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="m-portlet  ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon m--hide">
                                            <i class="la la-gear"></i>
                                        </span>

                                        <!-- <button type="button" class="btn btn-success m-btn m-btn--custom" id="m_sweetalert_demo_6">
                                            Show me
                                        </button> -->


                                        
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
                            <div class="m-portlet__body">
                                <div class="m-card-profile">
                                    <div class="m-card-profile__title m--hide">
                                        Your Profile
                                    </div>
                                    <div class="m-card-profile__pic">
                                        <div class="m-card-profile__pic-wrapper">
                                            <img src="../images/avatar.png" alt=""/ width="60" height="60">
                                        </div>
                                    </div>
                                    <div class="m-card-profile__details">
                                        <span class="m-card-profile__name">
                                            {{ $patient->firstname }} {{ $patient->lastname }}
                                        </span>
                                        <a href="" class="m-card-profile__email m-link">
                                            {{ $patient->email }}
                                        </a>
                                    </div>
                                </div>
                                <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                    <li class="m-nav__section m--hide">
                                        <span class="m-nav__section-text">
                                            Section
                                        </span>
                                    </li>
                                    <li class="m-nav__item">
                                        <span class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-edit"></i>
                                            <span class="m-nav__link-title">
                                                <span class="m-nav__link-wrap">
                                                    <span class="m-nav__link-text">
                                                        File No - <span class="text-primary">{{ $patient->id }}</span>
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                                    </li>
                                    <li class="m-nav__item">
                                        <span class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-share"></i>
                                            <span class="m-nav__link-text">
                                                Date of Birth - <span class="text-primary">{{ $patient->dob }}</span>
                                            </span>
                                        </span>
                                    </li>
                                    <li class="m-nav__item">
                                        <span class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-support"></i>
                                            <span class="m-nav__link-text">
                                                Phone No. - <span class="text-primary">{{ $patient->phone_number }}</span>
                                            </span>
                                        </span>
                                    </li>
                                    <li class="m-nav__item">
                                        <span class="m-nav__link">
                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                            <span class="m-nav__link-text">
                                                Email - <span class="text-primary">{{ $patient->email }}</span>
                                            </span>
                                        </span>
                                    </li>
                                </ul>

                                <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                    <li class="m-nav__section m--hide">
                                        <span class="m-nav__section-text">
                                            Section
                                        </span>
                                    </li>

                                    <li class="m-nav__item">
                                        <span class="m-nav__link">
                                            <span class="m-nav__link-title">
                                                <span class="m-nav__link-wrap">
                                                    <span class="m-nav__link-text">
                                                        Payment History 
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    
                                </ul></br>
                                <div class="m-widget1 m-widget1--paddingless">
                                    <div class="m-widget1__item">
                                        <div class="row m-row--no-padding align-items-center">
                                            <div class="col">
                                                <h3 class="m-widget1__title">
                                                    Balance
                                                </h3>
                                            </div>
                                            <div class="col m--align-right">
                                                @foreach($payments as $payment)
                                                    <span class="m-widget1__number m--font-brand">
                                                        {{$payment->balance}}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                                    
                                    <li class="m-nav__item">
                                        <span class="m-nav__link">
                                            <div id="m_repeater_1">
											
										</div>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                                
                                
                    <div class="col-xl-9 col-lg-8">
                        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-tools">
                                    {{--  <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                                <i class="flaticon-share m--hide"></i>
                                                Update Profile
                                            </a>
                                        </li>
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                                Medical History
                                            </a>
                                        </li>

                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
                                                Payment History
                                            </a>
                                        </li>
                                    </ul>  --}}
                                </div>
                                
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="m_user_profile_tab_1">
                                    <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/update-patient/{{ $patient->id }}">
                                        {{ csrf_field() }}
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                <div class="alert m-alert m-alert--default" role="alert">
                                                    The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h3 class="m-form__section">
                                                        1. Personal Details
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    First Name
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" name="firstname"  type="text" value="{{ $patient->firstname }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Middle Name
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" name="middlename"  type="text" value="{{ $patient->middlename }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Last Name
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" name="lastname"  type="text" value="{{ $patient->lastname }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Sex
                                                </label>
                                                <div class="col-7">
                                                    <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="sex">
                                            
                                                            <option value='{{ $patient->doctor }}' selected="selected">
                                                                {{ $patient->sex }}
                                                            </option>

                                                            <optgroup label="Sex">
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                            </optgroup>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Payment Mode
                                                </label>
                                                <div class="col-7">
                                                    <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="payment_mode">
                                            
                                                        <option value='{{ $patient->payment_mode }}' selected="selected">
                                                            {{ $patient->payment_mode }}
                                                        </option>

                                                        <optgroup label="Insurance Providers">
                                                            <option value="Cash">
                                                                Cash
                                                            </option>
                                                            <option value="Jubilee">
                                                                Jubilee
                                                            </option>
                                                            <option value="UAP">
                                                                UAP
                                                            </option>
                                                            <option value="Madison">
                                                                Madison
                                                            </option>
                                                            <option value="AON">
                                                                AON
                                                            </option>
                                                            <option value="Britam">
                                                                Britam
                                                            </option>
                                                            <option value="Sanlam">
                                                                Sanlam
                                                            </option>
                                                            <option value="Pacific">
                                                                Pacific
                                                            </option>
                                                            <option value="Saham">
                                                                Saham
                                                            </option>
                                                            <option value="Resolution">
                                                                Resolution
                                                            </option>
                                                            <option value="AAR">
                                                                AAR
                                                            </option>
                                                            <option value="APA">
                                                                APA
                                                            </option>
                                                            <option value="Liaison">
                                                                Liaison
                                                            </option>
                                                            <option value="KCB">
                                                                KCB
                                                            </option>
                                                            <option value="Co-operative">
                                                                Co-operative
                                                            </option>
                                                            <option value="First Assurance">
                                                                First Assurance
                                                            </option>
                                                            <option value="Eagle Africa">
                                                                Eagle Africa
                                                            </option>
                                                            <option value="Sedwick">
                                                                Sedwick
                                                            </option>
										                </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Occupation
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" name="occupation"  type="text" value="{{ $patient->occupation }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Amount Allocated
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" name="amount_allocated"  type="text" value="{{ $patient->amount_allocated }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Date of Birth
                                                </label>
                                                <div class="col-7">
                                                    <input type="text" name="dob"  class="form-control" id="m_inputmask_1" value="{{ $patient->dob }}">
                                                    <span class="m-form__help">
                                                        Custom date format:
                                                        <code>
                                                            yyyy/mm/dd
                                                        </code>
                                                    </span>
                                            </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Phone No.
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" name="phone_number" type="text" value="{{ $patient->phone_number }}">
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Email
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" name="email"  type="text" value="{{ $patient->email }}">
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Preferred Doctor
                                                </label>
                                                <div class="col-7">
                                                    <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="doctor">
                                            
                                                        <option value='{{ $patient->doctor }}' selected="selected">
                                                            {{ $patient->doctor }}
                                                        </option>

                                                        <optgroup label="Doctors">
                                                            @foreach($users as $user)
                                                                @if($user->role == 'doctor')
                                                                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                                @endif
                                                            @endforeach
										                </optgroup>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Referred by
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" name="referred_by"  type="text" value="{{ $patient->referred_by }}">
                                                    
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Alcoholic
                                                </label>
                                                <div class="col-7">
                                                    <div class="m-checkbox-inline">
                                                        <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="alcoholic">
                                            
                                                            <option value='{{ $patient->alcoholic }}' selected="selected">
                                                                {{ $patient->alcoholic }}
                                                            </option>

                                                            <optgroup label="Alcoholic">
                                                                <option value="yes">Yes</option>
                                                                <option value="no">No</option>
                                                            </optgroup>
                                                        </select>
									                </div>

                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Smoker
                                                </label>
                                                <div class="col-7">
                                                    <div class="m-checkbox-inline">
                                                        
                                                        <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="smoker">
                                            
                                                            <option value='{{ $patient->smoker }}' selected="selected">
                                                                {{ $patient->smoker }}
                                                            </option>

                                                            <optgroup label="Smoker">
                                                                <option value="yes">Yes</option>
                                                                <option value="no">No</option>
                                                            </optgroup>
                                                        </select>

									                </div>

                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Allergic Reactions
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" name="allergic_reactions"  type="text" value="{{ $patient->allergic_reactions }}">

                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Disease History
                                                </label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="">
                                                            <div class="m-checkbox-inline">
                                                                <label class="">
                                                                    <strong>HAVE</strong> &nbsp;&nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="">
                                                                    <strong>HAD</strong>
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                            <div class="m-checkbox-inline">
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Have - Abnormal Bleeding">
                                                                    &nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Had - Abnormal Bleeding">
                                                                    &nbsp; Abnormal Bleeding
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                            <div class="m-checkbox-inline">
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Have - AIDS or HIV infection">
                                                                    &nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Had - AIDS or HIV infection">
                                                                    &nbsp; AIDS or HIV infection
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                            <div class="m-checkbox-inline">
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Have - Diabetes">
                                                                    &nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Had - Diabetes">
                                                                    &nbsp; Diabetes
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                            <div class="m-checkbox-inline">
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Have - Anemia">
                                                                    &nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Had - Anemia">
                                                                    &nbsp; Anemia
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                            <div class="m-checkbox-inline">
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Have - Ulcers">
                                                                    &nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Had - Ulcers">
                                                                    &nbsp; Ulcers
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                            <div class="m-checkbox-inline">
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Have - Athritis">
                                                                    &nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Had - Athritis">
                                                                    &nbsp; Athritis
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                            <div class="m-checkbox-inline">
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Have - Migraines">
                                                                    &nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Had - Migraines">
                                                                    &nbsp; Migraines
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                            <div class="m-checkbox-inline">
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Have - Persistent Dry mouth or lips">
                                                                    &nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Had - Persistent Dry mouth or lips">
                                                                    &nbsp; Persistent Dry mouth or lips
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                            <div class="m-checkbox-inline">
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Have - Eating Disorder">
                                                                    &nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Had - Eating Disorder">
                                                                    &nbsp; Eating Disorder
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                            <div class="m-checkbox-inline">
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Have - Respiratory Problems">
                                                                    &nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Had - Respiratory Problems">
                                                                    &nbsp; Respiratory Problems
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="">
                                                            <div class="m-checkbox-inline">
                                                                <label class="">
                                                                    <strong>HAVE</strong> &nbsp;&nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="">
                                                                    <strong>HAD</strong>
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                            <div class="m-checkbox-inline">
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Have - Mental Health Disorders">
                                                                    &nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Had - Mental Health Disorders">
                                                                    &nbsp; Mental Health Disorders
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                            <div class="m-checkbox-inline">
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Have - Neurological Disorders E.g Stroke">
                                                                    &nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Had - Neurological Disorders E.g Stroke">
                                                                    &nbsp; Neurological Disorders E.g Stroke
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                            <div class="m-checkbox-inline">
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Have - Rapid Weight Loss / Weight Gain">
                                                                    &nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Had - Rapid Weight Loss / Weight Gain">
                                                                    &nbsp; Rapid Weight Loss / Weight Gain
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                            <div class="m-checkbox-inline">
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Have - Kidney Diseases">
                                                                    &nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Had - Kidney Diseases">
                                                                    &nbsp; Kidney Diseases
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                            <div class="m-checkbox-inline">
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Have - Liver Diseases">
                                                                    &nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Had - Liver Diseases">
                                                                    &nbsp; Liver Diseases
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                            <div class="m-checkbox-inline">
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Have - Sexually Transmitted Diseases (STDs)">
                                                                    &nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Had - Sexually Transmitted Diseases (STDs)">
                                                                    &nbsp; STDs)
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                            <div class="m-checkbox-inline">
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Have - Epilepsy">
                                                                    &nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Had - Epilepsy">
                                                                    &nbsp; Epilepsy
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                            <div class="m-checkbox-inline">
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Have - Asthma">
                                                                    &nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Had - Asthma">
                                                                    &nbsp; Asthma
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                            <div class="m-checkbox-inline">
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Have - Cancer">
                                                                    &nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Had - Cancer">
                                                                    &nbsp; Cancer
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                            <div class="m-checkbox-inline">
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Have - Persistent Swollen Glands in Neck (Goiter)">
                                                                    &nbsp;
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-checkbox">
                                                                    <input type="checkbox" name="disease_history" value="Had - Persistent Swollen Glands in Neck (Goiter)">
                                                                    &nbsp; Persistent Swollen Glands in Neck (Goiter)
                                                                    <span></span>
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Cardiovascular Disease
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" name="cardiovascular_disease"  type="text" value="{{ $patient->cardiovascular_disease }}">

                                                </div>
                                            </div>


                                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h3 class="m-form__section">
                                                        2. Address & Emergency Contacts
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Address
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" name="postal_address"  type="text" value="{{ $patient->postal_address }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Emergency Contact Name
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" name="emergency_contact_name"  type="text" value="{{ $patient->emergency_contact_name }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Emergency Contact Phone Number
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" name="emergency_contact_phone_number"  type="text" value="{{ $patient->emergency_contact_phone_number }}">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">
                                                    Emergency Contact Relationship
                                                </label>
                                                <div class="col-7">
                                                    <input class="form-control m-input" name="emergency_contact_relationship"   type="text" value="{{ $patient->emergency_contact_relationship }}">
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="m-portlet__foot m-portlet__foot--fit">
                                            <div class="m-form__actions">
                                                <div class="row">
                                                    <div class="col-2"></div>
                                                    <div class="col-7">
                                                        <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                            Save changes
                                                        </button>
                                                        &nbsp;&nbsp;
                                                        <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane " id="m_user_profile_tab_2"><br>
                                    <div class="col-md-12">
                                <!--begin:: Widgets/Support Tickets -->
                                <div class=" ">
                                    <div class="m-portlet__body">
                                        <div class="m-widget3">
                                            <div class="m-widget3__item">
                                                <div class="m-widget3__header">
                                                    <div class="m-widget3__user-img">
                                                        <img class="m-widget3__img" src="../admin/assets/app/media/img/users/user1.jpg" alt="">
                                                    </div>
                                                    <div class="m-widget3__info">
                                                        <span class="m-widget3__username">
                                                            Dr 
                                                        </span>
                                                        <br>
                                                        <span class="m-widget3__time">
                                                            {{ $patient->created_at }}
                                                        </span>
                                                    </div>
                                                    <span class="m-widget3__status m--font-info">
                                                        Pending
                                                    </span>
                                                </div>
                                                <div class="m-widget3__body">
                                                    <p class="m-widget3__text">
                                                        Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end:: Widgets/Support Tickets -->
                            </div>
							    </div>





                                <div class="tab-pane " id="m_user_profile_tab_3">
                                    <div class="col-md-12">
                                        <!--begin:: Widgets/Sale Reports-->
                                        <div class="">
                                            <div class="m-portlet__head">
                                                <div class="m-portlet__head-caption">
                                                    <div class="m-portlet__head-title">
                                                        <h3 class="m-portlet__head-text">
                                                            Payment Reports
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="m-portlet__head-tools">
                                                    <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                                                        <li class="nav-item m-tabs__item">
                                                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget11_tab1_content" role="tab">
                                                                Last Month
                                                            </a>
                                                        </li>
                                                        <li class="nav-item m-tabs__item">
                                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget11_tab2_content" role="tab">
                                                                All Time
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="m-portlet__body">
                                                <!--Begin::Tab Content-->
                                                <div class="tab-content">
                                                    <!--begin::tab 1 content-->
                                                    <div class="tab-pane active" id="m_widget11_tab1_content">
                                                        <!--begin::Widget 11-->
                                                        <div class="m-widget11">
                                                            <div class="table-responsive">
                                                                <!--begin::Table-->
                                                                <table class="table">
                                                                    <!--begin::Thead-->
                                                                    <thead>
                                                                        <tr>
                                                                            <td class="m-widget11__label">
                                                                                #
                                                                            </td>
                                                                            <td class="m-widget11__app">
                                                                                Application
                                                                            </td>
                                                                            <td class="m-widget11__sales">
                                                                                Sales
                                                                            </td>
                                                                            <td class="m-widget11__price">
                                                                                Avg Price
                                                                            </td>
                                                                            <td class="m-widget11__total m--align-right">
                                                                                Total
                                                                            </td>
                                                                        </tr>
                                                                    </thead>
                                                                    <!--end::Thead-->
                                                                    <!--begin::Tbody-->
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <label class="m-checkbox m-checkbox--solid m-checkbox--single m-checkbox--brand">
                                                                                    <input type="checkbox">
                                                                                    <span></span>
                                                                                </label>
                                                                            </td>
                                                                            <td>
                                                                                <span class="m-widget11__title">
                                                                                    Vertex 2.0
                                                                                </span>
                                                                                <span class="m-widget11__sub">
                                                                                    Vertex To By Again
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                19,200
                                                                            </td>
                                                                            <td>
                                                                                $63
                                                                            </td>
                                                                            <td class="m--align-right m--font-brand">
                                                                                $14,740
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <!--end::Tbody-->
                                                                </table>
                                                                <!--end::Table-->
                                                            </div>
                                                            
                                                        </div>
                                                        <!--end::Widget 11-->
                                                    </div>
                                                    <!--end::tab 1 content-->
                                                    <!--begin::tab 2 content-->
                                                    
                                                    <!--end::tab 2 content-->
                                                    <!--begin::tab 3 content-->
                                                    <div class="tab-pane" id="m_widget11_tab3_content"></div>
                                                    <!--end::tab 3 content-->
                                                </div>
                                                <!--End::Tab Content-->
                                            </div>
                                            <div class="m-portlet__foot">
                                                
                                            </div>
                                        </div>
                                        <!--end:: Widgets/Sale Reports-->
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            @endforeach

            <!--End::Section-->
                    </div>
                </div>
            </div>
            <!-- end:: Body -->
        
@endsection

































