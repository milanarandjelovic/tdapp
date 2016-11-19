(function () {
  'use strict';

  angular.module('back.module', [
    'interceptor.config',
    'back.const',

    'todo.app.dateAntTime',
    'todo.app.projects',
    'todo.app.tasks'
  ]);
})();