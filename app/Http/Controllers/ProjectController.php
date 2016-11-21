<?php

namespace App\Http\Controllers;

use Auth;
use DateTime;
use Validator;
use Carbon\Carbon;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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

    /**
     * Get current date and time.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDateAndTime()
    {
        $current_time = Carbon::now()->format('h:i a');
        $today = Carbon::now()->formatLocalized('%a %d %b %y');

        return response()->json([
            'current_time' => $current_time,
            'today'        => $today,
        ]);
    }

    /**
     * Return creator.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCreator()
    {
        $creator = Auth::user();

        return response()->json([
            'creator' => $creator,
        ]);
    }

    /**
     * Get all project.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function projectsDetails()
    {
        $creator = Auth::user();
        $projects = $creator->projects()->orderBy('created_at')->get();
        $data = [
            'projects' => $projects,
        ];

        return response()->json($data);
    }

    /**
     * Get project by slug.
     *
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProject($slug)
    {
        $project = Project::all()->where('slug', $slug)->first();

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
     *  Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $project = Project::all()->where('slug', $slug)->first();

        return view('tasks.index')
            ->with('project', $project);
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
        Auth::user()->projects()->where('id', $id)->update([
            'name'        => $request->all()[0]['name'],
            'slug'        => $slug,
            'description' => $request->all()[0]['description'],
            'duedate'     => date_format(new DateTime($request->all()[0]['duedate']), 'Y-m-d'),
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
