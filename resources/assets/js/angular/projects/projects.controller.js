(function () {
  'use strict';

  angular
    .module('todo.app.projects')
    .controller('ProjectsController', ProjectsController);

  ProjectsController.$inject = ['projectsFactory'];
  function ProjectsController(projectsFactory) {
    var vm = this;
    // vm.today = '';
    // vm.current_time = '';
    // vm.project_count = '';
    // vm.projects = {};

    activate();

    ////////////////

    function activate() {
      getAllProjects();
    }

    /**
     * Get all projects.
     */
    function getAllProjects() {
      projectsFactory.getProjects()
        .then(function (response) {
          console.log(response);
          vm.today = response.data.today;
          vm.current_time = response.data.current_time;
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

  }
})();