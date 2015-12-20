// AngularJS 404 page

var app = angular.module('LoremIpsumApp', []);

app.config(function ($routeProvider) {
    $routeProvider.when('/notFound', {
        templateUrl: 'templates/notFound.html',
        controller: 'NotFoundController'
    });

    $routeProvider.otherwise({ redirectTo: '/notFound' });
});