@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <div class="container project-holder" ng-controller="ProjectsController as projectsCtrl">

        <div class="row text-left">
            <div class="col-md-12">
                <h2>Projects
                    <span class="small pull-right">
                        @{{ projectsCtrl.today }} | @{{ projectsCtrl.current_time }}
                    </span>
                </h2>

            </div> {{-- /.col-md-12 --}}
        </div> {{-- /.row --}}

        <div class="row">

            <div class="col-md-12">
                <div class="pull-right">
                    <a class="btn btn-sm btn-success" ng-click="projectsCtrl.createProjectModalForm()">
                        <i class="fa fa-plus new-project"></i>New Project
                    </a>
                </div>
            </div> {{-- /.col-md-12 --}}

            <div class="col-md-12 project-table">

                <div ng-if="projectsCtrl.project_count">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
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
                            <tbody ng-repeat="project in projectsCtrl.projects">
                            <tr>
                                <td>@{{ project.id }}</td>
                                <td>
                                    <a href="/projects/@{{ project.slug }}">@{{ project.name }}</a>
                                </td>
                                <td>@{{ projectsCtrl.creator.username }}</td>
                                <td>@{{ project.tasks }}</td>
                                <td>@{{ project.created_at | timeAgo }}</td>
                                <td>@{{ project.updated_at | timeAgo }}</td>
                                <td>@{{ project.duedate }}</td>
                                <td>@{{ project.completed == 0 ? 'pedding' : 'completed' }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm"
                                            data-toggle="tooltip" data-placement="top" title="Edit"
                                            ng-click="projectsCtrl.updateProjectModalForm(project.id)"
                                    >
                                        <i class="fa fa-pencil-square-o"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm"
                                            data-toggle="tooltip" data-placement="top" title="Delete"
                                            ng-click="projectsCtrl.deleteProject(project.id)"
                                    >
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div> {{-- /.table-responsive --}}

                </div>

                <div ng-if="!projectsCtrl.project_count">
                    <p>You have no project, begin by creating a
                        <a ng-click="projectsCtrl.createProjectModalForm()">new project</a>.
                    </p>
                </div>

            </div> {{-- /.col-md-12 --}}
        </div> {{-- /.row --}}
        @include('projects.create-projects-modal')
        @include('projects.update-projects-modal')
    </div> {{-- /.container --}}
@endsection