<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeModal;
use App\Models\City;
use App\Models\State;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EmployeeModalController extends Controller
{
     public function index()
        {
                $all_employee_list = EmployeeModal::join("states","states.id","=","employee_modals.state_id")
                ->join("cities","cities.id","=","employee_modals.city_id")
                ->selectRaw("cities.city_name,states.state_name,employee_modals.*")
                ->get();
            return view('employes_master.index',compact("all_employee_list"));
        }


    public function create()
    {
        $states = State::all();
        return view('employes_master.create', compact('states'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'birthday' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'state_id' => 'required',
            'city_id' => 'required',
            'education.*' => 'nullable|string|max:255',
            'year_of_completion.*' => 'nullable|numeric|digits:4',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'skills' => 'nullable|array',
            'skills.*' => 'string',
           // 'certificates.*' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'profession' => 'required|in:salaried,self-employed',
            'company_name' => 'nullable|string|max:255',
            'job_started_from' => 'nullable|date',
            'business_name' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'email' => 'required|email|unique:employee_modals,email',
            'mobile_no' => 'required|string|unique:employee_modals,mobile_no'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();


        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('profile_photos', 'public');
        }


        if ($request->hasFile('certificates')) {
            $certificates = [];
            foreach ($request->file('certificates') as $file) {
                $certificates[] = $file->store('certificates', 'public');
            }
            $data['certificates'] = $certificates;
        }

        EmployeeModal::create($data);

        return redirect()->route('employee.index')->with('success', 'Employee created successfully.');
    }

    public function edit($id)
    {
           // dd($id);
          $employee = EmployeeModal::where(['id'=>$id])->first();

           $states = State::all();
        return view('employes_master.edit', compact('id','states','employee'));
    }

    public function update(Request $request)
    {
   // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();


        if ($request->hasFile('profile_photo')) {

            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            $data['profile_photo'] = $request->file('profile_photo')->store('profile_photos', 'public');
        }



            $id = $request->id;
             $employee = EmployeeModal::where(['id'=>$id])->first();
           $employee->update($request->only([
                   'name',
                   'birthday',
                   'gender',
                   'state_id',
                   'city_id',
                   'email',
                   'mobile_no',
                   'profession',
                   'company_name',
                   'job_started_from',
                   'business_name',
                   'location',
                   'education',
                   'year_of_completion',
                   'skills'

               ]));

            if ($request->hasFile('profile_photo')) {
                $path = $request->file('profile_photo')->store('profile_photos', 'public');
                $employee->profile_photo = basename($path);
                $employee->save();
            }


            if ($request->hasFile('certificates')) {
                foreach ($request->file('certificates') as $file) {
                    $path = $file->store('certificates', 'public');
                    $employee->certificates()->create([
                        'filename' => basename($path)
                    ]);
                }
            }
        return redirect()->route('employee.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {

     $employee = EmployeeModal::where(['id'=>$id])->first();
        if ($employee->profile_photo) {
            Storage::disk('public')->delete($employee->profile_photo);
        }


        if ($employee->certificates) {
            foreach ($employee->certificates as $certificate) {
                Storage::disk('public')->delete($certificate);
            }
        }

        $employee->delete();

        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully.');
    }


}
