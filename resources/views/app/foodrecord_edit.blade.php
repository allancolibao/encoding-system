<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <h6 class="m-0 font-weight-bold text-primary">EACODE : {{$eacode}} | HCN : {{$hcn}} | SHSN : {{$shsn}}</h6>
                    </div>
                        <div class="card-body">
                        <form id="update-form63" method="post" action="{{action('StartEncodingController@updateRecord', $line->id)}}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH" />  
                            <input type="text" class="form-control" name="eacode" id="eacode" value="{{$line->eacode}}" hidden/>
                            <input type="text" class="form-control" name="hcn" id="hcn" value="{{$line->hcn}}" hidden/>
                            <input type="text" class="form-control" name="shsn" id="shsn" value="{{$line->shsn}}" hidden/>                         
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Line no.</label>
                                    <input type="number" step="any" class="form-control" name="LINENO" id="LINENO" placeholder="Line no" value="{{$line->LINENO}}" autofocus/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Food Item</label>
                                        <input type="text"class="form-control" name="FOODITEM" id="FOODITEM" placeholder="Food item" value="{{$line->FOODITEM}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Food Description</label>
                                        <input type="text"  class="form-control" name="DESCRIPTION" id="DESCRIPTION" placeholder="Food description" value="{{$line->DESCRIPTION}}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Brand</label>
                                        <input type="text" class="form-control" name="BRANDNAME" id="BRANDNAME" placeholder="Brand" value="{{$line->BRANDNAME}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Main ingredient</label>
                                            <input type="text"class="form-control" name="MAINIGNT" id="MAINIGNT" placeholder="Main ingredient" value="{{$line->MAINIGNT}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Brand Code</label>
                                            <input type="text"  class="form-control" name="BRANDCODE" id="BRANDCODE" placeholder="Brand Code" value="{{$line->BRANDCODE}}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Meal Code</label>
                                        <select type="text" class="form-control" name="MEALCD" id="MEALCD" placeholder="Meal Code" value="{{$line->MEALCD}}">
                                            <option value=""   {{$line->MEALCD == ''  ? 'selected' : ''}}  >0 - Blank</option>
                                            <option value="1"  {{$line->MEALCD == 1  ? 'selected' : ''}}  >1 - Breakfast</option>
                                            <option value="2"  {{$line->MEALCD == 2  ? 'selected' : ''}}  >2 - AM Snack</option>
                                            <option value="3"  {{$line->MEALCD == 3  ? 'selected' : ''}}  >3 - Lunch</option>
                                            <option value="4"  {{$line->MEALCD == 4  ? 'selected' : ''}}  >4 - PM Snack</option>
                                            <option value="5"  {{$line->MEALCD == 5  ? 'selected' : ''}}  >5 - Supper</option>
                                            <option value="6"  {{$line->MEALCD == 6  ? 'selected' : ''}}  >6 - Late PM Snack</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>WRCODE</label>
                                        <select type="text"class="form-control" name="WRCODE" id="WRCODE" placeholder="WRCODE" value="{{$line->WRCODE}}">
                                            <option value=""   {{$line->WRCODE == ''  ? 'selected' : ''}}  >0 - Blank</option>
                                            <option value="1"  {{$line->WRCODE == 1  ? 'selected' : ''}}  >1 - Weighed</option>
                                            <option value="2"  {{$line->WRCODE == 2  ? 'selected' : ''}}  >2 - Recalled</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>RFCODE</label>
                                        <select type="text"  class="form-control" name="RFCODE" placeholder="RFCODE" value="{{$line->RFCODE}}">
                                            <option value=""   {{$line->RFCODE == ''  ? 'selected' : ''}}  >0 - Blank</option>
                                            <option value="1"  {{$line->RFCODE == 1  ? 'selected' : ''}}  >1 - Single Food Item</option>
                                            <option value="2"  {{$line->RFCODE == 2  ? 'selected' : ''}}  >2 - Mixed Dish</option>
                                            <option value="3"  {{$line->RFCODE == 3  ? 'selected' : ''}}  >3 - Composite Ingredient</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>FOODCODE LIST</label>
                                        <input type="text" list="fct" class="form-control" name="FOODDESC" id="FOODDESC" placeholder="FIC" value="{{$line->FOODDESC}}"/>
                                        <datalist id="fct" >
                                                @foreach ($fct as $value)
                                                <option >{{$value->foodcode.' - '.$value->fooddesc}}</option>
                                                @endforeach                                         
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>FOODWEIGHT</label>
                                    <input type="number" step="any" class="form-control" name="FOODWEIGHT" id="FOODWEIGHT" placeholder="FOODWEIGHT" value="{{$line->FOODWEIGHT}}"/>
                                </div>
                            </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>RCC</label>
                                <select type="text" class="form-control" name="RCC" id="RCC" placeholder="RCC" value="{{$line->RCC}}">
                                        <option value=""   {{$line->RCC == ''  ? 'selected' : ''}}  >0 - Blank</option>
                                        <option value="1"  {{$line->RCC == 1  ? 'selected' : ''}}  >1 - Raw as purchased</option>
                                        <option value="2"  {{$line->RCC == 2  ? 'selected' : ''}}  >2 - Raw edible portion</option>
                                        <option value="3"  {{$line->RCC == 3  ? 'selected' : ''}}  >3 - Cooked as purchased</option>
                                        <option value="4"  {{$line->RCC == 4  ? 'selected' : ''}}  >4 - Cooked edible portion</option>
                                        <option value="5"  {{$line->RCC == 5  ? 'selected' : ''}}  >5 - Cleaned and Drawn fresh fish</option>
                                        <option value="6"  {{$line->RCC == 6  ? 'selected' : ''}}  >6 - Cleaned and Drawn cooked fish</option>
                                        <option value="-"  {{$line->RCC == '-'  ? 'selected' : ''}}  >88 - NONE </option>
                                    </select>   
                            </div>
                        </div>
                        <div class="col-md-2">
                                <div class="form-group">
                                    <label>CMC</label>
                                    <select type="text" class="form-control" name="CMC" id="CMC" placeholder="CMC" value="{{$line->CMC}}">
                                        <option value=""   {{$line->CMC == ''  ? 'selected' : ''}}  >0 - Blank</option>
                                        <option value="1"  {{$line->CMC == 1  ? 'selected' : ''}}  >1 - Boiled</option>
                                        <option value="2"  {{$line->CMC == 2  ? 'selected' : ''}}  >2 - Fried</option>
                                        <option value="3"  {{$line->CMC == 3  ? 'selected' : ''}}  >3 - Sauteed</option>
                                        <option value="4"  {{$line->CMC == 4  ? 'selected' : ''}}  >4 - Broiled</option>
                                        <option value="5"  {{$line->CMC == 5  ? 'selected' : ''}}  >5 - Scambled</option>
                                        <option value="6"  {{$line->CMC == 6  ? 'selected' : ''}}  >6 - Raw</option>
                                        <option value="-"  {{$line->CMC == '-'  ? 'selected' : ''}}  >88 - NONE </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>SUPCODE</label>
                                    <select type="text" class="form-control" name="SUPCODE" id="SUPCODE" placeholder="SUPCODE" value="{{$line->SUPCODE}}">
                                        <option value=""   {{$line->SUPCODE == ''  ? 'selected' : ''}}  >0 - Blank</option>
                                        <option value="1"  {{$line->SUPCODE == 1  ? 'selected' : ''}}  >1 - Bought</option>
                                        <option value="2"  {{$line->SUPCODE == 2  ? 'selected' : ''}}  >2 - Barter</option>
                                        <option value="3"  {{$line->SUPCODE == 3  ? 'selected' : ''}}  >3 - Given</option>
                                        <option value="4"  {{$line->SUPCODE == 4  ? 'selected' : ''}}  >4 - Own Produced</option>
                                        <option value="9"  {{$line->SUPCODE == 9  ? 'selected' : ''}}  >9 - NA</option>
                                        <option value="-"  {{$line->SUPCODE == '-'  ? 'selected' : ''}}  >88 - NONE </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="form-group">
                                        <label>SRCCODE</label>
                                        <select type="text" class="form-control" name="SRCCODE" id="SRCCODE" placeholder="SRCCODE" value="{{$line->SRCCODE}}">
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
                            </div>
                            <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>PW_WGT</label>
                                            <input type="number" step="any" class="form-control pw-group" name="PW_WGT" id="PW_WGT" placeholder="PW_WGT" value="{{$line->PW_WGT}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>PW_RCC</label>
                                            <select type="text"  class="form-control pw-group" name="PW_RCC" id="PW_RCC" placeholder="PW_RCC" value="{{$line->PW_RCC}}">
                                                <option value=""   {{$line->PW_RCC == ''  ? 'selected' : ''}}  >0 - Blank</option>
                                                <option value="1"  {{$line->PW_RCC == 1  ? 'selected' : ''}}  >1 - Raw as purchased</option>
                                                <option value="2"  {{$line->PW_RCC == 2  ? 'selected' : ''}}  >2 - Raw edible portion</option>
                                                <option value="3"  {{$line->PW_RCC == 3  ? 'selected' : ''}}  >3 - Cooked as purchased</option>
                                                <option value="4"  {{$line->PW_RCC == 4  ? 'selected' : ''}}  >4 - Cooked edible portion</option>
                                                <option value="5"  {{$line->PW_RCC == 5  ? 'selected' : ''}}  >5 - Cleaned and Drawn fresh fish</option>
                                                <option value="6"  {{$line->PW_RCC == 6  ? 'selected' : ''}}  >6 - Cleaned and Drawn cooked fish</option>
                                                <option value="-"  {{$line->PW_RCC == '-'  ? 'selected' : ''}}  >88 - NONE </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                            <div class="form-group">
                                                <label>PW_CMC</label>
                                            <select type="text" class="form-control pw-group" name="PW_CMC" id="PW_CMC" placeholder="PW_CMC" value="{{$line->PW_CMC}}">
                                                <option value=""   {{$line->PW_CMC == ''  ? 'selected' : ''}}   >0 - Blank</option>
                                                <option value="1"  {{$line->PW_CMC == 1  ? 'selected' : ''}}   >1 - Boiled</option>
                                                <option value="2"  {{$line->PW_CMC == 2  ? 'selected' : ''}}   >2 - Fried</option>
                                                <option value="3"  {{$line->PW_CMC == 3  ? 'selected' : ''}}   >3 - Sauteed</option>
                                                <option value="4"  {{$line->PW_CMC == 4  ? 'selected' : ''}}   >4 - Broiled</option>
                                                <option value="5"  {{$line->PW_CMC == 5  ? 'selected' : ''}}   >5 - Scambled</option>
                                                <option value="6"  {{$line->PW_CMC == 6  ? 'selected' : ''}}   >6 - Raw</option>
                                                <option value="-"  {{$line->PW_CMC == '-'  ? 'selected' : ''}}   >88 - NONE </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                            <div class="form-group">
                                            <label>PURCODE</label>
                                            <select type="text" class="form-control pw-group" name="PURCODE" id="PURCODE" placeholder="PURCODE" value="{{$line->PURCODE}}">
                                                <option value=""   {{$line->PURCODE == ''  ? 'selected' : ''}}  >0 - Blank</option>
                                                <option value="1"  {{$line->PURCODE == 1  ? 'selected' : ''}}  >1 - Fed to pets</option>
                                                <option value="2"  {{$line->PURCODE == 2  ? 'selected' : ''}}  >2 - Discarded</option>
                                                <option value="-"  {{$line->PURCODE == '-'  ? 'selected' : ''}}  >88 - NONE </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>GO_WGT</label>
                                                <input type="number" step="any" class="form-control go-group" name="GO_WGT" id="GO_WGT" placeholder="GO_WGT" value="{{$line->GO_WGT}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>GO_RCC</label>
                                                <select type="text"  class="form-control go-group" name="GO_RCC" id="GO_RCC" placeholder="GO_RCC" value="{{$line->GO_RCC}}">
                                                    <option value=""   {{$line->GO_RCC == ''  ? 'selected' : ''}}  >0 - Blank</option>
                                                    <option value="1"  {{$line->GO_RCC == 1  ? 'selected' : ''}}  >1 - Raw as purchased</option>
                                                    <option value="2"  {{$line->GO_RCC == 2  ? 'selected' : ''}}  >2 - Raw edible portion</option>
                                                    <option value="3"  {{$line->GO_RCC == 3  ? 'selected' : ''}}  >3 - Cooked as purchased</option>
                                                    <option value="4"  {{$line->GO_RCC == 4  ? 'selected' : ''}}  >4 - Cooked edible portion</option>
                                                    <option value="5"  {{$line->GO_RCC == 5  ? 'selected' : ''}}  >5 - Cleaned and Drawn fresh fish</option>
                                                    <option value="6"  {{$line->GO_RCC == 6  ? 'selected' : ''}}  >6 - Cleaned and Drawn cooked fish</option>
                                                    <option value="-"  {{$line->GO_RCC == '-'  ? 'selected' : ''}}  >88 - NONE </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>GO_CMC</label>
                                                <select type="text" class="form-control go-group" name="GO_CMC" id="GO_CMC" placeholder="GO_CMC" value="{{$line->GO_CMC}}">
                                                    <option value=""   {{$line->GO_CMC == ''  ? 'selected' : ''}}  >0 - Blank</option>
                                                    <option value="1"  {{$line->GO_CMC == 1  ? 'selected' : ''}}  >1 - Boiled</option>
                                                    <option value="2"  {{$line->GO_CMC == 2  ? 'selected' : ''}}  >2 - Fried</option>
                                                    <option value="3"  {{$line->GO_CMC == 3  ? 'selected' : ''}}  >3 - Sauteed</option>
                                                    <option value="4"  {{$line->GO_CMC == 4  ? 'selected' : ''}}  >4 - Broiled</option>
                                                    <option value="5"  {{$line->GO_CMC == 5  ? 'selected' : ''}}  >5 - Scambled</option>
                                                    <option value="6"  {{$line->GO_CMC == 6  ? 'selected' : ''}}  >6 - Raw</option>
                                                    <option value="-"  {{$line->GO_CMC == '-'  ? 'selected' : ''}}  >88 - NONE </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>LO_WGT</label>
                                                    <input type="number" step="any" class="form-control lo-group" name="LO_WGT" id="LO_WGT" placeholder="LO_WGT" value="{{$line->LO_WGT}}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>LO_RCC</label>
                                                    <select type="text"  class="form-control lo-group" name="LO_RCC" id="LO_RCC" placeholder="LO_RCC" value="{{$line->LO_RCC}}">
                                                        <option value=""   {{$line->LO_RCC == ''  ? 'selected' : ''}}  >0 - Blank</option>
                                                        <option value="1"  {{$line->LO_RCC == 1  ? 'selected' : ''}}  >1 - Raw as purchased</option>
                                                        <option value="2"  {{$line->LO_RCC == 2  ? 'selected' : ''}}  >2 - Raw edible portion</option>
                                                        <option value="3"  {{$line->LO_RCC == 3  ? 'selected' : ''}}  >3 - Cooked as purchased</option>
                                                        <option value="4"  {{$line->LO_RCC == 4  ? 'selected' : ''}}  >4 - Cooked edible portion</option>
                                                        <option value="5"  {{$line->LO_RCC == 5  ? 'selected' : ''}}  >5 - Cleaned and Drawn fresh fish</option>
                                                        <option value="6"  {{$line->LO_RCC == 6  ? 'selected' : ''}}  >6 - Cleaned and Drawn cooked fish</option>
                                                        <option value="-"  {{$line->LO_RCC == '-'  ? 'selected' : ''}}  >88 - NONE </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>LO_CMC</label>
                                                    <select type="text" class="form-control lo-group" name="LO_CMC" id="LO_CMC" placeholder="LO_CMC" value="{{$line->LO_CMC}}">
                                                        <option value=""   {{$line->LO_CMC == ''  ? 'selected' : ''}}  >0 - Blank</option>
                                                        <option value="1"  {{$line->LO_CMC == 1  ? 'selected' : ''}}  >1 - Boiled</option>
                                                        <option value="2"  {{$line->LO_CMC == 2  ? 'selected' : ''}}  >2 - Fried</option>
                                                        <option value="3"  {{$line->LO_CMC == 3  ? 'selected' : ''}}  >3 - Sauteed</option>
                                                        <option value="4"  {{$line->LO_CMC == 4  ? 'selected' : ''}}  >4 - Broiled</option>
                                                        <option value="5"  {{$line->LO_CMC == 5  ? 'selected' : ''}}  >5 - Scambled</option>
                                                        <option value="6"  {{$line->LO_CMC == 6  ? 'selected' : ''}}  >6 - Raw</option>
                                                        <option value="-"  {{$line->LO_CMC == '-'  ? 'selected' : ''}}  >88 - NONE </option>
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
                                                        <label>Unit Measurement</label>
                                                        <input type="text" class="form-control" name="UNIT" id="UNIT" placeholder="Unit Measurment" value="{{$line->UNIT}}"/>
                                                    </div>
                                                </div>
                                            </div>                                
                        
                                {{-- Launch the Confirmation modal --}}
                                <a href="#" data-toggle="modal" data-target="#updateRecord">
                                    <button type="submit" class="autofocus d-sm-inline-block btn  btn-primary shadow-sm">
                                        Update
                                    </button>
                                </a>

                                {{-- Confirmation Modal --}}
                                <div class="modal fade" id="updateRecord" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <a class="btn btn-primary" href="{{ route('updateRecord', ['id'=>$line->id]) }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('update-form63').submit();">
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
