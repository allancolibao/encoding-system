<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h6 class="m-0 font-weight-bold text-primary">ADD OTHER 50</h6>
                    <div class="card-body">
                        <form id="insert-other-50" method="POST" action="{{ action('StartEncodingController@insertOther50') }}" accept-charset="UTF-8">
                            @csrf
                                <input type="hidden" class="form-control" name="eacode" id="eacode" value="{{$eacode}}" />
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hcn</label>
                                        <input type="number" step="any"  class="form-control" name="hcn" id="hcn" placeholder="Hcn" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Shsn</label>
                                        <input type="number" step="any" class="form-control" name="shsn" id="shsn" placeholder="Shsn" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Member no.</label>
                                        <input type="number" step="any" class="form-control" name="member_code" id="member_code" placeholder="Mem no." value=""/>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>First name</label>
                                        <input type="text"class="form-control" name="givenname" id="givenname" placeholder="First name" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input type="text"  class="form-control" name="surname" id="surname" placeholder="Last name" value=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Age</label>
                                        <input type="number" step="any" class="form-control" name="age" id="age" placeholder="Age" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sex</label>
                                        <input type="number" step="any" class="form-control" name="sex" id="sex" placeholder="Sex" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>PSC</label>
                                        <input type="number" step="any"  class="form-control" name="psc" id="psc" placeholder="PSC" value=""/>
                                    </div>
                                </div>
                                        <input type="hidden" name="mp" id="mp" value="0"/>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date of birth</label>
                                        <input type="date"  class="form-control" name="dbirth" id="dbirth" placeholder="Date of birth" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reference date</label>
                                        <input type="date" class="form-control" name="refdate" id="refdate" placeholder="Reference date" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <select type="text" class="form-control" name="interview_status" id="interview_status" value="">
                                        @foreach ($is as $is)
                                        <option value="{{$is->is_value}}">{{$is->is_text}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            {{-- Launch the Confirmation modal --}}
                            <a href="#" data-toggle="modal" data-target="#saveModal">
                                <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                    Save
                                </button>
                            </a>

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
                                                <a class="btn btn-primary" href="{{ route('insertOther50') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('insert-other-50').submit();">
                                                Proceed
                                                </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  {{--row--}}           
        </div> {{-- container-fluid --}}
    </div> {{-- content --}}