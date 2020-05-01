@extends('layouts.main')

@section('content')

        <!-- Search Eacode -->
        <div class="container-fluid" style="padding-bottom:59vmin;">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="text-center h3 mb-0 text-gray-800 ">DATA TRANSMISSION</h1>
            </div>
               
              
            <!-- Content Row -->
            <div class="row">
              
              <!-- Upload Membership Information -->
              <div class="col-xl-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Please make sure you have internet connection, Thank you!</h6>
                        <a class="text-primary" href="{{ route('backup')}}" role="button" aria-haspopup="true" aria-expanded="false">
                            <button class="btn btn-sm btn-warning shadow-sm">
                            <i class="fas fa-download fa-fw"></i>Quick Backup
                            </button>
                        </a>
                    </div>
                  <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-bordered" id="transTables" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>EACODE</th>
                                        <th>AREANAME</th>
                                        <th>TRANSMIT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($areas as $area)
                                    <tr>
                                        <td>{{$area->eacode}}</td>
                                        <td>{{$area->areaname}}</td>
                                        <td>  
                                            <a href="{{ route('transmission', ['eacode'=>$area->eacode ])}}">
                                                <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm send">
                                                         <i class="fas fa-plane"></i> Send Data
                                                </button>
                                            </a>
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
        </div>

        {{-- Loading Spinner --}}
        <div id="loading" class="overlay" style="display:none">
          <div class="overlay__inner">
              <div class="overlay__content">
                  <span class="spinner"></span>
              </div>
          </div>
      </div>
@endsection


