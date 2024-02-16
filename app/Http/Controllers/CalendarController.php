<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalendarFormRequest;
use App\Models\Calendar;
use App\Models\CalendarLink;
use Illuminate\Support\Facades\Storage;

class CalendarController extends Controller
{
    /*public function home()
    {
        return redirect()->route('calendars.index');

        $getNumber = "";

        if(isset($_POST['Commencer'])) {
            if (!empty($_POST['numberLinks'])) {
                $getNumber = $_POST['numberLinks'];
                return redirect()->route('calendars.create', co mpact($getNumber));
            } else {
                return redirect()->route('calendars.index');
            }
        }
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calendar = Calendar::all();
        return view('calendars.index', compact('calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('calendars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalendarFormRequest $request)
    {
        $calendar = Calendar::create([
            'name' => $request->name,
        ]);

        $links = [];

        foreach ($request->url as $url) {
            $links[] = new CalendarLink(['url' => $url]);
        }

        $calendar->links()->saveMany($links);

        flash('Vos '. $calendar->links->count() . ' liens envoyés avec succès !');

            return redirect()->route('calendars.show', $calendar);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return int
     */
    public function show(Calendar $calendar)
    {
        foreach ($calendar->links as $link) {

            $content = file_get_contents($link->url);
            Storage::put('calendar', $content);

            $file = fopen(storage_path('app/calendar'), 'r+');

            function removeLine($file, $remove)
            {
                $lines = file(storage_path('app/calendar'), FILE_IGNORE_NEW_LINES);
                $remove = "BEGIN:VCALENDAR";
                foreach($lines as $key => $line)
                    if(stristr($line, $remove)) unset($lines[$key]);
                $data = implode('\n', array_values($lines));
                $file = fopen(storage_path('app/calendar'));
                fwrite($file, $data);
                fclose($file);
            }
//
//            while (!feof($file)) {
//                echo fgets($file) . "<br/>";
//            }
//            fclose($file);
        }
        // return view('calendars.show', compact('calendar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function edit(Calendar $calendar)
    {
        dd('edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function update(CalendarFormRequest $request, Calendar $calendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calendar $calendar)
    {
        //
    }
}
