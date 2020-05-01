@extends('layouts.main')

@section('content') 
<div class="content">
        <div class="container-fluid">
            <div class="row">
                @if(isset($recalls))
                    @if($recalls->count() > 0)   
                    <div class="col-md-12">
                            <h1 class="h3 mb-2 text-gray-800">{{$membercode}} {{$givenname}} {{$surname}} | {{$age}}</h1>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-primary">Day: {{$recday}} | No. of encoded lines : {{$count}}</h5>
                                <div class="pt-2">
                                    <a href="{{ route('foodrecall_encode', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn, 'member_code'=>$membercode, 'givenname'=>$givenname, 'surname'=>$surname, 'age'=>$age, 'sex'=>$sex, 'psc'=>$psc])}}">
                                        <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                            <i class="fas fa-arrow-left"></i>  
                                        </button>
                                    </a>
                                    <a href="{{ route('foodrecall_day', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn, 'member_code'=>$membercode, 'givenname'=>$givenname, 'surname'=>$surname, 'age'=>$age, 'sex'=>$sex, 'psc'=>$psc, 'recday'=>$recday] )}}">
                                        <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                            ENCODE
                                        </button>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="card-body">
                                @include('inc.messages')

                                @if(isset($f70))
                                            @if($f70->count() > 0)
                                                @foreach ($f70 as $value)
                                                <div class="table-responsive">
                                                        <form class="update_form" id="update-form" method="post" action="{{action('StartEncodingController@updateF70', $value->id )}}">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="PATCH" />
                                                            <input type="text" class="form-control" name="eacode" id="eacode" value="{{$eacode}}" hidden/>
                                                            <input type="text" class="form-control" name="hcn" id="hcn" value="{{$hcn}}" hidden/>
                                                            <input type="text" class="form-control" name="shsn" id="shsn" value="{{$shsn}}" hidden/> 
                                                            <input type="text" class="form-control" name="member_code" id="member_code" value="{{$membercode}}" hidden/> 
                                                            <input type="text" class="form-control" name="recday" id="recday" value="{{$recday}}" hidden/> 
                                                            <table class="col-md-12">
                                                                <thead>
                                                                    <th>Reference date</th>
                                                                    <th>Reference day</th>
                                                                    <th>Interview Status</th>
                                                                    <th></th>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="col-md-12">
                                                                                <input type="date" class="form-f60-date"  name="refdate" id="refdate" placeholder="Ref date" value="{{$value->refdate}}"/>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-md-12">
                                                                                    <select type="text" class="form-f60-dropdown" name="refday" id="refday" placeholder="Ref day" value="{{$value->refday}}">
                                                                                        <option value='' {{$value->refday == ''  ? 'selected' : ''}} >Ref day</option>
                                                                                        <option value='1'{{$value->refday == 1  ? 'selected' : ''}} >1 - Sunday</option>
                                                                                        <option value='2'{{$value->refday == 2  ? 'selected' : ''}} >2 - Monday</option>
                                                                                        <option value='3'{{$value->refday == 3  ? 'selected' : ''}} >3 - Tuesday</option>
                                                                                        <option value='4'{{$value->refday == 4  ? 'selected' : ''}} >4 - Wednesday</option>
                                                                                        <option value='5'{{$value->refday == 5  ? 'selected' : ''}} >5 - Thursday</option>
                                                                                        <option value='6'{{$value->refday == 6  ? 'selected' : ''}} >6 - Friday</option>
                                                                                        <option value='7'{{$value->refday == 7  ? 'selected' : ''}} >7 - Saturday</option>
                                                                                    </select>   
                                                                                </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-md-12">
                                                                                <select type="text" class="form-f60-dropdown" name="interview_status" id="interview_status" placeholder="interview_status" value="{{$value->interview_status}}">
                                                                                        <option value=""  {{$value->interview_status == ''  ? 'selected' : ''}}>Please select</option>
                                                                                        <option value="1" {{$value->interview_status == 1  ? 'selected' : ''}} >1 - Completed</option>
                                                                                        <option value="2" {{$value->interview_status == 2  ? 'selected' : ''}} >2 - Partly Completed</option>
                                                                                        <option value="3" {{$value->interview_status == 3  ? 'selected' : ''}} >3 - Respondent Incapacitated</option>
                                                                                        <option value="4" {{$value->interview_status == 4  ? 'selected' : ''}} >4 - Refused</option>
                                                                                        <option value="5" {{$value->interview_status == 5  ? 'selected' : ''}} >5 - Not at Home (Away during the survey period)</option>
                                                                                        <option value="6" {{$value->interview_status == 6  ? 'selected' : ''}} >6 - Away from an Extended Period of time working/Schooling (LOCAL)</option>
                                                                                        <option value="7" {{$value->interview_status == 7  ? 'selected' : ''}} >7 - Away from an Extended Period of time working/Schooling (ABROAD)</option>
                                                                                        <option value="11"{{$value->interview_status == 11  ? 'selected' : ''}}>11 - Others </option>
                                                                                </select>   
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            {{-- Launch the Confirmation modal --}}
                                                                            <a href="#" data-toggle="modal" data-target="#updateModal">
                                                                                <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                                                    <i class="fas fa-angle-double-right"></i>
                                                                                </button>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </form>

                                                         {{-- Confirmation Modal --}}
                                                        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                        </div>
                                                                        <div class="modal-body">Select "Proceed" below if you want to update the data.</div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                                <a class="btn btn-primary" href="{{ route('updateF70', $value->id) }}"
                                                                                onclick="event.preventDefault();
                                                                                document.getElementById('update-form').submit();">
                                                                                Proceed
                                                                                </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                @endforeach
                                            @else
                                        <div class="table-responsive">
                                                <form class="insert_form" id="insert-form" method="post" action="{{ action('StartEncodingController@insertF70') }}">
                                                    @csrf
                                                    <input type="text" class="form-control" name="eacode" id="eacode" value="{{$eacode}}" hidden/>
                                                    <input type="text" class="form-control" name="hcn" id="hcn" value="{{$hcn}}" hidden/>
                                                    <input type="text" class="form-control" name="shsn" id="shsn" value="{{$shsn}}" hidden/> 
                                                    <input type="text" class="form-control" name="member_code" id="member_code" value="{{$membercode}}" hidden/> 
                                                    <input type="text" class="form-control" name="recday" id="recday" value="{{$recday}}" hidden/> 
                                                    <table class="col-md-12">
                                                        <thead>
                                                            <th>Reference date</th>
                                                            <th>Reference day</th>
                                                            <th>Interview Status</th>
                                                            <th></th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="col-md-12">
                                                                        <input type="date" class="form-f60-date"  name="refdate" id="refdate" placeholder="Ref date" value=""/>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="col-md-12">
                                                                            <select type="text" class="form-f60-dropdown" name="refday" id="refday" placeholder="Ref day" value="">
                                                                                <option value='' >Ref day</option>
                                                                                <option value='1' >1 - Sunday</option>
                                                                                <option value='2' >2 - Monday</option>
                                                                                <option value='3' >3 - Tuesday</option>
                                                                                <option value='4' >4 - Wednesday</option>
                                                                                <option value='5' >5 - Thursday</option>
                                                                                <option value='6' >6 - Friday</option>
                                                                                <option value='7' >7 - Saturday</option>
                                                                            </select>   
                                                                        </div>
                                                                </td>
                                                                <td>
                                                                    <div class="col-md-12">
                                                                        <select type="text" class="form-f60-dropdown" name="interview_status" id="interview_status" placeholder="interview_status" value="">
                                                                            <option value="">Please select</option>
                                                                            <option value="1"  >1 - Completed</option>
                                                                            <option value="2"  >2 - Partly Completed</option>
                                                                            <option value="3"  >3 - Respondent Incapacitated</option>
                                                                            <option value="4"  >4 - Refused</option>
                                                                            <option value="5"  >5 - Not at Home (Away during the survey period)</option>
                                                                            <option value="6"  >6 - Away from an Extended Period of time working/Schooling (LOCAL)</option>
                                                                            <option value="7"  >7 - Away from an Extended Period of time working/Schooling (ABROAD)</option>
                                                                            <option value="11" >11 - Others </option>
                                                                        </select>   
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    {{-- Launch the Confirmation modal --}}
                                                                    <a href="#" data-toggle="modal" data-target="#saveModal">
                                                                        <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                                            <i class="fas fa-angle-double-right"></i>
                                                                        </button>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </div>
                                            @endif
                                        @endif
                                    <div class="pt-5"></div>
                                <div class="table-responsive table-responsive-foodrecord">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                   <th>EDIT</th>
                                                    <th>DELETE</th>
                                                    <th>LINE NO</th>
                                                    <th>FOOD ITEM</th>
                                                    <th>DESC</th>
                                                    <th>BRAND</th>
                                                    <th>MAIN INGREDIENT</th>
                                                    <th>BRAND CODE</th>
                                                    <th>FVS</th>
                                                    <th>FF</th>
                                                    <th>VITA</th>
                                                    <th>IRON</th>
                                                    <th>OTH</th>
                                                    <th>MEALCD</th>
                                                    <th >RFCODE</th>
                                                    <th>FIC</th> 
                                                    <th>FOOD WGT</th>
                                                    <th>RCC</th>
                                                    <th>CMC</th>
                                                    <th>SUP </th>
                                                    <th>SRC </th>
                                                    <th>CPC</th>
                                                    <th>UNIT COST</th>
                                                    <th>UNIT WGT</th>
                                                    <th>MEAS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($recalls as $recall)
                                                <tr>
                                                    <td>  
                                                        <button data-path="{{ route('foodrecall_edit', ['eacode'=>$recall->eacode, 'hcn'=>$recall->hcn, 'shsn'=>$recall->shsn, 'member_code'=>$membercode, 'givenname'=>$givenname, 'surname'=>$surname, 'age'=>$age, 'sex'=>$sex, 'psc'=>$psc, 'recday'=>$recday, 'id'=>$recall->id, 'edit' ])}}" 
                                                            class="d-sm-inline-block btn  btn-primary shadow-sm open-window" 
                                                            role="button">
                                                            <i class="fas fa-pen"></i>
                                                        </button>
                                                    </td>
                                                    <td>  
                                                         <a href="#" data-toggle="modal" data-target="#deleteModal">
                                                            <button type="submit" class="d-sm-inline-block btn  btn-danger shadow-sm">
                                                                <i class="fas fa-trash"></i>
                                                           </button>
                                                        </a>
                                                    </td>
                                                    <td>{{ $recall->LINENO}}</td>
                                                    <td>{{ $recall->FOOD_ITEM}}</td>
                                                    <td>{{ $recall->FOODDESC}}</td>
                                                    <td>{{ $recall->FOODBRND}}</td>
                                                    <td>{{ $recall->FOODMAINING}}</td>
                                                    <td>{{ $recall->FOODBRNDCD}}</td>
                                                    <td>{{ $recall->FVS}}</td>
                                                    <td>{{ $recall->ISFORTIFIED}}</td>
                                                    <td>{{ $recall->VITA}}</td>
                                                    <td>{{ $recall->IRON}}</td>
                                                    <td>{{ $recall->OTHF}}</td>
                                                    <td>{{ $recall->MEALCD}}</td>
                                                    <td>{{ $recall->RFCODE}}</td>
                                                    <td>{{ $recall->FOODCODE}}</td>
                                                    <td>{{ $recall->FOODWEIGHT}}</td>
                                                    <td>{{ $recall->RCC}}</td>
                                                    <td>{{ $recall->CMC}}</td>
                                                    <td>{{ $recall->SUPCODE}}</td>
                                                    <td>{{ $recall->SRCCODE}}</td>
                                                    <td>{{ $recall->CPC}}</td>
                                                    <td>{{ $recall->UNITCOST}}</td>
                                                    <td>{{ $recall->UNITWGT}}</td>
                                                    <td>{{ $recall->UNITMEAS}}</td>
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
                                    <h6 class="m-0 font-weight-bold text-primary">{{$membercode}} {{$givenname}} {{$surname}} | {{$age}} </h6>
                                    <div class="pt-2">
                                        <a href="{{ route('foodrecall_day', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn, 'member_code'=>$membercode, 'givenname'=>$givenname, 'surname'=>$surname, 'age'=>$age, 'sex'=>$sex, 'psc'=>$psc, 'recday'=>$recday] )}}">
                                            <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                <i class="fas fa-arrow-left"></i> 
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="alert alert-warning">No records to display, Please encode form 7.2</h5>
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
                <h1 class="h3 mb-2 text-grey-800">Updating Food Recall | Form 7.2</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
                <div class="modal-body" id="get-record" style="overflow-x: scroll;">
                    {{-- Call foorecall_edit blade here --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Confirmation Modal --}}
    <div class="modal fade" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                    </div>
                    <div class="modal-body">Select "Proceed" below if you want to submit data.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="{{ route('insertF70') }}"
                            onclick="event.preventDefault();
                            document.getElementById('insert-form').submit();">
                            Proceed
                            </a>
                    </div>
                </div>
            </div>
    </div>
@endsection




