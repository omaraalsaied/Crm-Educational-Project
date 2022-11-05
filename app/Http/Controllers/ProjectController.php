<?php

namespace App\Http\Controllers;


use App\Crm\Project\Requests\CreateProject;
use Crm\Project\Services\ProjectService;
use Crm\Customer\Services\CustomerService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{
    private ProjectService $projectService;
    private CustomerService $customerService;
    public function __construct(ProjectService $projectService, CustomerService $customerService)
    {
        $this->projectService = $projectService;
        $this->customerService = $customerService;
    }

    public function index(Request $request): \Illuminate\Database\Eloquent\Collection
    {
        return $this->projectService->index($request);
    }

    // getting all the projects of specific Customer
    public function customer_index(Request $request, $customer_id){
        return $this->projectService->customer_index($request, $customer_id);
    }

    // getting a Project by id
    public function show($project_id): \Illuminate\Http\JsonResponse
    {
        return $this->projectService->show($project_id);
    }

    public function create(CreateProject $request, $customer_id)
    {
        $customer = $this->customerService->show($customer_id);
            if(!$customer){
          return  response()->json(['status'=>'Customer Not Found'], Response::HTTP_NOT_FOUND);
     }
       return $this->projectService->create($request,$customer_id);
    }


    public function update (Request $request, $project_id){
       return $this->projectService->update($request, $project_id);
    }


    public function delete (Request $request, $project_id): \Illuminate\Http\JsonResponse
    {
        return $this->projectService->delete($request, $project_id);

    }



}
