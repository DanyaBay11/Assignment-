<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeesRequest;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $employees = Employee::query()->get();
        return view('admin.index', compact('employees'));
    }

    /**
     * @param $validated
     * @return void
     */
    public function store($validated): void
    {
        $employees = Employee::query();
        $time = Carbon::now();
        $employeesByDay = $employees->where('created_at',"=", $time->toDateTimeString())->get();
        ($employeesByDay->count() <= 10) ? $employees->create($validated) : dd('Нанетые работадатели привышает 10');
    }

    /**
     * @param $validated
     * @param $id
     * @return void
     */
    public function update($validated, $id): void
    {
        Employee::query()->find($id)->update($validated);
    }

    /**
     * @param $id
     * @return void
     */
    public function destroy($id): void
    {
        Employee::query()->find($id)->delete();

    }

    /**
     * @param EmployeesRequest $request
     * @return RedirectResponse
     */
    public function process(EmployeesRequest $request): RedirectResponse
    {
        $action = $request->input('action');
        $employeeId = $request->input('id');
        $validated = $request->validated();

        switch ($action) {
            case 'create':
                $this->store($validated);
                break;
            case 'update':
                if(!is_null($employeeId)) $this->update($validated, $employeeId);
                break;
            case 'delete':
                if(!is_null($employeeId)) $this->destroy($employeeId);
                break;
            default:
                return redirect()->route('admin.index');
        }

        return redirect()->route('admin.index');
    }
}
