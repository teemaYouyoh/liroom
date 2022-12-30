jQuery(function ($) {
    var imagesTosrus = $('.totalpoll-poll-container[data-template="default"] .totalpoll-choice-image.totalpoll-supports-full a').tosrus({
        buttons: {
            prev: false,
            next: false
        },
        wrapper: {
            onClick: 'close'
        }
    });

    var videosTosrus = $('.totalpoll-poll-container[data-template="default"] .totalpoll-choice-embed a').tosrus({
        buttons: {
            prev: false,
            next: false
        },
        wrapper: {
            onClick: 'close'
        },
        youtube: {
            imageLink: false
        }
    });

    $('.totalpoll-open-info').magnificPopup({
	  // main options
	  disableOn: 300

	});

    $('.open-popup-link').magnificPopup({
	  // main options
	  disableOn: 300,
	  callbacks: {
		elementParse: function(item) {
		  // Function will fire for each target element
		  // "item.el" is a target DOM element (if present)
		  // "item.src" is a source that you may modify			  
		  var index = item.index;
		console.log(index);
		  var id = '#band'+item.index;
		  var band = $(id);
		  $( id+" .img" ).empty();
		  var img = $( id+" .copy" ).clone();
		  $( id+ " .img" ).append( img );
		  
		 /* if($( id+" #track"+index )) {
		    $( id+" .track" ).empty();
			var track_url = $( id+" #track"+index ).val();
			var track = '<iframe allowtransparency="true" scrolling="no" frameborder="no" src="https://w.soundcloud.com/icon/?url='+track_url+'&color=orange_white&size=32" style="width: 32px; height: 32px;"></iframe>';
		   	$( id+ " .track" ).append( track );
		  }*/
		  
		  if($( id+" #video"+index )) {
		    $( id+" .video" ).empty();
			var video_url = $( id+" #video"+index ).val();
			var video = '<iframe width="100%" height="315" src="https://www.youtube.com/embed/'+video_url+'" frameborder="0" allowfullscreen></iframe>';
		    $( id+ " .video" ).append( video );
		 }
		  
		}
	  }

	});
    $(document).on('totalpoll.after.ajax', function (e, data) {
        $(imagesTosrus).remove();
        $(videosTosrus).remove();
        var imagesTosrus = $('.totalpoll-choice-image.totalpoll-supports-full a', data.container).tosrus({
            buttons: {
                prev: false,
                next: false
            },
            wrapper: {
                onClick: 'close'
            }
        });

        var videosTosrus = $('.totalpoll-choice-embed a', data.container).tosrus({
            buttons: {
                prev: false,
                next: false
            },
            wrapper: {
                onClick: 'close'
            },
            youtube: {
                imageLink: false
            }
        });
    });
});