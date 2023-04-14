    window.onload = function() {
        setInterval(function() {
        iconChange();
        }, 250);
    };

    function iconChange() {
    setTimeout(function(){ document.getElementById("icon").href = "/images/MedLinkAnimatedFavicon1.png";}, 142.86);
    setTimeout(function(){ document.getElementById("icon").href = "/images/MedLinkAnimatedFavicon2.png";}, 285.71);
    setTimeout(function(){ document.getElementById("icon").href = "/images/MedLinkAnimatedFavicon3.png";}, 428.57);  
    setTimeout(function(){ document.getElementById("icon").href = "/images/MedLinkAnimatedFavicon4.png";}, 571.43);
    setTimeout(function(){ document.getElementById("icon").href = "/images/MedLinkAnimatedFavicon5.png";}, 714.29);
    setTimeout(function(){ document.getElementById("icon").href = "/images/MedLinkAnimatedFavicon6.png";}, 857.14);  
    setTimeout(function(){ document.getElementById("icon").href = "/images/MedLinkAnimatedFavicon7.png";}, 1000);
    }