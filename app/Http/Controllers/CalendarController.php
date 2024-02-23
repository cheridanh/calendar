<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalendarFormRequest;
use App\Models\Calendar;
use App\Models\CalendarLink;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

        // Tableau pour stocker tous les événements
        $allEvents = [];

        foreach ($calendar->links as $link) {
            // Récupérer le contenu du lien
            $content = file_get_contents($link->url);

            // Générer un nom aléatoire pour le fichier .ics
            $fileName = Str::random(10) . '.ics';

            // Enregistrer le fichier .ics
            Storage::put($fileName, $content);

            // Lire le contenu du fichier .ics
            $fileContent = file_get_contents(storage_path('app/'.$fileName));

            // Trouver tous les événements dans le fichier .ics
            preg_match_all('/BEGIN:VEVENT(.*?)END:VEVENT/s', $fileContent, $events);

            // Ajouter les événements trouvés au tableau des événements
            $allEvents = array_merge($allEvents, $events[0]);
        }

        // Concaténer tous les événements dans une chaîne
        $eventsString = implode("\n", $allEvents);

        // Générer un nom de fichier aléatoire pour tous les évènements récupérés
        $allEventsWithoutHead = 'all_' . Str::random(10) . '.ics';

        // Enregistrer tous les événements dans un fichier
        Storage::put($allEventsWithoutHead, $eventsString);

        // Contenu de l'en-tête personnalisé
        $header = "BEGIN:VCALENDAR\n";
        $header .= "PRODID:-//Google Inc//Google Calendar 70.9054//EN\n";
        $header .= "VERSION:2.0\n";
        $header .= "CALSCALE:GREGORIAN\n";
        $header .= "METHOD:PUBLISH\n";
        $header .= "X-WR-CALNAME:CalendrierFusioné\n";
        $header .= "X-WR-TIMEZONE:Europe/Paris\n";
        $header .= "X-WR-CALDESC:Nouveau Calendrier\n";

        // Lire le contenu actuel du fichier "all_events.ics"
        $existingContent = Storage::get($allEventsWithoutHead);

        // Concaténer l'en-tête avec le contenu existant
        $newContent = $header . $existingContent;

        // Ajouter "END:VCALENDAR" à la fin du contenu
        $newContent .= "\nEND:VCALENDAR";

        // Générer un nom aléatoire pour le nouveau fichier
        $newFileName = 'new_' . Str::random(10) . '.ics';

        // Enregistrer le nouveau contenu dans le nouveau fichier
        Storage::put($newFileName, $newContent);

/*        foreach ($calendar->links as $link) {
            $content = file_get_contents($link->url);
            $files = Storage::put(Str::random(10).'.ics', $content);*/

            /*$file = fopen(storage_path('app/*.ics'), 'r+');

            while (!feof($file)) {
                    echo fgets($file) . "</br>";
            }
            fclose($file);*/
        }
        // return view('calendars.show', compact('calendar'));

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
