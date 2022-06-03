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
                        <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                    </form>
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end">
                        <button type="button" class="btn btn-success waves-effect waves-light me-1"><i class="mdi mdi-cog"></i></button>
                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#custom-modal"><i class="mdi mdi-plus-circle me-1"></i> Add New</button>
                    </div>
                </div><!-- end col-->
            </div>
        </div> <!-- end card-body-->
    </div> <!-- end card-->
    @foreach($records as $record)
    <!-- fist element of list start-->

   
    <div class="card mb-2">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <div class="d-flex align-items-start">
                        <!-- <img class="d-flex align-self-center me-3 rounded-circle" src="../assets/images/companies/amazon.png" alt="Generic placeholder image" height="64"> -->
                        <div class="w-100">
                            <h4 class="mt-0 mb-2 font-16">{{$record['firstname']}} {{$record['lastname']}}</h4>
                            <p class="mb-1"><b>Company :</b> {{$record['company_name']}}</p>
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
                        <a href="javascript: void(0);" class="btn btn-xs @if($record['status'] == 'ACTIVE') btn-success @else btn-danger @endif waves-effect waves-light">Status : {{$record['status']}}</a>
                        <a href="javascript: void(0);" class="btn btn-xs @if($record['suspended'] == 'NO') btn-success @else btn-danger @endif waves-effect waves-light">Suspended : {{$record['suspended']}} </a>
                        <!-- <a href="javascript: void(0);" class="btn btn-xs btn-primary waves-effect waves-light">Email</a> -->
                    </div>
                </div>
                
                <div class="col-sm-2">
                    <div class="text-sm-end text-center mt-2 mt-sm-0">
                        <a href="{{url('agentedit').'/'.App\Providers\EncreptDecrept::encrept($record['id'])}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                        <a href="{{url('agentdelete').'/'.App\Providers\EncreptDecrept::encrept($record['id'])}}" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                    </div>
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
    </div> <!-- end card-->
    <!-- fist element of list end-->
    @endforeach

@if($records->lastPage() > 1)
<div class="row">
    <div class="col-sm-12 offset-md-5 col-md-7">
      <div class="dataTables_paginate paging_simple_numbers" id="tickets-table_paginate">
         <ul class="pagination pagination-rounded">
             @if($records->currentPage() > 1)
                <li class="paginate_button page-item previous" id="tickets-table_previous"><a href="{{$records->previousPageUrl()}}" aria-controls="tickets-table" data-dt-idx="0" tabindex="0" class="page-link"><i class="mdi mdi-chevron-left"></i></a></li>
             @endif
             @for($i=1; $i<=$records->lastPage(); $i++)
             <li class="paginate_button page-item @if($records->currentPage() == $i) active @endif"><a href="{{$records->url($i)}}" aria-controls="tickets-table" data-dt-idx="1" tabindex="0" class="page-link">{{$i}}</a></li>
             @endfor
             @if($records->currentPage() < $records->lastPage())
                <li class="paginate_button page-item previous" id="tickets-table_previous"><a href="{{$records->nextPageUrl()}}" aria-controls="tickets-table" data-dt-idx="0" tabindex="0" class="page-link"><i class="mdi mdi-chevron-right"></i></a></li>
             @endif
           
         </ul>
      </div>
   </div>  
</div>
@endif




   

        

        

        

    <!-- <div class="text-center my-4">
        <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-spin mdi-loading me-1"></i> Load more </a>
    </div> -->

</div> <!-- end col -->
<div class="col-lg-4 order-lg-2 order-1 right-sidebar">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-3">Leads Statics</h4>

            <div class="text-center" dir="ltr">
                <div class="row mt-2">
                    <div class="col-6">
                        <h3 data-plugin="counterup">1,284</h3>
                        <p class="text-muted font-13 mb-0 text-truncate">Leads Won</p>
                    </div>
                    <div class="col-6">
                        <h3 data-plugin="counterup">7,841</h3>
                        <p class="text-muted font-13 mb-0 text-truncate">Leads Lost</p>
                    </div>
                </div>

                <div id="leads-statics" style="height: 280px;" class="morris-chart" data-colors="#4a81d4,#e3eaef"></div>

                <p class="text-muted font-15 font-family-secondary mb-0 mt-3">
                    <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-blue"></i> Leads Won</span>
                    <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-muted"></i> Leads Lost</span>
                </p>
            </div>

        </div>
    </div> <!-- end card-->
</div> <!-- end col -->









              
                                                   
<script>    
$(document).ready( function () {
    var base_url = $('#base_url').val();
});
</script>


               
@endsection