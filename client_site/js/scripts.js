document.getElementById('shirt').addEventListener('click', function() {
    //finding the shirt and adding an event listener
    window.location.href = 'merch.html';
    //this changes the windows location to the merch page
});
//changing the text to show that it is changed
document.querySelector('h5').innerHTML = 'Changed';