var root = document.querySelector(':root');
var nameText = document.getElementById('corner-letters-div');
var linkDiv = document.getElementById('navlinks-div');

window.addEventListener('scroll', function ( event ) {
    let scrollNum = document.querySelector('html').scrollTop;
    
    if (scrollNum === 0 ) {
        nameText.style.transform = 'translate(0px, 0px)';
        linkDiv.style.transform = 'translate(0px, 0px)';
        root.style.setProperty('--pseudo-display', 'none');
    } else {
        nameText.style.transform = 'translate(-20px, -20px)';
        linkDiv.style.transform = 'translate(20px, -20px)';
        root.style.setProperty('--pseudo-display', 'block');
    }

});