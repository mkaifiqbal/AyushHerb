document.addEventListener("DOMContentLoaded", function () {
            const menuBtn = document.getElementById('menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
        
            menuBtn.addEventListener('click', function () {
                mobileMenu.classList.toggle('hidden');
            });
        });



// for closing the image popup
function openModal(modalId) {
    document.getElementById("navbar").classList.add("hidden");
    document.getElementById(modalId).classList.remove("hidden");
}

function closeModal(modalId) {
    document.getElementById("navbar").classList.remove("hidden");
    document.getElementById(modalId).classList.add("hidden");
}



