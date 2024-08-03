 <style>
     :root {
        --primary: #8DC63F;
        --secondary: #231F20;
        --light: #b7b9b3;
        --dark: #909090;
    }
    @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap");
      button, button:focus {
        outline: none !important;
        box-shadow: none !important;
      }
      
      .item-name, a{
        color: var(--secondary);
      }

      a, a:hover{
        color: var(--primary);
        text-decoration: none;
      }
      .form-row {
          display: flex;
          flex-wrap: wrap;
          margin-right: -5px;
          margin-left: -5px;
      }

      .nav-link{
        color: var(--dark);

      }

      .nav-link:hover{
        color: var(--primary);

      }


      .banner{
        width: 1080px;
        height: 608px;
      }

      .col{
        border-color: white;
       
        color:white ;

      }
      .body
      {
      background-image:url('<?php echo base_url('assets/7443a31b6a19e5630b94a6538ff9bdd1.gif') ?>');
      }
      .body2
      {
      background-image:url('<?php echo base_url('assets/YsWRDA.gif') ?>');
      }


      .dropdown-toggle,a{

        color: #909090;
      }
      .btn-success{
        background-color: var(--primary);

      }

      #spinner {
          opacity: 0;
          visibility: hidden;
          transition: opacity .5s ease-out, visibility 0s linear .5s;
          z-index: 99999;
      }

      #spinner.show {
          transition: opacity .5s ease-out, visibility 0s linear 0s;
          visibility: visible;
          opacity: 1;


      }

      /* typography classes */
      .font-Montse {
        font-family: "Montserrat", cursive;
      }

      .font-size-12 {
        font-size: 12px;
      }

      .font-size-14 {
        font-size: 14px;
      }

      .font-size-16 {
        font-size: 16px;
      }

      .font-size-20 {
        font-size: 20px;
      }

      .color-primary {
        color: #231F20;
      }

      .color-primary-bg {
        background: white;
      }

      .color-secondary{
        color: #8DC63F;
      }

      .color-secondary-bg {
        background: #8DC63F;
      }

       .back-to-top {
      position: fixed;
      display: none;
      right: 45px;
      bottom: 45px;
      z-index: 99;
      }


      /*** Spinner ***/
      #spinner {
          opacity: 0;
          visibility: hidden;
          transition: opacity .5s ease-out, visibility 0s linear .5s;
          z-index: 99999;
      }

      #spinner.show {
          transition: opacity .5s ease-out, visibility 0s linear 0s;
          visibility: visible;
          opacity: 1;
      }


      /*** Button ***/
      .btn {
          border:0;
          transition: .5s;
      }

      .btn-square {
          width: 38px;
          height: 38px;
      }

      .btn-sm-square {
          width: 32px;
          height: 32px;
      }

      .btn-lg-square {
          width: 48px;
          height: 48px;
      }

      .btn-square,
      .btn-sm-square,
      .btn-lg-square {
          padding: 0;
          display: inline-flex;
          align-items: center;
          justify-content: center;
          font-weight: normal;
          border-radius: 50px;
      }
 
      }
      .table-hover>tbody>tr:hover>* {
        color:white;

      }
      /*** Layout ***/
      .sidebar {
          position: fixed;
          top: 0;
          left: 0;
          bottom: 0;
          width: 250px;
          height: 100vh;
          overflow-y: auto;
          background: white;
          transition: 0.5s;
          z-index: 999;
      }

      .content {
          margin-left: 250px;
          min-height: 100vh;
          background: #e7e7e7;
          transition: 0.5s;
      }

      @media (min-width: 992px) {
          .sidebar {
              margin-left: 0;
          }

          .sidebar.open {
              margin-left: -250px;
          }

          .content {
              width: calc(100% - 250px);
          }

          .content.open {
              width: 100%;
              margin-left: 0;
          }
      }

      @media (max-width: 991.98px) {
          .sidebar {
              margin-left: -250px;
          }

          .sidebar.open {
              margin-left: 0;
          }

          .content {
              width: 100%;
              margin-left: 0;
          }
      }

      .thead, tbody, tfoot, tr, td, th {
        border-color: black;
      }
      .th{
        border-color: black;
      }
      /*** Navbar ***/
      .sidebar .navbar .navbar-nav .nav-link {
          padding: 7px 20px;
          color: #525350;
          font-weight: 500;
          border-left: 3px solid var(--secondary);
          border-radius: 0 30px 30px 0;
          outline: none;
      }

      .sidebar .navbar .navbar-nav .nav-link:hover,
      .sidebar .navbar .navbar-nav .nav-link.active {
          color: var(--primary);
          background:#e7e7e7;
          border-color: var(--primary);
      }

      .sidebar .navbar .navbar-nav .nav-link i {
          width: 40px;
          height: 40px;
          display: inline-flex;
          align-items: center;
          justify-content: center;
          background: var(--primary);
          border-radius: 40px;
      }

      .sidebar .navbar .navbar-nav .nav-link:hover i,
      .sidebar .navbar .navbar-nav .nav-link.active i {
          background: var(--secondary);
      }
      .sidebar .navbar .navbar-nav .nav-link:hover, .sidebar .navbar .navbar-nav .nav-link.active {
          color: white;
          background:#231F20;
          border-color: var(--primary);
      }
      .sidebar .navbar .dropdown-toggle::after {
          position: absolute;
          top: 15px;
          right: 15px;
          border: none;
          content: "\f107";
          font-family: "Font Awesome 5 Free";
          font-weight: 900;
          transition: .5s;
      }

      .sidebar .navbar .dropdown-toggle[aria-expanded=true]::after {
          transform: rotate(-180deg);
      }

      .sidebar .navbar .dropdown-item {
          padding-left: 25px;
          border-radius: 0 30px 30px 0;
          color: var(--light);
      }
      .dropdown-item{
        color: white;
        font-family: "Montserrat";

      }

      .sidebar .navbar .dropdown-item:hover,
      .sidebar .navbar .dropdown-item.active {
          background: var(--light);
      }

      .content .navbar .navbar-nav .nav-link {
          margin-left: 25px;
          padding: 12px 0;
          color: var(--light);
          outline: none;
      }

      .content .navbar .navbar-nav .nav-link:hover,
      .content .navbar .navbar-nav .nav-link.active {
          color: var(--primary);
      }

      .content .navbar .sidebar-toggler,
      .content .navbar .navbar-nav .nav-link i {
          width: 40px;
          height: 40px;
          display: inline-flex;
          align-items: center;
          justify-content: center;
          background: none;
          border-radius: 40px;
      }

      .content .navbar .dropdown-item {
          color: white;
      }

      .content .navbar .dropdown-item:hover,
      .content .navbar .dropdown-item.active {
          background: white;
      }

      .content .navbar .dropdown-toggle::after {
          margin-left: 6px;
          vertical-align: middle;
          border: none;
          content: "\f107";
          font-family: "Font Awesome 5 Free";
          font-weight: 900;
          transition: .5s;
      }

      .content .navbar .dropdown-toggle[aria-expanded=true]::after {
          transform: rotate(-180deg);
      }

      @media (max-width: 575.98px) {
          .content .navbar .navbar-nav .nav-link {
              margin-left: 15px;
          }
      }


      /*** Date Picker ***/
      .bootstrap-datetimepicker-widget.bottom {
          top: auto !important;
      }

      .bootstrap-datetimepicker-widget .table * {
          border-bottom-width: 0px;
      }

      .bootstrap-datetimepicker-widget .table th {
          font-weight: 500;
      }

      .bootstrap-datetimepicker-widget.dropdown-menu {
          padding: 10px;
          border-radius: 2px;
      }

      .bootstrap-datetimepicker-widget table td.active,
      .bootstrap-datetimepicker-widget table td.active:hover {
          background: var(--primary);
      }

      .bootstrap-datetimepicker-widget table td.today::before {
          border-bottom-color: var(--primary);
      }


      /*** Testimonial ***/
      .progress .progress-bar {
          width: 0px;
          transition: 2s;
      }


      /*** Testimonial ***/
      .testimonial-carousel .owl-dots {
          margin-top: 24px;
          display: flex;
          align-items: flex-end;
          justify-content: center;
      }

      .testimonial-carousel .owl-dot {
          position: relative;
          display: inline-block;
          margin: 0 5px;
          width: 15px;
          height: 15px;
          border: 5px solid var(--primary);
          border-radius: 15px;
          transition: .5s;
      }

      .testimonial-carousel .owl-dot.active {
          background: var(--dark);
          border-color: var(--primary);
      }

      /* The Modal (background) */
      .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      }

      /* Modal Content */
      .modal-content {
        font-family: 'montserrat';
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        width: 30%;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
      }

      /* Add Animation */
      @-webkit-keyframes animatetop {
        from {top:-300px; opacity:0} 
        to {top:0; opacity:1}
      }

      @keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
      }

      /* The Close Button */
      .close {
        color: var(--secondary);
        float: right;
        font-size: 28px;
        font-weight: bold;
      }

      .close:hover,
      .close:focus {
        color:var(--primary);
        text-decoration: none;
        cursor: pointer;
      }

      .modal-header {
        flex-direction: row-reverse;
        padding: 2px 16px;
        background-color: var(--secondary);
        color: whitesmoke;
      }

      .modal-body {padding: 2px 16px;}

      .modal-footer {
        padding: 2px 16px;
        background-color: whitesmoke;
        color: whitesmoke;
      }
      #footer {
         position:static;
         left:0px;
         bottom:0px;
         height:150px;
         width:100%;
         background:#999;
      }

      .thead, tbody, tfoot, tr, td, th {
          border-color: var(--dark);
      }

      .profilebody {
          background: rgb(99, 39, 120)
      }

      .form-control:focus {
          box-shadow: none;
          border-color: #BA68C8
      }

      .profile-button {
          background: rgb(99, 39, 120);
          box-shadow: none;
          border: none
      }

      .profile-button:hover {
          background: #682773
      }

      .profile-button:focus {
          background: #682773;
          box-shadow: none
      }

      .profile-button:active {
          background: #682773;
          box-shadow: none
      }

      .back:hover {
          color: #682773;
          cursor: pointer
      }

      .labels {
          font-size: 11px
      }

      .add-experience:hover {
          background: #BA68C8;
          color: #fff;
          cursor: pointer;
          border: solid 1px #BA68C8
      }








  </style>
</head>