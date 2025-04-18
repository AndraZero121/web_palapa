import './bootstrap';
import Alpine from 'alpinejs';
import AOS from 'aos';
import 'owl.carousel';
import Swal from 'sweetalert2';
import toastr from 'toastr';

// Import CSS files
import 'aos/dist/aos.css';
import 'animate.css';
import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel/dist/assets/owl.theme.default.css';
import '@fortawesome/fontawesome-free/css/all.css';
import 'toastr/build/toastr.css';

// Initialize Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Initialize AOS
AOS.init({
    duration: 800,
    easing: 'ease-in-out',
    once: true
});

// Initialize Toastr
toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: 'toast-top-right',
    timeOut: 5000
};

// Make SweetAlert2 available globally
window.Swal = Swal;

// Initialize Owl Carousel
$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
});

// Flash messages with Toastr
const flashMessage = (type, message) => {
    switch (type) {
        case 'success':
            toastr.success(message);
            break;
        case 'info':
            toastr.info(message);
            break;
        case 'warning':
            toastr.warning(message);
            break;
        case 'error':
            toastr.error(message);
            break;
        default:
            toastr.info(message);
    }
};

// Make flash messages available globally
window.flashMessage = flashMessage;

// Check for flash messages from session
document.addEventListener('DOMContentLoaded', () => {
    const successMessage = document.querySelector('meta[name="flash-success"]');
    const errorMessage = document.querySelector('meta[name="flash-error"]');

    if (successMessage && successMessage.content) {
        flashMessage('success', successMessage.content);
    }

    if (errorMessage && errorMessage.content) {
        flashMessage('error', errorMessage.content);
    }
});

// Confirm dialog for delete operations
document.addEventListener('click', function(e) {
    const target = e.target;

    if (target.classList.contains('confirm-delete')) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Find the closest form and submit it
                target.closest('form').submit();
            }
        });
    }
});
