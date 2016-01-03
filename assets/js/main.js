function agentSizer() {
    if ( jQuery('body').hasClass('post-type-archive-agent') ) {
        var agentBox = jQuery('.agents-archive .agent-data');
            agentImg = jQuery('.agents-archive .agent-roster-photo img'),
            agentBoxHeightArr = [],
            agentImgHeightArr = [];

        agentImg.each(function(index) {
            agentImgHeightArr.push(jQuery(this).outerHeight(true));
        });

        agentBox.each(function(index) {
            agentBoxHeightArr.push(jQuery(this).outerHeight(true));
        });

        minImg = Math.max.apply(null, agentBoxHeightArr);
        maxBox = Math.min.apply(null, agentBoxHeightArr);

        if(minImg >= maxBox) {
            agentBox.each(function(index) {
                agentBox.css('height', minImg * 1.25);
            });
        } else {

        }
    }
}

jQuery(document).ready(function() {
    agentSizer();
});

jQuery(window).resize(function() {
    jQuery('.agents-archive .agent-data').css('height', 'initial');
    agentSizer();
});