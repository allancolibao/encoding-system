@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
                @if(isset($memberships))
                    @if($memberships->count() > 0)   
                    <div class="col-md-12">
                            <h1 class="h3 mb-2 text-gray-800">Dietary Membership | Form 6.1</h1>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Total no. of members based on F11 : {{$count}}</h6>
                                <div class="pt-2">
                                    <a href="{{ route('household', ['eacode'=>$eacode])}}">
                                        <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                <i class="fas fa-arrow-left"></i> 
                                        </button>
                                    </a>
                                    <a href="{{ route('membership_view', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn ])}}">
                                        <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                             View & Edit 
                                        </button>
                                    </a>
                                 </div>
                            </div>
                            <div class="card-body">
                                @if(isset($f60))
                                    @if($f60->count() > 0)
                                        @foreach ($f60 as $value)
                                        <div class="table-responsive">
                                            <form class="update_form" id="update-form-60" method="post" action="{{action('StartEncodingController@updateF60', $value->id )}}">
                                                @csrf
                                                <input type="hidden" name="_method" value="PATCH" />
                                                <input type="text" class="form-control" name="eacode" id="eacode" value="{{$eacode}}" hidden/>
                                                <input type="text" class="form-control" name="hcn" id="hcn" value="{{$hcn}}" hidden/>
                                                <input type="text" class="form-control" name="shsn" id="shsn" value="{{$shsn}}" hidden/>
                                                <table class="col-md-12">
                                                    <thead>
                                                        <th>Reference date</th>
                                                        <th>Reference day</th>
                                                        <th>Meal Pattern</th>
                                                        <th>Presence of Pets</th>
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
                                                                    <input type="text" class="form-f60" name="meal_pattern" id="meal_pattern" placeholder="Meal pattern" value="{{$value->meal_pattern}}"/>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-f60" name="pets" id="pets" placeholder="Pets" value="{{$value->pets}}"/>
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
                                                                    <a class="btn btn-primary" href="{{ route('updateF60', $value->id) }}"
                                                                    onclick="event.preventDefault();
                                                                    document.getElementById('update-form-60').submit();">
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
                                            <form class="insert_form" id="insert-form-60" method="post" action="{{ action('StartEncodingController@insertF60') }}">
                                                @csrf
                                                <input type="text" class="form-control" name="eacode" id="eacode" value="{{$eacode}}" hidden/>
                                                <input type="text" class="form-control" name="hcn" id="hcn" value="{{$hcn}}" hidden/>
                                                <input type="text" class="form-control" name="shsn" id="shsn" value="{{$shsn}}" hidden/> 
                                                <table class="col-md-12">
                                                    <thead>
                                                        <th>Reference date</th>
                                                        <th>Reference day</th>
                                                        <th>Meal Pattern</th>
                                                        <th>Presence of Pets</th>
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
                                                                    <input type="text" class="form-f60" name="meal_pattern" id="meal_pattern" placeholder="Meal pattern" value=""/>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-f60" name="pets" id="pets" placeholder="Pets" value=""/>
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

                                <div class="pt-4"> </div>
                                <button data-path="{{ route('addVisitor', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn ])}}" 
                                        class="d-sm-inline-block btn  btn-primary shadow-sm open-window pull-right" 
                                        role="button">
                                         <i class="fas fa-plus-circle"></i> visitor
                                </button>
                                <div class="pt-2"> </div>
                                <div class="table-responsive">
                                        <table class="table table-bordered"  width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%;">Encode</th>
                                                    <th>Member no.</th>
                                                    <th>First name</th>
                                                    <th>Last name</th>
                                                    <th>Age</th>
                                                    <th>Sex</th>
                                                    <th>PSC</th>
                                                    <th>MP</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach ($memberships as $membership)
                                                <tr>
                                                    <td>  
                                                        <button data-path="{{ route('membership_encode', ['eacode'=>$membership->eacode, 'hcn'=>$membership->hcn, 'shsn'=>$membership->shsn, 'member_code'=>$membership->member_code, 'givenname'=>$membership->givenname, 'surname'=>$membership->surname, 'age'=>$membership->age, 'sex'=>$membership->sex, 'psc'=>$membership->psc, 'mp'=>$membership->mp ])}}" 
                                                            class="d-sm-inline-block btn  btn-primary shadow-sm open-window" 
                                                            role="button">
                                                            <i class="fas fa-keyboard"></i>
                                                        </button>
                                                    </td>
                                                    <td>{{$membership->member_code}}</td>
                                                    <td>{{$membership->givenname}}</td>
                                                    <td>{{$membership->surname}}</td>
                                                    <td>{{$membership->age}}</td>
                                                    <td>{{$membership->sex}}</td>
                                                    <td>{{$membership->psc}}</td>
                                                    <td>{{$membership->mp}}</td>
                                                </tr>
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
                                    <h6 class="m-0 font-weight-bold text-primary">List of members</h6>
                                    <div class="pt-2">
                                        <a href="{{ route('household', ['eacode'=>$eacode])}}">
                                            <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                <i class="fas fa-arrow-left"></i> 
                                            </button>
                                        </a>
                                </div>
                                <div class="card-body">
                                    <h5 class="alert alert-warning">No records to display</h5>
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
                <h1 class="h3 mb-2 text-grey-800"> Dietary Membership | Form 6.1</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
                <div class="modal-body" id="get-record" style="overflow-x: scroll;">
                    {{-- Call foorecord_edit blade here --}}
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
                        <a class="btn btn-primary" href="{{ route('insertF60') }}"
                        onclick="event.preventDefault();
                        document.getElementById('insert-form-60').submit();">
                        Proceed
                        </a>
                </div>
            </div>
        </div>
    </div>


@endsection