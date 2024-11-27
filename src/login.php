<?php 
include_once 'classes/CSRFToken.php';

$csrf = new CSRFToken();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page | PRESPOL</title>
    <link rel="icon" href="img/pres.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
    <style>
        .bg-slideshow {
            position: relative;
            width: 100%;
            height: 100%;
        }
        .bg-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }
        .bg-slide.active {
            opacity: 1;
        }
    </style>
</head>
<body>
    <div class="bg-gradient-to-b from-white to-orange-100 font-helvetica">
        <div class="flex justify-center min-h-screen">
            <div class="hidden lg:block lg:w-3/5 relative">
                <div class="bg-slideshow h-full">
                    <div class="bg-slide" style="background-image: url('img/imgLogin7.jpg')"></div>
                    <div class="bg-slide" style="background-image: url('img/imgLogin8.jpg')"></div>
                    <div class="bg-slide" style="background-image: url('img/imgLogin3.jpg')"></div>
                    <div class="bg-slide" style="background-image: url('img/imgLogin4.jpeg')"></div>
                    <div class="bg-slide" style="background-image: url('img/imgLogin5.jpg')"></div>
                    <div class="bg-slide" style="background-image: url('img/imgLogin6.jpg')"></div>
                    <div class="bg-slide" style="background-image: url('img/imgLogin1.jpeg')"></div>
                    <div class="bg-slide" style="background-image: url('img/imgLogin2.jpg')"></div>
                </div>
                <div class="absolute inset-0 bg-gray-900 bg-opacity-60 flex items-end pb-20 px-20">
                    <div>
                        <h2 class="text-8xl font-bold text-gray-300">Catat Prestasimu!</h2>
                        <p class="max-w-xl mt-3 text-gray-200">
                            "Torehkan Prestasi, Wujudkan Eksistensi!"
                        </p>
                    </div>
                </div>
            </div>
    
            <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                <div class="flex-1">
                    <div class="text-center">
                        <div class="flex justify-center mx-auto">
                            <img class="w-auto h-7 sm:h-10" src="img/logoBlack.svg" alt="logo">
                        </div>
    
                        <p class="text-l mt-3 text-gray-500">Masuk untuk mengakses akun yang sudah terdaftar</p>
                    </div>
    
                    <div class="mt-8">
                        <form action="prosesLogin.php" method="post">
                            <div>
                                <label for="email" class="block mb-2 text-sm text-gray-600">Username</label>
                                <input type="text" name="username" id="username" placeholder="Username" required class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:border-orange-400 focus:ring-orange-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>
    
                            <div class="mt-6">
                                <div class="flex justify-between mb-2">
                                    <label for="password" class="text-sm text-gray-600">Password</label>
                                    <a href="#" class="text-sm text-gray-400 focus:text-orange-500 hover:text-orange-500 hover:underline">Lupa password?</a>
                                </div>
                                
                                <div class="relative">
                                    <input type="password" name="password" id="password" placeholder="Password" required class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:border-orange-400 focus:ring-orange-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                                    <span
                                        id="togglePassword"
                                        class="absolute right-3 top-3 cursor-pointer text-gray-400 hover:text-orange-600"
                                    >
                                        <!-- Tambahkan ikon di sini -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15 12c0 1.657-1.343 3-3 3s-3-1.343-3-3 1.343-3 3-3 3 1.343 3 3z"
                                            />
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M2.458 12C3.732 7.943 7.522 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7s-8.268-2.943-9.542-7z"
                                            />
                                        </svg>
                                    </span>
                                </div>  
                            </div>
    
                            <div class="mt-6">
                                <input type="hidden" name="csrf_token" value="<?= $csrf->generateToken(); ?>">
                                <button type="submit" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-300 transform bg-orange-500 rounded-lg hover:bg-orange-400 focus:outline-none focus:bg-orange-400 focus:ring focus:ring-orange-300 focus:ring-opacity-50">
                                    Masuk
                                </button>
                            </div>
                        </form>
                        <p class="mt-6 text-sm text-center text-gray-400">Belum punya akun? <a href="signup.html" class="text-orange-500 focus:outline-none focus:underline hover:underline">Daftar</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
    
        togglePassword.addEventListener('click', function () {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
    
            // Toggle the eye icon (optional)
            this.classList.toggle('text-gray-600');
        });

        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.bg-slide');
            let currentSlide = 0;

            // Initially activate the first slide
            slides[0].classList.add('active');

            // Function to change slides
            function changeSlide() {
                // Remove active class from current slide
                slides[currentSlide].classList.remove('active');
                
                // Move to next slide, wrap around to start if at end
                currentSlide = (currentSlide + 1) % slides.length;
                
                // Add active class to new slide
                slides[currentSlide].classList.add('active');
            }

            // Change slide every 5 seconds
            setInterval(changeSlide, 5000);

            // Password toggle functionality
            const passwordInput = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');

            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
            });
        });
    </script>
</body>
</html>