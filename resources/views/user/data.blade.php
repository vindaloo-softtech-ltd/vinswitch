@if($page == 'agentlist')
    @foreach($records as $record)
        <!-- fist element of list start-->
        <?php
            $id = App\Providers\EncreptDecrept::encrept($record['id']);
        ?>
    
        <div class="card mb-2">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-sm-4">
                        <div class="d-flex align-items-start">
                            <!-- <img class="d-flex align-self-center me-3 rounded-circle" src="../assets/images/companies/amazon.png" alt="Generic placeholder image" height="64"> -->
                            <div class="w-100">
                                <h4 class="mt-0 mb-2 font-16"><span class="edit-inline-ajex" data-index="firstname" data-id="{{$id}}">{{$record['firstname']}} </span><span class="edit-inline-ajex" data-index="lastname" data-id="{{$id}}"> {{$record['lastname']}}</span></h4>
                                <p class="mb-1"><b>Company :</b> <span class="edit-inline-ajex" data-index="company_name" data-id="{{$id}}">{{$record['company_name']}}</span></p>
                                <p class="mb-0 w-100"><!-- <b>Email :</b> --> {{$record['email']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="text-center my-3 my-sm-01">
                            <p class="mb-0 text-muted">{{$record['balance']}}</p>
                        </div>
                    </div>
                    <div class="col-sm-4">     
                        
                        <div class="text-center button-list">
                            <a data-index="status" data-id="{{$id}}" data-value="{{$record['status']}}" class="btn btn-xs waves-effect waves-light status edit-inline-ajex status{{$id}}@if($record['status'] == 'ACTIVE') btn-success @else btn-danger @endif">Status : {{$record['status']}}</a>
                            <a data-id="{{$id}}" data-index="suspended" data-value="{{$record['suspended']}}" class="btn btn-xs waves-effect waves-light suspended edit-inline-ajex suspended{{$id}}@if($record['suspended'] == 'NO') btn-success @else btn-danger @endif">Suspended : {{$record['suspended']}}</a>
                            <!-- <a href="javascript: void(0);" class="btn btn-xs btn-primary waves-effect waves-light">Email</a> -->
                        </div>
                    </div>
                    
                    <div class="col-sm-2">
                        <div class="text-sm-end text-center mt-2 mt-sm-0">
                            <a href="{{url('agentedit').'/'.$id}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                            <!-- <a href="{{url('agentdelete').'/'.$id}}" class="action-icon"> <i class="mdi mdi-delete"></i></a> -->
                            <a class="action-icon"> <i class="mdi mdi-delete"></i></a>
                        </div>
                    </div> <!-- end col-->
                </div> <!-- end row -->
            </div>
        </div> <!-- end card-->

        <!-- fist element of list end-->
    @endforeach
@endif
@if($page == 'agentedit_billing')
    @foreach($billplan as $record)
        @php
            $id = App\Providers\EncreptDecrept::encrept($record['agent_billplan_id']);
        @endphp                                
        <tr>
            <td>{{++$i}} </td>
            <td>{{$record['name']}}</td>
            <td>{{$record['type']}}</td>                                            
            <td> <span class="edit-inline-ajex" data-index="commission" data-id="{{$id}}">{{$record['commission']}}</span></td>
            <td><a href="#" class="float-end text-danger"  title="Delete BillPlan" ><i class="fa fa-trash"></i></a></td>
        </tr>
    @endforeach
@endif
    


               
