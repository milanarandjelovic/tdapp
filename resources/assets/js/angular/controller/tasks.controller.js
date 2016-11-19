(function () {
  'use strict';

  angular
    .module('todo.app.tasks')
    .controller('TasksController', TasksController);

  TasksController.$inject = ['projectsFactory', 'timeFactory', 'creatorFactory'];
  function TasksController(projectsFactory, timeFactory, creatorFactory) {
    var vm = this;

    vm.getCreator = getCreator;
    vm.getDateAntTime = getDateAntTime;
    vm.getProject = getProject;

    activate();

    ////////////////

    function activate() {
      getDateAntTime();
      getCreator();
    }

    /**
     * Get creator.
     */
    function getCreator() {
      creatorFactory.getProjectCreator()
        .then(function (response) {
          vm.creator = response.data.creator.username;
        });
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

    function getProject(slug) {
      projectsFactory.getProject(slug)
        .then(function (response) {
          vm.project = response.data;
        });
    }

  }
})();