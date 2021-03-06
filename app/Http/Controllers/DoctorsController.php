<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Payment;
use App\User;
use App\Appointment;
use App\Waiting;
use App\Labwork;
use App\Procedure;
use Alert;
use DB;
use Auth;

class DoctorsController extends Controller
{
    //
    //PATIENTS
    public function allpatients_doc() {
        $user_doc = Auth::user()->name;

        //$patients = DB::select( DB::raw("SELECT * FROM dms_patients WHERE doctor = '$user_doc' "));
        
        return view('doctor.patients.show')
        ->with('patients', Patient::where('doctor', $user_doc)->orderBy('created_at','desc')->paginate(10))
;
    }

    public function show($id) {
        $patients = DB::select( DB::raw("SELECT * FROM dms_patients WHERE id = '$id' "));

            return view('doctor.patients.read')
            ->with('patients', Patient::where('id', $id)->orderBy('created_at','desc')->paginate(10))
            ->with('users', User::orderBy('created_at','desc')->paginate(1))
            ->with('payments', Payment::orderBy('created_at','desc')->paginate(1));
        
    }

    public function medical_history($id) {
        //get post data by id
        $patient = Patient::where('id',$id)->first();
            
        //load form view
        return view('doctor.patients.medical_history', compact('payments'))
        ->with('users', User::orderBy('created_at','desc')->get())
        ->with('patients', Patient::where('id', $id)->orderBy('created_at','desc')->paginate(5))
        ->with('payments', Payment::where('patient_id', $id)->orderBy('created_at','desc')->get());
    }

    public function payment_history($id) {
        //get post data by id
        $patient = Patient::where('id',$id)->first();
            
        //load form view
        return view('doctor.patients.payment_history', compact('payments'))
        ->with('users', User::orderBy('created_at','desc')->get())
        ->with('patients', Patient::where('id', $id)->orderBy('created_at','desc')->paginate(5))
        ->with('payments', Payment::where('patient_id', $id)->orderBy('created_at','desc')->get());
    }

    






    //PAYMENTS
    public function allpayments() {
        $user_doc = Auth::user()->id;
        $user_doc_name = Auth::user()->name;

        return view('doctor.payments.show')
            ->with('patients', Patient::where('doctor', $user_doc_name)->orderBy('created_at','desc')->get())
            ->with('procedures', Procedure::orderBy('created_at','desc')->paginate(1))
            ->with('payments', Payment::where('doctor_id', $user_doc)->orderBy('created_at','desc')->paginate(10));

    }

    public function create_payment() {
        $user_doc_name = Auth::user()->name;

        return view('doctor.payments.create_new')
        ->with('patients', Patient::where('doctor', $user_doc_name)->orderBy('created_at','desc')->get())
        ->with('payments', Payment::orderBy('created_at','desc')->get())
        ->with('procedures', Procedure::orderBy('created_at','desc')->get());
    }

    public function create_payment_id($id) {

        $patient = Patient::findorFail($id);
        return view('doctor.payments.create')
        ->with('patients', Patient::where('id', $id)->orderBy('created_at','desc')->get())
        ->with('payments', Payment::where('patient_id', $id)->orderBy('created_at','desc')->get())
        ->with('procedures', Procedure::orderBy('created_at','desc')->get());
    }

    public function insert_payment(Request $request) {

        

        $user = DB::table('users')
                            ->select(DB::raw('count(*) as user_count, status'))
                            ->where('status', '<>', 1)
                            ->groupBy('status')
                            ->get();

        $selected_procedure = $request->get('procedure');

        $procedures = Procedure::where('procedure', $selected_procedure);

        dd($procedures);

        // $payment = new Payment();
        // $payment->doctor_id = Auth::user()->id;
        // $payment->patient_id = $request->get('patient_id');
        // $payment->procedure = $request->get('procedure');

        // $payment->procedure_cost = $procedure->amount;
        // $payment->notes = $request->get('notes');

        // $payment->save();
        // Alert::success('Payment Added Successfully', 'Success')->autoclose(2000);
        // return redirect('all-payments-doc');

        // if (empty($request->get('description')) && empty($request->get('lab_name')) && empty($request->get('due_date'))) {
        //     return back();
        // }else {
        //     $labwork = new Labwork();
        //     $labwork->patient_id = $request->get('patient_id');
        //     $labwork->description = $request->get('description');
        //     $labwork->lab_name = $request->get('lab_name');
        //     $labwork->due_date = $request->get('due_date');
        //     $labwork->status = 'pending';

        //     $labwork->save();
        //     Alert::success('Payment Added Successfully', 'Success')->autoclose(2000);
        //     return redirect('all-lablist-doc');
            
            
        // }

        
    }


    //APPOINTMENTS
    public function allappointments_doc() {
        return view('doctor.appointments.show')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5))
        ->with('users', User::orderBy('created_at','desc')->paginate(5))
        ->with('appointments', Appointment::orderBy('created_at','desc')->paginate(10))
        ->with('payments', Payment::where('doctor_id', Auth::user()->id)->orderBy('created_at','desc')->paginate(10));
    }

    public function new_appointment_doc() {
        return view('doctor.appointments.create')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(5));
    }

    public function create_appointment_doc(Request $request) {
        $appointment = new Appointment();

        $appointment->firstname = $request->get('firstname');
        $appointment->lastname = $request->get('lastname');
        $appointment->phone = $request->get('phone');
        $appointment->doctor = $request->get('doctor');
        $appointment->appointment_date = $request->get('appointment_date');
        $appointment->appointment_status = $request->get('appointment_status');

        $appointment->save();
        Alert::success('Apppointment Added Successfully', 'Success')->autoclose(2000);
        return back();
    }

    public function delete_appointment($id) {
        $waiting = Appointment::findorFail($id);

        $wait= DB::update(DB::raw("UPDATE dms_appointments set appointment_status = 'Complete' where id = $waiting->patient_id "));

        $waiting->delete();

        Alert::success('Appointment Deleted Successfully', 'Deleted')->autoclose(2000);
        return back();
    }





    //WAITING LIST
    public function allwaiting_doc() {
        return view('doctor.waitinglist.show')
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(10))
        ->with('waitings', Waiting::orderBy('created_at','desc')->paginate(10));
    }


    //LAB LIST
    public function all_lab_list() {
        return view('doctor.laboratory.show')
        ->with('labworks', Labwork::orderBy('created_at','desc')->paginate(10))
        ->with('patients', Patient::orderBy('created_at','desc')->paginate(10));
    }

    

    
}
