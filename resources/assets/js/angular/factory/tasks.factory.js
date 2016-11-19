(function () {
  'use strict';

  angular
    .module('todo.app.tasks')
    .factory('tasksFactory', tasksFactory);

  tasksFactory.$inject = ['$http', 'backEndpoints'];
  function tasksFactory($http, backEndpoints ) {
    var service = {
      getTasks: getTasks
    };

    return service;

    ////////////////
    function getTasks() {
    }
  }
})();