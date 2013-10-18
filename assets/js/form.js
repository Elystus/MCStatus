$(document).ready(function () {
    $('#server-port').ForceNumericOnly();  // Only allow numbers in this field
    
    $("#server-form").submit( function() {
        var host = escape($("#server-host").val()),
            port = $("#server-port").val();
            
        if(host == "") {
            $('#form-err').empty();
            $('#form-err').append('<p>Please input a valid server IP or Domain Name</p>');
            $('#form-err').show();
            return;
        }
        
        if(port.length > 5) { // Incase the max-length tag gets removed
            $('#form-err').empty();
            $('#form-err').append('<p>Port can only be 5 numbers long!</p>');
            $('#form-err').show();
            return;
        }
        
        $('#form-err').hide();
        
        if(!port == "") {
            window.location = "/server/" + host + "/" + port;
        } else {
            window.location = "/server/" + host;
        }
    });
});

// Numeric only control handler
jQuery.fn.ForceNumericOnly = function() {
  return this.each(function()
  {
  $(this).keydown(function(e)
  {
    var key = e.charCode || e.keyCode || 0;
    // allow backspace, tab, delete, arrows, numbers 
          // and keypad numbers ONLY
    return (
      key == 8 || 
      key == 9 ||
      key == 46 ||
      (key >= 37 && key <= 40) ||
      (key >= 48 && key <= 57) ||
      (key >= 96 && key <= 105));
  });
  });
};