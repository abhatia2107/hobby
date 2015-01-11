   $.fn.stars = function() {
    return $(this).each(function() {
      // alert('yes');
        // Get the value
        var val = parseFloat($(this).html());
        // Make sure that the value is in 0 - 5 range, multiply to get width
        var size = Math.max(0, (Math.min(5, val))) * 16;
        // Create stars holder
        var $span = $('<span />').width(size);
        // Replace the numerical value with stars
        $(this).html($span);
    });
   }
   function show_contact (id) 
  {
    $('#show_contact'+id).empty();
    $('#contact'+id).fadeIn(700);
    var batch_id  = $('#contact'+id).attr('value');
    $.get("/batches/increment/"+batch_id,function(response)
    {
      var result  = response; 
    });
    // body...
  }
  function sendMessage(batchID,instituteID,EMail)
  {
   // alert(batchID+","+instituteID);
     $('#SendMessageBatchID').val(batchID);
     $('#SendMessageInstituteID').val(instituteID);
     $('#SendMessageVenueEMail').val(instituteID);
  }
  function navActive(navID)
  {
       $('#'+navID).addClass("active");
  }

  