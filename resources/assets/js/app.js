(function () {
  'use strict';

  angular.module('todoApp', [])
    .factory('todoInterceptor', todoInterceptor)
    .config(function ($httpProvider) {
      $httpProvider.interceptors.push('todoInterceptor');
    });


  function todoInterceptor(CSRF_TOKEN) {
    return {
      // optional method
      request: function(config) {
        // do something on success
        config.headers['X-CSRF-TOKEN'] = CSRF_TOKEN;
        return config;
      },

      // optional method
      requestError: function(config) {
        // do something on error
        return config;
      },

      // optional method
      response: function(res) {
        // do something on success
        return res;
      },

      // optional method
      responseError: function(res) {
        // do something on error
        return res;
      }
    }
  }

})();