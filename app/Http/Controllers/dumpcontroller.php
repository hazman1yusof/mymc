<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;
use DB;
use File;
use Carbon\Carbon;
use Storage;

class dumpController extends Controller
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

    public function pat_mast(Request $request)
    {   
        // http://mymc.test:8080/pat_mast?patm_CompCode=&patm_MRN=&patm_Episno=&patm_Name=&patm_Call_Name=&patm_addtype=&patm_Address1=&patm_Address2=&patm_Address3=&patm_Postcode=&patm_citycode=&patm_AreaCode=&patm_StateCode=&patm_CountryCode=&patm_telh=&patm_telhp=&patm_telo=&patm_Tel_O_Ext=&patm_ptel=&patm_ptel_hp=&patm_ID_Type=&patm_idnumber=&patm_Newic=&patm_Oldic=&patm_icolor=&patm_Sex=&patm_DOB=&patm_Religion=&patm_AllergyCode1=&patm_AllergyCode2=&patm_Century=&patm_Citizencode=&patm_OccupCode=&patm_Staffid=&patm_MaritalCode=&patm_LanguageCode=&patm_TitleCode=&patm_RaceCode=&patm_bloodgrp=&patm_Accum_chg=&patm_Accum_Paid=&patm_first_visit_date=&patm_Reg_Date=&patm_last_visit_date=&patm_last_episno=&patm_PatStatus=&patm_Confidential=&patm_Active=&patm_FirstIpEpisNo=&patm_FirstOpEpisNo=&patm_AddUser=&patm_AddDate=&patm_Lastupdate=&patm_LastUser=&patm_OffAdd1=&patm_OffAdd2=&patm_OffAdd3=&patm_OffPostcode=&patm_MRFolder=&patm_MRLoc=&patm_MRActive=&patm_OldMrn=&patm_NewMrn=&patm_Remarks=&patm_RelateCode=&patm_ChildNo=&patm_CorpComp=&patm_Email=&patm_Email_official=&patm_CurrentEpis=&patm_NameSndx=&patm_BirthPlace=&patm_TngID=&patm_PatientImage=&patm_pAdd1=&patm_pAdd2=&patm_pAdd3=&patm_pPostCode=&patm_DeptCode=&patm_DeceasedDate=&patm_PatientCat=&patm_PatType=&patm_PatClass=&patm_upduser=&patm_upddate=&patm_recstatus=&patm_loginid=&patm_pat_category=&patm_idnumber_exp=&patm_telhp2=&patm_patient_status=&patm_totallimit=&patm_HDlimit=&patm_EPlimit=&epis_idno=&epis_compcode=&epis_mrn=&epis_episno=&epis_admsrccode=&epis_epistycode=&epis_case_code=&epis_ward=&epis_bedtype=&epis_room=&epis_bed=&epis_admdoctor=&epis_attndoctor=&epis_refdoctor=&epis_prescribedays=&epis_pay_type=&epis_pyrmode=&epis_climitauthid=&epis_crnumber=&epis_depositreq=&epis_deposit=&epis_pkgcode=&epis_billtype=&epis_remarks=&epis_episstatus=&epis_episactive=&epis_adddate=&epis_adduser=&epis_reg_date=&epis_reg_time=&epis_dischargedate=&epis_dischargeuser=&epis_dischargetime=&epis_dischargedest=&epis_allocdoc=&epis_allocbed=&epis_allocnok=&epis_allocpayer=&epis_allocicd=&epis_lastupdate=&epis_lastuser=&epis_lasttime=&epis_procedure=&epis_dischargediag=&epis_lodgerno=&epis_regdept=&epis_diet1=&epis_diet2=&epis_diet3=&epis_diet4=&epis_diet5=&epis_glauthid=&epis_treatment=&epis_diagcode=&epis_complain=&epis_diagfinal=&epis_clinicalnote=&epis_conversion=&epis_newcaseP=&epis_newcaseNP=&epis_followupP=&epis_followupNP=&epis_bed2=&epis_bed3=&epis_bed4=&epis_bed5=&epis_bed6=&epis_bed7=&epis_bed8=&epis_bed9=&epis_bed10=&epis_diagprov=&epis_visitcase=&epis_PkgAutoNo=&epis_AgreementID=&epis_AdminFees=&epis_EDDept=&epis_dischargestatus=&epis_procode=&epis_treatcode=&epis_payer=&epis_doctorstatus=&epis_reff_rehab=&epis_reff_physio=&epis_reff_diet=&epis_stats_rehab=&epis_stats_physio=&epis_stats_diet=&epis_dry_weight=&epis_duration_hd=&epis_lastarrivaldate=&epis_lastarrivaltime=&epis_lastarrivalno=&epis_picdoctor=&epis_nurse_stat


        DB::beginTransaction();
        try {

            $add_array = $_REQUEST;
            dd($add_array);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            return response($e->getMessage(), 500);
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