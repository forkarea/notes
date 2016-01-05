angular
    .module('app', ['ngResource'])
    .constant('config', {
        api: {
            host: 'http://localhost:8080/'
        }
    })
    .constant('apiEndpoints', {
        user: 'odata/user'
    });

angular
    .module('app')
    .factory('oData', function ($resource, config) {
        return function (endpoint) {
            var endpointUrl = config.api.host + endpoint;

            return $resource('', {}, {
                'getAll': { method: 'GET', url: endpointUrl },
                //'save': { method: 'POST', url: endpointUrl },
                //'update': { method: 'PUT', params: { key: '@key' }, url: endpointUrl + '(:key)' },
                'query': { method: 'GET', params: { key: '@key' }, url: endpointUrl + '(:key)' },
                //'remove': { method: 'DELETE', params: { key: '@key' }, url: endpointUrl + '(:key)' }
            });
        }
    });

angular
    .module('app')
    .factory('user', function (oData, apiEndpoints) {
        return new oData(apiEndpoints.user);
    });

// use:

angular
    .module('app')
    .controller('DashboardController', function($log, user) {
       function successCallback(data) {
            $log.log('successCallback', data);
        }
        
        function errorCallback(data) {
          $log.log('errorCallback', data);
        }
        
        user.getAll(successCallback, errorCallback);
        user.query({ $filter: 'Id eq 10', $top: 1 }, successCallback, errorCallback); 
    });
