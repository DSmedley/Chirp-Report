<?php

namespace App\Http\Controllers;

use App\Http\AnalysisService;

class PagesController extends Controller {

    public function __construct(private AnalysisService $analysisService) {}

    public function getHome() {
        return view('welcome')->with('recents', $this->analysisService->getRecentAnalyses());
    }

    public function getAbout() {
        return view('about');
    }

    public function getContact() {
        return view('contact');
    }
}
