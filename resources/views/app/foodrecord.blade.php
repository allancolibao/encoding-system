@extends('layouts.main')

@section('content') 
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                                <h1 class="h3 mb-2 text-gray-800">Food Record | Form 6.3</h1>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">EACODE : {{$eacode}} | HCN : {{$hcn}} | SHSN : {{$shsn}}</h6>
                                    <div class="pt-2">
                                        <a href="{{ route('household', ['eacode'=>$eacode])}}">
                                            <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                    <i class="fas fa-arrow-left"></i> 
                                            </button>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#viewAndEdit">
                                            <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                View & Edit 
                                            </button>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        @include('inc.messages')
                                                <div class="table-responsive table-responsive-foodrecord">
                                                    <div id="message"></div>
                                                <form name="insertRecord" id="insert-record" method="POST" action="{{ action('StartEncodingController@addRecord') }}" accept-charset="UTF-8">
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
                                                               <th>MEAL CODE</th>
                                                               <th>WRCODE</th>
                                                               <th>RFCODE</th>
                                                               <th>FOODCODE LIST</th>
                                                               <th>FOODWEIGHT</th>
                                                               <th>RCC &nbsp;&nbsp;</th>
                                                               <th>CMC &nbsp;&nbsp;</th>
                                                               <th>SUPCODE</th>
                                                               <th>SRCCODE</th>
                                                               <th>PW_WGT</th>
                                                               <th>PW_RCC</th>
                                                               <th>PW_CMC</th>
                                                               <th>PURCODE</th>
                                                               <th>GO_WGT</th>
                                                               <th>GO_RCC</th>
                                                               <th>GO_CMC</th>
                                                               <th>LO_WGT</th>
                                                               <th>LO_RCC</th>
                                                               <th>LO_CMC</th>
                                                               <th>UNIT COST</th>
                                                               <th>UNIT WEIGHT</th>
                                                               <th>UNIT MEASUREMENT</th>
                                                               <th>ADD</th>
                                                               <th>REM</th>
                                                            </tr>
                                                        </thead>
                                            <tbody>
                                                <tr>
                                                    <td hidden>
                                                        <div class="form-group-line">
                                                            <input type="text" class="form-no-border" name="eacode" id="eacode" placeholder="EACODE" value="{{$eacode}}"/>
                                                        </div>
                                                    </td>
                                                    <td hidden>
                                                        <div class="form-group-line">
                                                            <input type="text" class="form-no-border" name="hcn" id="hcn" placeholder="hcn" value="{{$hcn}}"/>
                                                        </div>
                                                    </td>
                                                    <td hidden>
                                                        <div class="form-group-line">
                                                            <input type="text"  class="form-no-border" name="shsn" id="shsn" placeholder="SHSN" value="{{$shsn}}"/>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="tr_clone" id="line-1">
                                                   <td>
                                                       <div class="form-group-line">
                                                       <input type="number" step="any" class="form-no-border " name="LINENO[]" id="LINENO" placeholder="Line no" value="" required autofocus/>
                                                       </div>
                                                    </td>
                                                   <td>
                                                       <div class="form-group-line">
                                                           <input type="text"class="form-no-border" name="FOODITEM[]" id="FOODITEM" placeholder="Food item" value=""/>
                                                       </div>
                                                    </td>
                                                   <td>
                                                       <div class="form-group-line">
                                                           <input type="text"  class="form-no-border" name="DESCRIPTION[]" id="DESCRIPTION" placeholder="Food description" value=""/>
                                                       </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group-line">
                                                        <input type="text" class="form-no-border" name="BRANDNAME[]" id="BRANDNAME" placeholder="Brand" value=""/>
                                                        </div>
                                                    </td>
                                                    <td >
                                                        <div class="form-group-line">
                                                            <input type="text"class="form-no-border" name="MAINIGNT[]" id="MAINIGNT" placeholder="Main ingredient" value=""/>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group-line">
                                                            <input type="text"  class="form-no-border" name="BRANDCODE[]" id="BRANDCODE" placeholder="Brand Code" value=""/>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group-line">
                                                            <select type="text" class="form-no-border" name="MEALCD[]" id="MEALCD" placeholder="Meal Code" value="">
                                                                <option value=""   >0 - Blank</option>
                                                                <option value="1"  >1 - Breakfast</option>
                                                                <option value="2"  >2 - AM Snack</option>
                                                                <option value="3"  >3 - Lunch</option>
                                                                <option value="4"  >4 - PM Snack</option>
                                                                <option value="5"  >5 - Supper</option>
                                                                <option value="6"  >6 - Late PM Snack</option>
                                                            </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group-line">
                                                                <select type="text"class="form-no-border" name="WRCODE[]" id="WRCODE" placeholder="WRCODE" value="">
                                                                    <option value=""   >0 - Blank</option>
                                                                    <option value="1"  >1 - Weighed</option>
                                                                    <option value="2"  >2 - Recalled</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group-line">
                                                                <select type="text"  class="form-no-border" name="RFCODE[]"  placeholder="RFCODE" value="">
                                                                    <option value=""   >0 - Blank</option>
                                                                    <option value="1"  >1 - Single Food Item</option>
                                                                    <option value="2"  >2 - Mixed Dish</option>
                                                                    <option value="3"  >3 - Composite Ingredient</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td >
                                                            <div class="form-group-line">
                                                                <input type="text" list="fct" class="form-no-border" name="FOODDESC[]" id="FOODDESC" placeholder="FIC" value=""/>
                                                                <datalist id="fct" >
                                                                        @foreach ($fct as $value)
                                                                        <option >{{$value->foodcode.' - '.$value->fooddesc}}</option>
                                                                        @endforeach                                         
                                                                </datalist>
                                                            </div>
                                                        </td>
                                                    <td>
                                                        <div class="form-group-line">
                                                            <input type="number" step="any" class="form-no-border" name="FOODWEIGHT[]" id="FOODWEIGHT" placeholder="FOODWEIGHT" value=""/>
                                                        </div>
                                                    </td>
                                                   <td>
                                                       <div class="form-group-line">
                                                           <select type="text" class="form-no-border" name="RCC[]" id="RCC" placeholder="RCC" value="">
                                                                <option value=""   >0 - Blank</option>
                                                                <option value="1"  >1 - Raw as purchased</option>
                                                                <option value="2"  >2 - Raw edible portion</option>
                                                                <option value="3"  >3 - Cooked as purchased</option>
                                                                <option value="4"  >4 - Cooked edible portion</option>
                                                                <option value="5"  >5 - Cleaned and Drawn fresh fish</option>
                                                                <option value="6"  >6 - Cleaned and Drawn cooked fish</option>
                                                                <option value="-"  >88 - NONE </option>
                                                            </select>   
                                                       </div>
                                                    </td>
                                                   <td>
                                                        <div class="form-group-line">
                                                            <select type="text" class="form-no-border" name="CMC[]" id="CMC" placeholder="CMC" value="">
                                                                <option value=""   >0 - Blank</option>
                                                                <option value="1"  >1 - Boiled</option>
                                                                <option value="2"  >2 - Fried</option>
                                                                <option value="3"  >3 - Sauteed</option>
                                                                <option value="4"  >4 - Broiled</option>
                                                                <option value="5"  >5 - Scambled</option>
                                                                <option value="6"  >6 - Raw</option>
                                                                <option value="-"  >88 - NONE </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group-line">
                                                            <select type="text" class="form-no-border" name="SUPCODE[]" id="SUPCODE" placeholder="SUPCODE" value="">
                                                                <option value=""   >0 - Blank</option>
                                                                <option value="1"  >1 - Bought</option>
                                                                <option value="2"  >2 - Barter</option>
                                                                <option value="3"  >3 - Given</option>
                                                                <option value="4"  >4 - Own Produced</option>
                                                                <option value="9"  >9 - NA</option>
                                                                <option value="-"  >88 - NONE </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group-line">
                                                                <select type="text" class="form-no-border" name="SRCCODE[]" id="SRCCODE" placeholder="SRCCODE" value="">
                                                                    <option value=""   >0 - Blank</option>
                                                                    <option value="1"  >1 - Fastfood</option>
                                                                    <option value="2"  >2 - Carinderia / Turo-turo</option>
                                                                    <option value="3"  >3 - Canteen/Cafeteria</option>
                                                                    <option value="4"  >4 - Restaurant</option>
                                                                    <option value="5"  >5 - Market / Talipapa</option>
                                                                    <option value="6"  >6 - Sari-sari Store</option>
                                                                    <option value="7"  >7 - Supermarket</option>
                                                                    <option value="8"  >8 - Grocery</option>
                                                                    <option value="9"  >9 - Convenience Store</option>
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
                                                                    <input type="number" step="any" class="form-no-border pw-group" name="PW_WGT[]" id="PW_WGT" placeholder="PW_WGT" value=""/>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group-line">
                                                                    <select type="text"  class="form-no-border pw-group" name="PW_RCC[]" id="PW_RCC" placeholder="PW_RCC" value="">
                                                                        <option value=""   >0 - Blank</option>
                                                                        <option value="1"  >1 - Raw as purchased</option>
                                                                        <option value="2"  >2 - Raw edible portion</option>
                                                                        <option value="3"  >3 - Cooked as purchased</option>
                                                                        <option value="4"  >4 - Cooked edible portion</option>
                                                                        <option value="5"  >5 - Cleaned and Drawn fresh fish</option>
                                                                        <option value="6"  >6 - Cleaned and Drawn cooked fish</option>
                                                                        <option value="-"  >88 - NONE </option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td >
                                                                <div class="form-group-line">
                                                                    <select type="text" class="form-no-border pw-group" name="PW_CMC[]" id="PW_CMC" placeholder="PW_CMC" value="">
                                                                        <option value=""   >0 - Blank</option>
                                                                        <option value="1"  >1 - Boiled</option>
                                                                        <option value="2"  >2 - Fried</option>
                                                                        <option value="3"  >3 - Sauteed</option>
                                                                        <option value="4"  >4 - Broiled</option>
                                                                        <option value="5"  >5 - Scambled</option>
                                                                        <option value="6"  >6 - Raw</option>
                                                                        <option value="-"  >88 - NONE </option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td >
                                                                <div class="form-group-line">
                                                                    <select type="text" class="form-no-border pw-group" name="PURCODE[]" id="PURCODE" placeholder="PURCODE" value="">
                                                                        <option value=""   >0 - Blank</option>
                                                                        <option value="1"  >1 - Fed to pets</option>
                                                                        <option value="2"  >2 - Discarded</option>
                                                                        <option value="-"  >88 - NONE </option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                                <td>
                                                                    <div class="form-group-line">
                                                                        <input type="number" step="any" class="form-no-border go-group" name="GO_WGT[]" id="GO_WGT" placeholder="GO_WGT" value="">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group-line">
                                                                        <select type="text"  class="form-no-border go-group" name="GO_RCC[]" id="GO_RCC" placeholder="GO_RCC" value="">
                                                                            <option value=""   >0 - Blank</option>
                                                                            <option value="1"  >1 - Raw as purchased</option>
                                                                            <option value="2"  >2 - Raw edible portion</option>
                                                                            <option value="3"  >3 - Cooked as purchased</option>
                                                                            <option value="4"  >4 - Cooked edible portion</option>
                                                                            <option value="5"  >5 - Cleaned and Drawn fresh fish</option>
                                                                            <option value="6"  >6 - Cleaned and Drawn cooked fish</option>
                                                                            <option value="-"  >88 - NONE </option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group-line">
                                                                        <select type="text" class="form-no-border go-group" name="GO_CMC[]" id="GO_CMC" placeholder="GO_CMC" value="">
                                                                            <option value=""   >0 - Blank</option>
                                                                            <option value="1"  >1 - Boiled</option>
                                                                            <option value="2"  >2 - Fried</option>
                                                                            <option value="3"  >3 - Sauteed</option>
                                                                            <option value="4"  >4 - Broiled</option>
                                                                            <option value="5"  >5 - Scambled</option>
                                                                            <option value="6"  >6 - Raw</option>
                                                                            <option value="-"  >88 - NONE </option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                    <td>
                                                                        <div class="form-group-line">
                                                                            <input type="number" step="any" class="form-no-border lo-group" name="LO_WGT[]" id="LO_WGT" placeholder="LO_WGT" value=""/>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group-line">
                                                                            <select type="text"  class="form-no-border lo-group" name="LO_RCC[]" id="LO_RCC" placeholder="LO_RCC" value="">
                                                                                <option value=""  >0 - Blank</option>
                                                                                <option value="1"  >1 - Raw as purchased</option>
                                                                                <option value="2"  >2 - Raw edible portion</option>
                                                                                <option value="3"  >3 - Cooked as purchased</option>
                                                                                <option value="4"  >4 - Cooked edible portion</option>
                                                                                <option value="5"  >5 - Cleaned and Drawn fresh fish</option>
                                                                                <option value="6"  >6 - Cleaned and Drawn cooked fish</option>
                                                                                <option value="-"  >88 - NONE </option>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group-line">
                                                                            <select type="text" class="form-no-border lo-group" name="LO_CMC[]" id="LO_CMC" placeholder="LO_CMC" value="">
                                                                                <option value=""  >0 - Blank</option>
                                                                                <option value="1"  >1 - Boiled</option>
                                                                                <option value="2"  >2 - Fried</option>
                                                                                <option value="3"  >3 - Sauteed</option>
                                                                                <option value="4"  >4 - Broiled</option>
                                                                                <option value="5"  >5 - Scambled</option>
                                                                                <option value="6"  >6 - Raw</option>
                                                                                <option value="-"  >88 - NONE </option>
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
                                                                                <input type="number" step="any"  class="form-no-border" name="UNITWGT[]" id="UNITWGT" placeholder="Unit Weight" value=""/>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-group-line">
                                                                                <input type="text" class="form-no-border" name="UNIT[]" id="UNIT" placeholder="Unit Measurment" value=""/>
                                                                            </div>
                                                                        </td>
                                                                        <td><input type="button" name="add" value="+"  class="autofocus d-sm-inline-block btn  btn-primary shadow-sm tr_clone_add"></td>
                                                                        <td><input type="button" id="remove" name="remove" value="-"  class="autofocus d-sm-inline-block btn  btn-primary shadow-sm remove"></td>
                                                                    </tr>
                                                                </tbody>  
                                                            </table>
                                                        </form>
                                                        </div> 

                                                                      
                                                                {{-- Launch the Confirmation modal --}}
                                                                <a href="#" data-toggle="modal" data-target="#saveRecord">
                                                                    <button type="submit" class="autofocus d-sm-inline-block btn  btn-primary shadow-sm">
                                                                        Save
                                                                    </button>
                                                                </a>
                
                                                                {{-- Confirmation Modal --}}
                                                                <div class="modal fade" id="saveRecord" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                    <a class="btn btn-primary" href="{{ route('addRecord') }}"
                                                                                    onclick="event.preventDefault();
                                                                                    document.getElementById('insert-record').submit();">
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
                                                                            <a class="btn btn-primary" href="{{ route('foodrecord_view', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn ])}}">
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