<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Resources\PatientResource;
use App\Http\Requests\PatientCreateRequest;

class PatientController extends Controller
{
    /**
     * Display a listing of the patients.
     *
     * @return mixed json_data
     */
    public function index()
    {
        $data = PatientResource::collection(Patient::all());

        return Helper::api_response(200, 'Retrieved Successfully', $data);
    }

    /**
     * Store a newly created patient into database
     *
     * @param  PatientCreateRequest
     * @return mixed json_data
     */
    public function store(PatientCreateRequest $request)
    {
        $patient = Patient::create($request->only('patient_id', 'pet_name', 
                        'status', 'parent', 'breed', 'gender', 'dob', 
                        'contact_phone', 'address'    
                        )
                    );
        
        if($patient) {
            return Helper::api_response(200, 'Created Successfully', new PatientResource($patient));
        } else {
            return Helper::api_response(400, 'Failed to create');
        }
    }

    /**
     * Update the specified patient.
     *
     * @param  PatientCreateRequest  $request
     * @param  int  $id
     * @return mixed json_data
     */
    public function update(PatientCreateRequest $request, $id)
    {
        $patient = Patient::findOrFail($id);

        $patient->update($request->only('patient_id', 'pet_name', 
            'status', 'parent', 'breed', 'gender', 'dob', 
            'contact_phone', 'address'    
            )
        );

        if($patient) {
            return Helper::api_response(200, 'Updated Successfully', new PatientResource($patient));
        } else {
            return Helper::api_response(400, 'Failed to update');
        }
    }

    /**
     * Remove the specified patient from storage.
     *
     * @param  int  $id
     * @return json_data
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);

        $patient->delete();

        if($patient) {
            return Helper::api_response(200, 'Deleted Successfully');
        } else {
            return Helper::api_response(400, 'Failed to delete');
        }
    }
}
