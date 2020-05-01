<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <h5 class="m-0 font-weight-bold text-primary ">Good day {{Auth::user()->first_name}} {{Auth::user()->last_name}}!</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered"  width="100%" cellspacing="0" >
                                <thead>
                                    <tr>
                                        <th>Booklet 9</th>
                                        <th>Booklet 10A</th>
                                        <th>Booklet 10B</th>
                                        <th>Booklet 10C</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$b9}}</td>
                                        <td>{{$b10a}}</td>
                                        <td>{{$b10b}}</td>
                                        <td>{{$b10c}}</td>
                                        <td>{{$total}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <footer>
                        <p class="m-0 text-grey pt-1 text-right">{{date('M-d-Y  | h:i:s')}}</p>
                    </footer>
                </div>
            </div>          
        </div> 
    </div> 