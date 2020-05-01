@extends('layouts.main')

@section('content') 
<div class="content">
        <div class="container-fluid">
            <div class="row">
                @if(isset($records))
                    @if($records->count() > 0)   
                    <div class="col-md-12">
                            <h1 class="h3 mb-2 text-gray-800">Food Record | Form 6.3</h1>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">No. of encoded lines : {{$count}}</h6>
                                <div class="pt-2">
                                    <a href="{{ route('foodrecord', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn ])}}">
                                        <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                            <i class="fas fa-arrow-left"></i> 
                                        </button>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="card-body">
                                @include('inc.messages')
                                <div class="table-responsive table-responsive-foodrecord">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" auto-index>
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
                                                    <th>MEAL</th>
                                                    <th>WR CODE</th>
                                                    <th>RF CODE</th>
                                                    <th>FOOD CODE</th>
                                                    <th>FOODCODE LIST</th>
                                                    <th>WEIGHT</th>
                                                    <th>RCC</th>
                                                    <th>CMC</th>
                                                    <th>SUP CODE</th>
                                                    <th>SRC CODE</th>
                                                    <th>PW WGT</th>
                                                    <th>PW RCC</th>
                                                    <th>PW CMC</th>
                                                    <th>PC</th>
                                                    <th>GO WGT</th>
                                                    <th>GO RCC</th>
                                                    <th>GO CMC</th>
                                                    <th>LO WGT</th>
                                                    <th>LO RCC</th>
                                                    <th>LO CMC</th>
                                                    <th>UNIT COST</th>
                                                    <th>UNIT WGT</th>
                                                    <th>UNIT MEAS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($records as $record)
                                                <tr>
                                                    <td>  
                                                        <button data-path="{{ route('foodrecord_edit', ['eacode'=>$record->eacode, 'hcn'=>$record->hcn, 'shsn'=>$record->shsn, 'id'=>$record->id, 'edit' ])}}" 
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
                                                    <td>{{ $record->LINENO}}</td>
                                                    <td>{{ $record->FOODITEM}}</td>
                                                    <td>{{ $record->DESCRIPTION}}</td>
                                                    <td>{{ $record->BRANDNAME}}</td>
                                                    <td>{{ $record->MAINIGNT}}</td>
                                                    <td>{{ $record->BRANDCODE}}</td>
                                                    <td>{{ $record->MEALCD}}</td>
                                                    <td>{{ $record->WRCODE}}</td>
                                                    <td>{{ $record->RFCODE}}</td>
                                                    <td>{{ $record->FOODCODE}}</td>
                                                    <td>{{ $record->FOODDESC}}</td>
                                                    <td>{{ $record->FOODWEIGHT}}</td>
                                                    <td>{{ $record->RCC}}</td>
                                                    <td>{{ $record->CMC}}</td>
                                                    <td>{{ $record->SUPCODE}}</td>
                                                    <td>{{ $record->SRCCODE}}</td>
                                                    <td>{{ $record->PW_WGT}}</td>
                                                    <td>{{ $record->PW_RCC}}</td>
                                                    <td>{{ $record->PW_CMC}}</td>
                                                    <td>{{ $record->PURCODE}}</td>
                                                    <td>{{ $record->GO_WGT}}</td>
                                                    <td>{{ $record->GO_RCC}}</td>
                                                    <td>{{ $record->GO_CMC}}</td>
                                                    <td>{{ $record->LO_WGT}}</td>
                                                    <td>{{ $record->LO_RCC}}</td>
                                                    <td>{{ $record->LO_CMC}}</td>
                                                    <td>{{ $record->UNITCOST}}</td>
                                                    <td>{{ $record->UNITWGT}}</td>
                                                    <td>{{ $record->UNIT}}</td>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Form 6.3</h6>
                                    <div class="pt-2">
                                        <a href="{{ route('foodrecord', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn ])}}">
                                            <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                <i class="fas fa-arrow-left"></i> 
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="alert alert-warning">No records to display, Please encode form 6.3</h5>
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
                <h1 class="h3 mb-2 text-grey-800">Updating Food Record | Form 6.3</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
                <div class="modal-body" id="get-record" style="overflow-x: scroll;">
                    {{-- Call foorecord_edit blade here --}}
                </div>
        </div>
        </div>
    </div>

@endsection




