<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index(Request $request) {
        $data['msg'] = empty($_GET['msg']) ? null : $_GET['msg'];
        $data['filter'] = empty($_GET['filter']) ? null : $_GET['filter'];
        $data['cargos'] = [
            'Nickel Ore' => 'cargo--red',
            'Antrachite' => 'cargo--coal',
            'Local Coal' => 'cargo--coal',
            'Australian Coal' => 'cargo--coal',
            'PCI Coal' => 'cargo--coal',
            'Semi Coke' => 'cargo--coal',
            'China Cargo' => 'cargo--lime',
            'General Cargo' => 'cargo--lime',
            'Yellow Sand' => 'cargo--yellow',
            'Cement' => 'cargo--yellow',
            'River Stone' => 'cargo--yellow',
            'Stone Boulders' => 'cargo--yellow',
            'Split Stones' => 'cargo--yellow',
            'Steel Billet' => 'cargo--teal',
            'HSD Fuel' => 'cargo--teal',
            'Liquid Tank' => 'cargo--teal',
            'Heavy Equipment' => 'cargo--teal',
            'Concrete Pile' => 'cargo--teal',
            'Ferro Chrome' => 'cargo--purple',
            'Ferro Nickel' => 'cargo--purple',
        ];
        $data['shipStatus'] = [
            'Sailing',
            'Anchored',
            'Jetty/Berthing',
            'Commenced Discharging',
            'Discharging Progress',
            'Completed Discharging',
            'Commenced Loading',
            'Loading Progress',
            'Completed Loading',
            'Cast Off',
            'Alongside at Vessel',
            'Problem',
            'Grounded',
            'Wait Next Instruction',
            'Grounded Proceed to Alongside',
        ];
        $data['paInbox'] = [
            'BG. Ken Kirshner',
            'BG. Heriberto Hickmon',
            'BG. Trinidad Talton',
            'BG. Royal Rask',
            'BG. Jeramy Jett',
            'BG. Arnulfo Arms',
            'BG. Issac Isaac',
            'BG. Kent Karner',
            'BG. Dino Dries',
            'BG. Marc Moir',
        ];
        shuffle($data['paInbox']);
        $data['paInboxCargo'] = [
            '<span class="badge badge-label cargo--red text-white">Ore Nickel</span>',
            '<span class="badge badge-label cargo--teal text-white">Lime Stones</span>',
            '<span class="badge badge-label cargo--coal text-white">Australian Coal</span>',
            '<span class="badge badge-label cargo--coal text-white">Local Coal</span>',
            '<span class="badge badge-label cargo--coal text-white">Coal</span>',
            '<span class="badge badge-label cargo--lime">China Cargo</span>',
            '<span class="badge badge-label cargo--purple text-white">Antrachite</span>',
        ];

        $data['bargeSchedule'] = [
            'Eloy Engelking',
            'Robbie Roehr',
            'Alec Annunziata',
            'Leopoldo Lonon',
            'Brenton Bottomley',
            'Enoch Esker',
            'Clemente Cardella',
            'Geoffrey Guizar',
            'Gonzalo Greenbaum',
            'Enrique Egner',
            'Cesar Cohee',
            'Raleigh Reif',
            'Filiberto Fretwell',
            'Sol Schapiro',
            'Garrett Gibbons',
            'Ernesto Evanoff',
            'Toney Tansey',
            'Chong Coppola',
            'Burton Burkhart',
            'Keith Kohnke',
            'Reynaldo Ryba',
            'Vito Verdun',
            'Michel Matteson',
            'Rich Rotella',
            'Jude Julius',
            'Tyree Timbers',
            'Julius Jines',
            'Rico Rundle',
            'Kenny Kostka',
            'Shon Sturgill',
        ];

        $data['appMembers'] = [
            'Rueben Riser',
            'Warner Walko',
            'Anthony Adair',
            'Lou Laber',
            'Wilfredo Wasilewski',
            'Saul Schillaci',
            'Ross Reno',
            'Russ Ricotta',
            'Oswaldo Oehler',
            'Ronnie Roose',
            'Duncan Donovan',
            'Roscoe Richert',
            'Shane Sherk',
            'Leo Lehner',
            'Conrad Crespin',
            'Kirk Kraatz',
            'Rodolfo Relyea',
            'Malcom Mcelwain',
            'Reid Reddy',
            'Corey Cushenberry',
            'Gaston Gilchrest',
            'Chris Corpuz',
            'Fredrick Fairey',
            'Wilton Woodfork',
            'Cleveland Cortina',
            'Paul Purvis',
            'Angel Arterburn',
            'Dong Dentler',
            'Shad Shue',
            'Wm Wilkinson',
        ];
        return view('home.index', $data);
    }


    public function dashboard(Request $request) {
        $data['page'] = basename($_SERVER['PHP_SELF']);
        $data['msg'] = empty($_GET['msg']) ? null : $_GET['msg'];
        $data['filter'] = empty($_GET['filter']) ? null : $_GET['filter'];
        $data['title'] = 'Dashboard';


        $data['shipStatus'] = [
            'Sailing',
            'Anchored',
            'Jetty/Berthing',
            'Commenced Discharging',
            'Discharging Progress',
            'Completed Discharging',
            'Commenced Loading',
            'Loading Progress',
            'Completed Loading',
            'Cast Off',
            'Alongside at Vessel',
            'Problem',
            'Grounded',
            'Wait Next Instruction',
            'Grounded Proceed to Alongside',
        ];

        $data['paInbox'] = [
            'BG. Ken Kirshner',
            'BG. Heriberto Hickmon',
            'BG. Trinidad Talton',
            'BG. Royal Rask',
            'BG. Jeramy Jett',
            'BG. Arnulfo Arms',
            'BG. Issac Isaac',
            'BG. Kent Karner',
            'BG. Dino Dries',
            'BG. Marc Moir',
        ];
        shuffle($data['paInbox']);
        $data['paInboxCargo'] = [
            '<span class="badge badge-label cargo--red text-white">Ore Nickel</span>',
            '<span class="badge badge-label cargo--teal text-white">Lime Stones</span>',
            '<span class="badge badge-label cargo--coal text-white">Australian Coal</span>',
            '<span class="badge badge-label cargo--coal text-white">Local Coal</span>',
            '<span class="badge badge-label cargo--coal text-white">Coal</span>',
            '<span class="badge badge-label cargo--lime">China Cargo</span>',
            '<span class="badge badge-label cargo--purple text-white">Antrachite</span>',
        ];

        $data['bargeSchedule'] = [
            'Eloy Engelking',
            'Robbie Roehr',
            'Alec Annunziata',
            'Leopoldo Lonon',
            'Brenton Bottomley',
            'Enoch Esker',
            'Clemente Cardella',
            'Geoffrey Guizar',
            'Gonzalo Greenbaum',
            'Enrique Egner',
            'Cesar Cohee',
            'Raleigh Reif',
            'Filiberto Fretwell',
            'Sol Schapiro',
            'Garrett Gibbons',
            'Ernesto Evanoff',
            'Toney Tansey',
            'Chong Coppola',
            'Burton Burkhart',
            'Keith Kohnke',
            'Reynaldo Ryba',
            'Vito Verdun',
            'Michel Matteson',
            'Rich Rotella',
            'Jude Julius',
            'Tyree Timbers',
            'Julius Jines',
            'Rico Rundle',
            'Kenny Kostka',
            'Shon Sturgill',
        ];

        $data['appMembers'] = [
            'Rueben Riser',
            'Warner Walko',
            'Anthony Adair',
            'Lou Laber',
            'Wilfredo Wasilewski',
            'Saul Schillaci',
            'Ross Reno',
            'Russ Ricotta',
            'Oswaldo Oehler',
            'Ronnie Roose',
            'Duncan Donovan',
            'Roscoe Richert',
            'Shane Sherk',
            'Leo Lehner',
            'Conrad Crespin',
            'Kirk Kraatz',
            'Rodolfo Relyea',
            'Malcom Mcelwain',
            'Reid Reddy',
            'Corey Cushenberry',
            'Gaston Gilchrest',
            'Chris Corpuz',
            'Fredrick Fairey',
            'Wilton Woodfork',
            'Cleveland Cortina',
            'Paul Purvis',
            'Angel Arterburn',
            'Dong Dentler',
            'Shad Shue',
            'Wm Wilkinson',
        ];
        return view('dashboard.index', $data);
    }

    public function languageChange($locale) {
        \app()->setLocale($locale);
        session()->put('lang', $locale);
        return redirect()->back();
    }
}
