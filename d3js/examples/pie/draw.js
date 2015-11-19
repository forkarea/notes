function drawChart(data) {
    var stats = [];
    var colors = d3.scale.category10();

    $.each(data, function(index, item) {
        stats.push({
            'label': item.language,
            'value': item.repositories,
            'color': colors[index]
        });
    });

    new d3pie('svg', {
        'size': {
            'canvasWidth': 900,
            'pieOuterRadius': '99%'
        },
        'data': {
            'sortOrder': 'value-desc',
            'smallSegmentGrouping': {
                'enabled': true
            },
            'content': stats
        },
        'labels': {
            'outer': {
                'pieDistance': 32
            },
            'inner': {
                'hideWhenLessThanPercentage': 3
            },
            'mainLabel': {
                'fontSize': 16
            },
            'percentage': {
                'color': '#ffffff',
                'decimalPlaces': 0,
                'fontSize': 14
            },
            'lines': {
                'enabled': true
            },
            'truncation': {
                'enabled': true
            }
        },
        'effects': {
            'pullOutSegmentOnClick': {
                'effect': 'linear',
                'speed': 400,
                'size': 8
            }
        },
        'misc': {
            'gradient': {
                'enabled': true,
                'percentage': 100
            }
        }
    });
}