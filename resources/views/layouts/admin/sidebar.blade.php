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
                 <a class="nav-link {{ Request::is('admin/reservation/*') ? 'active' : '' }}" data-bs-toggle="collapse"
                     href="#reservation" aria-expanded="{{ Request::is('admin/reservation/*') ? 'true' : 'false' }}"
                     aria-controls="setting">
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
                     <i class="menu-arrow"></i>
                 </a>
                 <div class="collapse  {{ Request::is('admin/reservation/*') ? 'show' : '' }}" id="reservation">
                     <ul class="nav flex-column sub-menu">

                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('reservation.pending') }}">
                                 <div
                                     class="icon icon-shape icon-sm  border-radius-md text-center  d-flex align-items-center justify-content-center">
                                 </div>
                                 <span class="nav-link-text ms-1 text-dark">Pending Reservation</span>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('reservation.history') }}">
                                 <div
                                     class="icon icon-shape icon-sm  border-radius-md text-center  d-flex align-items-center justify-content-center">
                                 </div>
                                 <span class="nav-link-text ms-1 text-dark">Reservation History</span>
                             </a>
                         </li>
                     </ul>
                 </div>
             </li>
             <li class="nav-item mt-3">
                 <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">TRAVEL ORDER MANGEMENT</h6>
             </li>
             <li class="nav-item">
                 <a class="nav-link {{ Request::is('admin/travelorder/*') ? 'active' : '' }}" data-bs-toggle="collapse"
                     href="#travelorder" aria-expanded="{{ Request::is('admin/travelorder/*') ? 'true' : 'false' }}"
                     aria-controls="setting">
                     <div
                         class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                         <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                             <title>document</title>
                             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF"
                                     fill-rule="nonzero">
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
                     <span class="nav-link-text ms-1">Travel Order</span>
                     <i class="menu-arrow"></i>
                 </a>
                 <div class="collapse  {{ Request::is('admin/travelorder/*') ? 'show' : '' }}" id="travelorder">
                     <ul class="nav flex-column sub-menu">

                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('travelorder.pending') }}">
                                 <div
                                     class="icon icon-shape icon-sm  border-radius-md text-center  d-flex align-items-center justify-content-center">
                                 </div>
                                 <span class="nav-link-text ms-1 text-dark">Travel Order Pending</span>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('travelorder.history') }}">
                                 <div
                                     class="icon icon-shape icon-sm  border-radius-md text-center  d-flex align-items-center justify-content-center">
                                 </div>
                                 <span class="nav-link-text ms-1 text-dark">Travel Order History</span>
                             </a>
                         </li>
                     </ul>
                 </div>
             </li>
             <li class="nav-item mt-3">
                 <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">RESOURCE MANAGEMENT</h6>
             </li>
             <li class="nav-item">
                 <a class="nav-link {{ Request::is('admin/product') ? 'active' : '' }}"
                     href="{{ route('product') }}">
                     <div
                         class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                         <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                             <title>document</title>
                             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF"
                                     fill-rule="nonzero">
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
                     <span class="nav-link-text ms-1">Product</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link {{ Request::is('admin/category') ? 'active' : '' }}"
                     href="{{ route('category') }}">
                     <div
                         class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                         <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                             <title>document</title>
                             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF"
                                     fill-rule="nonzero">
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
                     <span class="nav-link-text ms-1">Category</span>
                 </a>
             </li>
             <li class="nav-item mt-3">
                 <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">STOCKS MANAGEMENT</h6>
             </li>
             <li class="nav-item">
                 <a class="nav-link {{ Request::is('admin/stocks/*') ? 'active' : '' }}" data-bs-toggle="collapse"
                     href="#stocks" aria-expanded="{{ Request::is('admin/stocks/*') ? 'true' : 'false' }}"
                     aria-controls="stocks">
                     <div
                         class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                         <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                             <title>Warehouse</title>
                             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF"
                                     fill-rule="nonzero">
                                     <g transform="translate(1716.000000, 291.000000)">
                                         <g transform="translate(154.000000, 300.000000)">
                                             <!-- Warehouse Building -->
                                             <rect class="color-background opacity-6" x="0" y="0" width="40"
                                                 height="40"></rect>
                                             <!-- Doors -->
                                             <rect class="color-background" x="10" y="30" width="20"
                                                 height="10">
                                             </rect>
                                             <!-- Windows -->
                                             <rect class="color-background" x="5" y="10" width="10"
                                                 height="10">
                                             </rect>
                                             <rect class="color-background" x="25" y="10" width="10"
                                                 height="10">
                                             </rect>
                                         </g>
                                     </g>
                                 </g>
                             </g>
                         </svg>

                     </div>
                     <span class="nav-link-text ms-1">Stocks Entry</span>
                     <i class="menu-arrow"></i>
                 </a>
                 <div class="collapse  {{ Request::is('admin/stocks/*') ? 'show' : '' }}" id="stocks">
                     <ul class="nav flex-column sub-menu">

                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('stocks.stockin') }}">
                                 <div
                                     class="icon icon-shape icon-sm  border-radius-md text-center  d-flex align-items-center justify-content-center">
                                 </div>
                                 <span class="nav-link-text ms-1 text-dark">Stock In</span>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('stocks.stockhistory') }}">
                                 <div
                                     class="icon icon-shape icon-sm  border-radius-md text-center  d-flex align-items-center justify-content-center">
                                 </div>
                                 <span class="nav-link-text ms-1 text-dark">Stocks History</span>
                             </a>
                         </li>
                     </ul>
                 </div>
             </li>
             <li class="nav-item mt-3">
                 <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">REPORT PAGES</h6>
             </li>
             <li class="nav-item">
                 <a class="nav-link {{ Request::is('admin/reports') ? 'active' : '' }}"
                     href="{{ route('reports') }}">
                     <div
                         class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                         <svg width="12px" height="12px" viewBox="0 0 40 44" xmlns="http://www.w3.org/2000/svg">
                             <!-- Background Circle -->
                             <circle cx="20" cy="22" r="20" fill="#FFFFFF" stroke="#000000"
                                 stroke-width="2" />
                             <!-- First Segment -->
                             <path d="M20,22 L20,2 A20,20 0 0,1 30,12 Z" fill="#000000" />
                             <!-- Second Segment -->
                             <path d="M20,22 L30,12 A20,20 0 0,1 20,42 Z" fill="#333333" />
                             <!-- Third Segment -->
                             <path d="M20,22 L20,42 A20,20 0 0,1 10,32 Z" fill="#666666" />
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
                         <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                             <title>customer-support</title>
                             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                     fill-rule="nonzero">
                                     <g transform="translate(1716.000000, 291.000000)">
                                         <g transform="translate(1.000000, 0.000000)">
                                             <path class="color-background opacity-6"
                                                 d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                                             </path>
                                             <path class="color-background"
                                                 d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                             </path>
                                             <path class="color-background"
                                                 d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                                             </path>
                                         </g>
                                     </g>
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
                     </ul>
                 </div>
             </li>


             <li class="nav-item mt-3">
                 <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">SETTINGS PAGES</h6>
             </li>
             <li class="nav-item">
                 <a class="nav-link {{ Request::is('admin/settings/*') ? 'active' : '' }}" data-bs-toggle="collapse"
                     href="#setting" aria-expanded="{{ Request::is('admin/settings/*') ? 'true' : 'false' }}"
                     aria-controls="setting">
                     <div
                         class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                         <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                             <title>Warehouse</title>
                             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                 <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF"
                                     fill-rule="nonzero">
                                     <g transform="translate(1716.000000, 291.000000)">
                                         <g transform="translate(154.000000, 300.000000)">
                                             <!-- Warehouse Building -->
                                             <rect class="color-background opacity-6" x="0" y="0" width="40"
                                                 height="40"></rect>
                                             <!-- Doors -->
                                             <rect class="color-background" x="10" y="30" width="20"
                                                 height="10">
                                             </rect>
                                             <!-- Windows -->
                                             <rect class="color-background" x="5" y="10" width="10"
                                                 height="10">
                                             </rect>
                                             <rect class="color-background" x="25" y="10" width="10"
                                                 height="10">
                                             </rect>
                                         </g>
                                     </g>
                                 </g>
                             </g>
                         </svg>

                     </div>
                     <span class="nav-link-text ms-1">Settings</span>
                     <i class="menu-arrow"></i>
                 </a>
                 <div class="collapse  {{ Request::is('admin/settings/*') ? 'show' : '' }}" id="setting">
                     <ul class="nav flex-column sub-menu">

                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('settings.department') }}">
                                 <div
                                     class="icon icon-shape icon-sm  border-radius-md text-center  d-flex align-items-center justify-content-center">
                                 </div>
                                 <span class="nav-link-text ms-1 text-dark">Department</span>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('settings.position') }}">
                                 <div
                                     class="icon icon-shape icon-sm  border-radius-md text-center  d-flex align-items-center justify-content-center">
                                 </div>
                                 <span class="nav-link-text ms-1 text-dark">Position</span>
                             </a>
                         </li>
                     </ul>
                 </div>
             </li>

         </ul>
     </div>

 </aside>
 {{-- <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">

         <li class="nav-item">
             <a class="nav-link" href="{{ route('category') }}">
                 <i class="mdi mdi-view-list menu-icon"></i>
                 <span class="menu-title">Category</span>
             </a>
         </li>


         <li class="nav-item">
             <a class="nav-link" data-bs-toggle="collapse" href="#settings" aria-expanded="false"
                 aria-controls="settings">
                 <i class="mdi mdi-settings menu-icon"></i>
                 <span class="menu-title">Settings</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="settings">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="{{ route('settings.position') }}">Position</a></li>
                     <li class="nav-item"> <a class="nav-link" href="{{ route('settings.department') }}">Department</a>
                     </li>
                 </ul>
             </div>
         </li>

     </ul>
 </nav> --}}
