<?php

namespace Primefaceshero\MobileTrafficMeter;
use Primefaceshero\MobileTrafficMeter\Models\LogUseEvent;

class MobileTrafficMeter
{
    public function insert()
    {
        $log = new LogUseEvent();
        $log->event = $request->event;
        $log->user_id = $request->user_id;
        $log->save();
    }

    public function faker()
    {
        $events = ['Prueba 1', 'Prueba 2', 'Prueba 3'];
        for ($i=1; $i <= 100; $i++) { 
            $log = new LogUseEvent();
            $log->event = $events[rand(0, 2)];
            $log->user_id = rand(1, 10);
            $log->created_at = date('Y-m-d H:i:s', rand(strtotime('-2 month'), time()));
            $log->save();
        }
    }

    public function getAll()
    {
        $logs = LogUseEvent::all();
        return $logs;
    }

    public function getByUser($id){
        $logs = LogUseEvent::where('user_id', $id)->get();
        return $logs;
    }

    public function getByEvent($event){
        $logs = LogUseEvent::where('event', $event)->get();
        return $logs;
    }

    public function getByEventAndDate($event, $start_date, $end_date){
        $start = $start_date . ' 00:00:00';
        $end = $end_date . ' 23:59:59';

        $logs = LogUseEvent::where('event', $event)->whereBetween('created_at', [$start, $end])->get();
        return $logs;
    }

    public function getByUserAndEvent($id, $event){
        $logs = LogUseEvent::where('user_id', $id)->where('event', $event)->get();
        return $logs;
    }

    public function getByDate($start_date, $end_date){
        $start = $start_date . ' 00:00:00';
        $end = $end_date . ' 23:59:59';

        $logs = LogUseEvent::whereBetween('created_at', [$start, $end])->get();
        return $logs;
    }

    public function getEventsNameArray(){
        $events = LogUseEvent::groupBy('event')->pluck('event')->toArray();
        return $events;
    }
}