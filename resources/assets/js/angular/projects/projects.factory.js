(function () {
  'use strict';

  angular
    .module('todo.app.projects')
    .factory('projectsFactory', projectsFactory);

  projectsFactory.$inject = ['$http', 'backEndpoints'];
  function projectsFactory($http, backEndpoints) {
    var service = {
      getProjects: getProjects
    };

    return service;

    ////////////////

    /**
     * Returns all projects, today and current_time.
     * @returns {HttpPromise}
     */
    function getProjects() {
      return $http.get(backEndpoints.PROJECTS_GET_ALL);
    }
  }
})();