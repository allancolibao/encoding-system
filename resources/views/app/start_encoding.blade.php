@extends('layouts.main')

@section('content')

        <!-- Search Eacode -->
        <div class="container-fluid" style="padding-bottom:59vmin;">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="text-center h3 mb-0 text-gray-800 ">ENCODE DATA</h1>
            </div>
               
              
            <!-- Content Row -->
            <div class="row">
              
              <!-- Upload Membership Information -->
              <div class="col-xl-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Please enter the eacode [ 4-12 digits required ], Thank you</h6>
                    </div>
                  
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            @include('inc.messages')
                            <br>   
                              <form method="POST" action="{{ action('StartEncodingController@searchArea') }}" role="search">
                                @csrf
                                  <div class="input-group">
                                    <input id="key" type="text" name="key" class="form-control btn-primary bg-light text-dark border-0 small" placeholder="Enter eacode..." aria-label="key" aria-describedby="basic-addon2" autofocus required>
                                    <button type="submit" name='submit' value='search' class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-search fa-sm text-white-50"></i>Search</button>
                                  </div>
                              </form>
                            <br>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
  
          </div>
  
        </div>
        <!-- EndSearch Eacode -->
@endsection


