const button = document.querySelector('.hamburger-menu');
const navbar = document.querySelector('.navigation-bar ul');

changeStateNavbar = () => {
    if (navbar.classList.contains('active')) {
        navbar.classList.remove('active');
        button.classList.remove('active');
        navbar.style.height = "0";
    } else {
        navbar.classList.add('active');
        button.classList.add('active');
        navbar.style.height = "auto";
    }
}
button.addEventListener('click', changeStateNavbar);
