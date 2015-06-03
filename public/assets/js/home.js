   $.fn.stars = function() {
    return $(this).each(function() {
      // alert('yes');
        // Get the value
        var val = parseFloat($(this).html());
        // Make sure that the value is in 0 - 5 range, multiply to get width

        if(isNaN(val))
        {
          return 0;
        }
       // alert(val);
        var size = Math.max(0, (Math.min(5, val))) * 16;
        // Create stars holder
        var $span = $('<span />').width(size);
        // Replace the numerical value with stars
        $(this).html($span);
    });
   }
    $(function() 
    {        
      $('span.stars').stars();
      $('#hostPanelLogin').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        $('#loginModal').modal('show') ;
      });
      if($.cookie('membeshipMessageStatus')!="hide")
      {         
        $('.membership_message').show();
      }
    });
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
  function refreshForm(formId)
  { 
       $(formId)[0].reset();
       $(formId).bootstrapValidator('resetForm', true);
  }
  function hideMembershipMessage () {
    var date = new Date();   
    date.setTime(date.getTime() + (60 * 60 * 1000));
    $.cookie('membeshipMessageStatus', "hide",{ expires: date ,  path: '/' });      
  }


  
  /*!
 * jQuery Cookie Plugin v1.4.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2006, 2014 Klaus Hartl
 * Released under the MIT license
 */
(function (factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD (Register as an anonymous module)
    define(['jquery'], factory);
  } else if (typeof exports === 'object') {
    // Node/CommonJS
    module.exports = factory(require('jquery'));
  } else {
    // Browser globals
    factory(jQuery);
  }
}(function ($) {

  var pluses = /\+/g;

  function encode(s) {
    return config.raw ? s : encodeURIComponent(s);
  }

  function decode(s) {
    return config.raw ? s : decodeURIComponent(s);
  }

  function stringifyCookieValue(value) {
    return encode(config.json ? JSON.stringify(value) : String(value));
  }

  function parseCookieValue(s) {
    if (s.indexOf('"') === 0) {
      // This is a quoted cookie as according to RFC2068, unescape...
      s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
    }

    try {
      // Replace server-side written pluses with spaces.
      // If we can't decode the cookie, ignore it, it's unusable.
      // If we can't parse the cookie, ignore it, it's unusable.
      s = decodeURIComponent(s.replace(pluses, ' '));
      return config.json ? JSON.parse(s) : s;
    } catch(e) {}
  }

  function read(s, converter) {
    var value = config.raw ? s : parseCookieValue(s);
    return $.isFunction(converter) ? converter(value) : value;
  }

  var config = $.cookie = function (key, value, options) {

    // Write

    if (arguments.length > 1 && !$.isFunction(value)) {
      options = $.extend({}, config.defaults, options);

      if (typeof options.expires === 'number') {
        var days = options.expires, t = options.expires = new Date();
        t.setMilliseconds(t.getMilliseconds() + days * 864e+5);
      }

      return (document.cookie = [
        encode(key), '=', stringifyCookieValue(value),
        options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
        options.path    ? '; path=' + options.path : '',
        options.domain  ? '; domain=' + options.domain : '',
        options.secure  ? '; secure' : ''
      ].join(''));
    }

    // Read

    var result = key ? undefined : {},
      // To prevent the for loop in the first place assign an empty array
      // in case there are no cookies at all. Also prevents odd result when
      // calling $.cookie().
      cookies = document.cookie ? document.cookie.split('; ') : [],
      i = 0,
      l = cookies.length;

    for (; i < l; i++) {
      var parts = cookies[i].split('='),
        name = decode(parts.shift()),
        cookie = parts.join('=');

      if (key === name) {
        // If second argument (value) is a function it's a converter...
        result = read(cookie, value);
        break;
      }

      // Prevent storing a cookie that we couldn't decode.
      if (!key && (cookie = read(cookie)) !== undefined) {
        result[name] = cookie;
      }
    }

    return result;
  };

  config.defaults = {};

  $.removeCookie = function (key, options) {
    // Must not alter options, thus extending a fresh object...
    $.cookie(key, '', $.extend({}, options, { expires: -1 }));
    return !$.cookie(key);
  };
}));