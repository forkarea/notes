## Bindings

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
 
## Restrict option

```js
restrict: 'E'
```

- 'A' - directive as attribute name
- 'E' - directive as element name
- 'C' - directive as class name

These restrictions can all be combined - *AEC*, *AC* etc.

## Directive template

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
