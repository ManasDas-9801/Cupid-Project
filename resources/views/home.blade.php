@extends('layouts.app')

@section('content')
@if (Session::has('message'))
<p class="alert alert-success">{{Session('message')}}</p>
 @endif
    <div class="container-fluid" style="background-color: #0093E9;
    background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
    height:400px;">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="col-md-12 mt-4">
                    <h2 class="text-center text-light mt-5">Welcome Back !</h2>
                    <p class="text-center text-light">We Choose People According To Your Choice </p>
                </div>
                <div class="card mt-4">
                    <div class="card-header">Choose Your Prefrences</div>

                    <div class="card-body">
                        <form action="{{route('prefrence')}}" method="get">
                           
                            <div class="row">
                                <div class="col-sm-3 mb-2">
                                    <select class="form-select" name="gender">
                                        <option selected>Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 mb-2">
                                    <select class="form-select" name="family_type">
                                        <option selected>Family Type</option>
                                        <option value="joint">Joint Family</option>
                                        <option value="nuclear">Nuclear Family</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 mb-2">
                                    <select class="form-select" name="mangalik">
                                        <option selected>Mangalik</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                        <option value="both">Both</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="submit" name="send" class="form-control btn btn-outline-success"
                                        value="Search">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
   <div class="container mt-5 my-5">
    <h2 class="text-center">Our Mathing Profiles !</h2>
    <hr>
       <div class="row mb-4">
         @if (!empty($our_picks))
         @foreach ($our_picks as $items)
         <div class="col-lg-3 mx-auto mb-4" style="
         ">
         <div class="card shadow p-4 mx-auto" style="width: 18rem; background: linear-gradient(to right, #ccc 0%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 75%, #ccc 100%); ">
             <div class="card-body">
               <h5 class="card-title">{{$items->name.' '.$items->l_name}}</h5>
               <h6 class="card-subtitle mb-2 text-muted">{{$items->email}}</h6>
               <small class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. In possimus sequi eaque optio architecto officia ratione nam ex cupiditate officiis voluptatem, voluptatum id iste excepturi atque doloribus, beatae quidem numquam!</small>
               <p class="card-text mt-2"> Job Type: 
                  @if ($items->occupation == 'goverment_job')
                      Goverment Job
                  @elseif($items->occupation == 'private_job')
                      Private Job
                  @else
                   Bussiness
                  @endif
                
                </p>
               <p class="card-text uppercase"> Family Staus: 
                  @if ($items->family_type == 'joint')
                      Joint Family
                  @else
                    Nuclear Family
                  @endif
                
                </p>
                <p class="card-text uppercase"> Mangalik: 
                    @if ($items->mangalik == 'yes')
                        Yes
                    @elseif($items->mangalik == 'no')
                       No
                    @else
                      Both
                    @endif
                  
                  </p>
               
             </div>
           </div>
        </div>
        @endforeach
         @else
          <p class="text-danger">Soory We Donnot Have Any Recomodation</p> 
         @endif
       </div>
   </div>

@endsection
