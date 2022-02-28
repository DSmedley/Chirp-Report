<?php

namespace App\Http\Controllers;

use App\Http\AnalysisService;
use Illuminate\Http\Request;
use Auth;
use App\Analyses;
use App\Link;
use App\Hashtag;
use App\Mention;
use App\Hour;
use App\Url;

class AnalysesController extends Controller
{

    public function __construct(private AnalysisService $analysisService) {}

    public function index(){
        return view('analysis');
    }

    public function getAnalysis($id = null, $name = null)
    {
        //Get data from specified analysis
        //Else return error
        if ($id){
            $analysis = Analyses::where('id', $id)->first();
        }

        $data = null;

        if(isset($analysis->id)){
            $mentions = Mention::where('analysis_id', $analysis->id)->get();
            $hashtags = Hashtag::where('analysis_id', $analysis->id)->get();
            $hours = Hour::select('hour', 'occurs')->where('analysis_id', $analysis->id)->orderBy('hour')->get();
            $urls = Url::where('analysis_id', $analysis->id)->get();

            $data = array(
               'analysis'   => $analysis,
               'mentions'   => $mentions,
               'hashtags'   => $hashtags,
               'hours'      => $hours,
               'urls'      => $urls,
            );
        }

        //Return to analysis page
        return view('analysis')->with($data);
    }

    public function analyze(Request $request){
        $this->validate($request, [
            'name' => 'required',
        ]);

        $analysis = $this->analysisService->getData($request->get('name'));

        if(isset($analysis['errors'])){
            return redirect()->route('analyze')->with('twitterError', $analysis['errors']['0']['message']);
        }

        if (Auth::check()){
            $this->linkAnalysis(Auth::user()->id, $analysis->id);
        }

        $data = array(
            'id' => $analysis->id,
            'name' => $analysis->screen_name,
        );

        return redirect()->route('analysis.view', $data);
    }

    public function linkAnalysis($userID = null, $analysisID = null){
        //link analysis to account
        $link = new Link;
        $link->user_id = $userID;
        $link->analysis_id = $analysisID;
        //save link
        $link->save();
    }

}
