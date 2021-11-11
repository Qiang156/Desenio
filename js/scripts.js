(function(WGR, $) {
	'use strict';

	function example()
	{
		$('.btn').each(function(){
			$(this).on('click', function(){
				fetchData();
			})
		});

		/**
		 * get data by fetch
		 */
		let fetchData = function () {
			fetch('./?action=members-ajax')
				.then(checkStatus)
				.then(render)
				.catch(function (err) {
					console.log('Fetch Error :-S', err);
				});
		};

		/**
		 * render page
		 * @param data
		 */
		let render = function(data) {
			let html = '';
			for(let item of data) {
				html += item.name+'('+item.parentID+')<br>';
			}
			$('body').html(html);
		}
		/**
		 * check ajax status
		 * @param response
		 * @returns {any}
		 */
		let checkStatus = function(response) {
			if (response.status !== 200) {
				console.log('Status Code: ' + response.status);
				return;
			}
			return response.json();
		}
	}

	WGR.example = example;

}(window.WGR = window.WGR || {}, jQuery));
