<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  

</head>

<body>
    <nav class="navbar navbar-expand-md shadow-sm sticky-top" style="background-color: #273c75">
        <div class="container">
            <a class="navbar-brand text-light" href="{{ url('/admin') }}">
                Admin Pannel {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item text-light">
                        <a class="nav-link text-light" href="{{ url('/home') }}">Home</a>
                    </li>
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name . ' ' . Auth::user()->l_name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="conatiner mt-2">
        <div class="row">
            <div class="col-lg-11 mx-auto">
              <div class="card">
                <div class="card-header">
                   <h2 > User's Details</h2>
                </div>
                 <div class="col-lg-3 ms-auto p-3">
                     {{-- <label for="">Search Here:</label> --}}
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search Here by Name ,Occupation......">
                 </div>
                <div class="card-body">
                    <table class="table table-bordered shadow" style="width: 100%" id="chapter">
                        <thead>
                            <tr>
                                <th scope="col">S.No.#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">D.O.B</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Annual Income</th>
                                <th scope="col">Occupation</th>
                                <th scope="col">Family Type</th>
                                <th scope="col">Mangalik</th>
                                <th scope="col">Is Admin</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($all_users as $user)

                                <tr id="tr">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name . ' ' . $user->l_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->dob }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td> Rs: {{ $user->anual_income }}</td>
                                    <td>{{ $user->occupation }}</td>
                                    <td>{{ $user->family_type }} Family</td>
                                    <td>{{ $user->mangalik }}</td>
                                    <td>
                                        @if ($user->is_Admin == '1')
                                            <span class="text-danger">Admin</span>
                                        @else
                                            User
                                        @endif
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){  
      $('#search').keyup(function(){  
           search_table($(this).val());  
      });  
      function search_table(value){  
           $('#chapter #tr').each(function(){  
                var found = 'false';  
                $(this).each(function(){  
                     if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                     {  
                          found = 'true';  
                     }  
                });  
                if(found == 'true')  
                {  
                     $(this).show(); 
                     $('#no').hide(); 
                     $('#head').show(); 
                }  
                else  
                {  
                    //  $('#no').show();
                     $(this).hide();  
                }  
           });  
      }  
 });
</script>
</body>

</html>


