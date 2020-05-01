@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
                @if(isset($areas))
                    @if($areas->count() > 0)   
                    <div class="col-md-12">
                            <h1 class="h3 mb-2 text-gray-800">List of Areas</h1>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Please enter the eacode [ 4-12 digits required ], Thank you</h6>

                                @include('inc.messages')
                            <br>   
                              <form method="POST" action="{{ action('StartEncodingController@searchArea') }}" role="search">
                                @csrf
                                  <div class="input-group">
                                    <input id="key" type="text" name="key" class="form-control btn-primary bg-light text-dark border-0 small" placeholder="Enter eacode..." aria-label="key" aria-describedby="basic-addon2"  required autofocus>
                                    <button type="submit" name='submit' value='search' class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-search fa-sm text-white-50"></i>Search</button>
                                  </div>
                              </form>
                            <br>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" auto-index>
                                            <thead>
                                                <tr>
                                                    <th>EAcode</th>
                                                    <th>Areaname</th>
                                                    <th>Encode</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($areas as $area)
                                                <tr>
                                                    <td>{{$area->eacode}}</td>
                                                    <td>{{$area->areaname}}</td>
                                                    <td>  
                                                        <a href="{{ route('household', ['eacode'=>$area->eacode ])}}">
                                                            <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                                                    <i class="fas fa-home"></i> Household listings
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
                        @else
                        <div class="container-fluid">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Please enter the eacode [ 4-12 digits required ], Thank you</h6>
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
                                    <div class="card-body">
                                    <h5 class="alert alert-warning">EACODE does not exist</h5>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif  
            </div>
        </div>             
    </div>

@endsection
