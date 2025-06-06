<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'Poppins', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#fdf4ff',
                            100: '#fae8ff',
                            200: '#f5d0fe',
                            300: '#f0abfc',
                            400: '#e879f9',
                            500: '#d946ef',
                            600: '#c026d3',
                            700: '#a21caf',
                            800: '#86198f',
                            900: '#701a75',
                        },
                        rainbow: {
                            red: '#ff6b6b',
                            orange: '#ffa726',
                            yellow: '#ffeb3b',
                            green: '#4caf50',
                            blue: '#2196f3',
                            indigo: '#3f51b5',
                            purple: '#9c27b0',
                            pink: '#e91e63',
                            teal: '#009688',
                            cyan: '#00bcd4',
                        }
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'bounce-slow': 'bounce 3s infinite',
                        'wiggle': 'wiggle 1s ease-in-out infinite',
                        'gradient': 'gradient 15s ease infinite',
                        'shimmer': 'shimmer 2s linear infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        wiggle: {
                            '0%, 100%': { transform: 'rotate(-3deg)' },
                            '50%': { transform: 'rotate(3deg)' },
                        },
                        gradient: {
                            '0%, 100%': {
                                'background-size': '200% 200%',
                                'background-position': 'left center'
                            },
                            '50%': {
                                'background-size': '200% 200%',
                                'background-position': 'right center'
                            },
                        },
                        shimmer: {
                            '0%': {
                                'background-position': '-200px 0'
                            },
                            '100%': {
                                'background-position': 'calc(200px + 100%) 0'
                            },
                        },
                        glow: {
                            'from': {
                                'box-shadow': '0 0 20px #ff6b6b, 0 0 30px #ff6b6b, 0 0 40px #ff6b6b'
                            },
                            'to': {
                                'box-shadow': '0 0 10px #ff6b6b, 0 0 20px #ff6b6b, 0 0 30px #ff6b6b'
                            },
                        }
                    },
                    backgroundImage: {
                        'rainbow-gradient': 'linear-gradient(45deg, #ff6b6b, #ffa726, #ffeb3b, #4caf50, #2196f3, #3f51b5, #9c27b0)',
                        'cosmic': 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                        'sunset': 'linear-gradient(135deg, #ff9a9e 0%, #fecfef 50%, #fecfef 100%)',
                        'ocean': 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                        'forest': 'linear-gradient(135deg, #11998e 0%, #38ef7d 100%)',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab, #667eea, #764ba2);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            position: relative;
            overflow-x: hidden;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
            pointer-events: none;
            z-index: 0;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }
        
        .glass-input {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
        }
        
        .glass-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        
        .glass-input:focus {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
        }
        
        .btn-rainbow {
            background: linear-gradient(45deg, #ff6b6b, #ffa726, #ffeb3b, #4caf50, #2196f3, #3f51b5, #9c27b0);
            background-size: 300% 300%;
            animation: gradient 3s ease infinite;
            transition: all 0.3s ease;
        }
        
        .btn-rainbow:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        
        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        
        .shape {
            position: absolute;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }
        
        .shape:nth-child(1) { top: 10%; left: 10%; animation-delay: 0s; }
        .shape:nth-child(2) { top: 20%; right: 10%; animation-delay: 1s; }
        .shape:nth-child(3) { bottom: 20%; left: 20%; animation-delay: 2s; }
        .shape:nth-child(4) { bottom: 10%; right: 20%; animation-delay: 3s; }
        
        .rainbow-text {
            background: linear-gradient(45deg, #ff6b6b, #ffa726, #ffeb3b, #4caf50, #2196f3, #3f51b5, #9c27b0);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: 300% 300%;
            animation: gradient 3s ease infinite;
        }
        
        .glow-effect {
            box-shadow: 0 0 20px rgba(255, 107, 107, 0.5);
            animation: glow 2s ease-in-out infinite alternate;
        }
        
        .form-container {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .form-container:hover {
            transform: translateY(-5px);
        }
        
        .input-group {
            position: relative;
            overflow: hidden;
        }
        
        .input-group::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }
        
        .input-group:hover::before {
            left: 100%;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 sm:p-6 font-sans relative">
    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="shape w-32 h-32 bg-rainbow-red rounded-full"></div>
        <div class="shape w-24 h-24 bg-rainbow-blue rounded-full"></div>
        <div class="shape w-40 h-40 bg-rainbow-green rounded-full"></div>
        <div class="shape w-28 h-28 bg-rainbow-purple rounded-full"></div>
    </div>

    <div class="w-full max-w-4xl relative z-10">
        <!-- Header Section -->
        <div class="text-center mb-8 sm:mb-12">
            <div class="inline-flex items-center justify-center glass-card rounded-full p-4 mb-6 animate-bounce-slow">
                <span class="text-4xl sm:text-5xl animate-wiggle">➕</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold rainbow-text mb-4">
                ✨ Create New Amazing Task ✨
            </h1>
            <p class="text-white/80 text-lg sm:text-xl max-w-2xl mx-auto">
                🚀 Start your productive journey by creating a beautiful new task! 🌟
            </p>
            <div class="flex justify-center space-x-2 mt-4">
                <div class="w-3 h-3 bg-rainbow-red rounded-full animate-pulse"></div>
                <div class="w-3 h-3 bg-rainbow-yellow rounded-full animate-pulse" style="animation-delay: 0.2s;"></div>
                <div class="w-3 h-3 bg-rainbow-green rounded-full animate-pulse" style="animation-delay: 0.4s;"></div>
                <div class="w-3 h-3 bg-rainbow-blue rounded-full animate-pulse" style="animation-delay: 0.6s;"></div>
                <div class="w-3 h-3 bg-rainbow-purple rounded-full animate-pulse" style="animation-delay: 0.8s;"></div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="form-container glass-card rounded-2xl p-6 sm:p-8 lg:p-12 border border-white/20">
            <form action="{{ url('/store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                
                <!-- Title Field -->
                <div class="input-group">
                    <label for="title" class="block text-white text-lg sm:text-xl font-semibold mb-4 flex items-center">
                        <span class="text-2xl mr-3 animate-pulse">📝</span>
                        Task Title
                    </label>
                    <input type="text" name="title" id="title" required
                           placeholder="Enter your amazing task title..."
                           class="glass-input w-full px-5 py-4 rounded-xl text-lg sm:text-xl transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-rainbow-blue/50">
                </div>

                <!-- Description Field -->
                <div class="input-group">
                    <label for="description" class="block text-white text-lg sm:text-xl font-semibold mb-4 flex items-center">
                        <span class="text-2xl mr-3 animate-pulse">📄</span>
                        Task Description
                    </label>
                    <textarea name="description" id="description" required rows="6"
                              placeholder="Describe your task in detail..."
                              class="glass-input w-full px-5 py-4 rounded-xl text-lg sm:text-xl transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-rainbow-green/50 resize-y"></textarea>
                </div>

                <!-- Due Date Field -->
                <div class="input-group">
                    <label for="due_date" class="block text-white text-lg sm:text-xl font-semibold mb-4 flex items-center">
                        <span class="text-2xl mr-3 animate-pulse">📅</span>
                        Dateline
                    </label>
                    <input type="date" name="due_date" id="due_date"
                           class="glass-input w-full px-5 py-4 rounded-xl text-lg sm:text-xl transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-rainbow-purple/50">
                </div>

                <!-- Status Field -->
                <div class="input-group">
                    <label for="status" class="block text-white text-lg sm:text-xl font-semibold mb-4 flex items-center">
                        <span class="text-2xl mr-3 animate-pulse">🎯</span>
                        Task Status
                    </label>
                    <select name="status" id="status" 
                            class="glass-input w-full px-5 py-4 rounded-xl text-lg sm:text-xl transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-rainbow-yellow/50">
                        <option value="Not Started" class="bg-gray-800 text-white">⏳ Not Started</option>
                        <option value="Doing" class="bg-gray-800 text-white">🔄 Doing</option>
                        <option value="Done" class="bg-gray-800 text-white">✅ Done</option>
                    </select>
                </div>

                <!-- Image Upload Field -->
                <div class="input-group">
                    <label for="image" class="block text-white text-lg sm:text-xl font-semibold mb-4 flex items-center">
                        <span class="text-2xl mr-3 animate-pulse">🖼️</span>
                        Task Image
                    </label>
                    <div class="glass-card p-6 rounded-xl border border-white/30 border-dashed hover:border-white/50 transition-all duration-300">
                        <input type="file" name="image" id="image" accept="image/*"
                               class="w-full text-white text-lg file:bg-rainbow-gradient file:text-white file:px-6 file:py-3 file:rounded-lg file:border-none file:cursor-pointer file:font-semibold file:transition-all file:duration-300 hover:file:scale-105">
                        <p class="text-white/70 text-sm mt-2 flex items-center">
                            <span class="mr-2">💡</span>
                            Choose a beautiful image to make your task more visual!
                        </p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 pt-8">
                    <button type="submit"
                            class="btn-rainbow flex-1 px-8 py-4 text-white font-bold rounded-xl text-lg sm:text-xl shadow-2xl hover:shadow-3xl transition-all duration-300 flex items-center justify-center glow-effect">
                        <span class="text-2xl mr-3 animate-bounce">💾</span>
                        Create Task
                        <span class="text-2xl ml-3 animate-pulse">✨</span>
                    </button>
                    <a href="{{ url('/') }}"
                       class="glass-card flex-1 px-8 py-4 text-white font-bold rounded-xl text-lg sm:text-xl shadow-2xl hover:shadow-3xl transition-all duration-300 flex items-center justify-center border border-white/30 hover:bg-white/20">
                        <span class="text-2xl mr-3 animate-bounce">🏠</span>
                        Back to List
                        <span class="text-2xl ml-3 animate-pulse">🔙</span>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Add focus effects to inputs
            const inputs = document.querySelectorAll('input, textarea, select');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                });
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });
            });

            // Add click effect to buttons
            const buttons = document.querySelectorAll('button, .btn-rainbow');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });
        });
    </script>
</body>
</html>