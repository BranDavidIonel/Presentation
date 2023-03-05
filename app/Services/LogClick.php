<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class LogClick
{
    static public function logLinkClick(Request $request)
    {
        $serviceGetIpInfo=new ServiceGetIpInfo();
        // Get the IP info and location about the city from the IP address
        $ipInfo = $serviceGetIpInfo->getAllInfo();
        $page = $request->input('page');
        $page=$request->url();

        $timestamp = now();
        Log::info("User from {$ipInfo['city']}, {$ipInfo['country']} ({$ipInfo['ip']}) clicked on {$page} at {$timestamp}");
    }
}
