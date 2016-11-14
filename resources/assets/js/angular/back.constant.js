(function () {
  'use strict';

  angular.module('back.const', [])
    .constant('backEndpoints', {
      // Projects
      PROJECTS_GET_ALL: '/api/projects',
      PROJECTS_GET_BY_ID: '/api/project/',
      PROJECT_CREATE: '/api/projects',
      PROJECT_UPDATE: '/api/project/update/',
      PROJECTS_DELETE: '/api/project/delete/'
    });
})();