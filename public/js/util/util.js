'use strict';

// loading the function before the document ready
(function( $, window, document, undefined ) {

	$.alertMessage = function(title, message, icon, position) {
		$.toast({
			heading: title,
			text: message,
			icon: icon ? icon : 'success',
			position: position ? position : 'top-right'
		});
	};

	$.alertSuccess= function(message, title) {
		$.toast({
			heading: title ? title : 'Success',
			text: message,
			icon: 'success',
			position: 'top-right'
		});
	};

	$.alertFail = function(message,title) {
		$.toast({
			heading: title ? title : 'Fail',
			text: message,
			icon: 'error',
			position: 'top-right'
		});
	};

    $.alertFails = function(messages,title) {
    	$(messages).each(function(i){
            $.toast({
                heading: title ? title : 'Fail',
                text: messages[i],
                icon: 'error',
                position: 'top-right'
            });
		})
    };

	$.confirmMessage = function(title, message, icon, url) {
		$.confirm({
			icon: 'fa fa-warning',
			title: title,
			content: message,
			type: icon ? icon : 'red',
			typeAnimated: true,
			buttons: {
				yes: {
					text: Lang.get('global.yes'),
					btnClass: 'btn-alert btn-'+(icon ? icon : 'red'),
					action: function(){
						if(url){
							window.location = url;
						}
						return true;
					}
				},
				cancel: {
					text: Lang.get('global.cancel'),
					btnClass: 'btn-alert',
					action: function () {
						return true;
					}
				}
			}
		});
	};

	$.promptMessage = function(title, message, placeholder, icon, position) {
		$.confirm({
			title: 'Prompt!',
			theme: 'dark',
			content: '' +
			'<form action="" class="formName">' +
			'<div class="form-group">' +
			'<label>Enter something here</label>' +
			'<input type="text" placeholder="Your name" class="name form-control" required />' +
			'</div>' +
			'</form>',
			buttons: {
				formSubmit: {
					text: 'Submit',
					btnClass: 'btn-blue',
					action: function () {
						var name = this.$content.find('.name').val();
						if(!name){
							$.alert('provide a valid name');
							return false;
						}
						$.alert('Your name is ' + name);
					}
				},
				cancel: function () {
					//close
				},
			},
			onContentReady: function () {
				// bind to events
				var jc = this;
				this.$content.find('form').on('submit', function (e) {
					// if the user submits the form by pressing enter in the field.
					e.preventDefault();
					jc.$$formSubmit.trigger('click'); // reference the button and click it
				});
			}
		});
	};

})( jQuery, window, document );
