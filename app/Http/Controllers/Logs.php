<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class Logs extends Controller
{
    private function preparePredicates($request)
    {
        $predicates = array();
        
        if ($request->filled('last_updated')) {
            $predicates[] = array('last_updated', '=', $request->input('last_updated'));
        };
        if ($request->filled('last_updater')) {
            $predicates[] = array('last_updater', '=', $request->input('last_updater'));
        };
        
//         $predicates[] = array('last_updated', '>=', '2020-11-26');
        
        return $predicates;
    }
    
    public function index(Request $request)
    {
        $predicates = $this->preparePredicates($request);
        
        $records = Log::getWithPredicates($predicates);
        
        $data = array(
            'lists' => collect([
                'log' => (object) [
                    'id' => 'logTable',
                    'name' => 'log',
                    'label' => 'Log',
                    'records' => $records,
                    'total' => $records->total(),
                ],
            ]),
        );
        
        return view('components.log.index', $data);
    }
}
