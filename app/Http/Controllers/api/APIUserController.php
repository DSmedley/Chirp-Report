<?php
namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Response;
use App\Http\Resources\PersonalitiesResource;
use App\Http\Controllers\AnalysesController;

    class APIUserController extends Controller{
        public function __construct(){
            $this->content = array();
        }
        public function login(){
            if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
                $user = Auth::user();
                $this->content['token'] =  $user->createToken('Personality Scanner Personal Access Client')->accessToken;
                $status = 200;
            }else{
                $this->content['error'] = "These credentials do not match our records.";
                $status = 401;
            }
            return response()->json($this->content, $status);    
        }

        public function details(){
            return response()->json(Auth::user());
        }

        public function analyze(Request $request){
            $analysis = new AnalysesController();

            $result = $analysis->getData(request('handle'));

            if(isset($result['errors'])){
                $this->content['error'] = $result['errors'][0]['message'];
                $this->content['status'] = intval($result['errors'][0]['code']);
                return response()->json($this->content, 404);  
            }
            
            $report = new PersonalitiesResource($result); 
            $status = 200;
            
            if ($request->has('Authorization') || $request->header('Authorization') ) {
                $user = Auth::guard('api')->user();
                $analysis->linkAnalysis($user->id, $report['id']);
            }

            return response()->json($report, $status);
        }
 }