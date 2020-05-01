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
                                        <a href="{{ route('foodrecord_view', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn ])}}">
                                            <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                View & Edit 
                                            </button>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                    @include('inc.messages')
                                        <form id="insert-record" method="POST" action="{{ action('StartEncodingController@addRecord') }}" accept-charset="UTF-8">
                                            @csrf    
                                               <div class="row" hidden>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>EACODE</label>
                                                        <input type="text" class="form-control" name="eacode" id="eacode" placeholder="EACODE" value="{{$eacode}}"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>HCN</label>
                                                            <input type="text"class="form-control" name="hcn" id="hcn" placeholder="HCN" value="{{$hcn}}"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>SHSN</label>
                                                            <input type="text"  class="form-control" name="shsn" id="shsn" placeholder="SHSN" value="{{$shsn}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                    
                                               <div class="row">
                                                   <div class="col-md-2">
                                                       <div class="form-group">
                                                           <label>Line no.</label>
                                                       <input type="number" step="any" class="form-control" name="LINENO" id="LINENO" placeholder="Line no" value="" required/>
                                                       </div>
                                                   </div>
                                                   <div class="col-md-4">
                                                       <div class="form-group">
                                                           <label>Food Item</label>
                                                           <input type="text"class="form-control" name="FOODITEM" id="FOODITEM" placeholder="Food item" value=""/>
                                                       </div>
                                                   </div>
                                                   <div class="col-md-6">
                                                       <div class="form-group">
                                                           <label>Food Description</label>
                                                           <input type="text"  class="form-control" name="DESCRIPTION" id="DESCRIPTION" placeholder="Food description" value=""/>
                                                       </div>
                                                   </div>
                                               </div>
                   
                                               <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Brand</label>
                                                        <input type="text" class="form-control" name="BRANDNAME" id="BRANDNAME" placeholder="Brand" value=""/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Main ingredient</label>
                                                            <input type="text"class="form-control" name="MAINIGNT" id="MAINIGNT" placeholder="Main ingredient" value=""/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Brand Code</label>
                                                            <input type="text"  class="form-control" name="BRANDCODE" id="BRANDCODE" placeholder="Brand Code" value=""/>
                                                        </div>
                                                    </div>
                                                </div>
            
                                                <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Meal Code</label>
                                                                <select type="text" class="form-control" name="MEALCD" id="MEALCD" placeholder="Meal Code" value="">
                                                                    <option value=""   >0 - Blank</option>
                                                                    <option value="1"  >1 - Breakfast</option>
                                                                    <option value="2"  >2 - AM Snack</option>
                                                                    <option value="3"  >3 - Lunch</option>
                                                                    <option value="4"  >4 - PM Snack</option>
                                                                    <option value="5"  >5 - Supper</option>
                                                                    <option value="6"  >6 - Late PM Snack</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>WRCODE</label>
                                                                <select type="text"class="form-control" name="WRCODE" id="WRCODE" placeholder="WRCODE" value="">
                                                                    <option value=""   >0 - Blank</option>
                                                                    <option value="1"  >1 - Weighed</option>
                                                                    <option value="2"  >2 - Recalled</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>RFCODE</label>
                                                                <select type="text"  class="form-control" name="RFCODE" id="RFCODE" placeholder="RFCODE" value="">
                                                                    <option value=""   >0 - Blank</option>
                                                                    <option value="1"  >1 - Single Food Item</option>
                                                                    <option value="2"  >2 - Mixed Dish</option>
                                                                    <option value="1"  >3 - Composite Ingredient</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>FOODEX</label>
                                                                <input type="text" class="form-control" name="FOODEX" id="FOODEX" placeholder="FOODEX" value=""/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>FOODCODE</label>
                                                                <input type="text" class="form-control" name="FOODCODE" id="FOODCODE" placeholder="FOODCODE" value=""/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label>FIC</label>
                                                                <input type="text" list="fct" class="form-control" name="FOODDESC" id="FOODDESC" placeholder="FOODDESC" value=""/>
                                                                <datalist id="fct" >
                                                                        @foreach ($fct as $value)
                                                                        <option >{{$value->foodcode.' - '.$value->fooddesc}}</option>
                                                                        @endforeach                                         
                                                                </datalist>
                                                            </div>
                                                        </div>
                                                    </div>
                                               <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>FOODWEIGHT</label>
                                                            <input type="number" step="any" class="form-control" name="FOODWEIGHT" id="FOODWEIGHT" placeholder="FOODWEIGHT" value=""/>
                                                        </div>
                                                    </div>
                                                   <div class="col-md-2">
                                                       <div class="form-group">
                                                           <label>RCC</label>
                                                           <select type="text" class="form-control" name="RCC" id="RCC" placeholder="RCC" value="">
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
                                                   </div>
                                                   <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>CMC</label>
                                                            <select type="text" class="form-control" name="CMC" id="CMC" placeholder="CMC" value="">
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
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>SUPCODE</label>
                                                            <select type="text" class="form-control" name="SUPCODE" id="SUPCODE" placeholder="SUPCODE" value="">
                                                                <option value=""   >0 - Blank</option>
                                                                <option value="1"  >1 - Bought</option>
                                                                <option value="2"  >2 - Barter</option>
                                                                <option value="3"  >3 - Given</option>
                                                                <option value="4"  >4 - Own Produced</option>
                                                                <option value="9"  >9 - NA</option>
                                                                <option value="-"  >88 - NONE </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>SRCCODE</label>
                                                                <select type="text" class="form-control" name="SRCCODE" id="SRCCODE" placeholder="SRCCODE" value="">
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
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>OTH_SRC</label>
                                                                <input type="text" class="form-control" name="OTH_SRC" id="OTH_SRC" placeholder="OTH_SRC" value=""/>
                                                            </div>
                                                         </div>
                                                    </div>
                                                    <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>PW_WGT</label>
                                                                    <input type="text"class="form-control" name="PW_WGT" id="PW_WGT" placeholder="PW_WGT" value=""/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>PW_RCC</label>
                                                                    <select type="text"  class="form-control" name="PW_RCC" id="PW_RCC" placeholder="PW_RCC" value="">
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
                                                            </div>
                                                            <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label>PW_CMC</label>
                                                                    <select type="text" class="form-control" name="PW_CMC" id="PW_CMC" placeholder="PW_CMC" value="">
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
                                                            </div>
                                                            <div class="col-md-3">
                                                                    <div class="form-group">
                                                                    <label>PURCODE</label>
                                                                    <select type="text" class="form-control" name="PURCODE" id="PURCODE" placeholder="PURCODE" value="">
                                                                        <option value=""   >0 - Blank</option>
                                                                        <option value="1"  >1 - Fed to pets</option>
                                                                        <option value="2"  >2 - Discarded</option>
                                                                        <option value="-"  >88 - NONE </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
            
                                                        <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>GO_WGT</label>
                                                                        <input type="text"class="form-control" name="GO_WGT" id="GO_WGT" placeholder="GO_WGT" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>GO_RCC</label>
                                                                        <select type="text"  class="form-control" name="GO_RCC" id="GO_RCC" placeholder="GO_RCC" value="">
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
                                                                </div>
                                                                <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>GO_CMC</label>
                                                                        <select type="text" class="form-control" name="GO_CMC" id="GO_CMC" placeholder="GO_CMC" value="">
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
                                                                </div>
                                                            </div>
            
                                                            <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>LO_WGT</label>
                                                                            <input type="text"class="form-control" name="LO_WGT" id="LO_WGT" placeholder="LO_WGT" value=""/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>LO_RCC</label>
                                                                            <select type="text"  class="form-control" name="LO_RCC" id="LO_RCC" placeholder="LO_RCC" value="">
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
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>LO_CMC</label>
                                                                            <select type="text" class="form-control" name="LO_CMC" id="LO_CMC" placeholder="LO_CMC" value="">
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
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Unit Cost</label>
                                                                                <input type="text"class="form-control" name="UNITCOST" id="UNITCOST" placeholder="Unit Cost" value=""/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Unit Weight</label>
                                                                                <input type="text"  class="form-control" name="UNITWGT" id="UNITWGT" placeholder="Unit Weight" value=""/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                <label>Unit Measurement</label>
                                                                                <input type="text" class="form-control" name="UNIT" id="UNIT" placeholder="Unit Measurment" value=""/>
                                                                            </div>
                                                                        </div>
                                                                    </div>                
                                                                    
                                                                    
                                                                {{-- Launch the Confirmation modal --}}
                                                                <a href="#" data-toggle="modal" data-target="#saveRecord">
                                                                    <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
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
                                                            </form>       
                                                         </div>
                                                    </div>
                                                </div>
                                             </div>
                                        </div>             
                                    </div>
                                </div>
@endsection