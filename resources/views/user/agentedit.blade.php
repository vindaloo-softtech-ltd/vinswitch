@extends('layouts.mainLayout.main')
@section('title', 'Agent List')
@section('content')


<div class="row">
    <div class="col-lg-3 col-xl-3">
        <div class="card text-center">
            <div class="card-body">
                <img src="{{ asset('')}}assets/images/users/user-1.jpg" class="rounded-circle avatar-lg img-thumbnail"
                alt="profile-image">

                <h4 class="mb-0">Geneva McKnight</h4>
                <p class="text-muted">@webdesigner</p>

                <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
                <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button>

                <div class="text-start mt-3">
                    <h4 class="font-13 text-uppercase">About Me :</h4>
                    <p class="text-muted font-13 mb-3">
                        Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.
                    </p>
                    <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">Geneva D. McKnight</span></p>
                
                    <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">(123) 123 1234</span></p>
                
                    <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">user@email.domain</span></p>
                
                    <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ms-2">USA</span></p>
                </div>                                    

                <ul class="social-list list-inline mt-3 mb-0">
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                    </li>
                </ul>   
            </div>                                 
        </div> <!-- end card -->

        <!-- <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Inbox</h4>

                <div class="inbox-widget" data-simplebar style="max-height: 350px;">
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="{{ asset('')}}assets/images/users/user-2.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author">Tomaslau</p>
                        <p class="inbox-item-text">I've finished it! See you so...</p>
                        <p class="inbox-item-date">
                            <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                        </p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="{{ asset('')}}assets/images/users/user-3.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author">Stillnotdavid</p>
                        <p class="inbox-item-text">This theme is awesome!</p>
                        <p class="inbox-item-date">
                            <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                        </p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="{{ asset('')}}assets/images/users/user-4.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author">Kurafire</p>
                        <p class="inbox-item-text">Nice to meet you</p>
                        <p class="inbox-item-date">
                            <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                        </p>
                    </div>

                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="{{ asset('')}}assets/images/users/user-5.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author">Shahedk</p>
                        <p class="inbox-item-text">Hey! there I'm available...</p>
                        <p class="inbox-item-date">
                            <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                        </p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="{{ asset('')}}assets/images/users/user-6.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author">Adhamdannaway</p>
                        <p class="inbox-item-text">This theme is awesome!</p>
                        <p class="inbox-item-date">
                            <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                        </p>
                    </div>

                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="{{ asset('')}}assets/images/users/user-3.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author">Stillnotdavid</p>
                        <p class="inbox-item-text">This theme is awesome!</p>
                        <p class="inbox-item-date">
                            <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                        </p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="{{ asset('')}}assets/images/users/user-4.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author">Kurafire</p>
                        <p class="inbox-item-text">Nice to meet you</p>
                        <p class="inbox-item-date">
                            <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                        </p>
                    </div>
                </div> 
            </div>
        </div>  -->
        <!-- end card-->

    </div> <!-- end col-->

    <div class="col-lg-9 col-xl-9">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills nav-fill navtab-bg">
                    <li class="nav-item">
                        <a href="#personal" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                            Information
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#cred" data-bs-toggle="tab" aria-expanded="false" class="nav-link ">
                            Credential
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#bill" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                            Billing
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="personal">

                        <form>
                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">

                                        <label for="forfirstname" class="form-label">First Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                                            <input type="text" class="form-control" id="firstname" placeholder="First Name" value="{{$agent['firstname']}}">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="forlastname" class="form-label">Last Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                                            <input type="text" class="form-control" id="lastname" placeholder="Last Name" value="{{$agent['lastname']}}">
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="foremail" class="form-label">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            <input type="text" class="form-control" id="email" placeholder="Email" value="{{$agent['email']}}" disabled readonly>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="forcontact_no" class="form-label">Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                            <input type="text" class="form-control" id="contact_no" placeholder="Phone" value="{{$agent['contact_no']}}">
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                           
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="foraddress" class="form-label">Address</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-home"></i></span>
                                            <textarea class="form-control" id="address" placeholder="Address">{{$agent['address']}}</textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div> <!-- end row -->

                            

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="forCountry" class="form-label">Country</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa fa-city"></i></span>
                                            <input type="text" class="form-control" id="country" placeholder="Country" value="{{$agent['country']}}" disabled readonly>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="forstate" class="form-label">State</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                            <input type="text" class="form-control" id="state" placeholder="State" value="{{$agent['state']}}">
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="forcity" class="form-label">City</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa fa-map-signs"></i></span>
                                            <input type="text" class="form-control" id="city" placeholder="City" value="{{$agent['city']}}">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="forzipcode" class="form-label">Zipcode</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa fa-qrcode"></i></span>
                                            <input type="text" class="form-control" id="postal_code" placeholder="Zipcode" value="{{$agent['postal_code']}}">
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div> <!-- end row -->                    
                            
                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i> Company Info</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="forcompany_name" class="form-label">Company Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class=" far fa-building"></i></span>
                                            <input type="text" class="form-control" id="company_name" placeholder="Company Name" value="{{$agent['company_name']}}">
                                        </div>
                                    </div>
                                </div>                                
                            </div> <!-- end row -->

                            
                            <div class="text-end">
                                <span class="btn btn-success waves-effect waves-light mt-2 agentdatasubmit"><i class="mdi mdi-content-save"></i> Update</span>
                            </div>
                        </form>

                    </div> <!-- end tab-pane -->
                    <!-- end about me section content -->

                    <div class="tab-pane" id="cred">

                        <!-- comment box -->
                        <form>
                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">

                                        <label for="forfirstname_user" class="form-label">First Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                                            <input type="text" class="form-control" id="firstname_user" placeholder="First Name" value="{{$user['firstname']}}">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="forlastname_user" class="form-label">Last Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                                            <input type="text" class="form-control" id="lastname_user" placeholder="Last Name" value="{{$user['lastname']}}">
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="foremail_user" class="form-label">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            <input type="text" class="form-control" id="email_user" placeholder="Email" value="{{$user['email']}}" disabled readonly>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="forcontact_no_user" class="form-label">Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                            <input type="text" class="form-control" id="contact_no_user" placeholder="Phone" value="{{$user['phoneno']}}">
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                           
                           

                            
                  
                            
                            <div class="text-end">
                                <span class="btn btn-success waves-effect waves-light mt-2 agentcredsubmit"><i class="mdi mdi-content-save"></i> Update</span>
                            </div>
                        </form>

                        <!-- end comment box -->

                       
                    </div>
                    <!-- end timeline content-->
                    
                    <div class="tab-pane show active" id="bill">
                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle"></i> Plan Detail  <span class="waves-effect waves-light float-end bg-success rounded-circle" data-bs-toggle="modal" data-bs-target="#add-plan"><i class="fe-plus text-white h4"></i> </apan></h5>
                        @if($billplan)
                        <div class="table-responsive border-0">
                            <table class="table table-borderless mb-0 table-centered dt-responsive nowrap w-100">
                                
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Commission(%)</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="planlistrow">
                                    <?php
                                        // echo "<pre>";
                                        // print_r(count($billplan));
                                        // echo "</pre>";
                                        $i=0;
                                    ?>
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
                                </tbody>
                            </table>
                            <div class="text-center my-4">
                                <a href="javascript:void(0);" class="text-danger loding" style="display:none"><i class="mdi mdi-spin mdi-loading me-1"></i> Load more </a>
                            </div>
                        </div>                        
                        @endif
                    </div>
                    <!-- end settings content-->

                </div> <!-- end tab-content -->
            </div>
        </div> <!-- end card-->

    </div> <!-- end col -->
