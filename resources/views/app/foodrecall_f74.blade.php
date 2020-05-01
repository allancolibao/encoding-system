@extends('layouts.main')

@section('content') 
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                            <h1 class="h3 mb-2 text-gray-800">Consumption Practices | Form 7.4</h1>
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">{{$membercode}} {{$givenname}} {{$surname}} | {{$age}}</h6>
                                        <div class="pt-2">
                                            <a href="{{ route('foodrecall_encode', ['eacode'=>$eacode, 'hcn'=>$hcn, 'shsn'=>$shsn, 'member_code'=>$membercode, 'givenname'=>$givenname, 'surname'=>$surname, 'age'=>$age, 'sex'=>$sex, 'psc'=>$psc])}}">
                                                <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                <i class="fas fa-arrow-left"></i> 
                                                </button>
                                            </a>
                                        </div>
                                        <div class="pt-4">
                                            {{-- Pagination link --}}
                                            <ul id="pagin"></ul>        
                                        </div>
                                    </div>
                                    <div class="card-body">
                                    @if(isset($form74))
                                    @if($form74->count() > 0)
                                    {{-- Update form 7.4 start here --}}

                                    @foreach ($form74 as $value)

                                    @include('inc.messages')
                                    <p class="text-center" style="text-decoration:underline;"> 
                                        “This questionnaire is about your usual consumption practices at home and outside the home.” 
                                        “Ang questionnaire na ito ay tungkol sa mga nakagawian mo tungkol sa pagkain sa bahay at labas ng bahay.”
                                    </p>

                                    {{-- Form start here --}}
                                    <form id="update-form74" method="POST" action="{{ action('StartEncodingController@updateF74', $value->id) }}" accept-charset="UTF-8">
                                    @csrf
                                    
                                    {{-- Tick A --}}
                                    <div class="line-content">
                                    @foreach ($questions_1 as $question)

                                    <h5 class="text-primary">{{$question->f74_cat_text}}</h5>

                                    <input type="checkbox" {{$value->tick_A == 'on'  ? 'checked' : ''}} style="width: 1em;  height: 1em;" name="tick_A" id="toggleElement_A" onchange="toggleStatus_A()"><strong> {{$question->f74_tick_text}}</strong>

                                    <p class="pt-4">{{$question->f74_q_text}}</p>
                                    
                                    <p>{{$question->f74_alt_q_text}}</p>
                                    
                                    <div id="elementsToOperateOn_A">
                                        <div class="table-responsive">
                                            <table class="table table-bordered"  width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center m-0">MEALS</th>
                                                        <th colspan="2" class="text-center"><p>1.	How often do you usually eat home-cooked/prepared food at home for breakfast? For lunch? For supper?
                                                        </p><p>“Gaano ka kadalas kumain sa bahay ng lutong bahay para sa almusal? Sa tanghalian? Sa hapunan?<p></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        @foreach ($meals_1 as $meal)
                                                        <tr>
                                                            <td>{{$meal->meals_title}}</td>
                                                            <td>
                                                                <select type="text" class="form-control" name="{{$meal->meals_name}}" id="{{$meal->meals_name}}" value="{{$value[$meal->meals_name]}}" {{$value->tick_A == 'on'  ? '' : 'disabled'}}>
                                                                @foreach ($options_1 as $option)
                                                                    <option value="{{$option->options_val}}" {{$value[$meal->meals_name] == $option->options_val  ? 'selected' : ''}} >{{$option->options_name}}</option>
                                                                @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="{{$meal->meals_input}}" id="{{$meal->meals_input}}" placeholder="No of times" value="{{$value[$meal->meals_input]}}" {{$value->tick_A == 'on'  ? '' : 'disabled'}} {{$value[$meal->meals_name] == '1'  ? 'disabled' : ''}}/>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                        @endforeach
                                    </div>
                                        {{-- End of tick A --}}

                      

                                        {{-- Tick B --}}
                                        <div class="line-content">
                                        @foreach ($questions_2 as $question)

                                        <h5 class="text-primary">{{$question->f74_cat_text}}</h5>
    
                                        <input type="checkbox" {{$value->tick_B == 'on'  ? 'checked' : ''}} style="width: 1em;  height: 1em;" name="tick_B" id="toggleElement_B" onchange="toggleStatus_B()"><strong> {{$question->f74_tick_text}}</strong>
    
                                        <p class="pt-4">{{$question->f74_q_text}}</p>
                                        
                                        <p>{{$question->f74_alt_q_text}}</p>
                                        
                                        <div id="elementsToOperateOn_B">
                                        <div class="table-responsive">
                                            <table class="table table-bordered"  width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center m-0">MEALS</th>
                                                        <th colspan="2" class="text-center"><p>2. How often do you bring home-cooked/prepared food to your school/workplace for breakfast? For lunch? For supper?
                                                        </p><p>“Gaano kadalas ka magbaon ng lutong bahay sa eskwelahan/ pinagtatrabahuhan para sa almusal? Sa tanghalian? Sa hapunan?”<p></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        @foreach ($meals_2 as $meal)
                                                        <tr>
                                                            <td>{{$meal->meals_title}}</td>
                                                            <td>
                                                                <select type="text" class="form-control" name="{{$meal->meals_name}}" id="{{$meal->meals_name}}" value="{{$value[$meal->meals_name]}}" {{$value->tick_B == 'on'  ? '' : 'disabled'}}>
                                                                @foreach ($options_1 as $option)
                                                                    <option value="{{$option->options_val}}" {{$value[$meal->meals_name] == $option->options_val  ? 'selected' : ''}} >{{$option->options_name}}</option>
                                                                @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="{{$meal->meals_input}}" id="{{$meal->meals_input}}" placeholder="No of times" value="{{$value[$meal->meals_input]}}" {{$value->tick_B == 'on'  ? '' : 'disabled'}} {{$value[$meal->meals_name] == '1'  ? 'disabled' : ''}} />
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @endforeach

                                        <div class="table-responsive pt-4">
                                                <table class="table table-bordered"  width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="3" class="text-center">
                                                                <p>3. What is/are your reason(s) for bringing packed food cooked/prepared from home to our school/workplace?</p>
                                                                <p>“Bakit ka nagbabaon ng lutong bahay sa eskwelahan o pinagtratrabahuhan?”<p>
                                                                <p>(Multiple answers; do not enumerate choices.)</p>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Reason</td>
                                                            <td>Code</td>
                                                        </tr>
                                                        @foreach ($reasons_1 as $reason)
                                                        <tr>
                                                            <td>{{$reason->reasons_title}}</td>
                                                            <td>
                                                            <select type="text" class="form-control" name="{{$reason->reasons_name}}" id="{{$reason->reasons_name}}" value="{{$value[$reason->reasons_name]}}" {{$value->tick_B == 'on'  ? '' : 'disabled'}}>
                                                                @foreach ($options_2 as $option)
                                                                    <option value="{{$option->options_val}}" {{$value[$reason->reasons_name] == $option->options_val  ? 'selected' : ''}} >{{$option->options_name}}</option>
                                                                @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td>Others, Specify</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="oth_3" id="oth_3" placeholder="Others, Specify" value="{{$value->oth_3}}" {{$value->tick_B == 'on'  ? '' : 'disabled'}}/>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        </div>
                                        {{-- End of tick B --}}

                    

                                        {{-- Tick C --}}
                                        <div class="line-content">
                                        @foreach ($questions_3 as $question)

                                        <h5 class="text-primary">{{$question->f74_cat_text}}</h5>
    
                                        <input type="checkbox"  {{$value->tick_C == 'on'  ? 'checked' : ''}} style="width: 1em;  height: 1em;" name="tick_C" id="toggleElement_C" onchange="toggleStatus_C()"><strong> {{$question->f74_tick_text}}</strong>
    
                                        <p class="pt-4">{{$question->f74_q_text}}</p>
                                        
                                        <p>{{$question->f74_alt_q_text}}</p>
                                        
                                        <div id="elementsToOperateOn_C">
                                        <div class="table-responsive">
                                            <table class="table table-bordered"  width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center m-0">MEALS</th>
                                                        <th colspan="2" class="text-center">
                                                            <p>4. How often do you eat bought food at home for breakfast? For lunch? For supper?</p>
                                                            <p>“Gaano ka kadalas kumain sa bahay ng biniling lutong pagkain para sa almusal? Sa tanghalian? Sa hapunan?”<p>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        @foreach ($meals_4 as $meal)
                                                        <tr>
                                                            <td>{{$meal->meals_title}}</td>
                                                            <td>
                                                                <select type="text" class="form-control" name="{{$meal->meals_name}}" id="{{$meal->meals_name}}" value="{{$value[$meal->meals_name]}}" {{$value->tick_C == 'on'  ? '' : 'disabled'}}>
                                                                @foreach ($options_1 as $option)
                                                                    <option value="{{$option->options_val}}" {{$value[$meal->meals_name] == $option->options_val  ? 'selected' : ''}} >{{$option->options_name}}</option>
                                                                @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="{{$meal->meals_input}}" id="{{$meal->meals_input}}" placeholder="No of times" value="{{$value[$meal->meals_input]}}" {{$value->tick_C == 'on'  ? '' : 'disabled'}} {{$value[$meal->meals_name] == '1'  ? 'disabled' : ''}}/>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @endforeach

                                        <div class="table-responsive pt-4">
                                                <table class="table table-bordered"  width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="3" class="text-center">
                                                                <p>5. What is/are your reason(s) for eating bought food?</p>
                                                                <p>“Ano ang (mga) dahilan kung bakit ka kumakain sa bahay ng biniling lutong pagkain?”<p>
                                                                <p>(Multiple answers; do not enumerate choices.)</p>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Reason</td>
                                                            <td>Code</td>
                                                        </tr>
                                                        @foreach ($reasons_5 as $reason)
                                                        <tr>
                                                            <td>{{$reason->reasons_title}}</td>
                                                            <td>
                                                            <select type="text" class="form-control" name="{{$reason->reasons_name}}" id="{{$reason->reasons_name}}" value="{{$value[$reason->reasons_name]}}" {{$value->tick_C == 'on'  ? '' : 'disabled'}}>
                                                                @foreach ($options_2 as $option)
                                                                    <option value="{{$option->options_val}}" {{$value[$reason->reasons_name] == $option->options_val  ? 'selected' : ''}} >{{$option->options_name}}</option>
                                                                @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td>Others, Specify</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="oth_5" id="oth_5" placeholder="Others, Specify" value="{{$value->oth_5}}" {{$value->tick_C == 'on'  ? '' : 'disabled'}}/>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        </div>
                                        {{-- End of tick C --}}

                            

                                        {{-- Tick D --}}
                                        <div class="line-content">
                                        @foreach ($questions_4 as $question)

                                        <h5 class="text-primary">{{$question->f74_cat_text}}</h5>
    
                                        <input type="checkbox"  {{$value->tick_D == 'on'  ? 'checked' : ''}} style="width: 1em;  height: 1em;" name="tick_D" id="toggleElement_D" onchange="toggleStatus_D()"><strong> {{$question->f74_tick_text}}</strong>
    
                                        <p class="pt-4">{{$question->f74_q_text}}</p>
                                        
                                        <p>{{$question->f74_alt_q_text}}</p>

                                        <div id="elementsToOperateOn_D">
                                        <div class="table">
                                            <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-bordered"  width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center m-0">MEALS</th>
                                                            <th colspan="2" class="text-center">
                                                                <p>6. How often do you eat away from home for breakfast? For lunch? For supper?</p>
                                                                <p>“Gaano ka kadalas kumain sa labas para sa almusal? Sa tanghalian? Sa hapunan?”<p>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            @foreach ($meals_6 as $meal)
                                                            <tr>
                                                                <td>{{$meal->meals_title}}</td>
                                                                <td>
                                                                    <select type="text" class="form-control" name="{{$meal->meals_name}}" id="{{$meal->meals_name}}" value="{{$value[$meal->meals_name]}}" {{$value->tick_D == 'on'  ? '' : 'disabled'}}>
                                                                    @foreach ($options_1 as $option)
                                                                        <option value="{{$option->options_val}}" {{$value[$meal->meals_name] == $option->options_val  ? 'selected' : ''}} >{{$option->options_name}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="{{$meal->meals_input}}" id="{{$meal->meals_input}}" placeholder="No of times" value="{{$value[$meal->meals_input]}}" {{$value->tick_D == 'on'  ? '' : 'disabled'}}  {{$value[$meal->meals_name] == '1'  ? 'disabled' : ''}}/>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table table-bordered"  width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="2">
                                                                    <p>7. Where do you most frequently eat the bought food for breakfast? For lunch? For supper?</p>
                                                                    <p>“Saan ka madalas kumakain sa labas para sa almusal? Sa tanghalian? Sa hapunan?”</p>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                                @foreach ($meals_7 as $meal)
                                                                <tr>
                                                                    <td>
                                                                        <select type="text" class="form-control" name="{{$meal->meals_name}}" id="{{$meal->meals_name}}" value="{{$value[$meal->meals_name]}}" {{$value->tick_D == 'on'  ? '' : 'disabled'}}>
                                                                        @foreach ($options_7 as $option)
                                                                            <option value="{{$option->options_val}}" {{$value[$meal->meals_name] == $option->options_val  ? 'selected' : ''}} >{{$option->options_name}}</option>
                                                                        @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" name="{{$meal->meals_input}}" id="{{$meal->meals_input}}" placeholder="Others, Specify" value="{{$value[$meal->meals_input]}}" {{$value->tick_D == 'on'  ? '' : 'disabled'}}  {{$value[$meal->meals_name] != '4'  ? 'disabled' : ''}}/>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        <div class="table-responsive pt-4">
                                                <table class="table table-bordered"  width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="3" class="text-center">
                                                                <p>8. What is/are your reason(s) for eating away from home?</p>
                                                                <p>“Ano ang (mga) dahilan kung bakit ka kumakain sa labas?”<p>
                                                                <p>(Multiple answers; do not enumerate choices.)</p>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Reason</td>
                                                            <td>Code</td>
                                                        </tr>
                                                        @foreach ($reasons_8 as $reason)
                                                        <tr>
                                                            <td>{{$reason->reasons_title}}</td>
                                                            <td>
                                                            <select type="text" class="form-control" name="{{$reason->reasons_name}}" id="{{$reason->reasons_name}}" value="{{$value[$reason->reasons_name]}}" {{$value->tick_D == 'on'  ? '' : 'disabled'}}>
                                                                @foreach ($options_2 as $option)
                                                                    <option value="{{$option->options_val}}" {{$value[$reason->reasons_name] == $option->options_val  ? 'selected' : ''}} >{{$option->options_name}}</option>
                                                                @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td>Others, Specify</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="oth_8" id="oth_8" placeholder="Others, Specify" value="{{$value->oth_8}}" {{$value->tick_D == 'on'  ? '' : 'disabled'}}/>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        </div>
                                        {{-- End of tick D --}}

                                    

                                        {{-- Tick E --}}
                                        <div class="line-content">
                                        @foreach ($questions_5 as $question)

                                        <h5 class="text-primary">{{$question->f74_cat_text}}</h5>
    
                                        <input type="checkbox"  {{$value->tick_E == 'on'  ? 'checked' : ''}} style="width: 1em;  height: 1em;" name="tick_E" id="toggleElement_E" onchange="toggleStatus_E()"><strong> {{$question->f74_tick_text}}</strong>
    
                                        <p class="pt-4">{{$question->f74_q_text}}</p>
                                        
                                        <p>{{$question->f74_alt_q_text}}</p>

                                        <div id="elementsToOperateOn_E">
                                        <div class="table-responsive">
                                            <table class="table table-bordered"  width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center m-0">MEALS</th>
                                                        <th colspan="2" class="text-center">
                                                            <p>9. How often do you eat ready-to-eat food at home for breakfast? For lunch? For supper?</p>
                                                            <p>“Gaano ka kadalas kumain sa bahay ng ready-to-eat na pagkain para sa almusal? Sa tanghalian? Sa hapunan?”<p>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        @foreach ($meals_9 as $meal)
                                                        <tr>
                                                            <td>{{$meal->meals_title}}</td>
                                                            <td>
                                                                <select type="text" class="form-control" name="{{$meal->meals_name}}" id="{{$meal->meals_name}}" value="{{$value[$meal->meals_name]}}" {{$value->tick_E == 'on'  ? '' : 'disabled'}}>
                                                                @foreach ($options_1 as $option)
                                                                    <option value="{{$option->options_val}}" {{$value[$meal->meals_name] == $option->options_val  ? 'selected' : ''}} >{{$option->options_name}}</option>
                                                                @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="{{$meal->meals_input}}" id="{{$meal->meals_input}}" placeholder="No of times" value="{{$value[$meal->meals_input]}}" {{$value->tick_E == 'on'  ? '' : 'disabled'}} {{$value[$meal->meals_name] == '1'  ? 'disabled' : ''}}/>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @endforeach

                                        <div class="table-responsive pt-4">
                                                <table class="table table-bordered"  width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="3" class="text-center">
                                                                <p>10. What is/are your reason(s) for eating ready-to-eat food at home?</p>
                                                                <p>“Ano ang (mga) dahilan kung bakit ka kumakain sa bahay ng ready-to-eat na pagkain?”<p>
                                                                <p>(Multiple answers; do not enumerate choices.)</p>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Reason</td>
                                                            <td>Code</td>
                                                        </tr>
                                                        @foreach ($reasons_10 as $reason)
                                                        <tr>
                                                            <td>{{$reason->reasons_title}}</td>
                                                            <td>
                                                            <select type="text" class="form-control" name="{{$reason->reasons_name}}" id="{{$reason->reasons_name}}" value="{{$value[$reason->reasons_name]}}" {{$value->tick_E == 'on'  ? '' : 'disabled'}}>
                                                                @foreach ($options_2 as $option)
                                                                    <option value="{{$option->options_val}}" {{$value[$reason->reasons_name] == $option->options_val  ? 'selected' : ''}} >{{$option->options_name}}</option>
                                                                @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td>Others, Specify</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="oth_10" id="oth_10" placeholder="Others, Specify" value="{{$value->oth_10}}" {{$value->tick_E == 'on'  ? '' : 'disabled'}}/>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        </div>
                                        {{-- End of tick E --}}

                                        

                                        {{-- Tick F --}}
                                        <div class="line-content">
                                        @foreach ($questions_6 as $question)

                                        <h5 class="text-primary">{{$question->f74_cat_text}}</h5>
    
                                        <input type="checkbox"  {{$value->tick_F == 'on'  ? 'checked' : ''}} style="width: 1em;  height: 1em;" name="tick_F" id="toggleElement_F" onchange="toggleStatus_F()"><strong> {{$question->f74_tick_text}}</strong>
    
                                        <p class="pt-4">{{$question->f74_q_text}}</p>
                                        
                                        <p>{{$question->f74_alt_q_text}}</p>

                                        <div id="elementsToOperateOn_F">
                                        <div class="table">
                                            <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-bordered"  width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center m-0">MEALS</th>
                                                            <th colspan="2" class="text-center">
                                                                <p>11. How often do you eat ready-to-eat foods away from home for breakfast? For lunch? For supper?</p>
                                                                <p>“Gaano ka kadalas kumain sa labas ng mga ready-to-eat na pagkain para sa almusal? Sa tanghalian? Sa hapunan?”<p>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            @foreach ($meals_11 as $meal)
                                                            <tr>
                                                                <td>{{$meal->meals_title}}</td>
                                                                <td>
                                                                    <select type="text" class="form-control" name="{{$meal->meals_name}}" id="{{$meal->meals_name}}" value="{{$value[$meal->meals_name]}}" {{$value->tick_F == 'on'  ? '' : 'disabled'}}>
                                                                    @foreach ($options_1 as $option)
                                                                        <option value="{{$option->options_val}}" {{$value[$meal->meals_name] == $option->options_val  ? 'selected' : ''}} >{{$option->options_name}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="{{$meal->meals_input}}" id="{{$meal->meals_input}}" placeholder="No of times" value="{{$value[$meal->meals_input]}}" {{$value->tick_F == 'on'  ? '' : 'disabled'}} {{$value[$meal->meals_name] == '1'  ? 'disabled' : ''}}/>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table table-bordered"  width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="2">
                                                                    <p>12. Where do you most frequently eat the ready-to-eat food for breakfast? For lunch? For supper?</p>
                                                                    <p>“Saan ka madalas kumakain sa labas ng ready-to-eat na pagkain para sa almusal? Sa tanghalian? Sa hapunan?”</p><br>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                                @foreach ($meals_12 as $meal)
                                                                <tr>
                                                                    <td>
                                                                        <select type="text" class="form-control" name="{{$meal->meals_name}}" id="{{$meal->meals_name}}" value="{{$value[$meal->meals_name]}}" {{$value->tick_F == 'on'  ? '' : 'disabled'}}>
                                                                        @foreach ($options_7 as $option)
                                                                            <option value="{{$option->options_val}}" {{$value[$meal->meals_name] == $option->options_val  ? 'selected' : ''}} >{{$option->options_name}}</option>
                                                                        @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" name="{{$meal->meals_input}}" id="{{$meal->meals_input}}" placeholder="Others, Specify" value="{{$value[$meal->meals_input]}}" {{$value->tick_F == 'on'  ? '' : 'disabled'}} {{$value[$meal->meals_name] != '4'  ? 'disabled' : ''}}/>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        <div class="table-responsive pt-4">
                                                <table class="table table-bordered"  width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="3" class="text-center">
                                                                <p>13. What is/are your reason(s) for eating ready-to-eat foods away from home?</p>
                                                                <p>“Ano ang (mga) dahilan kung baki t ka kumakain sa labas?”<p>
                                                                <p>(Multiple answers; do not enumerate choices.)</p>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Reason</td>
                                                            <td>Code</td>
                                                        </tr>
                                                        @foreach ($reasons_13 as $reason)
                                                        <tr>
                                                            <td>{{$reason->reasons_title}}</td>
                                                            <td>
                                                            <select type="text" class="form-control" name="{{$reason->reasons_name}}" id="{{$reason->reasons_name}}" value="{{$value[$reason->reasons_name]}}" {{$value->tick_F == 'on'  ? '' : 'disabled'}}>
                                                                @foreach ($options_2 as $option)
                                                                    <option value="{{$option->options_val}}" {{$value[$reason->reasons_name] == $option->options_val  ? 'selected' : ''}} >{{$option->options_name}}</option>
                                                                @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td>Others, Specify</td>
                                                            <td>
                                                                <input type="text" class="form-control" name="oth_13" id="oth_13" placeholder="Others, Specify" value="{{$value->oth_13}}" {{$value->tick_F == 'on'  ? '' : 'disabled'}}/>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        {{-- End of tick F --}}

                                     

                                        {{-- IS and Save BTN Section --}}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                    <select type="text" class="form-control" name="INTERVIEW_STATUS" id="INTERVIEW_STATUS" value="{{$value->INTERVIEW_STATUS}}" {{$value->tick_A == 'on' || $value->tick_B == 'on' || $value->tick_C == 'on' || $value->tick_D == 'on' || $value->tick_E == 'on' || $value->tick_F == 'on' ? '' : ''}}>
                                                            @foreach ($is as $is)
                                                            <option value="{{$is->is_value}}" {{$value->INTERVIEW_STATUS == $is->is_value  ? 'selected' : ''}}>{{$is->is_text}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="#" data-toggle="modal" data-target="#update74">
                                                            <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                                Update 7.4
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                            {{-- Confirmation Modal --}}
                                            <div class="modal fade" id="update74" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <a class="btn btn-primary" href="{{ route('insertF74') }}"
                                                                onclick="event.preventDefault();
                                                                document.getElementById('update-form74').submit();">
                                                                Proceed
                                                                </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                    @endforeach 

                                    {{-- Update form 7.4 ends here --}}

                {{-- *************************************************************************** --}}
                
                                    @else  
                                    {{-- Insert new  form 7.4 start here --}}

                                            @include('inc.messages')
                                            <p class="text-center" style="text-decoration:underline;"> 
                                                “This questionnaire is about your usual consumption practices at home and outside the home.” 
                                                “Ang questionnaire na ito ay tungkol sa mga nakagawian mo tungkol sa pagkain sa bahay at labas ng bahay.”
                                            </p>

                                            {{-- Form start here --}}
                                            <form id="insert-form74" method="POST" action="{{ action('StartEncodingController@insertForm74') }}" accept-charset="UTF-8">
                                            @csrf
                                            <input type="text" class="form-control" name="eacode" id="eacode" value="{{$eacode}}" hidden/>
                                            <input type="text" class="form-control" name="hcn" id="hcn" value="{{$hcn}}" hidden/>
                                            <input type="text" class="form-control" name="shsn" id="shsn" value="{{$shsn}}" hidden/>    
                                            <input type="text" class="form-control" name="MEMBER_CODE" id="MEMBER_CODE" value="{{$membercode}}" hidden/> 
                                            <input type="text" class="form-control" name="RES_NO" id="RES_NO" value="{{$membercode}}" hidden/> 
                                            <input type="text" class="form-control" name="RES_NAME" id="RES_NAME" value="{{$givenname}} {{$surname}}" hidden/> 

                                            {{-- Tick A --}}
                                            <div class="line-content">
                                            @foreach ($questions_1 as $question)

                                            <h5 class="text-primary">{{$question->f74_cat_text}}</h5>

                                            <input type="checkbox" style="width: 1em;  height: 1em;" name="tick_A" id="toggleElement_A" onchange="toggleStatus_A()" ><strong> {{$question->f74_tick_text}}</strong>

                                            <p class="pt-4">{{$question->f74_q_text}}</p>
                                            
                                            <p>{{$question->f74_alt_q_text}}</p>

                                            <div id="elementsToOperateOn_A">
                                                <div class="table-responsive">
                                                        <table class="table table-bordered"  width="100%" cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center m-0">MEALS</th>
                                                                    <th colspan="2" class="text-center"><p>1.	How often do you usually eat home-cooked/prepared food at home for breakfast? For lunch? For supper?
                                                                    </p><p>“Gaano ka kadalas kumain sa bahay ng lutong bahay para sa almusal? Sa tanghalian? Sa hapunan?<p></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($meals_1 as $meal)
                                                                <tr>
                                                                    <td>{{$meal->meals_title}}</td>
                                                                    <td>
                                                                        <select type="text" class="form-control" name="{{$meal->meals_name}}" id="{{$meal->meals_name}}"  value="" disabled>
                                                                        @foreach ($options_1 as $option)
                                                                            <option value="{{$option->options_val}}">{{$option->options_name}}</option>
                                                                        @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control input-meals" name="{{$meal->meals_input}}" id="{{$meal->meals_input}}" placeholder="No of times" value="" disabled/>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                @endforeach
                                                </div>
                                                {{-- End of tick A --}}


                                                {{-- Tick B --}}
                                                <div class="line-content">
                                                @foreach ($questions_2 as $question)

                                                <h5 class="text-primary">{{$question->f74_cat_text}}</h5>
            
                                                <input type="checkbox" style="width: 1em;  height: 1em;" name="tick_B" id="toggleElement_B" onchange="toggleStatus_B()"><strong> {{$question->f74_tick_text}}</strong>
            
                                                <p class="pt-4">{{$question->f74_q_text}}</p>
                                                
                                                <p>{{$question->f74_alt_q_text}}</p>
                                                
                                                <div id="elementsToOperateOn_B">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered"  width="100%" cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center m-0">MEALS</th>
                                                                    <th colspan="2" class="text-center"><p>2. How often do you bring home-cooked/prepared food to your school/workplace for breakfast? For lunch? For supper?
                                                                    </p><p>“Gaano kadalas ka magbaon ng lutong bahay sa eskwelahan/ pinagtatrabahuhan para sa almusal? Sa tanghalian? Sa hapunan?”<p></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($meals_2 as $meal)
                                                                <tr>
                                                                    <td>{{$meal->meals_title}}</td>
                                                                    <td>
                                                                        <select type="text" class="form-control" name="{{$meal->meals_name}}" id="{{$meal->meals_name}}" value="" disabled>
                                                                        @foreach ($options_1 as $option)
                                                                            <option value="{{$option->options_val}}">{{$option->options_name}}</option>
                                                                        @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" name="{{$meal->meals_input}}" id="{{$meal->meals_input}}" placeholder="No of times" value="" disabled/>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                
                                                @endforeach

                                                <div class="table-responsive pt-4">
                                                        <table class="table table-bordered"  width="100%" cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="3" class="text-center">
                                                                        <p>3. What is/are your reason(s) for bringing packed food cooked/prepared from home to our school/workplace?</p>
                                                                        <p>“Bakit ka nagbabaon ng lutong bahay sa eskwelahan o pinagtratrabahuhan?”<p>
                                                                        <p>(Multiple answers; do not enumerate choices.)</p>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Reason</td>
                                                                    <td>Code</td>
                                                                </tr>
                                                                @foreach ($reasons_1 as $reason)
                                                                <tr>
                                                                    <td>{{$reason->reasons_title}}</td>
                                                                    <td>
                                                                        <select type="text" class="form-control" name="{{$reason->reasons_name}}" id="{{$reason->reasons_name}}" value="" disabled>
                                                                        @foreach ($options_2 as $option)
                                                                            <option value="{{$option->options_val}}">{{$option->options_name}}</option>
                                                                        @endforeach
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td>Others, Specify</td>
                                                                    <td>
                                                                        <input type="text" class="form-control" name="oth_3" id="oth_3" placeholder="Others, Specify" value="" disabled/>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                </div>
                                                {{-- End of tick B --}}

                            

                                                {{-- Tick C --}}
                                                <div class="line-content">
                                                @foreach ($questions_3 as $question)

                                                <h5 class="text-primary">{{$question->f74_cat_text}}</h5>
            
                                                <input type="checkbox" style="width: 1em;  height: 1em;" name="tick_C" id="toggleElement_C" onchange="toggleStatus_C()"><strong> {{$question->f74_tick_text}}</strong>
            
                                                <p class="pt-4">{{$question->f74_q_text}}</p>
                                                
                                                <p>{{$question->f74_alt_q_text}}</p>

                                                <div id="elementsToOperateOn_C">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center m-0">MEALS</th>
                                                                <th colspan="2" class="text-center">
                                                                    <p>4. How often do you eat bought food at home for breakfast? For lunch? For supper?</p>
                                                                    <p>“Gaano ka kadalas kumain sa bahay ng biniling lutong pagkain para sa almusal? Sa tanghalian? Sa hapunan?”<p>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($meals_4 as $meal)
                                                            <tr>
                                                                <td>{{$meal->meals_title}}</td>
                                                                <td>
                                                                    <select type="text" class="form-control" name="{{$meal->meals_name}}" id="{{$meal->meals_name}}" value="" disabled>
                                                                    @foreach ($options_1 as $option)
                                                                        <option value="{{$option->options_val}}">{{$option->options_name}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="{{$meal->meals_input}}" id="{{$meal->meals_input}}" placeholder="No of times" value="" disabled/>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endforeach

                                                <div class="table-responsive pt-4">
                                                        <table class="table table-bordered"  width="100%" cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="3" class="text-center">
                                                                        <p>5. What is/are your reason(s) for eating bought food?</p>
                                                                        <p>“Ano ang (mga) dahilan kung bakit ka kumakain sa bahay ng biniling lutong pagkain?”<p>
                                                                        <p>(Multiple answers; do not enumerate choices.)</p>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Reason</td>
                                                                    <td>Code</td>
                                                                </tr>
                                                                @foreach ($reasons_5 as $reason)
                                                                <tr>
                                                                    <td>{{$reason->reasons_title}}</td>
                                                                    <td>
                                                                        <select type="text" class="form-control" name="{{$reason->reasons_name}}" id="{{$reason->reasons_name}}" value="" disabled>
                                                                        @foreach ($options_2 as $option)
                                                                            <option value="{{$option->options_val}}">{{$option->options_name}}</option>
                                                                        @endforeach
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td>Others, Specify</td>
                                                                    <td>
                                                                        <input type="text" class="form-control" name="oth_5" id="oth_5" placeholder="Others, Specify" value="" disabled/>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                </div>
                                                {{-- End of tick C --}}

                                    

                                                {{-- Tick D --}}
                                                <div class="line-content">
                                                @foreach ($questions_4 as $question)

                                                <h5 class="text-primary">{{$question->f74_cat_text}}</h5>
            
                                                <input type="checkbox" style="width: 1em;  height: 1em;" name="tick_D"  name="tick_C" id="toggleElement_D" onchange="toggleStatus_D()"><strong> {{$question->f74_tick_text}}</strong>
            
                                                <p class="pt-4">{{$question->f74_q_text}}</p>
                                                
                                                <p>{{$question->f74_alt_q_text}}</p>

                                                <div id="elementsToOperateOn_D">
                                                <div class="table">
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <table class="table table-bordered"  width="100%" cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center m-0">MEALS</th>
                                                                    <th colspan="2" class="text-center">
                                                                        <p>6. How often do you eat away from home for breakfast? For lunch? For supper?</p>
                                                                        <p>“Gaano ka kadalas kumain sa labas para sa almusal? Sa tanghalian? Sa hapunan?”<p>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($meals_6 as $meal)
                                                                <tr>
                                                                    <td>{{$meal->meals_title}}</td>
                                                                    <td>
                                                                        <select type="text" class="form-control" name="{{$meal->meals_name}}" id="{{$meal->meals_name}}" value="" disabled>
                                                                        @foreach ($options_1 as $option)
                                                                            <option value="{{$option->options_val}}">{{$option->options_name}}</option>
                                                                        @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" name="{{$meal->meals_input}}" id="{{$meal->meals_input}}" placeholder="No of times" value="" disabled/>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <table class="table table-bordered"  width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2">
                                                                            <p>7. Where do you most frequently eat the bought food for breakfast? For lunch? For supper?</p>
                                                                            <p>“Saan ka madalas kumakain sa labas para sa almusal? Sa tanghalian? Sa hapunan?”</p>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($meals_7 as $meal)
                                                                    <tr>
                                                                        <td>
                                                                            <select type="text" class="form-control" name="{{$meal->meals_name}}" id="{{$meal->meals_name}}" value="" disabled>
                                                                            @foreach ($options_7 as $option)
                                                                                <option value="{{$option->options_val}}">{{$option->options_name}}</option>
                                                                            @endforeach
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="{{$meal->meals_input}}" id="{{$meal->meals_input}}" placeholder="Others, specify" value="" disabled/>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                                <div class="table-responsive pt-4">
                                                        <table class="table table-bordered"  width="100%" cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="3" class="text-center">
                                                                        <p>8. What is/are your reason(s) for eating away from home?</p>
                                                                        <p>“Ano ang (mga) dahilan kung bakit ka kumakain sa labas?”<p>
                                                                        <p>(Multiple answers; do not enumerate choices.)</p>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Reason</td>
                                                                    <td>Code</td>
                                                                </tr>
                                                                @foreach ($reasons_8 as $reason)
                                                                <tr>
                                                                    <td>{{$reason->reasons_title}}</td>
                                                                    <td>
                                                                        <select type="text" class="form-control" name="{{$reason->reasons_name}}" id="{{$reason->reasons_name}}" value="" disabled>
                                                                        @foreach ($options_2 as $option)
                                                                            <option value="{{$option->options_val}}">{{$option->options_name}}</option>
                                                                        @endforeach
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td>Others, Specify</td>
                                                                    <td>
                                                                        <input type="text" class="form-control" name="oth_8" id="oth_8" placeholder="Others, Specify" value="" disabled/>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                </div>
                                                {{-- End of tick D --}}

                                            

                                                {{-- Tick E --}}
                                                <div class="line-content">
                                                @foreach ($questions_5 as $question)

                                                <h5 class="text-primary">{{$question->f74_cat_text}}</h5>
            
                                                <input type="checkbox" style="width: 1em;  height: 1em;" name="tick_E"  id="toggleElement_E" onchange="toggleStatus_E()"><strong> {{$question->f74_tick_text}}</strong>
            
                                                <p class="pt-4">{{$question->f74_q_text}}</p>
                                                
                                                <p>{{$question->f74_alt_q_text}}</p>

                                                <div id="elementsToOperateOn_E">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered"  width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center m-0">MEALS</th>
                                                                <th colspan="2" class="text-center">
                                                                    <p>9. How often do you eat ready-to-eat food at home for breakfast? For lunch? For supper?</p>
                                                                    <p>“Gaano ka kadalas kumain sa bahay ng ready-to-eat na pagkain para sa almusal? Sa tanghalian? Sa hapunan?”<p>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($meals_9 as $meal)
                                                            <tr>
                                                                <td>{{$meal->meals_title}}</td>
                                                                <td>
                                                                    <select type="text" class="form-control" name="{{$meal->meals_name}}" id="{{$meal->meals_name}}" value="" disabled>
                                                                    @foreach ($options_1 as $option)
                                                                        <option value="{{$option->options_val}}">{{$option->options_name}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="{{$meal->meals_input}}" id="{{$meal->meals_input}}" placeholder="No of times" value="" disabled/>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endforeach

                                                <div class="table-responsive pt-4">
                                                        <table class="table table-bordered"  width="100%" cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="3" class="text-center">
                                                                        <p>10. What is/are your reason(s) for eating ready-to-eat food at home?</p>
                                                                        <p>“Ano ang (mga) dahilan kung bakit ka kumakain sa bahay ng ready-to-eat na pagkain?”<p>
                                                                        <p>(Multiple answers; do not enumerate choices.)</p>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Reason</td>
                                                                    <td>Code</td>
                                                                </tr>
                                                                @foreach ($reasons_10 as $reason)
                                                                <tr>
                                                                    <td>{{$reason->reasons_title}}</td>
                                                                    <td>
                                                                        <select type="text" class="form-control" name="{{$reason->reasons_name}}" id="{{$reason->reasons_name}}" value="" disabled>
                                                                        @foreach ($options_2 as $option)
                                                                            <option value="{{$option->options_val}}">{{$option->options_name}}</option>
                                                                        @endforeach
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td>Others, Specify</td>
                                                                    <td>
                                                                        <input type="text" class="form-control" name="oth_10" id="oth_10" placeholder="Others, Specify" value="" disabled/>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                </div>
                                                {{-- End of tick E --}}

                                                

                                                {{-- Tick F --}}
                                                <div class="line-content">
                                                @foreach ($questions_6 as $question)

                                                <h5 class="text-primary">{{$question->f74_cat_text}}</h5>
            
                                                <input type="checkbox" style="width: 1em;  height: 1em;" name="tick_F" id="toggleElement_F" onchange="toggleStatus_F()"><strong> {{$question->f74_tick_text}}</strong>
            
                                                <p class="pt-4">{{$question->f74_q_text}}</p>
                                                
                                                <p>{{$question->f74_alt_q_text}}</p>
                                                
                                                <div id="elementsToOperateOn_F">
                                                <div class="table">
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <table class="table table-bordered"  width="100%" cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center m-0">MEALS</th>
                                                                    <th colspan="2" class="text-center">
                                                                        <p>11. How often do you eat ready-to-eat foods away from home for breakfast? For lunch? For supper?</p>
                                                                        <p>“Gaano ka kadalas kumain sa labas ng mga ready-to-eat na pagkain para sa almusal? Sa tanghalian? Sa hapunan?”<p>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($meals_11 as $meal)
                                                                <tr>
                                                                    <td>{{$meal->meals_title}}</td>
                                                                    <td>
                                                                        <select type="text" class="form-control" name="{{$meal->meals_name}}" id="{{$meal->meals_name}}" value="" disabled>
                                                                        @foreach ($options_1 as $option)
                                                                            <option value="{{$option->options_val}}">{{$option->options_name}}</option>
                                                                        @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" name="{{$meal->meals_input}}" id="{{$meal->meals_input}}" placeholder="No of times" value="" disabled/>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <table class="table table-bordered"  width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2">
                                                                            <p>12. Where do you most frequently eat the ready-to-eat food for breakfast? For lunch? For supper?</p>
                                                                            <p>“Saan ka madalas kumakain sa labas ng ready-to-eat na pagkain para sa almusal? Sa tanghalian? Sa hapunan?”</p><br>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($meals_12 as $meal)
                                                                    <tr>
                                                                        <td>
                                                                            <select type="text" class="form-control" name="{{$meal->meals_name}}" id="{{$meal->meals_name}}" value="" disabled>
                                                                            @foreach ($options_7 as $option)
                                                                                <option value="{{$option->options_val}}">{{$option->options_name}}</option>
                                                                            @endforeach
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="{{$meal->meals_input}}" id="{{$meal->meals_input}}" placeholder="Others, specify" value="" disabled/>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                                <div class="table-responsive pt-4">
                                                        <table class="table table-bordered"  width="100%" cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="3" class="text-center">
                                                                        <p>13. What is/are your reason(s) for eating ready-to-eat foods away from home?</p>
                                                                        <p>“Ano ang (mga) dahilan kung baki t ka kumakain sa labas?”<p>
                                                                        <p>(Multiple answers; do not enumerate choices.)</p>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Reason</td>
                                                                    <td>Code</td>
                                                                </tr>
                                                                @foreach ($reasons_13 as $reason)
                                                                <tr>
                                                                    <td>{{$reason->reasons_title}}</td>
                                                                    <td>
                                                                        <select type="text" class="form-control" name="{{$reason->reasons_name}}" id="{{$reason->reasons_name}}" value="" disabled>
                                                                        @foreach ($options_2 as $option)
                                                                            <option value="{{$option->options_val}}">{{$option->options_name}}</option>
                                                                        @endforeach
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td>Others, Specify</td>
                                                                    <td>
                                                                        <input type="text" class="form-control" name="oth_13" id="oth_13" placeholder="Others, Specify" value="" disabled/>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                {{-- End of tick F --}}

                                    

                                                {{-- IS and Save BTN Section --}}
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-4" style="padding-top:2vmin;">
                                                                <select type="text" class="form-control" name="INTERVIEW_STATUS" id="INTERVIEW_STATUS" value="">
                                                                    @foreach ($is as $is)
                                                                    <option value="{{$is->is_value}}">{{$is->is_text}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2" style="padding-top:2vmin;">
                                                                <a href="#" data-toggle="modal" data-target="#save74" >
                                                                    <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                                        Save 7.4
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                                    {{-- Confirmation Modal --}}
                                                    <div class="modal fade" id="save74" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                </div>
                                                                <div class="modal-body">Select "Proceed" below if you want to save the data.</div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                        <a class="btn btn-primary" href="{{ route('insertF74') }}"
                                                                        onclick="event.preventDefault();
                                                                        document.getElementById('insert-form74').submit();">
                                                                        Proceed
                                                                        </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </form>
                                            {{-- Insert new  form 7.4 ends here --}}
                                             {{-- Form end here --}}
                                    @endif
                                @endif  
                                
                        </div>
                    </div>
                </div>
            </div>             
        </div>
    </div>
@endsection