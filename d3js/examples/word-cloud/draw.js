function drawCloud(words) {
    var fill = d3.scale.category20();
    
    var layout = d3.layout.cloud()
        .size([900, 500])
        .words(words)
        .padding(4)
        .font('Impact')
        .fontSize(function(d) { return d.count; })
        .on('end', draw);

    layout.start();

    function draw(words) {
        d3.select('#svg').append('svg')
            .attr('width', layout.size()[0])
            .attr('height', layout.size()[1])
            .append('g')
                .attr('transform', 'translate(' + layout.size()[0] / 2 + ',' + layout.size()[1] / 2 + ')')
            .selectAll('text')
                .data(words)
                .enter()
            .append('text')
                .style('font-size', function(d) { return d.count + 'px'; })
                .style('font-family', 'Impact')
                .style('fill', function(d, i) { return fill(i); })
                .attr('text-anchor', 'middle')
                .attr('transform', function(d) {
                    return 'translate(' + [d.x, d.y] + ')rotate(' + d.rotate + ')';
                })
                .text(function(d) { return d.text; });
    }
}