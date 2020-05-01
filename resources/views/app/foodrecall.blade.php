@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
                @if(isset($memberships))
                    @if($memberships->count() > 0)   
                    <div class="col-md-12">
                            <h1 class="h3 mb-2 text-gray-800">Food Recall | Form 7.2</h1>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">No. of Members : {{$count}}</h6>
                                <div class="pt-2">
                                    <a href="{{ route('household', ['eacode'=>$eacode])}}">
                                        <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                <i class="fas fa-arrow-left"></i> 
                                        </button>
                                    </a>
                                 </div>
                            </div>
                            <div class="card-body">
                                @include('inc.messages')
                                <div class="table-responsive">
                                        <table class="table table-bordered"  width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%;">ENCODE</th>
                                                    <th>MEMBER NO.</th>
                                                    <th>FIRST NAME</th>
                                                    <th>LAST NAME</th>
                                                    <th>AGE</th>
                                                    <th>SEX</th>
                                                    <th>PSC</th>
                                                    <th>Interview Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach ($memberships as $membership)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('foodrecall_encode', ['eacode'=>$membership->eacode, 'hcn'=>$membership->hcn, 'shsn'=>$membership->shsn, 'member_code'=>$membership->member_code, 'givenname'=>$membership->givenname, 'surname'=>$membership->surname, 'age'=>$membership->age, 'sex'=>$membership->sex, 'psc'=>$membership->psc ])}}">
                                                            <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                                    <i class="fas fa-keyboard"></i>
                                                            </button>
                                                        </a>   
                                                    </td>
                                                    <td>{{$membership->member_code}}</td>
                                                    <td>{{$membership->givenname}}</td>
                                                    <td>{{$membership->surname}}</td>
                                                    <td>{{$membership->age}}</td>
                                                    <td>{{$membership->sex}}</td>
                                                    <td>{{$membership->psc}}</td>
                                                    <td>{{$membership->interview_status}}</td>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Food Recall | Form 7.2</h6>
                                    <div class="pt-2">
                                        <a href="{{ route('household', ['eacode'=>$eacode])}}">
                                            <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                <i class="fas fa-arrow-left"></i> 
                                            </button>
                                        </a>
                                </div>
                                <div class="card-body">
                                    <h5 class="alert alert-warning">No records to display, Please encode form 6.1</h5>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif  
            </div>
        </div>             
    </div>

@endsection