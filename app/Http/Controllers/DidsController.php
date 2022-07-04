<?php

namespace App\Http\Controllers;

use App\Models\Did;
use Illuminate\Http\Request;

class DidsController extends Controller
{
    //
    public function dids(Request $request)
    {
        $perpage = 2;
        $dids = Did::orderBy('id', 'DESC');
        // $activeagents = Agent::where('status', 'ACTIVE');
        // $suspendedagents = Agent::where('suspended', 'YES');
        // $response['billplan_list'] = BillPlan::get();
        // if ($request->ajax()) {
        //     if ($request->search) {
        //         $search_key = $request->search;
        //         $dids->where(function ($agent1) use ($search_key) {
        //             $agent1 = $agent1->where('firstname', 'LIKE', "%{$search_key}%")->orWhere('lastname', 'LIKE', "%{$search_key}%")->orWhere('email', 'LIKE', "%{$search_key}%")->orWhere('company_name', 'LIKE', "%{$search_key}%");
        //         });
        //         $activeagents->where(function ($activeagents1) use ($search_key) {
        //             $activeagents1 = $activeagents1->where('firstname', 'LIKE', "%{$search_key}%")->orWhere('lastname', 'LIKE', "%{$search_key}%")->orWhere('email', 'LIKE', "%{$search_key}%")->orWhere('company_name', 'LIKE', "%{$search_key}%");
        //         });
        //         $suspendedagents->where(function ($suspendedagents1) use ($search_key) {
        //             $suspendedagents1 = $suspendedagents1->where('firstname', 'LIKE', "%{$search_key}%")->orWhere('lastname', 'LIKE', "%{$search_key}%")->orWhere('email', 'LIKE', "%{$search_key}%")->orWhere('company_name', 'LIKE', "%{$search_key}%");
        //         });
        //     }
        // }


        $dids = $dids->paginate($perpage);

        // if ($request->ajax()) {
        //     $response_ajex['totalrecords'] = $dids->total();
        //     $response_part['records'] = $dids;
        //     $response_part['page'] = 'agentlist';
        //     $view = view('user.data', $response_part)->render();
        //     $response_ajex['html'] = $view;
        //     $response_ajex['activeagents'] = $activeagents->count();
        //     $response_ajex['suspendedagents'] = $suspendedagents->count();
        //     return response()->json($response_ajex);
        // }

        $response['records'] = $dids;
        // $response['totalrecords'] = $dids->total();
        // $response['activeagents'] = $activeagents->count();
        // $response['suspendedagents'] = $suspendedagents->count();
        // dd($dids);
        return view('did.did', $response);
    }
}
