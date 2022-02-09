<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        $project = new project();
        $project->project_title = $request->input('project_title');
        $project->owner = $request->input('owner');
        $project->starting_date = $request->input('starting_date');
        $project->expected_duration = $request->input('expected_duration');
        $project->save();
        return response()->json([
            'status' => 200,
            'message' => 'Project Added Successfully'
        ]);
    }

    public function index()
    {
        $projects = project::all();
        return response()->json([
            'status' => 200,
            'projects' => $projects
        ]);
    }

    public function edit($id)
    {
        $project = project::find($id);
        if ($project) {
            return response()->json([
                'status' => 200,
                'project' => $project,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Project ID Found',
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $project = project::find($id);
        if ($project) {

            $project->project_title = $request->input('project_title');
            $project->owner = $request->input('owner');
            $project->starting_date = $request->input('starting_date');
            $project->expected_duration = $request->input('expected_duration');
            $project->update();

            return response()->json([
                'status' => 200,
                'message' => 'Project Updated Successfully',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Project ID Found',
            ]);
        }
    }


    public function destroy($id)
    {
        $project = project::find($id);
        if ($project) {
            $project->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Project Deleted Successfully',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Project ID Found',
            ]);
        }
    }
}
