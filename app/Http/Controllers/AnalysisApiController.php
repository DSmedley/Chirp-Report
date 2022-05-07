<?php

namespace App\Http\Controllers;

use App\Http\AnalysisService;
use Illuminate\Http\Request;

class AnalysisApiController extends Controller {

    public function __construct(private AnalysisService $analysisService) {}

    function analyzeUser(Request $request): array {
        return $this->analysisService->analyzeUser(json_decode($request->getContent(), true)['username']);
    }

    function getAnalysis(Request $request): array {
        return $this->analysisService->getAnalysis($request->query('id'), $request->query('username'));
    }

    function getRecentAnalyses(): array {
        return $this->analysisService->getRecentAnalyses();
    }
}
