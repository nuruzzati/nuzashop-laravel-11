   <style>
       .rawr:hover {
           color: 222 !important;

       }

       .rawr {
           color: #222 !important;
           cursor: default;

       }

       .nav-logo {
           color: 222 !important;

       }
   </style>

   <head>

       <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   </head>
   <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
       <div class="position-sticky pt-3">
           <ul class="nav flex-column">

               <li class="nav-item">
                   <h1 class="nav-link fs-4 rawr"
                       style="margin-top: -45px;margin-bottom: 10px;border-bottom: 1px solid #44444427;padding-bottom: 14px;font-weight: 900;color: #333 !important"
                       aria-current="page" href="#">
                       <i class='bx bxs-store-alt'></i> Nuzashop
                   </h1>
               </li>

               <li class="nav-item">
                   <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page"
                       href="/dashboard">
                       <i class='bx bxs-store-alt'></i> Dashboard
                   </a>
               </li>
               <li class="nav-item">
                   <a class="nav-link  {{ Request::is('dashboard/category*') ? 'active' : '' }}"
                       href="/dashboard/category">
                       <i class='bx bxs-category-alt'></i> My Category
                   </a>
               </li>
               <li class="nav-item">
                   <a class="nav-link  {{ Request::is('dashboard/product*') ? 'active' : '' }}"
                       href="/dashboard/product">
                       <i class='bx bxl-product-hunt'></i> My Product
                   </a>
               </li>
           </ul>

       </div>
   </nav>
   <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
