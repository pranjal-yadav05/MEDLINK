    window.onload = function() {
        setInterval(function() {
        iconChange();
        }, 250);
    };

    function iconChange() {
    setTimeout(function(){ document.getElementById("icon").href = "image1.png";}, 333);
    setTimeout(function(){ document.getElementById("icon").href = "image2.png";}, 667);
    setTimeout(function(){ document.getElementById("icon").href = "image3.png";}, 1000);  
    setTimeout(function(){ document.getElementById("icon").href = "image4.png";}, 1333);
    setTimeout(function(){ document.getElementById("icon").href = "image5.png";}, 1667);
    setTimeout(function(){ document.getElementById("icon").href = "image6.png";}, 2000);  
    setTimeout(function(){ document.getElementById("icon").href = "image7.png";}, 2333);
    }