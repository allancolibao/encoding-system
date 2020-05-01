<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h6 class="m-0 font-weight-bold text-primary">{{$membercode}} {{$givenname}} {{$surname}} | {{$age}}</h6>
                        <div class="card-body">
                            @include('inc.messages')
                            <form id="update-form72" method="post" action="{{action('StartEncodingController@updateRecall', $line->id )}}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH" />       
                            <input type="text" class="form-control" name="eacode" id="eacode" value="{{$line->eacode}}" hidden/>
                            <input type="text" class="form-control" name="hcn" id="hcn" value="{{$line->hcn}}" hidden/>
                            <input type="text" class="form-control" name="shsn" id="shsn" value="{{$line->shsn}}" hidden/>    
                            <input type="text" class="form-control" name="MEMBER_CODE" id="MEMBER_CODE" value="{{$line->MEMBER_CODE}}" hidden/> 
                            <input type="text" class="form-control" name="RECDAY" id="RECDAY" value="{{$line->RECDAY}}" hidden/>                     
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Line no.</label>
                                    <input type="number" step="any" class="form-control" name="LINENO" id="LINENO" placeholder="Line no" value="{{$line->LINENO}}"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Food Item</label>
                                        <input type="text"class="form-control" name="FOOD_ITEM" id="FOOD_ITEM" placeholder="Food item" value="{{$line->FOOD_ITEM}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Food Description</label>
                                        <input type="text"  class="form-control" name="FOODDESC" id="FOODDESC" placeholder="Food description" value="{{$line->FOODDESC}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Brand</label>
                                    <input type="text" class="form-control" name="FOODBRND" id="FOODBRND" placeholder="Brand" value="{{$line->FOODBRND}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Main ingredient</label>
                                        <input type="text"class="form-control" name="FOODMAINING" id="FOODMAINING" placeholder="Main ingredient" value="{{$line->FOODMAINING}}"/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Brand Code</label>
                                        <input type="text"  class="form-control" name="FOODBRNDCD" id="FOODBRNDCD" placeholder="Brand Code" value="{{$line->FOODBRNDCD}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>FVS</label>
                                        <input type="text" class="form-control" name="FVS" id="FVS" placeholder="FVS" value="{{$line->FVS}}" {{$age > 3  ? 'disabled' : ''}}/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Fortified</label>
                                            <input type="text"class="form-control" name="ISFORTIFIED" id="ISFORTIFIED" placeholder="Fortified" value="{{$line->ISFORTIFIED}}" {{$age > 3  ? 'disabled' : ''}}/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Vitamin A</label>
                                            <input type="text"  class="form-control" name="VITA" id="VITA" placeholder="Vitamin A" value="{{$line->VITA}}" {{$age > 3  ? 'disabled' : ''}}/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Iron</label>
                                            <input type="text" class="form-control" name="IRON" id="IRON" placeholder="Iron" value="{{$line->IRON}}" {{$age > 3  ? 'disabled' : ''}}/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                <label>Other</label>
                                            <input type="text" class="form-control" name="OTHF" id="OTHF" placeholder="Other" value="{{$line->OTHF}}" {{$age > 3  ? 'disabled' : ''}}/>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Meal Code</label>
                                        <select type="text" class="form-control" name="MEALCD" id="MEALCD" placeholder="Meal code" value="{{$line->MEALCD}}">
                                            <option value=""  {{$line->MEALCD == ''  ? 'selected' : ''}}  >0 - Blank</option>
                                            <option value="1" {{$line->MEALCD == 1  ? 'selected' : ''}}  >1 - Breakfast</option>
                                            <option value="2" {{$line->MEALCD == 2  ? 'selected' : ''}}  >2 - AM Snack</option>
                                            <option value="3" {{$line->MEALCD == 3  ? 'selected' : ''}}  >3 - Lunch</option>
                                            <option value="4" {{$line->MEALCD == 4  ? 'selected' : ''}}  >4 - PM Snack</option>
                                            <option value="5" {{$line->MEALCD == 5  ? 'selected' : ''}}  >5 - Supper</option>
                                            <option value="6" {{$line->MEALCD == 6  ? 'selected' : ''}}  >6 - Late PM Snack</option>
                                            <option value="-" {{$line->MEALCD == '-'  ? 'selected' : ''}}  >88 - NONE </option>
                                        </select>   
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>RF Code</label>
                                    <select type="text" class="form-control" name="RFCODE" id="RFCODE" placeholder="RF code" value="{{$line->RFCODE}}">
                                            <option value=""   {{$line->RFCODE == ''  ? 'selected' : ''}}  >0 - Blank</option>
                                            <option value="1"  {{$line->RFCODE == 1  ? 'selected' : ''}}  >1 - Single food item</option>
                                            <option value="2"  {{$line->RFCODE == 2  ? 'selected' : ''}}  >2 - Mixed Dish</option>
                                            <option value="3"  {{$line->RFCODE == 3  ? 'selected' : ''}}  >3 - Composite Ingridient</option>
                                            <option value="4"  {{$line->RFCODE == 4  ? 'selected' : ''}}  >4 - Water</option>
                                            <option value="5"  {{$line->RFCODE == 5  ? 'selected' : ''}}  >5 - Water added to conc/powdered Beverage</option>
                                            <option value="6"  {{$line->RFCODE == 6  ? 'selected' : ''}}  >6 - Water used for cooking</option>
                                            <option value="7"  {{$line->RFCODE == 7  ? 'selected' : ''}}  >7 - Beverage</option>
                                            <option value="8"  {{$line->RFCODE == 8  ? 'selected' : ''}}  >8 - Other liquids, specify..</option>
                                            <option value="-"  {{$line->RFCODE == '-'  ? 'selected' : ''}}  >88 - NONE </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>FIC</label>
                                        <input type="text" list="fct" class="form-control" name="FOODCODE" id="FOODCODE" placeholder="FIC" value="{{$line->FOODCODE}}"/>
                                        <datalist id="fct" >
                                                @foreach ($fct as $value)
                                                <option >{{$value->foodcode.' - '.$value->fooddesc}}</option>
                                                @endforeach                                         
                                        </datalist>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Food weight</label>
                                        <input type="number" step="any" class="form-control" name="FOODWEIGHT" id="FOODWEIGHT" placeholder="Food weight" value="{{$line->FOODWEIGHT}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>RCC</label>
                                            <select type="text"class="form-control" name="RCC" id="RCC" placeholder="RCC" value="{{$line->RCC}}">
                                                <option value=""   {{$line->RCC == ''  ? 'selected' : ''}}  >0 - Blank</option>
                                                <option value="1"  {{$line->RCC == 1  ? 'selected' : ''}}  >1 - Raw as purchased</option>
                                                <option value="2"  {{$line->RCC == 2  ? 'selected' : ''}}  >2 - Raw edible portion</option>
                                                <option value="3"  {{$line->RCC == 3  ? 'selected' : ''}}  >3 - Cooked as purchased</option>
                                                <option value="4"  {{$line->RCC == 4  ? 'selected' : ''}}  >4 - Cooked edible portion</option>
                                                <option value="5"  {{$line->RCC == 5  ? 'selected' : ''}}  >5 - Cleaned and Drawn fresh fish </option>
                                                <option value="6"  {{$line->RCC == 6  ? 'selected' : ''}}  >6 - Cleaned and Drawn cooked fish</option>
                                                <option value="-"  {{$line->RCC == '-'  ? 'selected' : ''}}  >88 - NONE </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>CMC</label>
                                            <select type="text"  class="form-control" name="CMC" id="CMC" placeholder="CMC" value="{{$line->CMC}}">
                                                <option value=""   {{$line->CMC == ''  ? 'selected' : ''}}  >0 - Blank</option>
                                                <option value="1"  {{$line->CMC == 1  ? 'selected' : ''}}  >1 - Boiled</option>
                                                <option value="2"  {{$line->CMC == 2  ? 'selected' : ''}}  >2 - Fried</option>
                                                <option value="3"  {{$line->CMC == 3  ? 'selected' : ''}}  >3 - Sauteed</option>
                                                <option value="4"  {{$line->CMC == 4  ? 'selected' : ''}}  >4 - Broiled</option>
                                                <option value="5"  {{$line->CMC == 5  ? 'selected' : ''}}  >5 - Scambled</option>
                                                <option value="6"  {{$line->CMC == 6  ? 'selected' : ''}}  >6 - Raw</option>
                                                <option value="-"  {{$line->CMC == '-'  ? 'selected' : ''}}  >88 - NONE</option>
                                            </select>    
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                            <div class="form-group">
                                                <label>SUP</label>
                                            <select type="text" class="form-control" name="SUPCODE" id="SUPCODE" placeholder="SUP" value="{{$line->SUPCODE}}">
                                                <option value=""   {{$line->SUPCODE == ''  ? 'selected' : ''}}  >0 - Blank</option>
                                                <option value="1"  {{$line->SUPCODE == 1  ? 'selected' : ''}}  >1 - Bought</option>
                                                <option value="2"  {{$line->SUPCODE == 2  ? 'selected' : ''}}  >2 - Barter</option>
                                                <option value="3"  {{$line->SUPCODE == 3  ? 'selected' : ''}}  >3 - Given</option>
                                                <option value="4"  {{$line->SUPCODE == 4  ? 'selected' : ''}}  >4 - Own Produced</option>
                                                <option value="9"  {{$line->SUPCODE == 9  ? 'selected' : ''}}  >9 - NA</option>
                                                <option value="-"  {{$line->SUPCODE == '-'  ? 'selected' : ''}}  >88 - NONE</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                                <label>SRC</label>
                                            <select type="text" class="form-control" name="SRCCODE" id="SRCCODE" placeholder="SRC" value="{{$line->SRCCODE}}">
                                                <option value=""   {{$line->SRCCODE == ''  ? 'selected' : ''}}  >0 - Blank</option>
                                                <option value="1"  {{$line->SRCCODE == 1  ? 'selected' : ''}}  >1 - Fastfood</option>
                                                <option value="2"  {{$line->SRCCODE == 2  ? 'selected' : ''}}  >2 - Carinderia / Turo-turo</option>
                                                <option value="3"  {{$line->SRCCODE == 3  ? 'selected' : ''}}  >3 - Canteen/Cafeteria</option>
                                                <option value="4"  {{$line->SRCCODE == 4  ? 'selected' : ''}}  >4 - Restaurant</option>
                                                <option value="5"  {{$line->SRCCODE == 5  ? 'selected' : ''}}  >5 - Market / Talipapa</option>
                                                <option value="6"  {{$line->SRCCODE == 6  ? 'selected' : ''}}  >6 - Sari-sari Store</option>
                                                <option value="7"  {{$line->SRCCODE == 7  ? 'selected' : ''}}  >7 - Supermarket</option>
                                                <option value="8"  {{$line->SRCCODE == 8  ? 'selected' : ''}}  >8 - Grocery</option>
                                                <option value="9"  {{$line->SRCCODE == 9  ? 'selected' : ''}}  >9 - Convenience Store</option>
                                                <option value="10" {{$line->SRCCODE == 10  ? 'selected' : ''}}  >10 - Mobile Vendor</option>
                                                <option value="11" {{$line->SRCCODE == 11  ? 'selected' : ''}}  >11 - Specialty Store</option>
                                                <option value="12" {{$line->SRCCODE == 12  ? 'selected' : ''}}  >12 - Home prepared</option>
                                                <option value="13" {{$line->SRCCODE == 13  ? 'selected' : ''}}  >13 - Food Aid</option>
                                                <option value="14" {{$line->SRCCODE == 14  ? 'selected' : ''}}  >14 - Homeyard garden, livestock, fishpen</option>
                                                <option value="15" {{$line->SRCCODE == 15  ? 'selected' : ''}}  >15 - Farm garden, farmstock, fishpen</option>
                                                <option value="16" {{$line->SRCCODE == 16  ? 'selected' : ''}}  >16 - Water from deepwell, rainfall and spring</option>
                                                <option value="17" {{$line->SRCCODE == 17  ? 'selected' : ''}}  >17 - Water from waterworks like NAWASA and Maynilad</option>
                                                <option value="18" {{$line->SRCCODE == 18  ? 'selected' : ''}}  >18 - Pharmacy / Clinic</option>
                                                <option value="19" {{$line->SRCCODE == 19  ? 'selected' : ''}}  >19 - Others</option>
                                                <option value="-"  {{$line->SRCCODE == '-'  ? 'selected' : ''}}  >88 - NONE</option>
                                            </select>
                                            </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>CPC</label>
                                            <select type="text" class="form-control" name="CPC" id="CPC" placeholder="CPC" value="{{$line->CPC}}" {{$age >= 15  ? '' : 'disabled'}}>
                                                <option value=""   {{$line->CPC == ''  ? 'selected' : ''}}  >0 - Blank</option>
                                                <option value="1"  {{$line->CPC == 1  ? 'selected' : ''}}  >1 - Home-cooked, eaten at home</option>
                                                <option value="2"  {{$line->CPC == 2  ? 'selected' : ''}}  >2 - Home-cooked, eaten away from home</option>
                                                <option value="3"  {{$line->CPC == 3  ? 'selected' : ''}}  >3 - Bought, eaten at home</option>
                                                <option value="4"  {{$line->CPC == 4  ? 'selected' : ''}}  >4 - Bought, eaten away from home</option>
                                                <option value="5"  {{$line->CPC == 5  ? 'selected' : ''}}  >5 - Ready to eat, eaten at home</option>
                                                <option value="6"  {{$line->CPC == 6  ? 'selected' : ''}}  >6 - Ready to eat, eaten away from home</option>
                                                <option value="99" {{$line->CPC == 99  ? 'selected' : ''}}  >99 - Not Applicable</option>
                                                <option value="-"  {{$line->CPC == '-'  ? 'selected' : ''}}  >88 - NONE</option>
                                            </select>    
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Unit Cost</label>
                                                <input type="number" step="any" class="form-control" name="UNITCOST" id="UNITCOST" placeholder="Unit Cost" value="{{$line->UNITCOST}}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Unit Weight</label>
                                                <input type="number" step="any"  class="form-control" name="UNITWGT" id="UNITWGT" placeholder="Unit Weight" value="{{$line->UNITWGT}}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Unit Measurment</label>
                                                <input type="text" class="form-control" name="UNITMEAS" id="UNITMEAS" placeholder="Unit Measurment" value="{{$line->UNITMEAS}}"/>
                                            </div>
                                        </div>
                                    </div>
                                    
                            {{-- Launch the Confirmation modal --}}
                            <a href="#" data-toggle="modal" data-target="#updateRecall">
                                <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                    Update
                                </button>
                            </a>

                            {{-- Confirmation Modal --}}
                            <div class="modal fade" id="updateRecall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">Select "Proceed" below if you want to update data.</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                <a class="btn btn-primary" href="{{ route('updateRecall', ['id'=>$line->id]) }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('update-form72').submit();">
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
