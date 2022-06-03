<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\Agent;
use App\Models\AgentComission;
use App\Models\User;
use App\Providers\EncreptDecrept;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\URL;
//use Spatie\ArrayToXml\ArrayToXml;
use Tymon\JWTAuth\Facades\JWTAuth;
// use App\Services\EncreptDecrept;

class AgentController extends Controller
{    
    
    public function agentlist(Request $request)
    {
        $agent = Agent::orderBy('id', 'DESC');
        $activeagents = Agent::where('status', 'ACTIVE');
        $suspendedagents = Agent::where('suspended', 'YES'); 
        
        if($request->ajax()){
            if($request->search){
                $search_key = $request->search;
                $agent->where(function($agent1) use ($search_key){
                    $agent1 = $agent1->where('firstname', 'LIKE', "%{$search_key}%")->orWhere('lastname', 'LIKE', "%{$search_key}%")->orWhere('email', 'LIKE', "%{$search_key}%")->orWhere('company_name', 'LIKE', "%{$search_key}%");
                });
                $activeagents->where(function($activeagents1) use ($search_key){
                    $activeagents1 = $activeagents1->where('firstname', 'LIKE', "%{$search_key}%")->orWhere('lastname', 'LIKE', "%{$search_key}%")->orWhere('email', 'LIKE', "%{$search_key}%")->orWhere('company_name', 'LIKE', "%{$search_key}%");
                });
                $suspendedagents->where(function($suspendedagents1) use ($search_key){
                    $suspendedagents1 = $suspendedagents1->where('firstname', 'LIKE', "%{$search_key}%")->orWhere('lastname', 'LIKE', "%{$search_key}%")->orWhere('email', 'LIKE', "%{$search_key}%")->orWhere('company_name', 'LIKE', "%{$search_key}%");
                });
                
            }
           

        }
        

        $agent = $agent->paginate(2);

        if($request->ajax()){
            $response_ajex['totalrecords'] = $agent->total();
            $response_part['records'] = $agent;
            
            $view = view('user.data',$response_part)->render();
            $response_ajex['html'] = $view;
            $response_ajex['activeagents'] = $activeagents->count();
            $response_ajex['suspendedagents'] = $suspendedagents->count(); 
            return response()->json($response_ajex);
        }

        $response['records'] = $agent;
        $response['totalrecords'] = $agent->total();      
        $response['activeagents'] = $activeagents->count();
        $response['suspendedagents'] = $suspendedagents->count(); 

        return view('user.agentlist',$response);
    }