</div>
<!-- end row-->

<!-- Modal -->
<div class="modal fade" id="add-plan" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title" id="myCenterModalLabel">Add New Billplan</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form>
                            <div class="mb-3">
                                <label for="forbillplan_id" class="form-label">Bill Plan</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-clipboard-list"></i></span>
                                    <select class="form-control" name="billplan_id" id="billplan_id">
                                        <option value="">Select</option>
                                        @foreach($billplan_list as $plan)
                                            <option value="{{$plan->id}}">{{$plan->name}}</option>
                                        @endforeach                                        
                                    </select>
                                    <!-- <input type="text" class="form-control" id="firstname" placeholder="First Name" value="{{$agent['firstname']}}"> -->
                                </div>
                                <!-- <input type="text" class="form-control" id="name" placeholder="Enter company name"> -->
                            </div>
                            <div class="mb-3">
                                <label for="forcommission" class="form-label">Commission(%)</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                    <input type="text" class="form-control" id="commission" placeholder="Enter Commission" value="">
                                </div>
                                <!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
                            </div>
                            
        
                            <div class="text-end">
                                <button type="button" class="btn btn-success waves-effect waves-light add-plan-submit">Save</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Continue</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->








<script>    
$(document).ready( function () {
    var base_url = $('#base_url').val();
    var id = $('#id').val();
    
    // update Information
    $("body").on("click", ".agentdatasubmit", function(){        
       
        console.log("id = "+id);
        var formData = {
            id:id,
            firstname: $("#firstname").val(),
            lastname: $("#lastname").val(),
            email: $("#email").val(),
            contact_no: $("#contact_no").val(),                
            address: $("#address").text(),
            country: $("#country").val(),
            state: $("#state").val(),
            city: $("#city").val(),
            postal_code: $("#postal_code").val(),
            company_name: $("#company_name").val(),
            table: "agent",
            "_token":"{{ csrf_token() }}"
        };            
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url+'/agentedit_update_ajex',
            method: "POST",
            data:formData,
            success: function(result){
                if(result.data != "fail"){
                toster("success", "Record", "Updated"); 
                }else{
                toster("danger", "Record", "Failed");
                }
                
            },           
        });      
        
    });

    // update credential 
    $("body").on("click", ".agentcredsubmit", function(){       
            var formData = {
                id:id,
                firstname: $("#firstname_user").val(),
                lastname: $("#lastname_user").val(),
                email: $("#email_user").val(),
                phoneno: $("#contact_no_user").val(),               
                table: "user",
                "_token":"{{ csrf_token() }}"
            };            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: base_url+'/agentedit_update_ajex',
                method: "POST",
                data:formData,
                success: function(result){
                   if(result.data != "fail"){
                    toster("success", "Record", "Updated"); 
                   }else{
                    toster("danger", "Record", "Failed");
                   }
                    
                },           
            });        
    });

    // load data function     
    function loadMoreData(page,update='')
    {
        search = $('#search').val() ? $('#search').val() : '';
        url = base_url+'/agentedit/' + id + '?page=' + page + '&search=' + search;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:url,
            type:'get',
            beforeSend: function()
            {
                $(".loding").show();               
            }
        })
        .done(function(data){
            if(data.html == ""){
                $('.loding').html("No more Plan Found!");
                return;
            }
            $('.loding').hide();
            if(!update){
                $(".planlistrow").append(data.html);
            }
            
        })
        .fail(function(jqXHR,ajaxOptions,thrownError){
            
        });
 
    }

    var page = 1;
    // page scroll function
    $(window).scroll(function(){
        if($('#bill').hasClass('active')){
            if($(window).scrollTop() + $(window).height() >= $(document).height()){                
                // alert(page);                
                page++;
                console.log("scroll page :"+page);
                loadMoreData(page);
                
            }
        }
    });

    // convert teble normal fild to editabel feild
    $('body').on('click', '.edit-inline-ajex', function() { 
        var colIndex = $(this).data("index");
        var txt = $(this).text();
        var id = $(this).data("id");
        var value = $(this).text();
        if(txt.length >= 1){
            $.each($(".edit-column"), function(i, el) {
                orignaltxt = $(this).val();
                if(orignaltxt.length > 0){
                    $(this).replaceWith(orignaltxt);                
                }                
            });
       
            $(this).html("").append("<input type='text' class='edit-column' data-id="+id+" data-index="+colIndex+" value=\""+txt+"\">");
        }
    });

     // update editabel textbox value ajex
     $('body').on('change', '.edit-column', function() {  
        //  alert("asdf ads");       
        var id = $(this).data("id");
        var columnindex = $(this).data("index");
        var value = $(this).val();
        //console.log("change event call id, columnindex, value  :",id, columnindex, value);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url+'/agenteditbillplan_update_ajex',
            method: "POST",
            data:{id:id,columnindex:columnindex,value:value,"_token":"{{ csrf_token() }}"},
            success: function(result){
                //console.log("ajex result :",result);
                $.each($(".edit-column"), function(i, el) {
                    orignaltxt = $(this).val();
                    if(orignaltxt.length > 0){
                        $(this).replaceWith(orignaltxt);                
                    }                
                });
                toster("success", columnindex, "Updated"); 
            },           
        });
    });

    // add new bill plan ajex
    $('.add-plan-submit').click(function(){
        // console.log(Auth::user());
        // id = $('#id').val();
        var billplan_id =$('#billplan_id').val();
        var commission =$('#commission').val();
        // alert(id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url+'/addbillplan_ajex',
            method: "POST",
            data:{id:id,billplan_id:billplan_id,commission:commission,"_token":"{{ csrf_token() }}"},
            success: function(result){
                              
                toster("success", columnindex, "Updated"); 
            },           
        });
    });




});
</script>               
@endsection