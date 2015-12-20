// Catch HTTP 401 with AngularJS interceptor

var app = angular.module('LoremIpsumApp', []);

app.config(function ($httpProvider) {
    $httpProvider.interceptors.push(function ($q, $rootScope) {
        var catchResponseError = function (rejection) {
            if (rejection.status === 401) {
                $rootScope.$broadcast("session.unauthorized");
            }

            return $q.reject(rejection);
        };

        return {
            responseError: catchResponseError
        }
    });
});
