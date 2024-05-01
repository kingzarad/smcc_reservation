 <!-- partial:partials/_sidebar.html -->
 <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
     id="sidenav-main">
     <div class="sidenav-header">
         <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
             aria-hidden="true" id="iconSidenav"></i>
         <a class="navbar-brand m-0" href="{{ route('dashboard') }}">
             <img src="{{ asset('assets/images/smcc-logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
             <span class="ms-1 font-weight-bold"><strong>SMCC RESERVATION</strong></span>
         </a>
     </div>
     <hr class="horizontal dark mt-0">
     <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
         <ul class="navbar-nav">

             <li class="nav-item">
                 <a class="nav-link  {{ Request::is('admin/dashboard') ? 'active' : '' }}"
                     href="{{ route('dashboard') }}">
                     <div
                         class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                         <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                             <title>Dashboard </title>
                             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                     <g transform="translate(1716.000000, 291.000000)">
                                         <g transform="translate(0.000000, 148.000000)">
                                             <path class="color-background opacity-6"
                                                 d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                             </path>
                                             <path class="color-background"
                                                 d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                             </path>
                                         </g>
                                     </g>
                                 </g>
                             </g>
                         </svg>
                     </div>
                     <span class="nav-link-text ms-1">Dashboard</span>
                 </a>
             </li>
             <li class="nav-item mt-3">
                 <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">RESERVATION MANGEMENT</h6>
             </li>

             <li class="nav-item">
                 <a class="nav-link {{ Request::is('admin/reservation/history') ? 'active' : '' }}"
                     href="{{ route('reservation.history') }}">
                     <div
                         class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                         <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                             <title>document</title>
                             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                     <g transform="translate(1716.000000, 291.000000)">
                                         <g transform="translate(154.000000, 300.000000)">
                                             <path class="color-background opacity-6"
                                                 d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                             </path>
                                             <path class="color-background"
                                                 d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                             </path>
                                         </g>
                                     </g>
                                 </g>
                             </g>
                         </svg>
                     </div>
                     <span class="nav-link-text ms-1">Reservation</span>

                 </a>

             </li>

             <li class="nav-item mt-3">
                 <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">MANAGEMENT PAGES</h6>
             </li>
             <li class="nav-item">
                 <a class="nav-link {{ Request::is('admin/item') ? 'active' : '' }}" href="{{ route('item') }}">
                     <div
                         class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                         <svg width="800px" height="800px" viewBox="0 0 24 24" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                             <title />

                             <g fill="none" fill-rule="evenodd" id="页面-1" stroke="none" stroke-width="1">

                                 <g id="导航图标" transform="translate(-325.000000, -80.000000)">

                                     <g id="编组" transform="translate(325.000000, 80.000000)">

                                         <polygon class="color-background" fill="#FFFFFF" fill-opacity="0.01"
                                             fill-rule="nonzero" id="路径" points="24 0 0 0 0 24 24 24" />

                                         <polygon class="color-background" id="路径"
                                             points="22 7 12 2 2 7 2 17 12 22 22 17" stroke="#212121"
                                             stroke-linejoin="round" stroke-width="1.5" />

                                         <line class="color-background" id="路径" stroke="#212121"
                                             stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                             x1="2" x2="12" y1="7" y2="12" />

                                         <line class="color-background" id="路径" stroke="#212121"
                                             stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                             x1="12" x2="12" y1="22" y2="12" />

                                         <line class="color-background" id="路径" stroke="#212121"
                                             stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                             x1="22" x2="12" y1="7" y2="12" />

                                         <line class="color-background" id="路径" stroke="#212121"
                                             stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                             x1="17" x2="7" y1="4.5" y2="9.5" />

                                     </g>

                                 </g>

                             </g>

                         </svg>
                     </div>
                     <span class="nav-link-text ms-1">Item</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link {{ Request::is('admin/venue') ? 'active' : '' }}" href="{{ route('venue') }}">
                     <div
                         class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                         <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                             <path class="color-background"
                                 d="M3 21H2C2 21.5523 2.44772 22 3 22V21ZM21 21V22C21.5523 22 22 21.5523 22 21H21ZM6 6C5.44772 6 5 6.44772 5 7C5 7.55228 5.44772 8 6 8V6ZM7 8C7.55228 8 8 7.55228 8 7C8 6.44772 7.55228 6 7 6V8ZM11 6C10.4477 6 10 6.44772 10 7C10 7.55228 10.4477 8 11 8V6ZM12 8C12.5523 8 13 7.55228 13 7C13 6.44772 12.5523 6 12 6V8ZM6 9C5.44772 9 5 9.44772 5 10C5 10.5523 5.44772 11 6 11V9ZM7 11C7.55228 11 8 10.5523 8 10C8 9.44772 7.55228 9 7 9V11ZM11 9C10.4477 9 10 9.44772 10 10C10 10.5523 10.4477 11 11 11V9ZM12 11C12.5523 11 13 10.5523 13 10C13 9.44772 12.5523 9 12 9V11ZM6 12C5.44772 12 5 12.4477 5 13C5 13.5523 5.44772 14 6 14V12ZM7 14C7.55228 14 8 13.5523 8 13C8 12.4477 7.55228 12 7 12V14ZM11 12C10.4477 12 10 12.4477 10 13C10 13.5523 10.4477 14 11 14V12ZM12 14C12.5523 14 13 13.5523 13 13C13 12.4477 12.5523 12 12 12V14ZM11 21V22H12V21H11ZM7 21H6V22H7V21ZM18 10C17.4477 10 17 10.4477 17 11C17 11.5523 17.4477 12 18 12V10ZM18.01 12C18.5623 12 19.01 11.5523 19.01 11C19.01 10.4477 18.5623 10 18.01 10V12ZM18 13C17.4477 13 17 13.4477 17 14C17 14.5523 17.4477 15 18 15V13ZM18.01 15C18.5623 15 19.01 14.5523 19.01 14C19.01 13.4477 18.5623 13 18.01 13V15ZM18 16C17.4477 16 17 16.4477 17 17C17 17.5523 17.4477 18 18 18V16ZM18.01 18C18.5623 18 19.01 17.5523 19.01 17C19.01 16.4477 18.5623 16 18.01 16V18ZM20.891 7.54601L20 8L20.891 7.54601ZM20.454 7.10899L20 8L20.454 7.10899ZM14.454 3.10899L14 4L14.454 3.10899ZM14.891 3.54601L14 4L14.891 3.54601ZM3.10899 3.54601L4 4L3.10899 3.54601ZM3.54601 3.10899L4 4L3.54601 3.10899ZM2 4.6V21H4V4.6H2ZM4.6 4H13.4V2H4.6V4ZM14 4.6V7H16V4.6H14ZM14 7V21H16V7H14ZM3 22H15V20H3V22ZM15 22H21V20H15V22ZM20 8.6V21H22V8.6H20ZM15 8H19.4V6H15V8ZM6 8H7V6H6V8ZM11 8H12V6H11V8ZM6 11H7V9H6V11ZM11 11H12V9H11V11ZM6 14H7V12H6V14ZM11 14H12V12H11V14ZM10 18V21H12V18H10ZM11 20H7V22H11V20ZM8 21V18H6V21H8ZM9 17C9.55228 17 10 17.4477 10 18H12C12 16.3431 10.6569 15 9 15V17ZM9 15C7.34315 15 6 16.3431 6 18H8C8 17.4477 8.44772 17 9 17V15ZM18 12H18.01V10H18V12ZM18 15H18.01V13H18V15ZM18 18H18.01V16H18V18ZM22 8.6C22 8.33647 22.0008 8.07869 21.9831 7.86177C21.9644 7.63318 21.9203 7.36344 21.782 7.09202L20 8C19.9707 7.94249 19.9811 7.91972 19.9897 8.02463C19.9992 8.14122 20 8.30347 20 8.6H22ZM19.4 8C19.6965 8 19.8588 8.00078 19.9754 8.0103C20.0803 8.01887 20.0575 8.0293 20 8L20.908 6.21799C20.6366 6.07969 20.3668 6.03562 20.1382 6.01695C19.9213 5.99922 19.6635 6 19.4 6V8ZM21.782 7.09202C21.5903 6.7157 21.2843 6.40973 20.908 6.21799L20 8L21.782 7.09202ZM13.4 4C13.6965 4 13.8588 4.00078 13.9754 4.0103C14.0803 4.01887 14.0575 4.0293 14 4L14.908 2.21799C14.6366 2.07969 14.3668 2.03562 14.1382 2.01695C13.9213 1.99922 13.6635 2 13.4 2V4ZM16 4.6C16 4.33647 16.0008 4.07869 15.9831 3.86177C15.9644 3.63318 15.9203 3.36344 15.782 3.09202L14 4C13.9707 3.94249 13.9811 3.91972 13.9897 4.02463C13.9992 4.14122 14 4.30347 14 4.6H16ZM14 4L15.782 3.09202C15.5903 2.7157 15.2843 2.40973 14.908 2.21799L14 4ZM4 4.6C4 4.30347 4.00078 4.14122 4.0103 4.02463C4.01887 3.91972 4.0293 3.94249 4 4L2.21799 3.09202C2.07969 3.36344 2.03562 3.63318 2.01695 3.86177C1.99922 4.07869 2 4.33647 2 4.6H4ZM4.6 2C4.33647 2 4.07869 1.99922 3.86177 2.01695C3.63318 2.03562 3.36344 2.07969 3.09202 2.21799L4 4C3.94249 4.0293 3.91972 4.01887 4.02463 4.0103C4.14122 4.00078 4.30347 4 4.6 4V2ZM4 4L3.09202 2.21799C2.71569 2.40973 2.40973 2.71569 2.21799 3.09202L4 4Z"
                                 fill="#000000" />
                         </svg>
                     </div>
                     <span class="nav-link-text ms-1">Venue</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link {{ Request::is('admin/department') ? 'active' : '' }}"
                     href="{{ route('department') }}">
                     <div
                         class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                         <svg fill="#000000" width="800px" height="800px" viewBox="0 -4.91 122.88 122.88"
                             version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink"
                             style="enable-background:new 0 0 122.88 113.05" xml:space="preserve">

                             <style type="text/css">
                                 .st0 {
                                     fill-rule: evenodd;
                                     clip-rule: evenodd;
                                 }
                             </style>

                             <g>

                                 <path class="st0 color-background"
                                     d="M0,100.07h14.72V1.57c0-0.86,0.71-1.57,1.57-1.57h49.86c0.86,0,1.57,0.71,1.57,1.57V38.5h44.12 c0.86,0,1.57,0.71,1.57,1.57v59.99h9.47v12.99H0V100.07L0,100.07z M27.32,14.82h10.2c0.31,0,0.57,0.26,0.57,0.57v12.36 c0,0.31-0.26,0.57-0.57,0.57h-10.2c-0.31,0-0.57-0.26-0.57-0.57V15.39C26.75,15.08,27.01,14.82,27.32,14.82L27.32,14.82z M44.6,76.3h10.2c0.31,0,0.57,0.26,0.57,0.57v12.36c0,0.31-0.26,0.57-0.57,0.57H44.6c-0.31,0-0.57-0.26-0.57-0.57V76.87 C44.03,76.55,44.29,76.3,44.6,76.3L44.6,76.3z M27.32,76.3h10.2c0.31,0,0.57,0.26,0.57,0.57v12.36c0,0.31-0.26,0.57-0.57,0.57 h-10.2c-0.31,0-0.57-0.26-0.57-0.57V76.87C26.75,76.55,27.01,76.3,27.32,76.3L27.32,76.3z M44.6,55.8h10.2 c0.31,0,0.57,0.26,0.57,0.57v12.36c0,0.31-0.26,0.57-0.57,0.57H44.6c-0.31,0-0.57-0.26-0.57-0.57V56.38 C44.03,56.06,44.29,55.8,44.6,55.8L44.6,55.8z M27.32,55.8h10.2c0.31,0,0.57,0.26,0.57,0.57v12.36c0,0.31-0.26,0.57-0.57,0.57 h-10.2c-0.31,0-0.57-0.26-0.57-0.57V56.38C26.75,56.06,27.01,55.8,27.32,55.8L27.32,55.8z M44.6,35.31h10.2 c0.31,0,0.57,0.26,0.57,0.57v12.36c0,0.31-0.26,0.57-0.57,0.57H44.6c-0.31,0-0.57-0.26-0.57-0.57V35.88 C44.03,35.57,44.29,35.31,44.6,35.31L44.6,35.31z M27.32,35.31h10.2c0.31,0,0.57,0.26,0.57,0.57v12.36c0,0.31-0.26,0.57-0.57,0.57 h-10.2c-0.31,0-0.57-0.26-0.57-0.57V35.88C26.75,35.57,27.01,35.31,27.32,35.31L27.32,35.31z M44.6,14.82h10.2 c0.31,0,0.57,0.26,0.57,0.57v12.36c0,0.31-0.26,0.57-0.57,0.57H44.6c-0.31,0-0.57-0.26-0.57-0.57V15.39 C44.03,15.08,44.29,14.82,44.6,14.82L44.6,14.82z M23.17,7.32h35.92c0.62,0,1.13,0.61,1.13,1.35v85.87c0,0.74-0.51,1.35-1.13,1.35 H23.17c-0.62,0-1.13-0.61-1.13-1.35V8.67C22.04,7.93,22.55,7.32,23.17,7.32L23.17,7.32z M72.61,53.43h10.2 c0.31,0,0.57,0.26,0.57,0.57v12.36c0,0.31-0.26,0.57-0.57,0.57h-10.2c-0.31,0-0.57-0.26-0.57-0.57V54 C72.04,53.69,72.3,53.43,72.61,53.43L72.61,53.43z M89.89,76.3h10.2c0.31,0,0.57,0.26,0.57,0.57v12.36c0,0.31-0.26,0.57-0.57,0.57 h-10.2c-0.31,0-0.57-0.26-0.57-0.57V76.87C89.32,76.55,89.58,76.3,89.89,76.3L89.89,76.3z M72.61,76.3h10.2 c0.31,0,0.57,0.26,0.57,0.57v12.36c0,0.31-0.26,0.57-0.57,0.57h-10.2c-0.31,0-0.57-0.26-0.57-0.57V76.87 C72.04,76.55,72.3,76.3,72.61,76.3L72.61,76.3z M89.89,53.43h10.2c0.31,0,0.57,0.26,0.57,0.57v12.36c0,0.31-0.26,0.57-0.57,0.57 h-10.2c-0.31,0-0.57-0.26-0.57-0.57V54C89.32,53.69,89.58,53.43,89.89,53.43L89.89,53.43z M68.86,45.82h35.92 c0.62,0,1.13,0.61,1.13,1.35v47.37c0,0.74-0.51,1.35-1.13,1.35H68.86c-0.62,0-1.13-0.61-1.13-1.35V47.17 C67.73,46.43,68.24,45.82,68.86,45.82L68.86,45.82z" />

                             </g>

                         </svg>
                     </div>
                     <span class="nav-link-text ms-1">Department</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link {{ Request::is('admin/position') ? 'active' : '' }}"
                     href="{{ route('position') }}">
                     <div
                         class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                         <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                             <path class="color-background"
                                 d="M1.5 6.5C1.5 3.46243 3.96243 1 7 1C10.0376 1 12.5 3.46243 12.5 6.5C12.5 9.53757 10.0376 12 7 12C3.96243 12 1.5 9.53757 1.5 6.5Z"
                                 fill="#000000" />
                             <path class="color-background"
                                 d="M14.4999 6.5C14.4999 8.00034 14.0593 9.39779 13.3005 10.57C14.2774 11.4585 15.5754 12 16.9999 12C20.0375 12 22.4999 9.53757 22.4999 6.5C22.4999 3.46243 20.0375 1 16.9999 1C15.5754 1 14.2774 1.54153 13.3005 2.42996C14.0593 3.60221 14.4999 4.99966 14.4999 6.5Z"
                                 fill="#000000" />
                             <path class="color-background"
                                 d="M0 18C0 15.7909 1.79086 14 4 14H10C12.2091 14 14 15.7909 14 18V22C14 22.5523 13.5523 23 13 23H1C0.447716 23 0 22.5523 0 22V18Z"
                                 fill="#000000" />
                             <path class="color-background"
                                 d="M16 18V23H23C23.5522 23 24 22.5523 24 22V18C24 15.7909 22.2091 14 20 14H14.4722C15.4222 15.0615 16 16.4633 16 18Z"
                                 fill="#000000" />
                         </svg>
                     </div>
                     <span class="nav-link-text ms-1">Position</span>
                 </a>
             </li>

             <li class="nav-item mt-3">
                 <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">REPORT PAGES</h6>
             </li>
             <li class="nav-item">
                 <a class="nav-link {{ Request::is('admin/reports') ? 'active' : '' }}"
                     href="{{ route('reports') }}">
                     <div
                         class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                         <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                             <path class="color-background"
                                 d="M20 13.75C20 13.3358 19.6642 13 19.25 13H16.25C15.8358 13 15.5 13.3358 15.5 13.75V20.5H14V4.25C14 3.52169 13.9984 3.05091 13.9518 2.70403C13.908 2.37872 13.8374 2.27676 13.7803 2.21967C13.7232 2.16258 13.6213 2.09197 13.296 2.04823C12.9491 2.00159 12.4783 2 11.75 2C11.0217 2 10.5509 2.00159 10.204 2.04823C9.87872 2.09197 9.77676 2.16258 9.71967 2.21967C9.66258 2.27676 9.59196 2.37872 9.54823 2.70403C9.50159 3.05091 9.5 3.52169 9.5 4.25V20.5H8V8.75C8 8.33579 7.66421 8 7.25 8H4.25C3.83579 8 3.5 8.33579 3.5 8.75V20.5H2H1.75C1.33579 20.5 1 20.8358 1 21.25C1 21.6642 1.33579 22 1.75 22H21.75C22.1642 22 22.5 21.6642 22.5 21.25C22.5 20.8358 22.1642 20.5 21.75 20.5H21.5H20V13.75Z"
                                 fill="#1C274C" />
                         </svg>
                     </div>
                     <span class="nav-link-text ms-1">Reports</span>
                 </a>
             </li>
             <li class="nav-item mt-3">
                 <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">USERS MANAGEMENT</h6>
             </li>
             <li class="nav-item">
                 <a class="nav-link {{ Request::is('admin/users/*') ? 'active' : '' }}" data-bs-toggle="collapse"
                     href="#users" aria-expanded="{{ Request::is('admin/users/*') ? 'true' : 'false' }}"
                     aria-controls="users">
                     <div
                         class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                         <svg fill="#000000" height="800px" width="800px" version="1.1" id="Layer_1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             viewBox="0 0 512.001 512.001" xml:space="preserve">
                             <g>
                                 <g>
                                     <path class="color-background" d="M270.948,302.936c-10.562-14.943-27.525-24.074-45.713-24.765c-0.385-0.043-0.775-0.067-1.171-0.067
   c-23.135,0-42.252-17.484-44.859-39.93c6.661-4.851,12.807-11.007,18.254-18.381c11.015-14.913,18.165-33.547,20.816-53.698
   c0.812-0.883,1.496-1.911,1.987-3.081c4.664-11.106,7.029-22.963,7.029-35.242c0-47.221-35.702-85.637-79.584-85.637
   c-11.349,0-22.36,2.578-32.768,7.665c-3.891,0.328-7.704,1.028-11.365,2.088c-36.686,10.599-57.421,54.957-46.22,98.88
   c1.127,4.419,2.56,8.765,4.262,12.916c0.464,1.134,1.114,2.13,1.88,3c4.225,31.022,18.908,56.833,38.989,71.434
   c-2.581,22.474-21.712,39.988-44.867,39.988c-0.356,0-0.708,0.019-1.056,0.053C25.185,279.268,0,305.121,0,336.763v63.14
   c0,5.891,4.775,10.666,10.666,10.666h188.451c5.89,0,10.666-4.775,10.666-10.666s-4.776-10.666-10.666-10.666H21.331v-52.475
   c0-20.585,16.746-37.33,37.33-37.33c0.356,0,0.708-0.019,1.056-0.053c7.683-0.24,15.04-1.786,21.858-4.429l50.497,72.883
   c1.992,2.875,5.268,4.592,8.767,4.592c3.499,0,6.775-1.716,8.767-4.592l50.498-72.883c6.819,2.643,14.175,4.189,21.858,4.429
   c0.348,0.034,0.7,0.053,1.056,0.053c12.105,0,23.511,5.912,30.51,15.815c2.078,2.94,5.372,4.51,8.719,4.51
   c2.128,0,4.277-0.636,6.147-1.957C273.205,314.402,274.347,307.746,270.948,302.936z M109.492,72.377
   c2.798-0.808,5.757-1.288,8.796-1.425c1.566-0.07,3.094-0.484,4.482-1.213c7.926-4.164,16.314-6.276,24.933-6.276
   c31.47,0,57.174,27.694,58.204,62.162c-6.414-4.85-14.393-7.733-23.035-7.733h-55.779c-2.778,0-5.416-0.872-7.625-2.521
   c-1.891-1.411-3.351-3.305-4.224-5.482c-2.015-5.014-7-8.146-12.383-7.806c-5.416,0.347-9.973,4.111-11.338,9.361
   c-2.721,10.453-7.801,20.188-14.708,28.455C71.283,108.973,85.213,79.392,109.492,72.377z M84.479,162.705
   c9.316-8.54,16.855-18.89,22.119-30.32c0.036,0.027,0.073,0.054,0.11,0.081c5.925,4.422,12.973,6.758,20.384,6.758h55.779
   c6.7,0,12.487,3.92,15.234,9.577c-0.071,22.157-6.384,42.854-17.806,58.315c-10.771,14.58-24.785,22.61-39.462,22.61
   c-13.583,0-26.807-7.017-37.236-19.757C93.483,197.61,86.788,180.974,84.479,162.705z M140.838,343.031l-40.817-58.912
   c10.95-9.086,18.932-21.616,22.307-35.908c5.943,1.86,12.141,2.848,18.509,2.848c6.334,0,12.537-0.961,18.52-2.817
   c3.379,14.278,11.358,26.796,22.3,35.876L140.838,343.031z" />
                                 </g>
                             </g>
                             <g>
                                 <g>
                                     <path class="color-background" d="M455.441,337.455c-0.348-0.034-0.7-0.053-1.056-0.053c-23.167,0-42.305-17.531-44.871-40.023
   c13.062-9.512,23.832-23.774,30.931-41.119c1.016,3.324,3.617,6.008,7.039,7.069c1.04,0.322,2.104,0.479,3.157,0.479
   c3.232,0,6.36-1.473,8.417-4.114c14.881-19.112,22.616-43.986,21.784-70.041c-0.818-25.56-9.803-49.555-25.303-67.563
   c-15.869-18.438-36.819-28.699-59.012-28.911c-1.177-0.048-4.104,0.053-4.577,0.082c-11.402-5.172-23.45-7.588-35.858-7.194
   c-25.625,0.819-49.196,13.591-66.369,35.963c-16.688,21.741-25.355,50.098-24.404,79.85c0.161,5.041,0.559,9.683,1.203,14.103
   c1.737,12.679,5.23,24.822,10.381,36.091c1.639,3.587,5.124,5.977,9.06,6.213c3.923,0.237,7.681-1.718,9.739-5.083
   c0.858-1.403,1.961-3.152,3.178-4.866c4.755,14.445,12.024,27.423,21.253,37.669c3.937,4.371,8.189,8.173,12.667,11.416
   c-2.586,22.469-21.715,39.977-44.866,39.977c-0.356,0-0.708,0.019-1.056,0.053c-31.374,1.112-56.558,26.967-56.558,58.607v63.14
   c0,5.891,4.776,10.666,10.666,10.666h260.346c5.89,0,10.666-4.775,10.666-10.666v-63.14
   C512,364.422,486.815,338.568,455.441,337.455z M290.112,225.625c-1.052-4.108-1.876-8.321-2.467-12.626
   c-0.54-3.708-0.868-7.568-1.003-11.799c-0.794-24.837,6.31-48.341,20.004-66.18c13.208-17.208,31.01-27.02,50.128-27.631
   c0.639-0.021,14.387-0.795,28.421,6.277c1.569,0.79,3.377,1.157,5.138,1.107c0.202-0.006,5.677-0.265,5.836-0.263
   c16.02,0.106,31.362,7.741,43.203,21.497c12.331,14.328,19.487,33.622,20.149,54.329c0.359,11.247-1.221,22.18-4.567,32.239
   c-1.008-2.686-2.132-5.331-3.369-7.932c-10.298-21.91-27.633-38.881-48.812-47.788c-2.683-1.128-5.709-1.111-8.378,0.047
   c-2.67,1.157-4.75,3.355-5.759,6.085c-1.42,3.836-3.14,7.573-5.116,11.106c-5.584,9.986-16.842,15.927-29.361,15.489
   c-1.879-0.064-3.786-0.067-5.666-0.007c-9.223,0.295-18.217,2.053-26.78,5.242C313.255,208.009,299.041,216.018,290.112,225.625z
   M316.351,231.43c4.044-2.709,8.347-4.94,12.853-6.643c6.344-2.362,13.063-3.672,19.97-3.893c1.41-0.046,2.838-0.044,4.246,0.005
   c20.594,0.705,39.217-9.405,48.718-26.396c0.584-1.045,1.152-2.106,1.701-3.177c9.728,5.993,18.043,14.44,24.295,24.692
   c-0.054,0.316-0.1,0.633-0.126,0.959c-1.636,20.237-8.617,38.809-19.658,52.295c-10.429,12.741-23.653,19.757-37.236,19.757
   C346.004,289.027,323.666,265.158,316.351,231.43z M352.654,307.492c6.003,1.876,12.194,2.866,18.46,2.866
   c6.384,0,12.597-0.994,18.555-2.864c4.284,18.163,16.029,33.466,31.818,42.495c-6.159,22.255-26.627,38.258-50.324,38.258
   c-23.699,0-44.166-16.004-50.324-38.26C336.626,340.96,348.371,325.656,352.654,307.492z M490.669,448.537H251.654v-52.475
   c0-20.583,16.746-37.33,37.33-37.33c0.356,0,0.708-0.019,1.056-0.053c3.673-0.115,7.274-0.519,10.775-1.209
   c9.265,30.416,37.613,52.11,70.347,52.11c32.734,0,61.081-21.694,70.348-52.109c3.5,0.69,7.101,1.094,10.773,1.208
   c0.348,0.034,0.7,0.053,1.056,0.053c20.584,0,37.33,16.746,37.33,37.33V448.537z" />
                                 </g>
                             </g>
                         </svg>

                     </div>
                     <span class="nav-link-text ms-1">Users</span>
                     <i class="menu-arrow"></i>
                 </a>
                 <div class="collapse  {{ Request::is('admin/users/*') ? 'show' : '' }}" id="users">
                     <ul class="nav flex-column sub-menu">

                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('users.pending') }}">
                                 <div
                                     class="icon icon-shape icon-sm  border-radius-md text-center  d-flex align-items-center justify-content-center">
                                 </div>
                                 <span class="nav-link-text ms-1 text-dark">User Pending</span>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('users.management') }}">
                                 <div
                                     class="icon icon-shape icon-sm  border-radius-md text-center  d-flex align-items-center justify-content-center">
                                 </div>
                                 <span class="nav-link-text ms-1 text-dark">User Management</span>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('users.myaccount') }}">
                                 <div
                                     class="icon icon-shape icon-sm  border-radius-md text-center  d-flex align-items-center justify-content-center">
                                 </div>
                                 <span class="nav-link-text ms-1 text-dark">My Acount</span>
                             </a>
                         </li>
                     </ul>
                 </div>
             </li>

         </ul>
     </div>

 </aside>
