function drawChart(data) {
    var transformed = {
        'name': 'reddit',
        'children': []
    };

    var subredits = {};

    for (var index in data) {
        var item = data[index];

        if (item['subreddit'] != '4chan' && item['subreddit'] != 'drunk' && item['subreddit'] != 'emacs' && item['subreddit'] != 'ukpolitics') {
            continue;
        }

        if (typeof(subredits[item['subreddit']]) === 'undefined') {
            subredits[item['subreddit']] = [];
        }

        if (parseInt(item['score']) > 0 && item['user'] !== '[deleted]') {
            subredits[item['subreddit']].push({
                'name': item['user'],
                'size': parseInt(item['score'])
            });
        }
    }

    for (var name in subredits) {
        transformed['children'].push({
            'name': name,
            'children': subredits[name]
        });
    }

    var diameter = 900,
        format = d3.format(',d'),
        color = d3.scale.category10();

    var bubble = d3.layout.pack()
        .sort(null)
        .size([diameter, diameter])
        .padding(1.5);

    var svg = d3.select('#svg').append('svg')
        .attr('width', diameter)
        .attr('height', diameter)
        .attr('class', 'bubble');


    var node = svg.selectAll('.node')
        .data(bubble.nodes(classes(transformed))
            .filter(function(d) {
                return !d.children;
            }))
        .enter().append('g')
        .attr('class', 'node')
        .attr('transform', function(d) {
            return 'translate(' + d.x + ',' + d.y + ')';
        });

    node.append('title')
        .text(function(d) {
            return d.className + ' - score: ' + format(d.value);
        });

    node.append('circle')
        .attr('r', function(d) {
            return d.r;
        })
        .attr('data-legend', function(d) {
            return d.packageName
        })
        .style('fill', function(d) {
            return color(d.packageName);
        });

    node.append('text')
        .attr('dy', '.3em')
        .style('text-anchor', 'middle')
        .text(function(d) {
            return d.className.substring(0, d.r / 3);
        });

    svg.append('g')
        .attr('class', 'legend')
        .attr('transform', 'translate(50,30)')
        .call(d3.legend);

    function classes(root) {
        var classes = [];

        function recurse(name, node) {
            if (node.children) node.children.forEach(function(child) {
                recurse(node.name, child);
            });
            else classes.push({
                packageName: name,
                className: node.name,
                value: node.size
            });
        }

        recurse(null, root);
        return {
            children: classes
        };
    }

    d3.select(self.frameElement).style('height', diameter + 'px');
}