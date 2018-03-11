<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\PatientAdmission;
use App\PatientConsultation;
use App\PatientReferral;
use Auth;
use App\User;
use App\PatientAppointment;
class NurseController extends Controller
{
    public function __construct(){
        $this->middleware('nursecheck');
    }
    
    public function nurse_main(){
        $patients = Patient::all();
        return view('nurse.main', compact('patients'));
    }

    public function nurse_patient_info($id){
        $find = Patient::findOrFail($id);
    	return view('nurse.patient_info', compact('find'));
    }

    public function nurse_patient_transaction($id){
         $find = Patient::findOrFail($id);
        $admissions = PatientAdmission::where('patient_id', $id)->get();
    	return view('nurse.patient_transaction', compact('find', 'admissions'));
    }

    public function nurse_patient_transaction_consultation($id){
        $find = Patient::findOrFail($id);
        $admissions = PatientConsultation::where('patient_id', $id)->get();
        return view('nurse.patient_transaction2', compact('find','admissions'));
    }

    public function nurse_patient_transaction_referral($id){
        $find = Patient::findOrFail($id);
        $admissions = PatientReferral::where('patient_id', $id)->get();
        return view('nurse.patient_transaction3', compact('find','admissions'));
    }

    public function nurse_transaction($id, $user_id){
    	$id = $id;
        $user_id = $user_id;
        return view('nurse.transaction', compact('id', 'user_id'));
    }

    public function nurse_appointment(){
        $app = PatientAppointment::paginate(12);
        return view('nurse.appointment', compact('app'));
    }

    public function nurse_staff_list(){
        $list = User::where('role_id', 2)->get();
        return view('nurse.staff_list', compact('list'));
    }

    public function nurse_admission_check(Request $request, $id,  $user_id){
        $admission = new PatientAdmission;
        $admission->patient_id =  $user_id;
        $admission->pulse = $request['pulse'];
        $admission->blood_pressure = $request['blood_pressure'];
        $admission->respiration = $request['respiration'];
        $admission->temperature =  $request['temperature'];
        $admission->cause_admission = $request['cause_admission'];
        $admission->treatment = $request['treatment'];
        $admission->treated_by = $request['treated_by'];
        $admission->save();
        return redirect()->back()->with('adm','New Patient Admission added successfully!');
    }

    public function nurse_consultation_check(Request $request, $id,  $user_id){
        $admission = new PatientConsultation;
        $admission->patient_id =  $user_id;
        $admission->pulse = $request['pulse'];
        $admission->blood_pressure = $request['blood_pressure'];
        $admission->respiration = $request['respiration'];
       
        $admission->reason_consultation = $request['reason_consultation'];
        $admission->treatment = $request['treatment'];
        $admission->treated_by = $request['treated_by'];
        $admission->save();
        return redirect()->back()->with('adm','New Patient Consultaion added successfully!');

    }

    public function nurse_referal_check(Request $request, $id,  $user_id){
         $admission = new PatientReferral;
         $admission->patient_id =  $user_id;
         $admission->reason_referral = $request['reason_referral'];
         $admission->treatment = $request['treatment'];
         $admission->treated_by = $request['treated_by'];
         $admission->save();
         return redirect()->back()->with('ref','New Patient Referral added successfully!');
    }

    public function nurse_new_patient(){
        return view('nurse.new_patient');
    }

    public function nurse_new_patient_check(Request $request){
        $patient = new Patient;
         $patient->fname  = $request['fname'];
            $patient->lname = $request['lname'];
            $patient->dob = $request['dob'];
            $patient->age = $request['age'];
            $patient->sex = $request['sex'];
            $patient->address = $request['address'];
            $patient->contact = $request['contact'];
            $patient->occupation = $request['occupation'];
            $patient->person_contact = $request['person_contact'];
            $patient->fullname = $request['fullname'];
            $patient->relation = $request['relation'];
            $patient->person_number = $request['person_number'];
            $patient->save();

            return redirect()->back()->with('suc','New Patient added successfully!'); 
        
    }

    public function nurse_new_appointment(){
        return view('nurse.new_appointment');
    }

    public function nurse_logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function nurse_add_new_appointment(Request $request){

            $patient = new PatientAppointment;
            $patient->fname  = $request['fname'];
            $patient->lname = $request['lname'];
            $patient->dob = $request['dob'];
            $patient->age = $request['age'];
            $patient->sex = $request['sex'];
            $patient->address = $request['address'];
            $patient->contact = $request['contact'];
            $patient->occupation = $request['occupation']; 
            $patient->reason_appointment = $request['reason_appointment'];
            $patient->appointment_date = $request['date_appointment'];
            $patient->save();

            return redirect()->back()->with('suc','Appointment Set Successfully!'); 
    }

    public function nurse_search(Request $request){

         $search = Patient::where('lname','LIKE', $request['search'])->get();

         return view('nurse.search', compact('search'));

    }
}
