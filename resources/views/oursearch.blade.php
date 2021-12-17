@extends('layouts.app')

@section('content')

   <div class="container mt-5 my-5">
    <h2 class="text-center">Your Search Result !</h2>
     <a href="{{route('home')}}" class="btn btn-warning">Go Back</a>
    <hr>
       <div class="row">
         @if (!empty($ours_search))
         @foreach ($ours_search as $items)
         <div class="col-lg-3 mx-auto mb-4">
         <div class="card shadow p-4" style="width: 18rem;background: linear-gradient(to right, #ccc 0%, rgba(255, 255, 255, 0) 25%, rgba(255, 255, 255, 0) 75%, #ccc 100%);">
             <div class="card-body">
               <h5 class="card-title">{{$items->name.' '.$items->l_name}}</h5>
               <h6 class="card-subtitle mb-2 text-muted">{{$items->email}}</h6>
               <small class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. In possimus sequi eaque optio architecto officia ratione nam ex cupiditate officiis voluptatem, voluptatum id iste excepturi atque doloribus, beatae quidem numquam!</small>
               <p class="card-text uppercase"> Job Type: 
                  @if ($items->occupation == 'goverment_job')
                      Goverment Job
                  @elseif($items->occupation == 'private_job')
                      Private Job
                  @else
                   Bussiness
                  @endif
                
                </p>
               <p class="card-text uppercase"> Family: 
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
