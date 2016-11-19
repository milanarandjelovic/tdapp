(function () {
  'use strict';

  angular
    .module('todo.app.dateAntTime')
    .factory('timeFactory', timeFactory);

  timeFactory.$inject = ['$http', 'backEndpoints'];
  function timeFactory($http, backEndpoints) {
    var service = {
      getTimeAndDate: getTimeAndDate
    };

    return service;

    ////////////////
    function getTimeAndDate() {
      return $http.get(backEndpoints.GET_DATE_AND_TIME);
    }
  }
})();