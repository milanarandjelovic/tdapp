(function () {
  'use strict';

  angular
    .module('todo.app.tasks')
    .controller('TasksController', TasksController);

  TasksController.$inject = ['projectsFactory', 'timeFactory'];
  function TasksController(projectsFactory, timeFactory) {
    var vm = this;

    vm.getDateAntTime = getDateAntTime;
    vm.getProject = getProject;

    activate();

    ////////////////

    function activate() {
      getDateAntTime();
    }

    /**
     * Get current date and time.
     */
    function getDateAntTime() {
      timeFactory.getTimeAndDate()
        .then(function (response) {
          console.log(response);
          vm.today = response.data.today;
          vm.current_time = response.data.current_time;
        });
    }

    function getProject(slug) {
      projectsFactory.getProject(slug)
        .then(function (response) {
          vm.project = response.data;
        });
    }

  }
})();