// get imgs
// get root font-size
// calc line-height
//
// 1.66667rem
//
// 250px
//
// 250/30
// var imgs = document.querySelectorAll('figure');
// styles = window.getComputedStyle(html);
// styles.getPropertyValue('line-height');
;(function() {
	function load() {
		console.log('fired');
		var figures = document.querySelectorAll('figure');

		var lh = parseInt(window.getComputedStyle(document.querySelector('body')).getPropertyValue('line-height'));

		figures.forEach(function(fig) {

			var img = fig.querySelector('img');

			console.log(fig);
			var height = img.scrollHeight;
			var remainder = height % lh;
			console.log (height, remainder)

			fig.style.marginBottom = ( lh + (lh - (remainder))) + 'px';

		});
	}

	window.addEventListener('load', function () {
		load()
	}, false);
})();
