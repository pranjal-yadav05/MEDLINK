    window.onload = function() {
        setInterval(function() {
        iconChange();
        }, 250);
    };

    function iconChange() {
    setTimeout(function(){ document.getElementById("icon").href = "/images/MedLinkAnimatedFavicon1.png";}, 333);
    setTimeout(function(){ document.getElementById("icon").href = "/images/MedLinkAnimatedFavicon2.png";}, 667);
    setTimeout(function(){ document.getElementById("icon").href = "/images/MedLinkAnimatedFavicon3.png";}, 1000);  
    setTimeout(function(){ document.getElementById("icon").href = "/images/MedLinkAnimatedFavicon4.png";}, 1333);
    setTimeout(function(){ document.getElementById("icon").href = "/images/MedLinkAnimatedFavicon5.png";}, 1667);
    setTimeout(function(){ document.getElementById("icon").href = "/images/MedLinkAnimatedFavicon6.png";}, 2000);  
    setTimeout(function(){ document.getElementById("icon").href = "/images/MedLinkAnimatedFavicon7.png";}, 2333);
    }