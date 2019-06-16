;(function(){

	getColor = function() {
		var colors = [
			"#070707",
			"#373737",
			"#575757",
			"#777777",
			"#a7a7a7",
			"#c7c7c7",
			"#e7e7e7",
		];

		return colors[Math.floor(Math.random() * colors.length)];
	}

	createSquares = function() {
		var squaresNumber = Math.ceil(window.screen.width / 13);

		var pageTop = document.getElementById('page-top');

		var squaresSvg = pageTop.getElementsByTagName('svg')[0];
		if (!squaresSvg) {
			squaresSvg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
			pageTop.appendChild(squaresSvg);
		}

		var rects = squaresSvg.getElementsByTagName('rect');
		if (1 > rects.length) {
			rects = [];
		}

		for (i=0; i<squaresNumber; i++) {
			if (!rects[i]) {
				rects[i] = document.createElementNS("http://www.w3.org/2000/svg", "rect");
				rects[i].setAttribute("stroke", "transparent");
				rects[i].setAttribute("stroke-width", "0")
				rects[i].setAttribute("x", i * 13);
				rects[i].setAttribute("y", "0");
				rects[i].setAttribute("width", "13");
				rects[i].setAttribute("height", "13");
				squaresSvg.appendChild(rects[i]);
			}
			rects[i].setAttribute("fill", getColor());
		}
	}
	createSquares();

	addEventListener('scroll', function() {
		createSquares();
	});

})();
