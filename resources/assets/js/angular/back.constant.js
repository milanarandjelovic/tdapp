(function () {
  'use strict';

  angular.module('back.const', [])
    .constant('backEndpoints', {
      // Projects
      PROJECTS_GET_ALL: '/api/projects'
    });
})();