(function () {
  'use strict';

  angular
    .module('todo.app.projects')
    .controller('ProjectsController', ProjectsController);

  ProjectsController.$inject = ['projectsFactory', 'timeFactory'];
  function ProjectsController(projectsFactory, timeFactory) {
    var vm = this;

    vm.createProjectModalForm = createProjectModalForm;
    vm.updateProjectModalForm = updateProjectModalForm;
    vm.getDateAntTime = getDateAntTime;
    vm.createProject = createProject;
    vm.updateProject = updateProject;
    vm.deleteProject = deleteProject;
    vm.getProjectBySlug = getProjectBySlug;
    vm.createForm = {
      name: '',
      description: '',
      duedate: ''
    };
    vm.createFormErrors = {};

    activate();

    ////////////////

    function activate() {
      getAllProjects();
      getDateAntTime();
    }

    /**
     * Get current date and time.
     */
    function getDateAntTime() {
      timeFactory.getTimeAndDate()
        .then(function (response) {
          vm.today = response.data.today;
          vm.current_time = response.data.current_time;
        });
    }

    /**
     * Get all projects.
     */
    function getAllProjects() {
      projectsFactory.getProjects()
        .then(function (response) {
          vm.creator = response.data.creator;
          vm.projects = response.data.projects;
          vm.project_count = project_count(vm.projects);
        });
    }

    /**
     * If projects exists return true, else return false.
     *
     * @param data
     * @returns {boolean}
     */
    function project_count(data) {
      return data.length > 0;
    }

    /**
     * Show modal for create project.
     */
    function createProjectModalForm() {
      // Empty create form filed
      vm.createForm.name = '';
      vm.createForm.description = '';
      vm.createForm.duedate = '';

      // Open modal
      $('#create-projects-modal').modal('show');
    }

    /**
     * Create a new project.
     */
    function createProject() {
      projectsFactory.createNewProject(vm.createForm)
        .then(function (response) {

          if (response.data.message) {
            toastr.success(response.data.message, 'Success');
            getAllProjects();

            // Close modal
            $('#create-projects-modal').modal('hide');

            // Empty create form filed
            vm.createForm.name = '';
            vm.createForm.description = '';
            vm.createForm.duedate = '';
          }

          vm.createFormErrors = response.data.errors;
        });
    }


    /**
     * Show modal for update project.
     *
     * @param id
     */
    function updateProjectModalForm(id) {
      // Open modal
      $('#update-projects-modal').modal('show');

      projectsFactory.getProject(id)
        .then(function (response) {
          vm.createForm.name = response.data.name;
          vm.createForm.description = response.data.description;
          vm.createForm.duedate = new Date(response.data.duedate);
          vm.update_project_id = response.data.id;
        });
    }

    /**
     * Update project.
     *
     * @param id
     */
    function updateProject(id) {
      projectsFactory.updateProject(id, vm.createForm)
        .then(function (response) {
          if (response.data.message) {
            toastr.success(response.data.message, 'Success');
            getAllProjects();

            // Close modal
            $('#update-projects-modal').modal('hide');
          }

          vm.createFormErrors = response.data.errors;
        });
    }

    /**
     * Delete project.
     *
     * @param id
     */
    function deleteProject(id) {
      projectsFactory.deleteProject(id)
        .then(function (response) {
          toastr.success(response.data.message, 'Success');
          getAllProjects();
        });
    }

    /**
     * Get project by slug.
     *
     * @param slug
     */
    function getProjectBySlug(slug) {
      projectsFactory.getProject(slug)
        .then(function (response) {
          vm.project = response.data;
        });
    }

  }
})();