<?php

namespace Primefaceshero\MobileTrafficMeter;
use Primefaceshero\MobileTrafficMeter\Models\LogUseEvent;

class MobileTrafficMeter
{
    public static function insert($event, $user_id = null)
    {
        $log = new LogUseEvent();
        $log->event = $event;
        $log->user_id = $user_id;
        $log->save();
    }

    public static function faker($cant = 100)
    {
        $events = ['Prueba 1', 'Prueba 2', 'Prueba 3'];
        for ($i=1; $i <= $cant; $i++) { 
            $log = new LogUseEvent();
            $log->event = $events[rand(0, 2)];
            $log->user_id = rand(1, 10);
            $log->created_at = date('Y-m-d H:i:s', rand(strtotime('-2 month'), time()));
            $log->save();
        }
    }

    public static function getAll()
    {
        $logs = LogUseEvent::all();
        return $logs;
    }

    public static function getByUser($id){
        $logs = LogUseEvent::where('user_id', $id)->get();
        return $logs;
    }

    public static function getByEvent($event){
        $logs = LogUseEvent::where('event', $event)->get();
        return $logs;
    }

    public static function getByEventAndDate($event, $start_date, $end_date){
        $start = $start_date . ' 00:00:00';
        $end = $end_date . ' 23:59:59';

        $logs = LogUseEvent::where('event', $event)->whereBetween('created_at', [$start, $end])->get();
        return $logs;
    }

    public static function getByUserAndEvent($id, $event){
        $logs = LogUseEvent::where('user_id', $id)->where('event', $event)->get();
        return $logs;
    }

    public static function getByDate($start_date, $end_date){
        $start = $start_date . ' 00:00:00';
        $end = $end_date . ' 23:59:59';

        $logs = LogUseEvent::whereBetween('created_at', [$start, $end])->get();
        return $logs;
    }

    public static function getEventsNameArray(){
        $events = LogUseEvent::groupBy('event')->pluck('event')->toArray();
        return $events;
    }
}