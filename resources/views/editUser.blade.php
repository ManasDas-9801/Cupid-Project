@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Your Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('save.profile') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user_profile->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="l_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="l_name" type="text" class="form-control " name="l_name"  value="{{ $user_profile->l_name}}" required autocomplete="l_name" autofocus>

                                @error('l_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user_profile->email}}" readonly required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                              <div class="col-md-6">
                                  
                                  @if ($user_profile->gender == 'female')
                                      <input type="radio" name="gender" id="gender" value="male" > 
                                      <label for="">Male</label>
                                            
                                   <input type="radio" name="gender" id="gender" value="female" checked>
                                   <label for="">Female</label>
                                  @else
                                  <input type="radio" name="gender" id="gender" value="male" checked > 
                                  <label for="">Male</label>
                                        
                                   <input type="radio" name="gender" id="gender" value="female">
                                   <label for="">Female</label>
                                  @endif
                                
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="anual_income" class="col-md-4 col-form-label text-md-right">{{ __('Anual Income') }}</label>

                             <div class="col-md-6">
                                <input id="anual_income" type="number" class="form-control " name="anual_income" value="{{ $user_profile->anual_income}}" required  autofocus>

                             </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Occupation') }}</label>
                            {{-- {{$user_profile->occupation}} --}}
                            <div class="col-md-6">
                                <select class="form-select" name="occupation">
                                   
                                    @if($user_profile->occupation === 'private_job')
                                        <option selected value="private_job">Private Job</option>
                                        <option value="goverment_job">Goverment Job</option>
                                        <option value="bussiness">Bussiness</option>
                                    @elseif($user_profile->occupation === 'goverment_job')
                                        <option value="private_job">Private Job</option>
                                        <option selected value="goverment_job">Goverment Job</option>
                                        <option value="bussiness">Bussiness</option>
                                    @else
                                    <option value="private_job">Private Job</option>
                                    <option value="goverment_job">Goverment Job</option>
                                    <option checked value="bussiness">Bussiness</option>
                                    @endif
                                     
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Family Type') }}</label>

                            <div class="col-md-6">
                                <select class="form-select" name="family_type">
                                    <option value="joint">Joint Family</option>
                                    <option value="nuclear">Nucelar Family</option>
                                    
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Mangalik') }}</label>

                            <div class="col-md-6">
                                <select class="form-select" name="mangalik">
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                    <option value="both">Both</option>
                                   
                                </select>

                            </div>
                        </div>
                        <input type="submit" value="Update Your Profile" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
