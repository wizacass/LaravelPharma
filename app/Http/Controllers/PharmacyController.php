<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Pharmacy;
use App\Models\Register;
use App\Models\RegisterModel;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pharmacies = Pharmacy::all();
        return view('pharmacies.index', compact('pharmacies'));
    }

    public function create()
    {
        $models = RegisterModel::all();
        return view('pharmacies.create', compact('models'));
    }

    public function store()
    {
        $this->validateRequest();
        $pharmacy = new Pharmacy(
            request([
                'address',
                'phone_number',
                'is_manufacturing',
                'max_employees',
            ])
        );
        $pharmacy->save();
        $attributes = [
            'pharmacy_id' => $pharmacy->id,
            'model_id' => request('model_id')
        ];
        $register = new Register($attributes);
        $register->save();

        return redirect(route('pharmacies.index'));
    }

    public function show(Pharmacy $pharmacy)
    {
        $availableEmployees = Employee::where('pharmacy_id', null)->orderBy('position_id', 'DESC')->get();
        return view('pharmacies.show', compact('pharmacy', 'availableEmployees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Pharmacy::destroy($id);
        return redirect(route('pharmacies.index'));
    }

    public function assign($id)
    {
        $employeeId = request()->validate([
            'employee' => ['required', 'integer', 'exists:employees,id']
        ]);
        $this->setEmployeePharmacy($employeeId, $id);    

        return redirect("/pharmacies/$id");
    }

    public function unassign($id)
    {
        $employeeId = request()->validate([
            'employee' => ['required', 'integer', 'exists:employees,id']
        ]);
        $this->setEmployeePharmacy($employeeId);    

        return redirect("/pharmacies/$id");
    }

    private function validateRequest()
    {
        return request()->validate([
            'address' => ['required', 'min:3', 'max:255'],
            'phone_number' => ['numeric', 'min:6'],
            'is_manufacturing' => ['required', 'boolean'],
            'max_employees' => ['required', 'integer', 'min:1'],
            'model_id' => ['required', 'exists:register_models,id'],
        ]);
    }

    private function setEmployeePharmacy($employeeId, $pharmacyId = null)
    {
        $employee = Employee::find($employeeId)->first();
        $employee->pharmacy_id = $pharmacyId;
        $employee->save();
    }
}