@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <div class="container project-holder" ng-controller="ProjectsController as projectsCtrl">

        <div class="row text-left">
            <div class="col-md-12">
                <h2>Projects <span class="small pull-right">@{{ projectsCtrl.today }} | @{{ projectsCtrl.current_time }}</span></h2>

            </div> {{-- /.col-md-12 --}}
        </div> {{-- /.row --}}

        <div class="row">

            <div class="col-md-12">
                <div class="pull-right">
                    <a class="btn btn-sm btn-success" ng-click="createNewProject()">
                        <i class="fa fa-plus"></i>New Project
                    </a>
                </div>
            </div> {{-- /.col-md-12 --}}

            <div class="col-md-12 project-table">

                <div ng-if="projectsCtrl.project_count">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr class="text-capitalize">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Author</th>
                                <th>Tasks</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Duedate</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            {{-- TODO ADD NG-REPEAT --}}
                            <tbody ng-repeat="project in projectsCtrl.projects">
                            <tr>
                                <td>@{{ project.id }}</td>
                                <td>@{{ project.name }}</td>
                                <td>@{{ creator.name }}</td>
                                <td>@{{ project.tasks }}</td>
                                <td>@{{ project.created_at }}</td>
                                <td>@{{ project.updated_at }}</td>
                                <td>@{{ project.duedate }}</td>
                                <td>@{{ project.status }}</td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div> {{-- /.table-responsive --}}

                </div>

                <div ng-if="!projectsCtrl.project_count">
                    <p>You have no project, begin by creating a
                        <a ng-click="createNewProject()">new project</a>.
                    </p>
                </div>

            </div> {{-- /.col-md-12 --}}
        </div> {{-- /.row --}}

    </div> {{-- /.container --}}
@endsection