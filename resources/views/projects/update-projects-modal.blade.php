<div class="modal fade" id="update-projects-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update Project</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">

                    <div class="form-group">
                        <label for="name" class="control-label col-md-2">Name</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" id="name"
                                   ng-model="projectsCtrl.createForm.name"
                            >
                            <div ng-if="projectsCtrl.createFormErrors.name">
                                <span class="text-danger">@{{ projectsCtrl.createFormErrors.name[0] }}</span>
                            </div>
                        </div>
                    </div> {{-- /.form-group --}}

                    <div class="form-group">
                        <label for="description" class="control-label col-md-2">Description</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="description" id="description"
                                      ng-model="projectsCtrl.createForm.description" cols="10" rows="6"
                            ></textarea>
                            <div ng-if="projectsCtrl.createFormErrors.description">
                                <span class="text-danger">@{{ projectsCtrl.createFormErrors.description[0] }}</span>
                            </div>
                        </div>
                    </div> {{-- /.form-group --}}

                    <div class="form-group">
                        <label for="duedate" class="control-label col-md-2">Date</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="duedate" id="duedate"
                                   ng-model="projectsCtrl.createForm.duedate"
                                   ng-bind="projectsCtrl.createForm.duedate"
                            >
                            <div ng-if="projectsCtrl.createFormErrors.duedate">
                                <span class="text-danger">@{{ projectsCtrl.createFormErrors.duedate[0] }}</span>
                            </div>
                        </div>
                    </div> {{-- /.form-group --}}

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" ng-click="projectsCtrl.updateProject(projectsCtrl.update_project_id)">Update Project
                </button>
            </div>
        </div> {{-- /.modal-content --}}
    </div> {{-- /.modal-dialog --}}
</div> {{-- /.modal --}}