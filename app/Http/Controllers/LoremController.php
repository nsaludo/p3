<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Badcow\LoremIpsum\Generator;

class LoremController extends Controller
{
    /**
* Initial page
*/
    public function getIndex() {
        return view('lorem.index');
    }
/**
 * Posts the results
 */

    public function post(Request $request)
    {
        //dd($request->all());
        //$this->validate($request, [
        //    'numberOfPharagraps' => 'required|numeric|min:1|max:10',
        //]);

        $genLorem = new Generator();
        //$loremData = $genLorem->getParagraphs(1);
        $loremData = $genLorem->getParagraphs($request['numberOfParagraphs']);

        $jsonFile = json_encode($loremData , JSON_PRETTY_PRINT);

        return view('lorem.index')
            ->with('loremData', $loremData)
            ->with('jsonFile', $jsonFile);
    }

    public function download(Request $request)
    {
        header('Content-disposition: attachment; filename=loremIpsum.json');
        header('Content-type: text/plain');
        echo $request['jsonFile'];
    }

}