    public function agentlistajax()
    {
        $agent = Agent::orderBy('id', 'DESC')->get();           
            foreach($agent as $row){ 
                $encrypted_id = EncreptDecrept::encrept($row->id); 
                $go_to = '<a href="'.url('').'/agentcomission/'.$encrypted_id.'/"><i class="fas fa-info-circle"></i></a>';  
                
               
                
                $comission = '<a title="Agent Commission" class="fa fa-money" href="'.url('').'/agentcomission/'.$encrypted_id.'"><i class="fas fa-money-bill-alt text-success"></i></a>';
                $tenent = '<a href="'.url('').'/tenent/admin/'.$encrypted_id.'"><i class="fas fa-users"></i></a>';
                //$action = '<b><a href="'.url('').'/agent/edit/'.$row->id.'" class="action-icon"><i class="mdi mdi-square-edit-outline"></i></a></b><a href="/agent/password/reset/'.$row->id.'"><i class="mdi mdi-link-variant"></i></a>';

                // modify for editable datatabel data
                $action = '<b><a  class="action-icon"><i class="mdi mdi-square-edit-outline"></i></a></b><a ><i class="mdi mdi-link-variant"></i></a>';
                $status = '<span class="badge bg-soft-danger text-danger status" id="status'.$row->id.'">'.$row->status.'</span>';
                if($row->status == 'ACTIVE') $status = '<span class="badge bg-soft-success text-success status" id="status'.$row->id.'">'.$row->status.'</span>';
                
                $suspended = '<a><span class="badge bg-soft-danger text-danger suspended" id="suspended'.$row->id.'">'.$row->suspended.'</span></a>';
                if($row->suspended == 'NO') $suspended = '<a><span class="badge bg-soft-success text-success suspended" id="suspended'.$row->id.'">'.$row->suspended.'</span></a>';
                


                        
            $records[] = [
                'go_to' => $go_to,
                'agent_code' => $row->id,
                'fname' => $row->firstname,
                'lname' => $row->lastname,
                //'name' => $row->firstname.' '.$row->lastname,
                'company_name' => $row->company_name,
                'email' => $row->email,
                'balance' => $row->balance,  
                'status' => $status,
                'suspended' => $suspended,
                'comission' => $comission,
                'tenent' => $tenent,  
                'action' => $action,
                'id' => $encrypted_id     
            ];
        }

        $response['data'] = $records;    
        return response()->json($response);      
   
    }
    public function agentlist_update_ajex(Request $request){
        //return response()->json($request->all());
        $id = EncreptDecrept::decrept($request->id);
        $columnindex = $request->columnindex;
        $value = $request->value;
        
        if($columnindex == "firstname"){
            $update["firstname"] = $value;
        }else if($columnindex == "lastname"){
            $update["lastname"] = $value;
        }else if($columnindex == "company_name"){
            $update["company_name"] = $value;
        }else if($columnindex == "email"){
            $update["email"] = $value;
        }else if($columnindex == "status"){
            $update["status"] = ($value == 'ACTIVE') ? 'INACTIVE' : 'ACTIVE' ;
        }else if($columnindex == "suspended"){
            $update["suspended"] = ($value == 'YES') ? 'NO' : 'YES' ;
        }

        try {
            //dd($update);
            $User_Update = Agent::where("id", $id)->update($update);
            if($User_Update)
                return response()->json(["status" => $User_Update, "data" => "Update Sucessfully", "error" => 0]);
            return response()->json(["status" => $User_Update, "data" => "Something wrong", "error" => 0]);
        
        } catch (\Exception $e) {
            return response()->json(["status" => $User_Update, "data" => "Record not found", "error" => $e->getMessage()]);            
        }       
    }
    public function agentcomission(){        
        return view('user.agentcomission');
    }
    public function agentcomissionajax($id, Request $request){
        $decrypted_id = EncreptDecrept::decrept($id);
        $agent_comission_list = AgentComission::where('agent_id',$decrypted_id);
        $fromdate = $request->get('fromdate') ? $request->get('fromdate') : '';
        $todate = $request->get('todate') ? $request->get('todate') : '';
        // $fromdate = '2021-10-13';
        // $todate = '2021-10-13';
        if(!empty($fromdate)){
            $agent_comission_list = $agent_comission_list->whereDate('created_date', '>=', $fromdate); 
            // $agent_comission_list = $agent_comission_list->where('created_date', '>=', $fromdate);
        }
        if(!empty($todate)){
            $agent_comission_list = $agent_comission_list->whereDate('created_date', '<=', $todate); 
            // $agent_comission_list = $agent_comission_list->where('created_date', '>=', $fromdate);
        }
         
        $agent_comission_list = $agent_comission_list->get();
        //dd($agent_comission_list);
       foreach($agent_comission_list as $data){
        $date = new DateTime($data->created_date);
        
        // $date_result = $date->format('Y-M-d H:i');
        $date_result = $date->format(Config('const.datepicker-format1'));
            $records[] = [
                'summary' => $data->summary,
                'amount' => $data->amount,
                'commission' => $data->commission_percentage,
                'debit' => $data->debit,
                'cradit' => $data->cradit,
                'balance' => $data->balance,
                'created' => $date_result,  
                'tenant' => $data->tenant_account_number,
                'id' =>   $id,            
            ];

       }

       
        $response['data'] = $records;    
        return response()->json($response);
        
        
    }

    public function agentedit($id){
        $decrypted_id = EncreptDecrept::decrept($id);
        $agent = Agent::find($decrypted_id);
        $response['agent'] = $agent;
        return view('user.agentedit',$response);        
    }

    public function agentdelete($id){
        $decrypted_id = EncreptDecrept::decrept($id);
        $agent = Agent::find($decrypted_id);
        $agent-> 
        $response['agent'] = $agent;
        return view('user.agentedit',$response);        
    }
}

