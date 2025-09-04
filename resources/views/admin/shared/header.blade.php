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
        .nav-item.active { background-color: #EFE4D2; border-left: 4px solid #954C2E; }
        .nav-item.active svg { color: #954C2E; }
        .nav-item.active span { color: #954C2E; font-weight: 600; }
        .action-btn { transition: all 0.2s ease; }
        .action-btn:hover { transform: scale(1.05); }
        .modal { transition: opacity 0.3s ease, transform 0.3s ease; }
    </style>
</head>