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

    public function show2(Request $request)
    {   
        // http://mymc.test:8443/?compcode=9A&datefrom=12/2/2023&dateto=18/2/2023&mrn=000003&episno=12&newic=930112345017&patfrom=AMIRAH ROSLI&mccnt=3&adduser=FARID&adddate=12/2/2023&serialno=0023931&printeddate=12/2/2023&printedby=YATI&sex=she&visitdate=12/5/2023

        $serialno = $request->serialno;

        $ini_array = [
            'compcode' => $request->compcode,
            'datefrom' => $request->datefrom,
            'dateto' => $request->dateto,
            'mrn' => $request->mrn,
            'episno' => $request->episno,
            'newic' => $request->newic,
            'patfrom' => $request->patfrom,
            'mccnt' => ltrim($request->mccnt, '0'),
            'adduser' => $request->adduser,
            'adddate' => $request->adddate,
            'serialno' => $request->serialno,
            'printeddate' => $request->printeddate,
            'printedby' => $request->printedby,
            'sex' => $request->sex,
            'visitdate' => $request->visitdate
        ];

        if(true){
            return view('mymc',compact('ini_array'));
        }else{
            abort(403, 'MC not found');
        }

    }

    public function showrf(Request $request)
    {   
        // http://mymc.test:8443/rf?date=1&docname=1&name=1&newic=1&reffor=1&exam=1&invest=1

        $serialno = $request->serialno;

        $ini_array = [
            'docname' => $request->docname,
            'name' => $request->name,
            'newic' => $request->newic,
            'reffor' => $request->reffor,
            'exam' => $request->exam,
            'invest' => $request->invest,
            'refdate' => $request->date
        ];

        if(true){
            return view('myrf',compact('ini_array'));
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