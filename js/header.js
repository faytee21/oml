const ham = document.querySelector('.ham');
            const navMenu = document.querySelector('.nav-menu');

            ham.addEventListener("click", mobileMenu);

            function mobileMenu(){
                ham.classList.toggle("active");
                navMenu.classList.toggle("active");
            }

            const navLink = document.querySelector('.nav-link');
            navLink.forEach((n) => n.addEventListener("click", closeMenu));

            function closeMenu(){
                ham.classList.remove("active");
                navMenu.classList.remove("active");
            }