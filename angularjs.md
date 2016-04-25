# AngularJS

## Hints & Tips & Trickts

- koncepcja *states* zamiast standardowego bindowania ```route => controller``` - [angular-ui/ui-router](https://github.com/angular-ui/ui-router)
- podział funkcjonalny zamiast technicznego!
- full jQuery zamiast okrojonej wersji w AngularJS (wystarczy zaincludować skrypt jQuery przed skryptami AngularJS)

## Filters

- używaj własnych filtrów jako formaterów na dane - np. wyświetalnie formatu daty w specyficzny dla aplikacji sposób - ```larmoDate```
- braki w filtrach AngularJS uzupełnia świetny plugin - [a8m/angular-filter](https://github.com/a8m/angular-filter)

## Directives

- używaj prefixów do nazywania własnych dyrektyw w aplikacji np.
  - larmo-project-list
  - larmo-currency-input
  - larmo-datepicker
- świetny sposób na hermetyzację funkcjonalności - edytowalny grid lub tylko jego wiersz
- rozwiązanie na problem z duplikacją logiki/elementów HTML
- używaj zagnieżdżania dyrektyw (podziału na mniejsze dyrektywy) tak aby nie posiadały on zbyt dużo logiki
- hermetyzacja pól formularza jako dyrektywy aplikacyjne (szczególnie gdy posiada skomplikowaną walidację którą należałoby duplikować lub umieszczać w parent state)
- dostarczanie danych z API do dyrektywy czy w dyrektywie (??)

### Bindings

```js
scope: {
  title: '@',
  data: '=',
  execute: '&'
}
```

- *@* Attribute string binding (string)
- *=* Two-way model binding (model)
- *&* Callback method binding (method)
 
### Restrict option

```js
restrict: 'E'
```

- 'A' - directive as attribute name
- 'E' - directive as element name
- 'C' - directive as class name

These restrictions can all be combined - *AEC*, *AC* etc.

### Templates

```
template: '<div>My extra template is here</div>'

// or

templateUrl: 'app/templates/component-name/project-list.html',
```

Szablony umieszczane w osobnych plikach są:

- ładowane asynchronicznie,
- cachowane - poszczególne przejścia pomiędzy stanami aplikacji nie pobierają na nowo szablonu.

### Link vs Compile

*Compile*

- wykonuje się jednokrotnie dla dyrektywy (szablonu)
- wykonuje się transformacja szablonu
- ma dostęp do: transclude, DOM i atrybutów szablonu
- nie ma dostępu do scope
- zwrócić może: preLink() i postLink()
- dla modyfikacji elementów DOM

*Link*

- wykonywany po compile
- wykonywana dla każdego użycia dyrektywy w HTML
- ma dostęp do: scope, DOM, atrybutów szablonu
- zwrócić może postLink() 
- dla bindowania logiki dla danych

### Transclude

```
template: '<div class="message" ng-transclude></div>',
transclude: true
```

"Przenosi" zawartość elementu definiującego dyrektywę w HTMLu do szablonu dyrektywy.

```
<larmo-text><p>Super text!</p></larmo-text>

// =>  

<div class="message"><p>Super text!</p></div>
```

### Directive template

```js
angular
    .module('app')
    .directive('prefixDirectiveName', prefixDirectiveName);

function prefixDirectiveName() {
    return {
        restrict: 'A',
        link: function (scope, element, attr) {
          var childElement = angular.element('.class_name', element);
          
          childElement.addClass('.added_by_directive'); // if you use full jQuery lib
          
          console.log('attr', attr);
          console.log('childElement', childElement);
        }
    }
}
```

```html
<prefix-directive-name>
  <span class="class_name">Element</span>
</prefix-directive-name>
```

## Defining an AngularJS application configuration

```js
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
```

- http://www.ng-newsletter.com/advent2013/#!/day/5
- http://stackoverflow.com/questions/18494050/is-there-a-way-in-angularjs-to-define-constants-with-other-constants

## 404 page

```js
var app = angular.module('LoremIpsumApp', []);

app.config(function ($routeProvider) {
    $routeProvider.when('/notFound', {
        templateUrl: 'templates/notFound.html',
        controller: 'NotFoundController'
    });

    $routeProvider.otherwise({ redirectTo: '/notFound' });
});
```

## Start & End symbol

Useful with AngularJS & Twig templates - it's resolve conflict with double curly brace

```js
var app = angular.module('LoremIpsumApp', []);

app.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
});
```

## Catch all HTTP XXX status with interceptor

```js
var app = angular.module('LoremIpsumApp', []);

app.config(function ($httpProvider) {
    $httpProvider.interceptors.push(function ($q, $rootScope) {
        var catchResponseError = function (rejection) {
            if (rejection.status === 401) {
                $rootScope.$broadcast('session.unauthorized');
            }

            return $q.reject(rejection);
        };

        return {
            responseError: catchResponseError
        }
    });
});
```

## Example of implementation OData service using ngResource

```js
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
```
