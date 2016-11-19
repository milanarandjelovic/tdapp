(function () {
  'use strict';

  angular
    .module('todo.app.creator')
    .factory('creatorFactory', creatorFactory);

  creatorFactory.$inject = ['$http', 'backEndpoints'];
  function creatorFactory($http, backEndpoints) {
    var service = {
      getProjectCreator: getProjectCreator
    };

    return service;

    ////////////////
    function getProjectCreator() {
      return $http.get(backEndpoints.GET_CREATOR);
    }
  }
})();