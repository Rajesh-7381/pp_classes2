document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("Home").addEventListener('submit', function(event) {
        event.preventDefault();
        if (HomeVALIDATE()) {
            var homedata = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'home-edit.php', true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText);
                        
                        location.reload();
                    } else {
                        console.error("Error updating: " + xhr.responseText);
                        alert("Error updating. Please try again");
                    }
                }
            };
            xhr.send(homedata); // Send the FormData object
        }
    });

 


    function HomeVALIDATE() {
        return true;
    }

    function ImageVALIDATE() {
        return true;
    }
});