@extends('layouts.mainLayout.main')
@section('title', 'Agent Comission')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body min-vh-100">



<div class="row mb-2">
    <div class="col-lg-8">
        <form class="d-flex flex-wrap align-items-center">
            
        <label for="fortodate" class="me-2">From : </label>
            <div class="me-3">
                <input type="text" data-provide="datepicker" data-date-format="{{Config('const.datepicker-format')}}" data-date-autoclose="true" class="form-control my-1 my-lg-0 fromdate datesearch" id="fromdate" placeholder="From date">
            </div>
            <label for="fortodate" class="me-2">To : </label>
            <div class="me-sm-3">
                <input type="text" class="form-control my-1 my-lg-0 todate datesearch" data-provide="datepicker" data-date-format="{{Config('const.datepicker-format')}}" data-date-autoclose="true" id="todate" placeholder="To date">
            </div>
        </form>                            
    </div>
    <div class="col-lg-4">
        <div class="text-lg-end">
            <button type="button" class="btn btn-danger waves-effect waves-light mb-2 me-2"><i class="mdi mdi-basket me-1"></i> $ 5000</button>
            <!-- <button type="button" class="btn btn-light waves-effect mb-2">+</button> -->
        </div>
    </div><!-- end col-->
</div>





<div class="table-responsive border-0">                                                       
<table id="agentcomission" class="table table-hover m-0 table-centered dt-responsive nowrap w-100">
    <thead>
    <tr>
        <th >Summary</th>
        <th>Amount</th>
        <th >Commission (%)</th>
        <th >Debit</th>
        <th >Credit</th>
        <th >Balance</th>
        <th>Created</th>
        <th >Tenant</th>        
    </tr>
    </thead>   
</table>
</div>







        </div> <!-- end card-body -->
    </div> <!-- end card-->
</div> <!-- end col-->
                   
                                                   
<script>
    
$(document).ready( function () {
    var table;
    function datatable(){
        var base_url = $('#base_url').val();
        var id = $('#id').val();
        var fromdate = $('.fromdate').val() ? $('.fromdate').val() : '';
        var todate = $('.todate').val() ? $('.todate').val() : '';
        //console.log("row_id = ",id);
        // datatabel set data code 
        console.log("fromdate : ",fromdate);
        console.log("todate : ",todate);
        console.log("id : ",id);
        table = $('#agentcomission').DataTable({
            "language": {
                    "paginate": {
                        "previous": "<i class='mdi mdi-chevron-left'>",
                        "next": "<i class='mdi mdi-chevron-right'>"
                    }
                },
            "ajax": {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: base_url+'/agentcomissionajax/'+id,
                data:{fromdate:fromdate,todate:todate,"_token":"{{ csrf_token() }}"},             
            },
            
            
            columns: [
            { data: 'summary' },
            { data: 'amount' },
            { data: 'commission' },
            { data: 'debit' },
            { data: 'cradit' },
            { data: 'balance' },
            { data: 'created' },
            { data: 'tenant' },       
            
        ],
        "drawCallback": function() {
                    $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
                }
        
        });
    }
    datatable();
//     table.on( 'draw', function () {
    
// } );
    $('body').on('change', '.datesearch', function() { 
        alert( 'edrawn' );
        table
                .column( 7 )
                .search( $(this).val() )
                .draw();
    });

 /*
    // ajex update tabel data code
    $('body').on('change', '.edit-column', function() {
       // alert($(this).data("id"));
        var id = $(this).data("id");
        var columnindex = $(this).data("index");
        var value = $(this).val();

        //status_update(id, colIndex, value, this);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url+'/agentlist_update_ajex',
            method: "POST",
            data:{id:id,columnindex:columnindex,value:value,"_token":"{{ csrf_token() }}"},
            success: function(result){
                console.log(result);
                $.each($(".edit-column"), function(i, el) {
                    orignaltxt = $(this).val();
                    if(orignaltxt.length > 0){
                        $(this).replaceWith(orignaltxt);                
                    }                
                });
            },           
        });

    });

    function status_update(id='',columnindex='',value=''){
        if(id != '' && columnindex != '' && value != ''){
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: base_url+'/agentlist_update_ajex',
                method: "POST",
                data:{id:id,columnindex:columnindex,value:value,"_token":"{{ csrf_token() }}"},
                success: function(result){
                    console.log(result);
                    //alert("sucessfull");
                    //return "sucessfull";
                   
                },           
            });
            //return "sucessfull";

        }else{
            //return "fail";
        }
        //return "another";
    }
   
    // inline edit functionality code 
    $('#agentlist').on('click', 'td', function () {    
        
        var id='',orignaltxt='';
        var table = $('#agentlist').DataTable();
        var data = table.cell( this ).data();
        var colIndex = (data && table.cell(this) && table.cell(this).index().column) ? table.cell(this).index().column : '';
        var txt = $(this).text();    
        
        var $row = $(this).closest("tr").off("mousedown");
        var $tds = $row.find("td");
        var i =1;
        $.each($tds, function(i, el) {
           // console.log("each col deta :"+i+" ",    $(this).text());
            if(i==1){
                id = $(this).text();            
            }
            i++;       
        });

        if(txt.length > 1 && colIndex < 6  && colIndex > 1){
            //console.log("index = ");
            $.each($(".edit-column"), function(i, el) {
                orignaltxt = $(this).val();
                if(orignaltxt.length > 0){
                    $(this).replaceWith(orignaltxt);                
                }                
            });

            $(this).html("").append("<input type='text' class='edit-column' data-id="+id+" data-index="+colIndex+" value=\""+txt+"\">");
        }
    });
   

    $('#agentlist').on( 'click', '.status', function (e) {       
        var colIndex = "status";
        var responce = status_update($(this).attr("id").replace('status',''), colIndex, $(this).text());
        //console.log("return status = ",responce);
        if($(this).text() == 'ACTIVE'){
            $(this).html('INACTIVE').removeClass("bg-soft-success text-success").addClass("bg-soft-danger text-danger");           
            
        }else{
            $(this).removeClass("bg-soft-danger text-danger").addClass("bg-soft-success text-success").html('ACTIVE');            
        }
        
    });
    $('#agentlist').on( 'click', '.suspended', function (e) {       
        var colIndex = "suspended";
        var responce = status_update($(this).attr("id").replace('suspended',''), colIndex, $(this).text());
        //console.log("return suspended = ",responce);
        if($(this).text() == 'NO'){
            $(this).html('YES').removeClass("bg-soft-success text-success").addClass("bg-soft-danger text-danger");                      
        }else{
            $(this).removeClass("bg-soft-danger text-danger").addClass("bg-soft-success text-success").html('NO');            
        }
    });
    

        
*/





});
</script>


               
@endsection