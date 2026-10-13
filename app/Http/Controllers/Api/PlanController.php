<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Services\ApiResponseService;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::with('features')->where('is_active', true)->orderBy('sort_order')->get();

        return ApiResponseService::success('Plans loaded successfully', $plans);
    }
}
