@extends('layouts.main')

@section('content') 
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <h1 class="h3 mb-2 text-gray-800">{{$membercode}} {{$givenname}} {{$surname}} | {{$age}} </h1>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h3 class="m-0 font-weight-bold text-primary">Day: {{$recday}}</h3>
                                    <div class="pt-2">
                                         <a href="{{ route('foodrecall_encode', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn, 'member_code'=>$membercode, 'givenname'=>$givenname, 'surname'=>$surname, 'age'=>$age, 'sex'=>$sex, 'psc'=>$psc])}}">
                                            <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                <i class="fas fa-arrow-left"></i>   
                                            </button>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#viewAndEdit">
                                            <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                VIEW & EDIT 
                                            </button>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        @include('inc.messages')
                                        @if(isset($f70))
                                            @if($f70->count() > 0)
                                                @foreach ($f70 as $value)
                                                <div class="table-responsive">
                                                        <form class="update_form" id="update-form-70" method="post" action="{{action('StartEncodingController@updateF70', $value->id )}}">
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
                                                                                document.getElementById('update-form-70').submit();">
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
                                                <form class="insert_form" id="insert-form-70" method="post" action="{{ action('StartEncodingController@insertF70') }}">
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
                                                <div id="message"></div>
                                            <form id="insert-form72" method="POST" action="{{ action('StartEncodingController@insertRecall') }}" accept-charset="UTF-8">
                                                @csrf 
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>LINE NO</th>
                                                        <th>FOOD ITEM</th>
                                                        <th>FOOD DESCRIPTION</th>
                                                        <th>BRAND</th>
                                                        <th>MAIN INGREDIENT</th>
                                                        <th>BRAND CODE</th>
                                                        <th>FVS</th>
                                                        <th>IS FORTIFIED</th>
                                                        <th>VITAMIN A</th>
                                                        <th>IRON</th>
                                                        <th>OTHERS</th>
                                                        <th>MEAL CODE</th>
                                                        <th>RF CODE</th>
                                                        <th>FOODCODE LIST</th>
                                                        <th>FOOD WEIGHT</th>
                                                        <th>RCC &nbsp;&nbsp;</th>
                                                        <th>CMC &nbsp;&nbsp;</th>
                                                        <th>SUPCODE</th>
                                                        <th>SRCCODE</th>
                                                        <th>CPC &nbsp;&nbsp;</th>
                                                        <th>UNIT COST</th>
                                                        <th>UNIT WEIGHT</th>
                                                        <th>UNIT MEASUREMENT</th>
                                                       <th>ADD</th>
                                                       <th>REM</th>
                                                    </tr>
                                                </thead>
                                    <tbody>
                                        <tr>
                                            <input type="text" class="form-control" name="eacode" id="eacode" value="{{$eacode}}" hidden/>
                                            <input type="text" class="form-control" name="hcn" id="hcn" value="{{$hcn}}" hidden/>
                                            <input type="text" class="form-control" name="shsn" id="shsn" value="{{$shsn}}" hidden/>    
                                            <input type="text" class="form-control" name="MEMBER_CODE" id="MEMBER_CODE" value="{{$membercode}}" hidden/> 
                                            <input type="text" class="form-control" name="RECDAY" id="RECDAY" value="{{$recday}}" hidden/>     
                                        </tr>  
                                        <tr class="tr_clone" id="line-1">                   
                                           <td>
                                                <div class="form-group-line">
                                                    <input type="number" step="any" class="form-no-border" name="LINENO[]" id="LINENO" placeholder="Line no" value="" required autofocus/>
                                                </div>
                                            </td>
                                            
                                            <td>
                                                <div class="form-group-line">
                                                    <input type="text"class="form-no-border" name="FOOD_ITEM[]" id="FOOD_ITEM" placeholder="Food item" value=""/>
                                                </div>
                                            </td>
                                             <td>
                                                <div class="form-group-line">
                                                    <input type="text"  class="form-no-border" name="FOODDESC[]" id="FOODDESC" placeholder="Food description" value=""/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                     <input type="text" class="form-no-border" name="FOODBRND[]" id="FOODBRND" placeholder="Brand" value=""/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <input type="text"class="form-no-border" name="FOODMAINING[]" id="FOODMAINING" placeholder="Main ingredient" value=""/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <input type="text"  class="form-no-border" name="FOODBRNDCD[]" id="FOODBRNDCD" placeholder="Brand Code" value=""/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <input type="text" class="form-no-border" name="FVS[]" id="FVS" placeholder="FVS" value="" {{$age > 3  ? 'disabled' : ''}}/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <input type="text"class="form-no-border" name="ISFORTIFIED[]" id="ISFORTIFIED" placeholder="Fortified" value="" {{$age > 3  ? 'disabled' : ''}}/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <input type="text"  class="form-no-border" name="VITA[]" id="VITA" placeholder="Vitamin A" value="" {{$age > 3  ? 'disabled' : ''}}/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <input type="text" class="form-no-border" name="IRON[]" id="IRON" placeholder="Iron" value="" {{$age > 3  ? 'disabled' : ''}}/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <input type="text" class="form-no-border" name="OTHF[]" id="OTHF" placeholder="Other" value="" {{$age > 3  ? 'disabled' : ''}}/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <select type="text" class="form-no-border" name="MEALCD[]" id="MEALCD" placeholder="Meal code" value="">
                                                            <option value=""  >0 - Blank</option>
                                                            <option value="1" >1 - Breakfast</option>
                                                            <option value="2" >2 - AM Snack</option>
                                                            <option value="3" >3 - Lunch</option>
                                                            <option value="4" >4 - PM Snack</option>
                                                            <option value="5" >5 - Supper</option>
                                                            <option value="6" >6 - Late PM Snack</option>
                                                            <option value="-" >88 - NONE </option>
                                                        </select>   
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <select type="text" class="form-no-border" name="RFCODE[]" id="RFCODE" placeholder="RF code" value="">
                                                             <option value=""  >0 - Blank</option>
                                                             <option value="1" >1 - Single food item</option>
                                                             <option value="2" >2 - Mixed Dish</option>
                                                             <option value="3" >3 - Composite Ingridient</option>
                                                             <option value="4" >4 - Water</option>
                                                             <option value="5" >5 - Water added to conc/powdered Beverage</option>
                                                             <option value="6" >6 - Water used for cooking</option>
                                                             <option value="7" >7 - Beverage</option>
                                                             <option value="8" >8 - Other liquids, specify..</option>
                                                             <option value="-" >88 - NONE </option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <input type="text" list="fct" class="form-no-border" name="FOODCODE[]" id="FOODCODE" placeholder="FIC" value=""/>
                                                    <datalist id="fct" >
                                                            @foreach ($fct as $value)
                                                            <option >{{$value->foodcode.' - '.$value->fooddesc}}</option>
                                                            @endforeach                                         
                                                    </datalist>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <input type="number" step="any" class="form-no-border" name="FOODWEIGHT[]" id="FOODWEIGHT" placeholder="Food weight" value=""/>
                                                </div>
                                            </td>                            
                                            <td>
                                                <div class="form-group-line">
                                                    <select type="text"class="form-no-border RCC" name="RCC[]" id="RCC" placeholder="RCC" value="">
                                                        <option value=""  >0 - Blank</option>
                                                        <option value="1" >1 - Raw as purchased</option>
                                                        <option value="2" >2 - Raw edible portion</option>
                                                        <option value="3" >3 - Cooked as purchased</option>
                                                        <option value="4" >4 - Cooked edible portion</option>
                                                        <option value="5" >5 - Cleaned and Drawn fresh fish </option>
                                                        <option value="6" >6 - Cleaned and Drawn cooked fish</option>
                                                        <option value="-" >88 - NONE </option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <select type="text"  class="form-no-border CMC" name="CMC[]" id="CMC" placeholder="CMC" value="">
                                                        <option value=""  >0 - Blank</option>
                                                        <option value="1" >1 - Boiled</option>
                                                        <option value="2" >2 - Fried</option>
                                                        <option value="3" >3 - Sauteed</option>
                                                        <option value="4" >4 - Broiled</option>
                                                        <option value="5" >5 - Scambled</option>
                                                        <option value="6" >6 - Raw</option>
                                                        <option value="-" >88 - NONE</option>
                                                    </select>    
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <select type="text" class="form-no-border" name="SUPCODE[]" id="SUPCODE" placeholder="SUP" value="">
                                                        <option value=""  >0 - Blank</option>
                                                        <option value="1" >1 - Bought</option>
                                                        <option value="2" >2 - Barter</option>
                                                        <option value="3" >3 - Given</option>
                                                        <option value="4" >4 - Own Produced</option>
                                                        <option value="9" >9 - NA</option>
                                                        <option value="-" >88 - NONE</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <select type="text" class="form-no-border" name="SRCCODE[]" id="SRCCODE" placeholder="SRC" value="">
                                                        <option value=""  >0 - Blank</option>
                                                        <option value="1" >1 - Fastfood</option>
                                                        <option value="2" >2 - Carinderia / Turo-turo</option>
                                                        <option value="3" >3 - Canteen/Cafeteria</option>
                                                        <option value="4" >4 - Restaurant</option>
                                                        <option value="5" >5 - Market / Talipapa</option>
                                                        <option value="6" >6 - Sari-sari Store</option>
                                                        <option value="7" >7 - Supermarket</option>
                                                        <option value="8" >8 - Grocery</option>
                                                        <option value="9" >9 - Convenience Store</option>
                                                        <option value="10" >10 - Mobile Vendor</option>
                                                        <option value="11" >11 - Specialty Store</option>
                                                        <option value="12" >12 - Home prepared</option>
                                                        <option value="13" >13 - Food Aid</option>
                                                        <option value="14" >14 - Homeyard garden, livestock, fishpen</option>
                                                        <option value="15" >15 - Farm garden, farmstock, fishpen</option>
                                                        <option value="16" >16 - Water from deepwell, rainfall and spring</option>
                                                        <option value="17" >17 - Water from waterworks like NAWASA and Maynilad</option>
                                                        <option value="18" >18 - Pharmacy / Clinic</option>
                                                        <option value="19" >19 - Others</option>
                                                        <option value="-"  >88 - NONE</option>
                                                    </select>
                                                </div>
                                            </td>
                                           <td>
                                                <div class="form-group-line">
                                                    <select type="text" class="form-no-border" name="CPC[]" id="CPC" placeholder="CPC" value="" {{$age >= 15  ? '' : 'disabled'}}>
                                                        <option value="" >0 - Blank</option>
                                                        <option value="1">1 - Home-cooked, eaten at home</option>
                                                        <option value="2">2 - Home-cooked, eaten away from home</option>
                                                        <option value="3">3 - Bought, eaten at home</option>
                                                        <option value="4">4 - Bought, eaten away from home</option>
                                                        <option value="5">5 - Ready to eat, eaten at home</option>
                                                        <option value="6">6 - Ready to eat, eaten away from home</option>
                                                        <option value="99">99 - Not Applicable</option>
                                                        <option value="-">88- none </option>
                                                    </select>    
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <input type="number" step="any" class="form-no-border" name="UNITCOST[]" id="UNITCOST" placeholder="Unit Cost" value=""/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <input type="number" step="any" class="form-no-border" name="UNITWGT[]" id="UNITWGT" placeholder="Unit Weight" value=""/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <input type="text" class="form-no-border" name="UNITMEAS[]" id="UNITMEAS" placeholder="Unit Measurement" value=""/>
                                                </div>
                                            </td>
                                            <td><input type="button" name="add" value="+"  class=" autofocus d-sm-inline-block btn  btn-primary shadow-sm tr_clone_add"></td>
                                            <td><input type="button" id="remove" name="remove" value="-"  class="autofocus d-sm-inline-block btn  btn-primary shadow-sm remove"></td>
                                            </tr>  
                                        </tbody>  
                                    </table>
                                </form>
                            </div>
                                          
                                {{-- Launch the Confirmation modal --}}
                            <a href="#" data-toggle="modal" data-target="#saveRecall">
                                <button type="submit" class="autofocus d-sm-inline-block btn  btn-primary shadow-sm">
                                    Save
                                </button>
                            </a>

                            {{-- Confirmation Modal --}}
                            <div class="modal fade" id="saveRecall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <a class="btn btn-primary" href="{{ route('insertRecall') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('insert-form72').submit();">
                                                Proceed
                                                </a>
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
                                                        document.getElementById('insert-form-70').submit();">
                                                        Proceed
                                                        </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                {{-- Confirmation Modal --}}
                                <div class="modal fade" id="viewAndEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">Make sure "SAVE" the data before you click "PROCEED"</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                <a class="btn btn-primary"href="{{ route('foodrecall_view', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn, 'member_code'=>$membercode, 'givenname'=>$givenname, 'surname'=>$surname, 'age'=>$age, 'sex'=>$sex, 'psc'=>$psc, 'recday'=>$recday ])}}">
                                                    Proceed
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Remove clone confirmation modal --}}
                                <div class="modal fade" id="remove-clone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">Are you sure you want to delete the row?</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                <button class="btn btn-primary" type="button" id="proceed">Proceed</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>             
        </div>
    </div>
@endsection