// Defining an AngularJS application configuration

var app = angular.module('LoremIpsumApp', []);

app.constant('config', {
    'useApiMock': false,
    'apiUrl': 'http://lorem.ipsum.local/api',
    'limitOfItems': 15
});

app.service('APIService', function apiService(AjaxService, config) {
    console.log('useApiMock = ', config.useApiMock);
    console.log('apiUrl = ', config.apiUrl);
    console.log('limitOfItems = ', config.limitOfItems);
});

// http://www.ng-newsletter.com/advent2013/#!/day/5
// http://stackoverflow.com/questions/18494050/is-there-a-way-in-angularjs-to-define-constants-with-other-constants