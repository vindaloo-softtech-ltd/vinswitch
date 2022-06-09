@extends('layouts.mainLayout.main')
@section('title', 'Agent List')
@section('content')
<input type="hidden" name="current_page" class="current_page" id="current_page" value="1">             

<div class="col-lg-8 order-lg-1 order-2">
    <div class="card mb-2">
        <div class="card-body">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <form class="mb-2 mb-sm-0">
                        <label for="inputPassword2" class="visually-hidden">Search</label>
                        <input type="search" class="form-control" id="search" placeholder="Search...">
                    </form>
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end">
                        <button type="button" class="btn btn-success waves-effect waves-light me-1"><i class="mdi mdi-cog"></i></button>
                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#custom-modal"><i class="mdi mdi-plus-circle me-1"></i> Add Agent</button>
                    </div>
                </div><!-- end col-->
            </div>
        </div> <!-- end card-body-->
    </div> <!-- end card-->
    <!-- title table header start -->
    <div class="card mb-2">
        <div class="card-body mt-0 mb-0 pt-0 pb-0">
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <div class="d-flex align-items-start">
                    <p class="mb-0 text-muted">Detail</p>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="text-center my-3 my-sm-01">
                        <p class="mb-0 text-muted">Balance</p>
                    </div>
                </div>
                <div class="col-sm-4">     
                    
                    <div class="text-center my-3 my-sm-01">
                        <p class="mb-0 text-muted">Status</p>
                    </div>
                </div>
                
                <div class="col-sm-2">
                    <div class="text-sm-end text-center mt-2 mt-sm-0">
                        <p class="mb-0 text-muted">Action</p>
                    </div>
                </div> 
            </div> 
        </div>
    </div> 
    <!-- title table header end -->
    <span id="agentlistrow">
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
    </span>
    <div class="text-center my-4">
        <a href="javascript:void(0);" class="text-danger loding" style="display:none"><i class="mdi mdi-spin mdi-loading me-1"></i> Load more </a>
    </div>


</div> <!-- end col -->
<div class="col-lg-4 order-lg-2 order-1 right-sidebar">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-3">Agents Statics</h4>

            <div class="text-center" dir="ltr">
                <div class="row mt-2">
                    <div class="col-6">
                        <h3 data-plugin="counterup" data-value="{{$totalrecords}}" class="totalrecords">{{$totalrecords}}</h3>
                        <p class="text-muted font-13 mb-0 text-truncate">Total Agents</p>
                    </div>
                    <div class="col-6">
                        <h3 data-plugin="counterup" class="activeagents" data-value="{{$activeagents}}">{{$activeagents}}</h3>
                        <p class="text-muted font-13 mb-0 text-truncate">Active Agents</p>
                    </div>
                    <div class="col-6">
                        <h3 data-plugin="counterup" class="suspendedagents" data-value="{{$suspendedagents}}">{{$suspendedagents}}</h3>
                        <p class="text-muted font-13 mb-0 text-truncate">Suspended Agents</p>
                    </div>
                    
                </div><br><br>
                
                <!-- <div id="leads-statics" style="height: 280px;" class="morris-chart" data-colors="#4a81d4,#e3eaef"></div> -->
                <!-- <div id="label-placement-chart" style="height: 280px;" class="ct-chart ct-golden-section" ></div> -->
                <div id="distributed-series1" class="ct-chart ct-golden-section"  style="height: 280px;"></div>
                <p class="text-muted font-15 font-family-secondary mb-0 mt-1 d-flex">
                    <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-blue"></i> T - Total</span>
                    <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-success"></i> A - Active</span>
                </p>
                <p class="text-muted font-15 font-family-secondary mb-0 mt-1 d-flex">
                   
                    <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-warning"></i> S - Suspended</span>
                    <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-danger"></i> I - Inactive</span>
                </p>
                <p class="text-muted font-15 font-family-secondary mb-0 mt-1 d-flex">
                    <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-info float-left"></i> N - Non-Suspended</span>
                </p>
            </div>

        </div>
    </div> <!-- end card-->
</div> <!-- end col -->               
                                                   
