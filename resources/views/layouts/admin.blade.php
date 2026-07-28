<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--favicon-->
	@php $appSettings = application(); @endphp
	<link rel="icon" href="{{ $appSettings && !empty($appSettings->fav_icon) ? asset('images/application/'.$appSettings->fav_icon) : asset('images/application/ornab-logo.png') }}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
	<link href="{{ asset('admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('admin/assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('admin/assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('admin/assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('admin/assets/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('admin/assets/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('admin/assets/css/header-colors.css') }}" />
    <style>
        /* ----------------------------------------------------------------- */
        /* PREMIUM BRANDING OVERRIDE - TRUST & AUTHORITY THEME               */
        /* ----------------------------------------------------------------- */
        
        :root {
            --brand-navy: #102A43;
            --brand-slate: #627D98;
            --brand-gold: #F0B429;
            --brand-white: #ffffff;
            --brand-bg-light: #f8f9fa; /* Clean light gray for content area */
			--brand-sidebar-green: #2E8B66;
			--brand-sidebar-green-dark: #257052;
			--sidebar-hover-overlay: rgba(255, 255, 255, 0.12);
        }

        body {
            background-color: var(--brand-bg-light);
            font-family: 'Roboto', sans-serif;
            color: var(--brand-navy);
        }

        /* SIDEBAR - COLORFUL & MODERN */
        .sidebar-wrapper {
			background-color: var(--brand-sidebar-green) !important;
			border-right: 1px solid rgba(255,255,255,0.12);
			background-image: linear-gradient(180deg, var(--brand-sidebar-green) 0%, var(--brand-sidebar-green-dark) 100%);
        }


        /* COLORFUL ICONS STRATEGY */
		/* Submenu accent colors inherit from the parent top-level item */
		.sidebar-wrapper .metismenu > li { --submenu-accent: rgba(255,255,255,0.95); }
		.sidebar-wrapper .metismenu > li:nth-child(1) { --submenu-accent: #007bff; }
		.sidebar-wrapper .metismenu > li:nth-child(2) { --submenu-accent: #6f42c1; }
		.sidebar-wrapper .metismenu > li:nth-child(3) { --submenu-accent: #17a2b8; }
		.sidebar-wrapper .metismenu > li:nth-child(4) { --submenu-accent: #fd7e14; }
		.sidebar-wrapper .metismenu > li:nth-child(5) { --submenu-accent: #28a745; }
		.sidebar-wrapper .metismenu > li:nth-child(6) { --submenu-accent: #e83e8c; }
		.sidebar-wrapper .metismenu > li:nth-child(n+7) { --submenu-accent: var(--brand-gold); }

        /* ============================================= */
        /* EACH SIDEBAR ITEM - DISTINCT VIBRANT COLOR     */
        /* ============================================= */
        /* 1. Dashboard - Royal Blue */
        .sidebar-wrapper .metismenu > li:nth-child(1) .parent-icon { color: #4A90D9; }
        .sidebar-wrapper .metismenu > li:nth-child(1).mm-active > a { 
            background: linear-gradient(45deg, #4A90D9, #357ABD); box-shadow: 0 4px 10px rgba(74, 144, 217, 0.3); 
        }
        /* 2. Slider - Amethyst Purple */
        .sidebar-wrapper .metismenu > li:nth-child(2) .parent-icon { color: #9B59B6; }
        .sidebar-wrapper .metismenu > li:nth-child(2).mm-active > a { 
            background: linear-gradient(45deg, #9B59B6, #7D3C98); box-shadow: 0 4px 10px rgba(155, 89, 182, 0.3); 
        }
        /* 3. Projects - Coral Red */
        .sidebar-wrapper .metismenu > li:nth-child(3) .parent-icon { color: #E74C3C; }
        .sidebar-wrapper .metismenu > li:nth-child(3).mm-active > a { 
            background: linear-gradient(45deg, #E74C3C, #C0392B); box-shadow: 0 4px 10px rgba(231, 76, 60, 0.3); 
        }
        /* 4. Latest News - Golden Yellow */
        .sidebar-wrapper .metismenu > li:nth-child(4) .parent-icon { color: #F1C40F; }
        .sidebar-wrapper .metismenu > li:nth-child(4).mm-active > a { 
            background: linear-gradient(45deg, #F1C40F, #D4AC0D); box-shadow: 0 4px 10px rgba(241, 196, 15, 0.3); 
        }
        /* 5. Photo Gallery - Emerald Green */
        .sidebar-wrapper .metismenu > li:nth-child(5) .parent-icon { color: #2ECC71; }
        .sidebar-wrapper .metismenu > li:nth-child(5).mm-active > a { 
            background: linear-gradient(45deg, #2ECC71, #27AE60); box-shadow: 0 4px 10px rgba(46, 204, 113, 0.3); 
        }
        /* 6. YouTube Videos - Red */
        .sidebar-wrapper .metismenu > li:nth-child(6) .parent-icon { color: #E74C3C; }
        .sidebar-wrapper .metismenu > li:nth-child(6).mm-active > a { 
            background: linear-gradient(45deg, #E74C3C, #C0392B); box-shadow: 0 4px 10px rgba(231, 76, 60, 0.3); 
        }
        /* 7. Publications - Teal */
        .sidebar-wrapper .metismenu > li:nth-child(7) .parent-icon { color: #1ABC9C; }
        .sidebar-wrapper .metismenu > li:nth-child(7).mm-active > a { 
            background: linear-gradient(45deg, #1ABC9C, #16A085); box-shadow: 0 4px 10px rgba(26, 188, 156, 0.3); 
        }
        /* 8. Strategic Plan - Deep Purple */
        .sidebar-wrapper .metismenu > li:nth-child(8) .parent-icon { color: #8E44AD; }
        .sidebar-wrapper .metismenu > li:nth-child(8).mm-active > a { 
            background: linear-gradient(45deg, #8E44AD, #6C3483); box-shadow: 0 4px 10px rgba(142, 68, 173, 0.3); 
        }
        /* 9. Policy & Guideline - Dark Orange */
        .sidebar-wrapper .metismenu > li:nth-child(9) .parent-icon { color: #E67E22; }
        .sidebar-wrapper .metismenu > li:nth-child(9).mm-active > a { 
            background: linear-gradient(45deg, #E67E22, #CA6F1E); box-shadow: 0 4px 10px rgba(230, 126, 34, 0.3); 
        }
        /* 10. Team Members - Sky Blue */
        .sidebar-wrapper .metismenu > li:nth-child(10) .parent-icon { color: #3498DB; }
        .sidebar-wrapper .metismenu > li:nth-child(10).mm-active > a { 
            background: linear-gradient(45deg, #3498DB, #2E86C1); box-shadow: 0 4px 10px rgba(52, 152, 219, 0.3); 
        }
        /* 11. Origin & Legal - Pink */
        .sidebar-wrapper .metismenu > li:nth-child(11) .parent-icon { color: #FD79A8; }
        .sidebar-wrapper .metismenu > li:nth-child(11).mm-active > a { 
            background: linear-gradient(45deg, #FD79A8, #E84393); box-shadow: 0 4px 10px rgba(253, 121, 168, 0.3); 
        }
        /* 12. Transparency - Mint Green */
        .sidebar-wrapper .metismenu > li:nth-child(12) .parent-icon { color: #00B894; }
        .sidebar-wrapper .metismenu > li:nth-child(12).mm-active > a { 
            background: linear-gradient(45deg, #00B894, #00A381); box-shadow: 0 4px 10px rgba(0, 184, 148, 0.3); 
        }
        /* 13. Subscribe - Orange */
        .sidebar-wrapper .metismenu > li:nth-child(13) .parent-icon { color: #F39C12; }
        .sidebar-wrapper .metismenu > li:nth-child(13).mm-active > a { 
            background: linear-gradient(45deg, #F39C12, #D68910); box-shadow: 0 4px 10px rgba(243, 156, 18, 0.3); 
        }
        /* 14. Donate Now - Rose Red */
        .sidebar-wrapper .metismenu > li:nth-child(14) .parent-icon { color: #E84393; }
        .sidebar-wrapper .metismenu > li:nth-child(14).mm-active > a { 
            background: linear-gradient(45deg, #E84393, #C44569); box-shadow: 0 4px 10px rgba(232, 67, 147, 0.3); 
        }
        /* 15. Messages - Ocean Blue */
        .sidebar-wrapper .metismenu > li:nth-child(15) .parent-icon { color: #0984E3; }
        .sidebar-wrapper .metismenu > li:nth-child(15).mm-active > a { 
            background: linear-gradient(45deg, #0984E3, #0871C2); box-shadow: 0 4px 10px rgba(9, 132, 227, 0.3); 
        }
        /* 16. Settings - Gray/Steel */
        .sidebar-wrapper .metismenu > li:nth-child(16) .parent-icon { color: #636E72; }
        .sidebar-wrapper .metismenu > li:nth-child(16).mm-active > a { 
            background: linear-gradient(45deg, #636E72, #4B5358); box-shadow: 0 4px 10px rgba(99, 110, 114, 0.3); 
        }
        /* 17. Impact - Lime Green */
        .sidebar-wrapper .metismenu > li:nth-child(17) .parent-icon { color: #A29BFE; }
        .sidebar-wrapper .metismenu > li:nth-child(17).mm-active > a { 
            background: linear-gradient(45deg, #A29BFE, #6C5CE7); box-shadow: 0 4px 10px rgba(108, 92, 231, 0.3); 
        }
        /* 18. About Us - Cyan */
        .sidebar-wrapper .metismenu > li:nth-child(18) .parent-icon { color: #00CEC9; }
        .sidebar-wrapper .metismenu > li:nth-child(18).mm-active > a { 
            background: linear-gradient(45deg, #00CEC9, #00B3AE); box-shadow: 0 4px 10px rgba(0, 206, 201, 0.3); 
        }
        /* 19. Board of Directors - Deep Gold */
        .sidebar-wrapper .metismenu > li:nth-child(19) .parent-icon { color: #D4AC0D; }
        .sidebar-wrapper .metismenu > li:nth-child(19).mm-active > a { 
            background: linear-gradient(45deg, #D4AC0D, #B7950B); box-shadow: 0 4px 10px rgba(212, 172, 13, 0.3); 
        }
        /* 20. Career - Purple Pink */
        .sidebar-wrapper .metismenu > li:nth-child(20) .parent-icon { color: #A55EEA; }
        .sidebar-wrapper .metismenu > li:nth-child(20).mm-active > a { 
            background: linear-gradient(45deg, #A55EEA, #8854D0); box-shadow: 0 4px 10px rgba(165, 94, 234, 0.3); 
        }
        /* 21. Contact - Soft Red */
        .sidebar-wrapper .metismenu > li:nth-child(21) .parent-icon { color: #FC427B; }
        .sidebar-wrapper .metismenu > li:nth-child(21).mm-active > a { 
            background: linear-gradient(45deg, #FC427B, #E84393); box-shadow: 0 4px 10px rgba(252, 66, 123, 0.3); 
        }
        /* 22. Focus Area - Bright Cyan */
        .sidebar-wrapper .metismenu > li:nth-child(22) .parent-icon { color: #00B8D4; }
        .sidebar-wrapper .metismenu > li:nth-child(22).mm-active > a { 
            background: linear-gradient(45deg, #00B8D4, #0097A7); box-shadow: 0 4px 10px rgba(0, 184, 212, 0.3); 
        }
        /* 23. Logout - Light Slate */
        .sidebar-wrapper .metismenu > li:nth-child(23) .parent-icon { color: rgba(255,255,255,0.7); }
        .sidebar-wrapper .metismenu > li:nth-child(23).mm-active > a { 
            background: linear-gradient(45deg, #bdc3c7, #95a5a6); box-shadow: 0 4px 10px rgba(149, 165, 166, 0.3); 
        }

        /* All items hover effect */
        .sidebar-wrapper .metismenu > li a:hover { 
            color: rgba(255,255,255,0.95) !important; 
            background-color: var(--sidebar-hover-overlay); 
        }
        /* Active item text always white */
        .sidebar-wrapper .metismenu > li.mm-active > a .parent-icon { color: #ffffff !important; }
        .sidebar-wrapper .metismenu > li.mm-active > a .menu-title { color: #ffffff !important; }
        .sidebar-wrapper .metismenu > li.mm-active > a { transform: scale(1.02); }

        .sidebar-header {
			background-color: var(--brand-sidebar-green) !important;
			border-bottom: 1px solid rgba(255,255,255,0.12);
        }

		.sidebar-header .logo-icon {
			width: 52px;
			height: 52px;
			object-fit: contain;
            border-radius: 50%;
            border: 2px solid white;
		}

        .logo-text {
            color: #fff !important;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        /* MENU ITEMS - INTERACTIVE & GLASSY */
        .sidebar-wrapper .metismenu {
            padding: 15px 10px;
            background: transparent;
        }

        .sidebar-wrapper .metismenu a {
			color: rgba(255,255,255,0.92);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1); /* Bouncy transition */
            position: relative;
            border-radius: 12px; /* Soft rounded pill */
            margin-bottom: 8px;
            border: 1px solid transparent;
            font-weight: 600;
            padding: 12px 15px;
            /* overflow: hidden; Removed to fix text clipping */
            z-index: 1;
        }
        
        /* Shimmer Effect on Hover - Adjusted z-index */
        .sidebar-wrapper .metismenu a::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0%; /* Start width 0 instead of left -100% */
            height: 100%;
            background: linear-gradient(90deg, rgba(255,255,255,0.1), rgba(255,255,255,0.4), rgba(255,255,255,0.1));
            transition: width 0.5s;
            z-index: -1;
            border-radius: 12px;
        }

        .sidebar-wrapper .metismenu a:hover::before {
            width: 100%;
        }

        /* Active State Text - Always White */
        .sidebar-wrapper .metismenu .mm-active > a {
            color: #ffffff !important;
            transform: scale(1.02); /* Slight pop */
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        /* Parent Icon Animation */
        .sidebar-wrapper .metismenu .parent-icon {
            font-size: 22px;
            margin-right: 15px;
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
        }

        .sidebar-wrapper .metismenu a:hover .parent-icon {
            transform: scale(1.2); /* Just scale */
        }
    
        .sidebar-wrapper .metismenu .mm-active > a .parent-icon {
            color: #ffffff !important; 
            transform: scale(1.1);
        }

        /* SUBMENUS (SUN LIST) - ELEGANT DESIGN */
        .sidebar-wrapper .metismenu ul {
			background: rgba(255, 255, 255, 0.08) !important; /* Airy overlay on green */
            padding: 5px 10px 5px 20px;
			border-left: 1px solid rgba(255,255,255,0.18); /* Subtle separator */
            margin-left: 15px;
            position: relative;
        }

        .sidebar-wrapper .metismenu ul a {
            padding: 10px 15px;
            font-size: 0.88em;
			color: rgba(255,255,255,0.88);
            border-radius: 8px; /* Soft rounded rectangle */
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            position: relative;
            background: transparent;
        }

        /* Tiny dot icon */
        .sidebar-wrapper .metismenu ul a i {
            display: none; /* Hide default icon to use custom CSS shape */
        }
        
        /* Custom Dot */
        .sidebar-wrapper .metismenu ul a::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
			background-color: rgba(255,255,255,0.55);
            margin-right: 12px;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        /* Submenu Hover */
        .sidebar-wrapper .metismenu ul a:hover {
			color: rgba(255,255,255,0.95) !important;
			background-color: var(--sidebar-hover-overlay);
            font-weight: 500;
            transform: translateX(3px);
			box-shadow: none;
        }

        .sidebar-wrapper .metismenu ul a:hover::before {
			background-color: var(--submenu-accent);
            transform: scale(1.5);
			box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.14); /* Soft ring */
        }
        
        /* Submenu Active */
        .sidebar-wrapper .metismenu ul .mm-active > a {
			color: rgba(255,255,255,0.98) !important;
			font-weight: 700;
			background-color: rgba(255, 255, 255, 0.14);
			box-shadow: none;
        }

        .sidebar-wrapper .metismenu ul .mm-active > a::before {
			background-color: var(--submenu-accent);
            width: 8px;
            height: 8px;
			box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.14); /* Soft ring */
        }


        /* SCROLLBAR & ARROWS */
        .sidebar-wrapper .metismenu .has-arrow::after {
			border-color: rgba(255,255,255,0.7);
        }
        
        .sidebar-wrapper .metismenu a:hover .has-arrow::after {
			 border-color: rgba(255,255,255,0.9);
        }

        .sidebar-wrapper .metismenu .mm-active > .has-arrow::after {
            border-color: #ffffff;
        }


        /* ----------------------------------------------------------------- */
        /* GLOBAL CONTENT DESIGN UPGRADE (Tables, Cards, Forms)               */
        /* ----------------------------------------------------------------- */

        /* Premium Card Design for Content Pages */
        .page-content .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.03); /* Soft, airy shadow */
            transition: transform 0.3s;
            margin-bottom: 24px;
            position: relative;
            overflow: hidden;
            border-top: 4px solid transparent; /* Placeholder for color */
            background-clip: padding-box; /* Ensures background doesn't bleed */
        }

        /* Colorful Top Borders */
        .page-content .card:nth-of-type(4n+1) { border-top-color: #007bff; } /* Blue */
        .page-content .card:nth-of-type(4n+2) { border-top-color: #6f42c1; } /* Purple */
        .page-content .card:nth-of-type(4n+3) { border-top-color: #fd7e14; } /* Orange */
        .page-content .card:nth-of-type(4n+4) { border-top-color: #20c997; } /* Teal */
        
        .page-content .card-header {
            background-color: #fff;
            border-bottom: 1px solid #edf2f7;
            padding: 1.25rem 1.5rem;
            border-radius: 8px 8px 0 0;
        }

        .page-content .card-header h5, 
        .page-content .card-header h6 {
            margin-bottom: 0;
            color: var(--brand-navy);
            font-weight: 600;
        }

        /* Modern Table Design - Clean & Trustworthy */
        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
        }

        .table thead th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            color: var(--brand-slate); /* Slate text for headers */
            background-color: #f8f9fa; /* Light gray header */
            border-bottom: 2px solid #edf2f7;
            padding: 15px;
        }

        .table tbody td {
            vertical-align: middle;
            color: var(--brand-navy); /* Dark text for data */
            font-size: 0.95rem;
            padding: 15px;
            border-bottom: 1px solid #f0f4f8;
        }
        
        /* Table Row Hover */
        .table-hover tbody tr:hover {
            background-color: #f1f5f9; /* Slate tint on hover */
            transform: scale(1); /* No scale, just color change for stability */
        }

        /* Button Upgrades */
        .btn {
            border-radius: 4px; /* Professional square-ish corners */
            font-weight: 500;
            letter-spacing: 0.3px;
            padding: 0.5rem 1rem;
        }

        /* Primary Action Button (Navy) */
        .btn-primary {
            background-color: var(--brand-navy);
            border-color: var(--brand-navy);
            box-shadow: 0 4px 6px rgba(16, 42, 67, 0.2);
        }

        .btn-primary:hover {
            background-color: #0a1c2e; /* Darker Navy */
            border-color: #0a1c2e;
            transform: translateY(-1px);
        }

        /* Secondary Action / Warning (Gold) */
        .btn-warning {
            background-color: var(--brand-gold);
            border-color: var(--brand-gold);
            color: #fff;
        }

        .btn-warning:hover {
            background-color: #d9a220;
            border-color: #d9a220;
            color: #fff;
        }

        /* Small Action Buttons in Tables */
        .btn-sm {
            padding: 0.25rem 0.75rem;
            font-size: 0.8rem;
        }
        
        /* Edit/Delete specific styling override */
        .btn-outline-primary {
            color: var(--brand-navy);
            border-color: var(--brand-navy);
        }
        .btn-outline-primary:hover {
            background-color: var(--brand-navy);
            color: #fff;
        }

        /* Form Inputs */
        .form-control, .form-select {
            border: 1px solid #cbd5e0; /* Slate border */
            border-radius: 4px;
            padding: 0.6rem 1rem;
            color: var(--brand-navy);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--brand-navy);
            box-shadow: 0 0 0 3px rgba(16, 42, 67, 0.1); /* Navy glow */
        }

        /* HEADER & TOPBAR - Clean & Minimal */
        header .topbar {
            background-color: #ffffff;
            box-shadow: 0 1px 10px rgba(0,0,0,0.05); /* Soft shadow */
            height: 60px;
        }

        .mobile-toggle-menu {
            color: var(--brand-navy); /* Ensure menu icon is visible */
            background-color: rgba(16, 42, 67, 0.05);
            border-radius: 4px;
        }

        /* User Box in Header */
        .user-box .user-info .user-name {
            color: var(--brand-navy);
            font-weight: 600;
        }
        
        .user-box .user-info .designattion {
            color: var(--brand-slate);
        }

        /* ----------------------------------------------------------------- */
        /* ANIMATIONS & INTERACTIVITY                                        */
        /* ----------------------------------------------------------------- */
        
        /* 1. Sidebar Entry Animation */
        @keyframes slideInMenuItem {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .sidebar-wrapper .metismenu > li {
            animation: slideInMenuItem 0.5s ease-out forwards;
            opacity: 0; /* Hidden initially */
        }
        
        /* Stagger the animation for a cascading effect */
        .sidebar-wrapper .metismenu > li:nth-child(1) { animation-delay: 0.1s; }
        .sidebar-wrapper .metismenu > li:nth-child(2) { animation-delay: 0.15s; }
        .sidebar-wrapper .metismenu > li:nth-child(3) { animation-delay: 0.2s; }
        .sidebar-wrapper .metismenu > li:nth-child(4) { animation-delay: 0.25s; }
        .sidebar-wrapper .metismenu > li:nth-child(5) { animation-delay: 0.3s; }
        .sidebar-wrapper .metismenu > li:nth-child(6) { animation-delay: 0.35s; }
        .sidebar-wrapper .metismenu > li:nth-child(7) { animation-delay: 0.4s; }
        .sidebar-wrapper .metismenu > li:nth-child(8) { animation-delay: 0.45s; }
        .sidebar-wrapper .metismenu > li:nth-child(9) { animation-delay: 0.5s; }
        .sidebar-wrapper .metismenu > li:nth-child(10) { animation-delay: 0.55s; }

        /* 2. Main Content Fade In */
        @keyframes fadeInPage {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .page-wrapper {
            animation: fadeInPage 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
        }

        /* 3. Card Hover Lift */
        .page-content .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.08); /* Expanded shadow on lift */
        }
        
        /* 4. Button Press Effect */
        .btn:active {
            transform: scale(0.97);
        }

        .btn-danger.btn-sm {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: none;
        }

        .btn-danger.btn-sm:hover {
            background-color: #dc3545;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.2);
        }
        
        /* Image Styling in Tables */
        .table img {
            border-radius: 6px; /* Smooth corners for thumbnails */
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
    </style>
	<title>Ornab Coxs Bazar | Admin Panel</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ $appSettings && !empty($appSettings->main_logo) ? asset('images/application/'.$appSettings->main_logo) : asset('images/application/ornab-logo.png') }}" class="logo-icon" alt="Ornab Coxs Bazar logo">
				</div>
				<div>
				<h4 class="logo-text">Ornab Cox's Bazar</h4>
				</div>
                <!-- Toggle Icon - White/Gold -->
				<div class="toggle-icon ms-auto"><i class='bx bx-menu text-white'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
			<li>
				<a href="{{ route('admin.home') }}">
					<div class="parent-icon"><i class='bx bx-home-circle'></i>
					</div>
					<div class="menu-title">{{ 'Dashboard' }}</div>
				</a>
			</li>
		<li>
			<a href="{{ route('slider.index') }}">
					<div class="parent-icon"><i class="fadeIn animated bx bx-slider-alt"></i>
					</div>
					<div class="menu-title">{{ 'Slider' }}</div>
				</a>
			</li>

		<li>
			<a href="{{ route('admin.projects.index') }}">
					<div class="parent-icon"><i class="fadeIn animated bx bx-shape-square"></i>
					</div>
					<div class="menu-title">{{ 'Projects' }}</div>
				</a>
			</li>
		<li>
			<a href="{{ route('news.index') }}">
					<div class="parent-icon"><i class="fadeIn animated bx bx-news"></i>
					</div>
					<div class="menu-title">{{ 'Latest News' }}</div>
				</a>
			</li>
		<li>
			<a href="{{ route('gallery.index') }}">
				<div class="parent-icon"><i class="lni lni-image"></i>
				</div>
				<div class="menu-title">{{ 'Photo Gallery' }}</div>
			</a>
		</li>
		<li>
			<a href="{{ route('youtube.index') }}">
					<div class="parent-icon"><i class="fadeIn animated bx bxl-youtube"></i>
					</div>
					<div class="menu-title">{{ 'YouTube Videos' }}</div>
				</a>
			</li>
		<li>
			<a href="{{ route('publications.index') }}">
					<div class="parent-icon"><i class="fadeIn animated bx bx-file-blank"></i>
					</div>
					<div class="menu-title">{{ 'Publications' }}</div>
				</a>
			</li>
		<li>
			<a href="{{ route('strategic_plans.index') }}">
				<div class="parent-icon"><i class="fadeIn animated bx bx-map-alt"></i>
				</div>
				<div class="menu-title">{{ 'Strategic Plan' }}</div>
			</a>
		</li>
		<li>
			<a href="{{ route('policy.index') }}">
				<div class="parent-icon"><i class="fadeIn animated bx bx-book-content"></i>
				</div>
				<div class="menu-title">{{ 'Policy & Guideline' }}</div>
			</a>
		</li>
		<li>
				<a href="{{ route('team.index') }}">
					<div class="parent-icon"><i class="bx bx-group"></i>
					</div>
					<div class="menu-title">{{ 'Team Members' }}</div>
				</a>
			</li>
			<li>
				<a href="{{ route('origin.legal_affilation.index') }}">
					<div class="parent-icon"><i class="bx bx-file-blank"></i>
					</div>
					<div class="menu-title">{{ 'Origin & Legal Affiliation' }}</div>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.legal_registrations.index') }}">
					<div class="parent-icon"><i class="bx bx-certification"></i>
					</div>
					<div class="menu-title">{{ 'Legal Registration Status' }}</div>
				</a>
			</li>
 			<li>
 				<a href="javascript:;" class="has-arrow">
 					<div class="parent-icon"><i class="bx bx-check-shield"></i>
 					</div>
 					<div class="menu-title">{{ 'Transparency' }}</div>
 				</a>
 				<ul>
 					<li><a href="{{ route('admin.annual_reports.index') }}"><i class="bx bx-right-arrow-alt"></i>Annual Reports</a></li>
 					<li><a href="{{ route('admin.financial_statements.index') }}"><i class="bx bx-right-arrow-alt"></i>Financial Statements</a></li>
 				</ul>
 			</li>
			<li>
				<a href="{{ route('subscribe.all') }}">
					<div class="parent-icon"><i class="fadeIn animated bx bx-bell"></i>
					</div>
					<div class="menu-title">{{ 'Subscribe' }}</div>
				</a>
			</li>
		<li>
			<a href="{{ route('admin.donations.index') }}">
				<div class="parent-icon"><i class="fadeIn animated bx bx-donate-heart"></i>
				</div>
				<div class="menu-title">{{ 'Donate Now' }}</div>
			</a>
		</li>
		<li>
			<a href="{{ route('message.index') }}">
				<div class="parent-icon"><i class="fadeIn animated bx bx-message-detail"></i>
				</div>
				<div class="menu-title">{{ 'Messages' }}</div>
			</a>
		</li>
		<li>
			<a href="{{ route('logo.create') }}">
					<div class="parent-icon"><i class='bx bx-cog'></i>
					</div>
					<div class="menu-title">{{ 'Settings' }}</div>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.impact') }}">
					<div class="parent-icon"><i class='bx bx-bar-chart-alt-2'></i>
					</div>
					<div class="menu-title">{{ 'Impact' }}</div>
				</a>
			</li>
				{{-- <li>
					<a href="{{ route('logo.create') }}">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Application</div>
					</a>
				</li> --}}
			<li>
				<a href="{{ route('about.us.edit') }}">
					<div class="parent-icon"><i class='bx bx-info-circle'></i>
					</div>
					<div class="menu-title">{{ 'About Us' }}</div>
				</a>
			</li>
				<li>
					<a href="{{ route('admin.board_of_directors.index') }}">
						<div class="parent-icon"><i class='bx bx-group'></i>
						</div>
						<div class="menu-title">Board of Directors</div>
					</a>
				</li>
			<li>
				<a href="{{ route('invoked.index') }}">
					<div class="parent-icon"><i class='fadeIn animated bx bx-star'></i>
					</div>
					<div class="menu-title">{{ 'Career' }}</div>
				</a>
			</li>
			<li>
				<a href="{{ route('contact.index') }}">
					<div class="parent-icon"><i class='fadeIn animated bx bx-phone-call'></i>
					</div>
					<div class="menu-title">{{ 'Contact' }}</div>
				</a>
			</li>
		<li>
 			<a href="{{ route('faq.index') }}">
 				<div class="parent-icon"><i class='bx bx-help-circle'></i>
 				</div>
 				<div class="menu-title">{{ 'FAQ' }}</div>
 			</a>
 		</li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="parent-icon"><i class='bx bx-log-out-circle'></i>
                        </div>
						<div class="menu-title">{{ 'Logout' }}</div>
                    </a>
                </li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">

					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>
							{{-- <li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	<i class='bx bx-category'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div class="row row-cols-3 g-3 p-3">
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i>
											</div>
											<div class="app-title">Teams</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-atom'></i>
											</div>
											<div class="app-title">Projects</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-shield'></i>
											</div>
											<div class="app-title">Tasks</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-kyoto text-dark"><i class='bx bx-notification'></i>
											</div>
											<div class="app-title">Feeds</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-blues text-dark"><i class='bx bx-file'></i>
											</div>
											<div class="app-title">Files</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-moonlit text-white"><i class='bx bx-filter-alt'></i>
											</div>
											<div class="app-title">Alerts</div>
										</div>
									</div>
								</div>
							</li> --}}
							<li class="nav-item dropdown dropdown-large d-none">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a >
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-notifications-list">
                                        <p class="text-center mt-3">No new notifications</p>
									</div>
									<a >
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large d-none">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a >
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">
                                        <p class="text-center mt-3">No new messages</p>
									</div>
									<a >
										<div class="text-center msg-footer">View All Messages</div>
									</a>
								</div>
							</li>
						</ul>
					</div>

						<li class="nav-item d-none d-md-flex align-items-center me-2">
						</li>
						<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="bx bx-user"></i>
							<div class="user-info ps-3">
								<p class="user-name mb-0">{{ Auth::user()->name }}</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							{{-- <li><a class="dropdown-item" ><i class="bx bx-user"></i><span>Profile</span></a>
							</li> --}}
							{{-- <li>
								<div class="dropdown-divider mb-0"></div>
							</li> --}}
							<li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class='bx bx-log-out-circle'></i>
                                    <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">

                @yield('content')

            </div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © {{ @date('Y') }}. All right reserved Ornab Cox's Bazar</p>
		</footer>
	</div>
	<!--end wrapper-->


	<!-- Bootstrap JS -->
	<script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/jquery-knob/excanvas.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
	  <script>
		  $(function() {
			  $(".knob").knob();
		  });
	  </script>
	  <script src="{{ asset('admin/assets/js/index.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('admin/assets/js/app.js') }}"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function(){
            // --- Admin Search Functionality (Sidebar Menu Filter) ---
            $(".search-control").on("keyup", function() {
                var query = $(this).val().toLowerCase().trim();
                var hasQuery = query.length > 0;

                // Get all top-level sidebar items
                $("#menu > li").each(function() {
                    var $li = $(this);
                    var $menuTitle = $li.find("> a .menu-title");
                    var menuText = $menuTitle.text().toLowerCase();
                    var $submenu = $li.find("> ul");

                    // Check top-level match
                    var topMatch = menuText.indexOf(query) > -1;

                    if (hasQuery) {
                        // Check submenu items
                        var subMatch = false;
                        if ($submenu.length) {
                            $submenu.find("li a").each(function() {
                                var subText = $(this).text().toLowerCase();
                                var matches = subText.indexOf(query) > -1;
                                $(this).toggle(matches);
                                if (matches) subMatch = true;
                            });
                        }

                        // Show/hide the top li based on match
                        if (topMatch || subMatch) {
                            $li.show();
                            // Highlight the matching text
                            if (topMatch) {
                                $li.addClass("search-match");
                                $menuTitle.html(highlightText($menuTitle.text(), query));
                            } else {
                                $li.removeClass("search-match");
                                $menuTitle.html($menuTitle.text());
                            }
                            // Expand submenu if sub-items match
                            if (subMatch && $submenu.length) {
                                $submenu.addClass("mm-show");
                                $li.addClass("mm-active");
                            } else if ($submenu.length) {
                                $submenu.removeClass("mm-show");
                                $li.removeClass("mm-active");
                            }
                        } else {
                            $li.hide();
                            $menuTitle.html($menuTitle.text());
                        }
                    } else {
                        // Reset all
                        $li.show();
                        $menuTitle.html($menuTitle.text());
                        $submenu.find("li a").show();
                        $submenu.removeClass("mm-show");
                        $li.removeClass("mm-active search-match");
                        // Re-apply default active state
                        var current = window.location.href;
                        var $link = $li.find("> a").filter(function() {
                            return this.href == current;
                        });
                        if ($link.length) {
                            $li.addClass("mm-active");
                            var $parentUl = $li.parent("ul");
                            if ($parentUl.length) {
                                $parentUl.addClass("mm-show");
                                $parentUl.closest("li").addClass("mm-active");
                            }
                        }
                    }
                });

                // Show/hide "no results" message
                var visibleItems = $("#menu > li:visible").length;
                if (hasQuery && visibleItems === 0) {
                    if ($("#search-no-results").length === 0) {
                        $("#menu").append('<li id="search-no-results" style="padding:20px;text-align:center;color:rgba(255,255,255,0.5);font-size:0.9rem;"><i class="bx bx-search-alt mb-2" style="font-size:2rem;display:block;"></i>No menu items found</li>');
                    }
                } else {
                    $("#search-no-results").remove();
                }
            });

            // Helper: highlight matching text
            function highlightText(text, query) {
                var idx = text.toLowerCase().indexOf(query);
                if (idx === -1) return text;
                var before = text.substring(0, idx);
                var match = text.substring(idx, idx + query.length);
                var after = text.substring(idx + query.length);
                return before + '<span class="search-highlight">' + match + '</span>' + after;
            }

            // --- 1. SweetAlert2 Delete Confirmation ---
            // Intercept any link with 'delete' in its href
            $(document).on('click', 'a[href*="delete"]', function(e){
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#F0B429', // Brand Gold
                    cancelButtonColor: '#627D98', // Brand Slate
                    confirmButtonText: '<span style="color:#102A43; font-weight:bold;">Yes, delete it!</span>',
                    cancelButtonText: 'Cancel',
                    background: '#ffffff',
                    color: '#102A43', // Brand Navy Text
                    iconColor: '#F0B429', // Brand Gold Icon
                    width: '300px', // Smaller width
                    padding: '1em', // Compact padding
                    customClass: {
                        popup: 'animated fadeInDown', // Animation
                        title: 'fs-5', // Smaller title
                        content: 'small' // Smaller text
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                    }
                })
            });

            // --- 2. Sidebar Scroll Position Fix ---
			function getSidebarScrollEl() {
				return document.querySelector('.sidebar-wrapper .simplebar-content-wrapper')
					|| document.querySelector('.sidebar-wrapper');
			}

			function restoreSidebarScroll() {
				var sidebar = getSidebarScrollEl();
				if (!sidebar) return;

				var scrollPos = localStorage.getItem('sidebarScrollPos');
				if (scrollPos !== null) {
					sidebar.scrollTop = parseInt(scrollPos, 10) || 0;
				}
			}

			function bindSidebarScrollSaver() {
				var sidebar = getSidebarScrollEl();
				if (!sidebar) return;

				sidebar.addEventListener('scroll', function() {
					localStorage.setItem('sidebarScrollPos', String(sidebar.scrollTop));
				}, { passive: true });

				window.addEventListener('beforeunload', function() {
					localStorage.setItem('sidebarScrollPos', String(sidebar.scrollTop));
				});
			}

			// Restore after page load + small delay (SimpleBar can reset scroll during init)
			restoreSidebarScroll();
			bindSidebarScrollSaver();
			window.addEventListener('load', function () {
				setTimeout(restoreSidebarScroll, 50);
				setTimeout(restoreSidebarScroll, 250);
			});
        });
    </script>

    @stack('scripts')
</body>

</html>
