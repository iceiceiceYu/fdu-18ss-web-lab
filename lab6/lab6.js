window.onload = function () {
    var images = ID("thumbnails").getElementsByTagName("img");
    var featured = ID("featured");
    var featuredFigcaption = ID("featured").getElementsByTagName("figcaption");

    function ID(Nid) {
        return document.getElementById(Nid);
    }

    images[0].onclick = function () {
        featured.innerHTML = '<img src="images/medium/5855774224.jpg" title="Battle"/>\n' +
            '<figcaption>Battle</figcaption>';
    };

    images[1].onclick = function () {
        featured.innerHTML = '<img src="images/medium/5856697109.jpg" title="Luneburg"/>\n' +
            '<figcaption>Luneburg</figcaption>';
    };

    images[2].onclick = function () {
        featured.innerHTML = '<img src="images/medium/6119130918.jpg" title="Bermuda"/>\n' +
            '<figcaption>Bermuda</figcaption>';
    };

    images[3].onclick = function () {
        featured.innerHTML = '<img src="images/medium/8711645510.jpg" title="Athens"/>\n' +
            '<figcaption>Athens</figcaption>'
    };

    images[4].onclick = function () {
        featured.innerHTML = '<img src="images/medium/9504449928.jpg" title="Florence"/>\n' +
            '<figcaption>Florence</figcaption>'
    };

    featured.onmouseenter = function () {
        featured.style.cursor = "pointer";
        featuredFigcaption[0].style.opacity = 0.8;
        featuredFigcaption[0].style.transition = "1s";
    };

    featured.onmouseleave = function () {
        featuredFigcaption[0].style.opacity = 0;
        featuredFigcaption[0].style.transition = "1s";
    };
};