<script>    
$(document).ready( function () {
    var base_url = $('#base_url').val();
    var url;
    // update status, suspended fild value
    // convert editabel feild firstname, lastname, company_name
    $('body').on('click', '.edit-inline-ajex', function() { 
        var colIndex = $(this).data("index");
        var txt = $(this).text();
        var id = $(this).data("id");
        var value = $(this).text();
        if(txt.length > 1 && colIndex != 'status' && colIndex != 'suspended'){
            $.each($(".edit-column"), function(i, el) {
                orignaltxt = $(this).val();
                if(orignaltxt.length > 0){
                    $(this).replaceWith(orignaltxt);                
                }                
            });
       
            $(this).html("").append("<input type='text' class='edit-column' data-id="+id+" data-index="+colIndex+" value=\""+txt+"\">");
        }else if(colIndex == 'status' || colIndex == 'suspended'){
            var id = $(this).data("id");
            var columnindex = $(this).data("index");

            Swal.fire({
                title: "Are you sure?",
                text: "You want to change "+columnindex,
                icon: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes",
                cancelButtonText: "No, cancel!",
                confirmButtonClass: "btn btn-success mt-2",
                cancelButtonClass: "btn btn-danger ms-2 mt-2",
                buttonsStyling: !1
            }).then(function(e) {
                if(e.isConfirmed){
                    if(columnindex == "status"){
                        value = value.replace('Status : ','');
                    }else{
                        value = value.replace('Suspended : ','');
                    }           
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: base_url+'/agentlist_update_ajex',
                        method: "POST",
                        data:{id:id,columnindex:columnindex,value:value,"_token":"{{ csrf_token() }}"},
                        success: function(result){
                            var feild;
                            if(result.status){
                                if(columnindex == "status"){
                                    if(value == "INACTIVE" ){
                                        $("."+columnindex+id).removeClass("btn-danger").addClass("btn-success").html("Status : ACTIVE").attr("data-value","ACTIVE");
                                    }else if(value == "ACTIVE"){
                                        $("."+columnindex+id).removeClass("btn-success").addClass("btn-danger").html("Status : INACTIVE").attr("data-value","INACTIVE");
                                    }
                                    feild = "Status";     
                                }else if(columnindex == "suspended"){
                                    if(value == "NO"){
                                        $("."+columnindex+id).removeClass("btn-success").addClass("btn-danger").html("Suspended : YES").attr("data-value","YES");
                                    }else if(value == "YES"){
                                       $("."+columnindex+id).removeClass("btn-danger").addClass("btn-success").html("Suspended : NO").attr("data-value","NO");

                                    }  
                                    feild = "Suspended";                                   
                                } 
                                toster("success", feild, "updated");                              
                            }
                            loadMoreData(1,'update');
                        },         
                    });                    
                }                
            });
        }
    });
    // update editabel textbox value ajex
    $('body').on('change', '.edit-column', function() {         
        var id = $(this).data("id");
        var columnindex = $(this).data("index");
        var value = $(this).val();
        //console.log("change event call id, columnindex, value  :",id, columnindex, value);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url+'/agentlist_update_ajex',
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
    // load data function     
    function loadMoreData(page,update='')
    {
        search = $('#search').val();
        url = base_url+'/agentlist?page=' + page + '&search=' + search;
        $.ajax({
            url:url,
            type:'get',
            beforeSend: function()
            {
                $(".loding").show();               
            }
        })
        .done(function(data){
            if(data.html == ""){
                $('.loding').html("No more Record Found!");
                return;
            }
            $('.totalrecords').text(data.totalrecords);
            $('.activeagents').text(data.activeagents);
            $('.suspendedagents').text(data.suspendedagents);

            $('.totalrecords').data("value", data.totalrecords);
            $('.activeagents').data("value", data.activeagents);
            $('.suspendedagents').data("value", data.suspendedagents);
            
            chart();
            $('.loding').hide();
            //console.log("update = ",update);
            if(!update){
                $("#agentlistrow").append(data.html);
            }
            
        })
        .fail(function(jqXHR,ajaxOptions,thrownError){
            
        });
 
    }
    var page = 1;
    // page scroll function
    $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() >= $(document).height()){
         page++;
         console.log("scroll page :"+page);
         loadMoreData(page);
         
      }
    });
    // search function 
    $("#search").on("keyup", function() {
        page = 1;
       
        if(($(this).val()).length > 2 || ($(this).val()).length == 0){
            $("#agentlistrow").text("");
            console.log("search call page :"+page);
            loadMoreData(page);

        }
    });
    
    function chart(){
        // alert("chart");
        var data, option, total_agents, suspended_agents, active_agents;
        total_agents =  $(".totalrecords").data("value");
        suspended_agents = $(".suspendedagents").data("value");
        active_agents = $(".activeagents").data("value");
        
        // alert("total_agents = "+total_agents+", suspended_agents = "+suspended_agents+", active_agents"+active_agents);

        data = {
            // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            labels: ["T", "A", "S", "I", "N"],
            series: [total_agents, active_agents, suspended_agents, (total_agents-active_agents), (total_agents-suspended_agents)]
        }
        option = { 
            distributeSeries: !0,            
            axisY: {
                onlyInteger: true
            }                            
        };
        
        new Chartist.Bar("#distributed-series1",data,option);
        
    }
    chart();  
});
</script>              
@endsection