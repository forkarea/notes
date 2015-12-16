// AngularJS & Twig conflict with double curly brace

var app = angular.module('LoremIpsumApp', []);

app.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
});