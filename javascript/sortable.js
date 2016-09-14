$(function() {
    $('.sortable').sortable({
        update: function (event, ui) {
            var val = $(this).sortable('serialize');
            var userID = $('#userID').val();

            var val = {"userID" : userID, "val" : val};
            
              $.post('pages/dashboard/headers/home.head.inc.php', {val}, function(data){

            // show the response
            $('#response').html(data);
        }).fail(function() {
            // just in case posting your form failed
            alert( "Posting failed." );
        });

        }
    });
    
    $( ".sortable" ).disableSelection();
});

$(function() {  
  $( ".modules" ).accordion({
    heightStyle: "content",
    collapsible: true
  });
});

