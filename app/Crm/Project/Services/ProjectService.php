<?php

namespace Crm\Project\Services;


use App\Crm\Project\Requests\CreateProject;
use Crm\Project\Events\ProjectCreation;
use Crm\Project\Models\Project;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class ProjectService
{
    public function index(Request $request): \Illuminate\Database\Eloquent\Collection
    {
        return Project::all();
    }

    // getting all the projects of specific Customer
    public function customer_index(Request $request, $customer_id){
        return Project::where('customer_id',$customer_id)->get();
    }

    // getting a Project by id
    public function show($project_id): \Illuminate\Http\JsonResponse
    {
        return Project::find($project_id) ??  response()->json(['status'=>'Not found'], Response::HTTP_NOT_FOUND);
    }

    public function create(CreateProject $request, $customer_id): Project
    {
        $project = new Project();
        $project->name = $request->get('name');
        $project->status = (bool)$request->get('status');
        $project->cost = (float)$request->get('cost');
        $project->customer_id = $customer_id;
        $project->save();
        event(new ProjectCreation($project));
        return $project;
    }


    public function update (Request $request, $project_id){
        $project = Project::find($project_id);

        if($request->get('name')){
            $project->name = $request->get('name');
        }

        if($request->get('status')){
            $project->status = $request->get('status');
        }

        if($request->get('cost')){
            $project->cost = $request->get('cost');
        }
        $project->save();
        return $project;
    }


    public function delete (Request $request, $project_id): \Illuminate\Http\JsonResponse
    {
        $project = Project::find($project_id);
        if(!$project){
            return response()->json(['status'=>'Not found'], Response::HTTP_NOT_FOUND);
        }
        $project->delete();
        return response()->json(['status'=>'Deleted'],Response::HTTP_OK);

    }
}
