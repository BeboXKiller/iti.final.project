<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - StyleMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#254D70',
                        secondary: '#954C2E',
                        accent: '#131D4F',
                        light: '#EFE4D2',
                        dark: '#2D3748',
                    },
                    fontFamily: {
                        sans: ['Open Sans', 'sans-serif'],
                        heading: ['Nunito', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <style>
        .sidebar { transition: all 0.3s ease; }
        .dashboard-card:hover { transform: translateY(-3px); }
        
        /* Enhanced Navigation Styles */
        .nav-item { 
            transition: all 0.2s ease;
            position: relative;
        }
        
        .nav-item.active { 
            background-color: #EFE4D2; 
            border-left: 4px solid #954C2E; 
        }
        
        .nav-item.active svg { color: #954C2E; }
        .nav-item.active span { color: #954C2E; font-weight: 600; }
        
        /* Dropdown Styles */
        .dropdown-container {
            position: relative;
        }
        
        .dropdown-btn {
            cursor: pointer;
            user-select: none;
        }
        
        .dropdown-btn.active {
            background-color: #EFE4D2;
            border-left: 4px solid #954C2E;
        }
        
        .dropdown-btn.active svg {
            color: #954C2E;
        }
        
        .dropdown-btn.active span {
            color: #954C2E;
            font-weight: 600;
        }
        
        .dropdown-content {
            display: none;
            background-color: #f8fafc;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .dropdown-content.show {
            display: block;
            animation: slideDown 0.3s ease-out;
        }
        
        .dropdown-item {
            padding: 0.75rem 1rem 0.75rem 2rem;
            color: #4a5568;
            transition: all 0.2s ease;
            cursor: pointer;
            border-left: 3px solid transparent;
        }
        
        .dropdown-item:hover {
            background-color: #edf2f7;
            color: #2d3748;
            border-left-color: #cbd5e0;
        }
        
        .dropdown-item.active {
            background-color: #EFE4D2;
            color: #954C2E;
            font-weight: 600;
            /* border-left-color: #954C2E; */
        }
        
        .dropdown-arrow {
            transition: transform 0.3s ease;
            margin-left: auto;
        }
        
        .dropdown-btn.active .dropdown-arrow {
            transform: rotate(180deg);
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .action-btn { transition: all 0.2s ease; }
        .action-btn:hover { transform: scale(1.05); }
        .modal { transition: opacity 0.3s ease, transform 0.3s ease; }
    </style>
</head>