@extends('layouts.mainLayout.main')
@section('title', 'Agent List')
@section('content')
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
                        <!-- <button type="button" class="btn btn-success waves-effect waves-light me-1"><i class="mdi mdi-cog"></i></button> -->
                        <a type="button" class="waves-effect waves-light add-new-agent" data-bs-toggle="modal" data-bs-target="#add-new-agent"><i class="mdi mdi-plus-circle h3 text-primary"></i></a>
                        <!-- <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#custom-modal"><i class="mdi mdi-plus-circle me-1"></i> Add Agent</button> -->
                    </div>
                </div><!-- end col-->
            </div>
        </div> <!-- end card-body-->
    </div> <!-- end card-->
    <!-- title table header start -->
    <div class="card mb-2">
        <div class="card-body mt-0 mb-0 pt-0 pb-0">
            <div class="row align-items-center">
                <div class="col-sm-3">
                    <div class="d-flex align-items-start">
                        <p class="mb-0 text-muted">Number</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="text-center my-3 my-sm-01">
                        <p class="mb-0 text-muted">Vendor</p>
                    </div>
                </div>
                <div class="col-sm-3">

                    <div class="text-center my-3 my-sm-01">
                        <p class="mb-0 text-muted">Company</p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="text-sm-end text-center mt-2 mt-sm-0">
                        <p class="mb-0 text-muted">Status</p>
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
                                <h4 class="mt-0 mb-2 font-16"><span class="edit-inline-ajex" data-index="firstname" data-id="{{$id}}">{{$record['number']}} </span><span class="edit-inline-ajex" data-index="lastname" data-id="{{$id}}"> {{$record['lastname']}}</span></h4>                               
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
                            <a class="action-icon"> <i class="fas fa-link fa-sm"></i></a>
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
<script>
    $(document).ready(function() {
        var base_url = $('#base_url').val();
        var url;
        // update status, suspended fild value
        // convert editabel feild firstname, lastname, company_name
        // $('body').on('click', '.edit-inline-ajex', function() { 
        //     var colIndex = $(this).data("index");
        //     var txt = $(this).text();
        //     var id = $(this).data("id");
        //     var value = $(this).text();
        //     if(txt.length > 1 && colIndex != 'status' && colIndex != 'suspended'){
        //         $.each($(".edit-column"), function(i, el) {
        //             orignaltxt = $(this).val();
        //             if(orignaltxt.length > 0){
        //                 $(this).replaceWith(orignaltxt);                
        //             }                
        //         });

        //         $(this).html("").append("<input type='text' class='edit-column' data-id="+id+" data-index="+colIndex+" value=\""+txt+"\">");
        //     }else if(colIndex == 'status' || colIndex == 'suspended'){
        //         var id = $(this).data("id");
        //         var columnindex = $(this).data("index");

        //         Swal.fire({
        //             title: "Are you sure?",
        //             text: "You want to change "+columnindex,
        //             icon: "warning",
        //             showCancelButton: !0,
        //             confirmButtonText: "Yes",
        //             cancelButtonText: "No, cancel!",
        //             confirmButtonClass: "btn btn-success mt-2",
        //             cancelButtonClass: "btn btn-danger ms-2 mt-2",
        //             buttonsStyling: !1
        //         }).then(function(e) {
        //             if(e.isConfirmed){
        //                 if(columnindex == "status"){
        //                     value = value.replace('Status : ','');
        //                 }else{
        //                     value = value.replace('Suspended : ','');
        //                 }           
        //                 $.ajax({
        //                     headers: {
        //                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                     },
        //                     url: base_url+'/agentlist_update_ajex',
        //                     method: "POST",
        //                     data:{id:id,columnindex:columnindex,value:value,"_token":"{{ csrf_token() }}"},
        //                     success: function(result){
        //                         var feild;
        //                         if(result.status){
        //                             if(columnindex == "status"){
        //                                 if(value == "INACTIVE" ){
        //                                     $("."+columnindex+id).removeClass("btn-danger").addClass("btn-success").html("Status : ACTIVE").attr("data-value","ACTIVE");
        //                                 }else if(value == "ACTIVE"){
        //                                     $("."+columnindex+id).removeClass("btn-success").addClass("btn-danger").html("Status : INACTIVE").attr("data-value","INACTIVE");
        //                                 }
        //                                 feild = "Status";     
        //                             }else if(columnindex == "suspended"){
        //                                 if(value == "NO"){
        //                                     $("."+columnindex+id).removeClass("btn-success").addClass("btn-danger").html("Suspended : YES").attr("data-value","YES");
        //                                 }else if(value == "YES"){
        //                                    $("."+columnindex+id).removeClass("btn-danger").addClass("btn-success").html("Suspended : NO").attr("data-value","NO");

        //                                 }  
        //                                 feild = "Suspended";                                   
        //                             }
        //                             if(result.status == 'danger' || result.status == 'fail'){
        //                                 if(result.data == "Record not exist"){
        //                                     toster("danger", "", "","Record not found");
        //                                     setTimeout( function(){ 
        //                                         location.reload();
        //                                     }  , 3000 );
        //                                 }else{
        //                                     toster("danger", "", "","Something Wrong!");
        //                                 }
        //                             }else{
        //                                 toster("success", feild, "updated");
        //                             } 

        //                         }
        //                         loadMoreData(1,'update');
        //                     },         
        //                 });                    
        //             }                
        //         });
        //     }
        // });
        // // update editabel textbox value ajex
        // $('body').on('change', '.edit-column', function() {         
        //     var id = $(this).data("id");
        //     var columnindex = $(this).data("index");
        //     var value = $(this).val();
        //     //console.log("change event call id, columnindex, value  :",id, columnindex, value);
        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         url: base_url+'/agentlist_update_ajex',
        //         method: "POST",
        //         data:{id:id,columnindex:columnindex,value:value,"_token":"{{ csrf_token() }}"},
        //         success: function(result){
        //             //console.log("ajex result :",result);
        //             $.each($(".edit-column"), function(i, el) {
        //                 orignaltxt = $(this).val();
        //                 if(orignaltxt.length > 0){
        //                     $(this).replaceWith(orignaltxt);                
        //                 }                
        //             });
        //             if(result.status == 'danger' || result.status == 'fail'){
        //                 if(result.data == "Record not exist"){
        //                     toster("danger", "", "","Record not found");
        //                     setTimeout( function(){ 
        //                         location.reload();
        //                     }  , 3000 );

        //                 }else{
        //                     toster("danger", "", "","Something Wrong!");
        //                 } 

        //             }else{
        //                 toster("success", columnindex, "Updated");
        //             }


        //         },           
        //     });
        // });
        // // load data function     
        // function loadMoreData(page,update='')
        // {
        //     search = $('#search').val();
        //     url = base_url+'/agentlist?page=' + page + '&search=' + search;
        //     $.ajax({
        //         url:url,
        //         type:'get',
        //         beforeSend: function()
        //         {
        //             $(".loding").show();               
        //         }
        //     })
        //     .done(function(data){
        //         if(data.html == ""){
        //             $('.loding').html("No more Record Found!");
        //             return;
        //         }
        //         $('.totalrecords').text(data.totalrecords);
        //         $('.activeagents').text(data.activeagents);
        //         $('.suspendedagents').text(data.suspendedagents);

        //         $('.totalrecords').data("value", data.totalrecords);
        //         $('.activeagents').data("value", data.activeagents);
        //         $('.suspendedagents').data("value", data.suspendedagents);

        //         chart();
        //         $('.loding').hide();
        //         //console.log("update = ",update);
        //         if(!update){
        //             $("#agentlistrow").append(data.html);
        //         }

        //     })
        //     .fail(function(jqXHR,ajaxOptions,thrownError){

        //     });

        // }
        // var page = 1;
        // // page scroll function
        // $(window).scroll(function(){
        //   if($(window).scrollTop() + $(window).height() >= $(document).height()){
        //      page++;
        //      console.log("scroll page :"+page);
        //      loadMoreData(page);

        //   }
        // });
        // // search function 
        // $("#search").on("keyup", function() {
        //     page = 1;

        //     if(($(this).val()).length > 2 || ($(this).val()).length == 0){
        //         $("#agentlistrow").text("");
        //         console.log("search call page :"+page);
        //         loadMoreData(page);

        //     }
        // });

        // function chart(){
        //     // alert("chart");
        //     var data, option, total_agents, suspended_agents, active_agents;
        //     total_agents =  $(".totalrecords").data("value");
        //     suspended_agents = $(".suspendedagents").data("value");
        //     active_agents = $(".activeagents").data("value");

        //     // alert("total_agents = "+total_agents+", suspended_agents = "+suspended_agents+", active_agents"+active_agents);

        //     data = {
        //         // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        //         labels: ["T", "A", "S", "I", "N"],
        //         series: [total_agents, active_agents, suspended_agents, (total_agents-active_agents), (total_agents-suspended_agents)]
        //     }
        //     option = { 
        //         distributeSeries: !0,            
        //         axisY: {
        //             onlyInteger: true
        //         }                            
        //     };

        //     new Chartist.Bar("#distributed-series1",data,option);

        // }
        // chart(); 

        // // add new agent model
        // $("body").on("click", ".agentaddsubmit", function(){        
        // //   console.log("id = "+id);
        //     var formData = {
        //         id: $(this).data('id') ? $(this).data('id') : 0,
        //         firstname: $("#firstname").val(),
        //         lastname: $("#lastname").val(),
        //         email: $("#email").val(),
        //         contact_no: $("#contact_no").val(),                
        //         address: $("#address").val(),
        //         country: $("#country").val(),
        //         state: $("#state").val(),
        //         city: $("#city").val(),
        //         postal_code: $("#postal_code").val(),
        //         company_name: $("#company_name").val(),
        //         table: "agent",
        //         "_token":$("#token").val()
        //     };            
        //     $.ajax({            
        //         url: base_url+'/agent_add_ajex',
        //         method: "POST",
        //         data:formData,
        //         success: function(result){
        //             var selector;
        //             $(".border-danger").removeClass("border-danger");
        //             $(".invalid-tooltip").hide();
        //             if(result.error !=0){                        
        //                     $.each(result.error, function(index, value){         

        //                         $('#'+index).addClass("border-danger").show();
        //                         $('.'+index).html(value).show();
        //                     });

        //             }else{
        //                 $(".border-danger").removeClass("border-danger");
        //                 $(".invalid-tooltip").hide();

        //                 if(result.status == 'danger' || result.status == 'fail'){
        //                     // toster("danger", "Record", "Failed");
        //                 }else{
        //                     // alert(result.data);
        //                     if(result.data > 0 || result.data != 'Update Sucessfully'){
        //                         $(".agentaddsubmit").attr("data-id",result.data);
        //                     }


        //                     $(".nav-link").removeClass("active").attr("aria-expanded", "false");
        //                     $(".tab-pane").removeClass("show").removeClass("active");
        //                     $("#cred").addClass("show active");
        //                     $(".nav-link[href='#cred']").addClass("active").attr("aria-expanded", "true").attr("data-bs-toggle", "tab");
        //                     // toster("success", "Record", "Added"); href="#cred"
        //                 }

        //             }              
        //         },           
        //     });      

        // });
        // // new credential add ajex code
        // $("body").on("click", ".credaddsubmit", function(){
        //     // alert("cred submit");
        //     var formData = {
        //         id: $(this).data('id') ? $(this).data('id') : 0,
        //         firstname_user: $("#firstname_user").val(),
        //         password: $("#hori-pass1").val(),
        //         lastname_user: $("#lastname_user").val(),
        //         email_user: $("#email_user").val(),
        //         contact_no_user: $("#contact_no_user").val(), 
        //         agent_id: $(".agentaddsubmit").attr("data-id"),              
        //         table: "user",
        //         "_token":$("#token").val()
        //     };            
        //     $.ajax({            
        //         url: base_url+'/agent_cred_add_ajex',
        //         method: "POST",
        //         data:formData,
        //         success: function(result){
        //             var selector;
        //             $(".border-danger").removeClass("border-danger");
        //             $(".invalid-tooltip").hide();
        //             if(result.error !=0){                        
        //                     $.each(result.error, function(index, value){         

        //                         $('#'+index).addClass("border-danger").show();
        //                         $('.'+index).html(value).show();
        //                     });

        //             }else{
        //                 $(".border-danger").removeClass("border-danger");
        //                 $(".invalid-tooltip").hide();

        //                 if(result.status == 'danger' || result.status == 'fail'){

        //                 }else{

        //                     if(result.data > 0 || result.data != 'Update Sucessfully'){

        //                         $(".credaddsubmit").attr("data-id",result.data);
        //                     }


        //                     $(".nav-link").removeClass("active").attr("aria-expanded", "false");
        //                     $(".tab-pane").removeClass("show").removeClass("active");
        //                     $("#bill").addClass("show active");
        //                     $(".nav-link[href='#bill']").addClass("active").attr("aria-expanded", "true").attr("data-bs-toggle", "tab");

        //                 }

        //             }              
        //         },           
        //     });

        // }); 

        // // when cloase model - set default tab, remove data
        // $("#add-new-agent").on("hidden.bs.modal", function() {        
        //     $(".agentaddsubmit").removeAttr("data-id");
        //     $(".credaddsubmit").removeAttr("data-id");
        //     $(".nav-link").removeClass("active").attr("aria-expanded", "false");
        //     $(".tab-pane").removeClass("show").removeClass("active");
        //     $("#personal").addClass("show active");
        //     $(".nav-link[href='#personal']").addClass("active").attr("aria-expanded", "true"); 
        //     $(this).find("input,textarea,select").val('').find("input[type=checkbox], input[type=radio]").prop("checked", "");       
        // });
        // $('#add-new-agent').modal({backdrop: 'static', keyboard: false}) 
        // $('body').on('click', '.add-more', function() {
        //     let addmorediv = $('.add-more-html').html();
        //     $('.add-more-div').after(addmorediv);
        // });
        // $('body').on('click', '.add-more-remove', function() {
        //     $(this).closest(".add-more-div-count").remove();

        // });

        // $('body').on('click', '.billplanaddsubmit', function() {
        //     let billplan_id = [];
        //     let commission = [];
        //     $('.billplan_id').each(function(){
        //         billplan_id.push($(this).val());
        //     });
        //     $('.commission_enter').each(function(){
        //         commission.push($(this).val());
        //     });
        //     billplan_id.pop();
        //     commission.pop();
        //     // console.log(billplan_id);
        //     // console.log(commission);
        //     // console.log($(".agentaddsubmit").data('id'));
        //     var formData = {
        //         agent_id: $(".agentaddsubmit").data('id') ? $(".agentaddsubmit").data('id') : 0,
        //         billplan_id: billplan_id,
        //         commission: commission,                         
        //         table: "agent_billplan",
        //         "_token":$("#token").val()
        //     };            
        //     $.ajax({            
        //         url: base_url+'/agent_bill_plan_add_ajex',
        //         method: "POST",
        //         data:formData,
        //         success: function(result){
        //             $(".border-danger").removeClass("border-danger");
        //             $(".invalid-tooltip").hide();
        //             let i = 0;
        //             var myString, index, indexid, indexvalue,feild1,feild2,message;
        //             if(result.error !=0){                        
        //                     $.each(result.error, function(index, value){ 
        //                         myString = index.split(".");
        //                         indexvalue = myString[0];
        //                         indexid = parseInt(myString[1]);
        //                         feild1 = "."+indexvalue;
        //                         feild2 = "."+indexvalue+"-error";
        //                         message = value[0].replace(/\d+/g, '').replace('_id', '').replace('.', '');

        //                         $("."+indexvalue).eq(indexid).addClass("border-danger");
        //                         $("."+indexvalue+"-error").eq(indexid).show().html(message);


        //                     });

        //             }else{               

        //                 // if(result.status == 'danger' || result.status == 'fail'){
        //                     //setTimeout(function() { toster("success", "Agent", "Added"); }, 4000);
        //                 // }else{

        //                     $('#add-new-agent').modal('hide');
        //                     setTimeout(function() { toster("success", "Agent", "Added"); }, 4000);               

        //                 // }


        //             }              
        //         },           
        //     });

        // });





    });
</script>
@endsection