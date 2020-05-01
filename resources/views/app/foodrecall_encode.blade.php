@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row"> 
                    <div class="col-md-12">
                        @if($age >=15 )
                            <h1 class="h3 mb-2 text-gray-800">Booklet 10C</h1>
                        @elseif($age > 3) 
                            <h1 class="h3 mb-2 text-gray-800">Booklet 10B</h1>
                        @else
                            <h1 class="h3 mb-2 text-gray-800">Booklet 10A</h1>
                        @endif
                     
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Name: {{$givenname}} {{$surname}} | Age: {{$age}}</h6>
                                <div class="pt-2">
                                        <a href="{{ route('foodrecall', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn ])}}">
                                            <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                    MEMBERS
                                            </button>
                                        </a>
                                </div>
                            </div>
                            <div class="card-body">
                                    <div class="table-responsive">
                                            <table class="table table-bordered"  width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width:33.3%">DAY 1</th>
                                                        <th class="text-center" style="width:33.3%">DAY 2</th>
                                                        <th class="text-center" style="width:33.3%">FORM 7.4</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                       <td class="text-center">
                                                           <div class="pt-4">
                                                                <a href="{{ route('foodrecall_day', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn, 'member_code'=>$membercode, 'givenname'=>$givenname, 'surname'=>$surname, 'age'=>$age, 'sex'=>$sex, 'psc'=>$psc, '1'  ])}}">
                                                                    <button type="submit" class="col-md-8 btn btn-primary shadow-sm">
                                                                        ENCODE
                                                                    </button>
                                                                </a>
                                                            </div>
                                                            <div class="pt-4">
                                                                <a href="{{ route('foodrecall_view', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn, 'member_code'=>$membercode, 'givenname'=>$givenname, 'surname'=>$surname, 'age'=>$age, 'sex'=>$sex, 'psc'=>$psc, '1' ])}}">
                                                                    <button type="submit" class="col-md-8 d-sm-inline-block btn  btn-primary shadow-sm">
                                                                        VIEW & EDIT 
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        </td>
                                                       <td class="text-center">
                                                            <div class="pt-4">
                                                                <a href="{{ route('foodrecall_day', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn, 'member_code'=>$membercode, 'givenname'=>$givenname, 'surname'=>$surname, 'age'=>$age, 'sex'=>$sex, 'psc'=>$psc, '2'  ])}}">
                                                                    <button type="submit" class="col-md-8 btn btn-primary shadow-sm">
                                                                        ENCODE
                                                                    </button>
                                                                </a>
                                                            </div>
                                                            <div class="pt-4">
                                                                <a href="{{ route('foodrecall_view', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn, 'member_code'=>$membercode, 'givenname'=>$givenname, 'surname'=>$surname, 'age'=>$age, 'sex'=>$sex, 'psc'=>$psc, '2' ])}}">
                                                                    <button type="submit" class="col-md-8 d-sm-inline-block btn  btn-primary shadow-sm">
                                                                        VIEW & EDIT
                                                                    </button>
                                                                </a>
                                                            </div>
                                                       </td>
                                                       <td class="text-center">
                                                            @if($age >= 15) 
                                                                <div class="pt-4">
                                                                    <a href="{{ route('foodrecall_f74', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn, 'member_code'=>$membercode, 'givenname'=>$givenname, 'surname'=>$surname, 'age'=>$age, 'sex'=>$sex, 'psc'=>$psc  ])}}">
                                                                        <button type="submit" class="col-md-8 btn btn-primary shadow-sm">
                                                                            OPEN
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            @else 
                                                                <div class=" pt-4">
                                                                    <div class="col-md-8 d-sm-inline-block  alert-warning shadow-sm" style="padding:0.1vmin; border-radius:0.8vmin;">
                                                                        <h4 style="padding-top:0.3vmin;">15 years old and above</h4>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                       </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                            </div>
                        </div>
                </div>
        </div>             
</div>

@endsection