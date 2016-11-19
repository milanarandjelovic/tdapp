(function () {
  'use strict';

  angular.module('back.const', [])
    .constant('backEndpoints', {
      // Date and Time
      GET_DATE_AND_TIME: '/api/getDateAntTime',

      // Projects
      PROJECTS_GET_ALL: '/api/projects',
      PROJECTS_GET_BY_SLUG: '/api/project/',
      PROJECT_CREATE: '/api/projects',
      PROJECT_UPDATE: '/api/project/update/',
      PROJECTS_DELETE: '/api/project/delete/'
    });
})();