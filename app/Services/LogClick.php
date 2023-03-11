<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;


class LogClick
{
    static public function logLinkClick(Request $request)
    {
        $serviceGetIpInfo=new ServiceGetIpInfo($request);
        // Get the IP info and location about the city from the IP address
        $ipInfo = $serviceGetIpInfo->getAllInfo();
        $userAgentInfo=self::getUserAgentInfo($request);
        $page=$request->url();
        $timestamp = now();
        Log::info("User from {$ipInfo['city']},{$ipInfo['country']} ({$ipInfo['ip']}),os_name:{$userAgentInfo['os_name']},os_type:{$userAgentInfo['os_type']},browser_name:{$userAgentInfo['browser_name']},clicked on {$page} at {$timestamp}");
    }
    /**
     * Get the OS name, type, and browser name from the current request.
     *
     * @param  Request  $request  The current HTTP request.
     * @return array  An associative array containing the OS name, type, and browser name.
     */
    static private function getUserAgentInfo(Request $request)
    {
        $userAgent = $request->header('User-Agent');

        $agent = new Agent();
        $agent->setUserAgent($userAgent);

        $osName = $agent->platform();
        $deviceType = $agent->device() ?: 'desktop';

        if (stripos($deviceType, 'android') !== false) {
            $osType = 'android';
        } elseif (stripos($deviceType, 'iphone') !== false || stripos($deviceType, 'ipad') !== false) {
            $osType = 'ios';
        } elseif (stripos($deviceType, 'windows') !== false) {
            $osType = 'windows';
        } elseif (stripos($deviceType, 'macintosh') !== false) {
            $osType = 'macos';
        } else {
            $osType = 'other';
        }

        $browserName = $agent->browser();

        return [
            'os_name' => $osName,
            'os_type' => $osType,
            'browser_name' => $browserName,
        ];
    }
}
