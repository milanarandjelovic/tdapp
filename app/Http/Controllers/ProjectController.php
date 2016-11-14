<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects.index');
    }

    public function projectsDetails()
    {
        $creator = Auth::user();
        $projects = $creator->projects()->orderBy('created_at')->get();
        $current_time = Carbon::now()->format('h:i a');
        $today = Carbon::now()->formatLocalized('%a %d %b %y');
        $data = [
            'creator'      => $creator,
            'projects'     => $projects,
            'current_time' => $current_time,
            'today'        => $today,
        ];

        return response()->json($data);
    }

    /**
     * Get project by id.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProject($id)
    {
        $project = Project::all()->where('id', $id)->first();

        return response()->json($project);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all()[0], [
            'name'        => 'required|min:3|max:50',
            'description' => 'required|min:10|max:255',
            'duedate'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ]);
        }

        $slug = Str::slug($request->all()[0]['name']);
        Auth::user()->projects()->create([
            'name'        => $request->all()[0]['name'],
            'slug'        => $slug,
            'description' => $request->all()[0]['description'],
            'duedate'     => $request->all()[0]['duedate'],
        ]);

        return response()->json([
            'message' => 'Project has been successfully created.',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all()[0], [
            'name'        => 'required|min:3|max:50',
            'description' => 'required|min:10|max:255',
            'duedate'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ]);
        }

        $slug = Str::slug($request->all()[0]['name']);
        Auth::user()->projects()->update([
            'name'        => $request->all()[0]['name'],
            'slug'        => $slug,
            'description' => $request->all()[0]['description'],
            'duedate'     => $request->all()[0]['duedate'],
        ]);

        return response()->json([
            'message' => 'Project has been successfully updated.',
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $project = Project::all()->where('id', $id)->first();
        $project->delete();

        return response()->json([
            'message' => 'Project has been successfully deleted.',
        ]);
    }
}
