<?php

namespace App\Http\Controllers;

use App\Http\AnalysisService;
use Illuminate\Http\Request;

class AnalysisApiController extends Controller {

    public function __construct(private AnalysisService $analysisService) {}

    function analyzeUser(Request $request) {
        return $this->analysisService->getData($request->query('screen_name'));
    }

    function getRecentAnalyses() {
        return $this->analysisService->getRecentAnalyses();
    }
}
