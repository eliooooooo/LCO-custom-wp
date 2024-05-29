// core version + navigation, pagination modules:
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

// init Swiper:
document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.swiper-activites', {
        // configure Swiper to use modules
        modules: [Navigation, Pagination],
        grabCursor: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            780: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            1280: {
                slidesPerView: 3,
                spaceBetween: 40
            }
        }
    });
});