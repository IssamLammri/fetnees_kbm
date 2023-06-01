let search_btn=document.querySelector('#search-btn');
let search_bar=document.querySelector('.search-bar-cont');
let form_btn=document.querySelector('#login-btn');
let login_bar=document.querySelector('.login-container');
let form_close=document.querySelector('#form-close');
let menu_bar=document.querySelector('#menu-bar');
let nav_bar=document.querySelector('.nav-bar');
let vid_btn=document.querySelectorAll('.vid-btn');
let box=document.querySelector('.content');



menu_bar.addEventListener('click',()=>{
   menu_bar.classList.toggle('fa-times');
   nav_bar.classList.toggle('active');
})

    
vid_btn.forEach(btn=>{
    btn.addEventListener('click',()=>{
        document.querySelector('.controle .active').classList.remove('active');
        btn.classList.add('active');
        document.querySelector('.vedio-slid').src = btn.getAttribute('data-src');
    })
})
box.addEventListener('click',()=>{
    box.classList.add('active');
})


const swiper = new Swiper(".review_slider", {
    spaceBetween: 20,
    loop: true,
    autoplay: {
        delay: 2500,
        disableoninteraction: false,
    },
    breakpoint: {
        640: {
            slidesperview: 1,
        },
        768: {
            slidesperview: 2,
        },
        1040: {
            slidesperview: 3,
        },

    },
});
