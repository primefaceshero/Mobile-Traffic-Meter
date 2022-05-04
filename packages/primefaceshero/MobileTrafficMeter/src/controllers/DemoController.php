<?php

namespace Primefaceshero\MobileTrafficMeter\Controllers;
use Primefaceshero\MobileTrafficMeter\MobileTrafficMeter;
use Illuminate\Http\Request;

if (class_exists("\\Illuminate\\Routing\\Controller")) {	
    class BaseController extends \Illuminate\Routing\Controller {}	
} elseif (class_exists("Laravel\\Lumen\\Routing\\Controller")) {	
    class BaseController extends \Laravel\Lumen\Routing\Controller {}	
}


class DemoController extends BaseController
{

    protected $view_log = 'MobileTrafficMeter::traffic_meter';

    function index()
    {
        return app('view')->make($this->view_log);
    }

    public function totalEvents(Request $request){
        
        $data = [];
        $names = [];
        $counts = [];

        $start = $request->start . ' 00:00:00';
        $end = $request->end . ' 23:59:59';

        $eventsName = MobileTrafficMeter::getEventsNameArray();

        foreach($eventsName as $event){
            array_push($names, $event);
            array_push($counts, MobileTrafficMeter::getByEventAndDate($event, $start, $end)->count());
        }

        $data['names'] = $names;
        $data['counts'] = $counts;

        return response()->json($data, 200);
    }
}