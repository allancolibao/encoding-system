@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
                @if(isset($households))
                    @if($households->count() > 0)   
                    <div class="col-md-12">
                            <h1 class="h3 mb-2 text-gray-800">List of Household</h1>
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
                                <div class="table-responsive">
                                        <h5 class="m-0 font-weight-bold text-grey">No. of household : {{$count}}</h5><br>
                                        <div class="row" style="padding-left: 2vmin;">
                                            <div>
                                                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-circle"></i> Dietary household target</h6>
                                            </div>
                                            <div style="padding-left:2vmin;">
                                                <h6 class="m-0 font-weight-bold text-warning"><i class="fas fa-circle"></i> Not Dietary household target</h6>
                                            </div>
                                        </div>
                                        <br>
                                        <div>
                                            <button data-path="{{ route('other50', ['eacode'=> $eacode])}}" 
                                                    class="d-sm-inline-block btn  btn-warning shadow-sm open-window" 
                                                    role="button">
                                                    <i class="fas fa-plus"></i> Add other 50
                                            </button>
                                        </div>
                                        <br>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" auto-index>
                                            <thead>
                                                <tr>
                                                    <th>EAcode</th>
                                                    <th>Hcn</th>
                                                    <th>Shsn</th>
                                                    <th>Membership</th>
                                                    <th>Food Record</th>
                                                    <th>Food Recall</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach ($households as $household)
                                                <tr>
                                                    <td>{{$household->eacode}}</td>
                                                    <td>{{$household->hcn}}</td>
                                                    <td>{{$household->shsn}}</td>
                                                    <td>  
                                                        <a href="{{ route('membership', ['eacode'=>$household->eacode, 'hcn'=>$household->hcn, 'shsn'=>$household->shsn ])}}">
                                                            <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                                                <i class="fas fa-user"></i> Form 6.1
                                                            </button>
                                                        </a>

                                                    </td>
                                                    <td> 
                                                        <a href="{{ route('foodrecord', ['eacode'=>$household->eacode, 'hcn'=>$household->hcn, 'shsn'=>$household->shsn ])}}">
                                                                <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                                                    <i class="fas fa-home"></i> Form 6.3
                                                                </button>
                                                        </a>
                                                    </td>
                                                    <td>   
                                                        <a href="{{ route('foodrecall', ['eacode'=>$household->eacode, 'hcn'=>$household->hcn, 'shsn'=>$household->shsn ])}}">
                                                                <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                                                    <i class="far fa-address-card"></i> Form 7.2
                                                                </button>
                                                        </a>
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
                                    <h5 class="alert alert-warning">No household's to display</h5>
                                    <div>
                                        <button data-path="{{ route('other50', ['eacode'=> $eacode])}}" 
                                                class="d-sm-inline-block btn  btn-warning shadow-sm open-window" 
                                                role="button">
                                                <i class="fas fa-plus"></i> Add other 50
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif  
            </div>
        </div>             
    </div>
    <!-- Modal -->
    <div class="modal fade" id="open-record" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="h3 mb-2 text-grey-800">Form 1.1</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
                <div class="modal-body" id="get-record" style="overflow-x: scroll;">
                    {{-- Call insert_other_50 blade here --}}
                </div>
            </div>
        </div>
      </div>

@endsection