@extends('layouts.main')

@section('content')
        <!-- Upload Membership Content -->
        <div class="container-fluid" style="padding-bottom:59vmin;">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="text-center h3 mb-0 text-gray-800 ">UPLOAD MEMBERSHIP INFORMATION</h1>
          </div>
             
            
          <!-- Content Row -->
          <div class="row">
            
            <!-- Upload Membership Information -->
            <div class="col-xl-12 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Please attach csv file</h6>
                  </div>
                
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          @include('inc.messages')   
                        <form method="POST" action="{{ route('import_parse') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                              <input id="csv_file" type="file" name="csv_file" class="form-control btn-primary bg-light text-dark border-0 small " aria-label="Search" aria-describedby="basic-addon2" enctype="multipart/form-data" required>
                              <button type="submit" name='submit' value='Import' class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-search fa-sm text-white-50"></i> View CSV</button>
                            </div>
                            <div style="padding-top:2vmin;" class="checkbox">
                                <input type="checkbox" name="header" checked> File contains header row?
                            </div>
                        </form>
                      </div>
                  </div>
                </div>
              </div>
            </div>

        </div>

      </div>
      <!-- End Upload Membership Content -->
@endsection


