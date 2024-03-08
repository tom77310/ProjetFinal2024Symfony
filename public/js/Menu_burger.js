window.onload = () => {
    const navButton = document.querySelector("#ma-navbar .nav-button");

    navButton.addEventListener("click", function (event) {
        // On empeche le "click" de se propager dans tous le document
        event.stopPropagation();
        // Ajoute la class show si ul ne l'a pas et la retire sinon
        this.nextElementSibling.classList.toggle("show")
    } );

    const navDrops = document.querySelectorAll("#ma-navbar .nav-drop");

    for(let dropdown of navDrops){
        dropdown.addEventListener("click", function (event) {
            event.stopPropagation();
            this.classList.toggle("show");
        });
    }
    // On gère la fermeture des manus
    document.addEventListener("click", () => {
        navButton.nextElementSibling.classList.remove("show");
        for(let dropdown of navDrops){
            dropdown.classList.remove("show");
        }
    });

}