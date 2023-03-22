<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;
use DB;
use File;
use Carbon\Carbon;
use Storage;

class mcController extends Controller
{   

    public function __construct()
    {

    }

    public function show(Request $request)
    {   
        $serialno = $request->serialno;

        $filename = 'MC'.$serialno.'.TXT';
        $filepath = public_path() . '/mcfile/'.$filename;

        $exists = Storage::disk('mcfile')->exists($filename);
        if($exists){
            $ini_array = parse_ini_file($filepath);
            return view('mymc',compact('ini_array'));
        }else{
            abort(403, 'MC not found');
        }

    }

    public function test(Request $request)
    {   
        $serialno = '0023931';

        $filename = 'MC'.$serialno.'.TXT';
        $filepath = public_path() . '/mcfile/'.$filename;
        $ini_array = parse_ini_file($filepath);

        return view('mymc',compact('ini_array'));

    }
}