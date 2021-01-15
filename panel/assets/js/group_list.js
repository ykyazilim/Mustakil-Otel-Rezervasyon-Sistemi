/* Webarch Admin Dashboard 
/* This JS is only for DEMO Purposes - Extract the code that you need
-----------------------------------------------------------------*/ 
$(document).ready(function() {		
  var updateOutput = function(e)
  {
    var list   = e.length ? e : $(e.target),
    output = list.data('output');
    if (window.JSON) {
            output.html(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
            var veri = window.JSON.stringify(list.nestable('serialize'));
            $.ajax('islem.php?veri='+veri);

        } else {
            output.html('Tarayıcınız Desteklenmiyor');
        }
    };
    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1,
        maxDepth:2
    })
    .on('change', updateOutput);
    
    
    updateOutput($('#nestable').data('output', $('#nestable-output')));



    $('#nestable-menu').on('click', function(e)
    {

        var target = $(e.target),
        action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });

});