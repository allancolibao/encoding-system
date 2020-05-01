<div class="content">
    <div class="container-fluid">
        <div class="row"> 
            <div class="col-md-12">
                <h6 class="m-0 font-weight-bold text-primary">Mem no: {{$member->MEMBER_CODE}} | Name: {{$member->GIVENNAME}} {{$member->SURNAME}} | Age: {{$member->AGE}}</h6>
                            <div class="card-body">
                                        <form id="update-form61" method="POST" action="{{ action('StartEncodingController@membershipUpdate', $member->id) }}" accept-charset="UTF-8">
                                            @csrf
                                            <input type="hidden" name="_method" value="PATCH" /> 
                                            <input type="text" class="form-control" name="eacode" id="eacode" value="{{$member->eacode}}" hidden/>
                                            <input type="text" class="form-control" name="hcn" id="hcn" value="{{$member->hcn}}" hidden/>
                                            <input type="text" class="form-control" name="shsn" id="shsn" value="{{$member->shsn}}" hidden/> 
                                            <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                        <label>Member no.</label>
                                                        <input type="number" step="any" class="form-control" name="MEMBER_CODE" id="MEMBER_CODE" placeholder="Member no." value="{{$member->MEMBER_CODE}}"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label>First name</label>
                                                        <input type="text"class="form-control" name="GIVENNAME" id="GIVENNAME" placeholder="First name" value="{{$member->GIVENNAME}}"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label>Last name</label>
                                                        <input type="text"  class="form-control" name="SURNAME" id="SURNAME" placeholder="Last name" value="{{$member->SURNAME}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label>Age</label>
                                                        <input type="text" class="form-control" name="AGE" id="AGE" placeholder="Age" value="{{$member->AGE}}"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Sex</label>
                                                        <input type="text"class="form-control" name="SEX" id="SEX" placeholder="Sex" value="{{$member->SEX}}"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>PSC</label>
                                                        <input type="text"  class="form-control" name="PSC" id="PSC" placeholder="PSC" value="{{$member->PSC}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label>Meal planner</label>
                                                        <input type="text" class="form-control" name="MP" id="MP" placeholder="Meal planner" value="{{$member->MP}}"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Breakfast</label>
                                                        <input type="text"class="form-control" name="BF" id="BF" placeholder="Breakfast" value="{{$member->BF}}"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>AM snack</label>
                                                        <input type="text"  class="form-control" name="AMSNCK" id="AMSNCK" placeholder="AM snack" value="{{$member->AMSNCK}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                        <label>Lunch</label>
                                                        <input type="text" class="form-control" name="LUNCH" id="LUNCH" placeholder="Lunch" value="{{$member->LUNCH}}"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>PM snack</label>
                                                        <input type="text"class="form-control" name="PMSNCK" id="PMSNCK" placeholder="PM snack" value="{{$member->PMSNCK}}"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Supper</label>
                                                        <input type="text"  class="form-control" name="SUPPER" id="SUPPER" placeholder="Supper" value="{{$member->SUPPER}}"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Late PM Snack</label>
                                                        <input type="text"  class="form-control" name="LATESNCK" id="LATESNCK" placeholder="Late PM snack" value="{{$member->LATESNCK}}"/>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" name="updated_by" id="updated_by" value="{{ Auth::user()->name }}" hidden/>
                                            </div>
                                            
                                             {{-- Launch the Confirmation modal --}}
                                                <a href="#" data-toggle="modal" data-target="#updateModal61">
                                                    <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                        Update
                                                    </button>
                                                </a>

                                                {{-- Confirmation Modal --}}
                                                <div class="modal fade" id="updateModal61" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                    <a class="btn btn-primary" href="{{ route('insertUpdate', ['id'=>$member->id]) }}"
                                                                    onclick="event.preventDefault();
                                                                    document.getElementById('update-form61').submit();">
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
