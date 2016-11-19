(function () {
  'use strict';

  angular
    .module('todo.app.projects')
    .factory('projectsFactory', projectsFactory);

  projectsFactory.$inject = ['$http', 'backEndpoints'];
  function projectsFactory($http, backEndpoints) {
    var service = {
      getProjects: getProjects,
      getProject: getProject,
      createNewProject: createNewProject,
      updateProject: updateProject,
      deleteProject: deleteProject
    };

    return service;

    ////////////////

    /**
     * Returns all projects, today and current_time.
     *
     * @returns {HttpPromise}
     */
    function getProjects() {
      return $http.get(backEndpoints.PROJECTS_GET_ALL);
    }

    /**
     * Return project by id.
     *
     * @param id
     * @returns {HttpPromise}
     */
    function getProject(id) {
      return $http.get(backEndpoints.PROJECTS_GET_BY_SLUG + id, [id]);
    }

    /**
     * Create a new project.
     *
     * @param data
     * @returns {HttpPromise}
     */
    function createNewProject(data) {
      return $http.post(backEndpoints.PROJECT_CREATE, [data]);
    }

    /**
     * Update project.
     *
     * @param id
     * @param data
     * @returns {HttpPromise}
     */
    function updateProject(id, data) {
      return $http.put(backEndpoints.PROJECT_UPDATE + id, [data]);
    }

    /**
     * Delete project by id.
     *
     * @param id
     * @returns {HttpPromise}
     */
    function deleteProject(id) {
      return $http.delete(backEndpoints.PROJECTS_DELETE + id, [id]);
    }
  }
})();