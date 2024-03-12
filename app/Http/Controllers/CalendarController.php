<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalendarFormRequest;
use App\Models\Calendar;
use App\Models\CalendarLink;
use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calendar = Calendar::all();
        return view('calendar.index', compact('calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('calendar.create');
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

        return view('calendar.store', ['calendar' => $calendar]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return int
     */
    public function show(Calendar $calendar)
    {
        $allItems = cache()->remember('calendrier.' . $calendar->id, 30 * 60, function () use ($calendar) {

            // Tableau pour stocker tous les événements
            // Contenu de l'en-tête personnalisé
            $allEvents = "BEGIN:VCALENDAR\n";
            $allEvents .= "PRODID:-//Google Inc//Google Calendar 70.9054//EN\n";
            $allEvents .= "VERSION:2.0\n";
            $allEvents .= "CALSCALE:GREGORIAN\n";
            $allEvents .= "METHOD:PUBLISH\n";
            $allEvents .= "X-WR-CALNAME:CalendrierFusioné\n";
            $allEvents .= "X-WR-TIMEZONE:Europe/Paris\n";
            $allEvents .= "X-WR-CALDESC:Nouveau Calendrier\n";

            foreach ($calendar->links as $link) {
                // Récupérer le contenu des liens
                $content = file_get_contents($link->url);

                // Trouver tous les événements dans le fichier .ics
                preg_match_all('/BEGIN:VEVENT.+END:VEVENT/s', $content, $events);

                // Ajouter les événements trouvés au tableau des événements
                $allEvents .= $events[0][0];
            }

            $allEvents .= "\nEND:VCALENDAR";

            return $allEvents;
        });

        return $allItems;

        }

    /**
     *
     *
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
