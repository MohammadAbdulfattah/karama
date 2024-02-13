<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeesResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Employee;
use App\Models\Sport;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    use GeneralTrait;
    public function allManagers($sport_uuid)
    {
        try {
            $sport = Sport::where('uuid', $sport_uuid)->first();
            $managers = Employee::where('sport_id', $sport->id)->where('job_type', 'manager')->get();
            $data['managers'] = EmployeesResource::collection($managers);
            return $this->apiResponse($data);
        } catch (\Throwable $th) {
            return $this->errorResponse("Error in getting manager data".$th->getMessage(),500);
        }
    }
    public function allCoaches($sport_uuid)
    {
        try {
            $sport = Sport::where('uuid', $sport_uuid)->first();
            $managers = Employee::where('sport_id', $sport->id)->where('job_type', 'coach')->get();
            $data['coaches'] = EmployeesResource::collection($managers);
            return $this->apiResponse($data);
        } catch (\Throwable $th) {
            return $this->errorResponse("Error in getting coach data".$th->getMessage(),500);
        }
    }
}
