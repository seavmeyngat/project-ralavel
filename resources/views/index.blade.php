<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>To Do List Task</title>
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
        
        .glass-card-dark {
            background: rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        }
        
        .task-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
        }
        
        .task-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }
        
        .task-card:hover::before {
            left: 100%;
        }
        
        .task-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
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
        
        .status-pending { background: linear-gradient(135deg, #ffeaa7, #fdcb6e); }
        .status-progress { background: linear-gradient(135deg, #74b9ff, #0984e3); }
        .status-completed { background: linear-gradient(135deg, #55efc4, #00b894); }
        
        .shimmer {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200px 100%;
            animation: shimmer 2s infinite;
        }
        
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
    </style>
</head>
<body class="min-h-screen p-4 sm:p-6 lg:p-10 font-sans text-white relative">
    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="shape w-32 h-32 bg-rainbow-red rounded-full"></div>
        <div class="shape w-24 h-24 bg-rainbow-blue rounded-full"></div>
        <div class="shape w-40 h-40 bg-rainbow-green rounded-full"></div>
        <div class="shape w-28 h-28 bg-rainbow-purple rounded-full"></div>
    </div>

    <div class="max-w-5xl mx-auto relative z-10">
        <!-- Header -->
        <div class="mb-8 sm:mb-12 text-center">
            <div class="inline-flex items-center justify-center glass-card rounded-full p-4 mb-6 animate-bounce-slow">
                <span class="text-4xl sm:text-5xl animate-wiggle">📋</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-6xl font-bold rainbow-text mb-4">
                ✨ To Do List Task ✨
            </h1>
            <p class="text-white/80 text-lg sm:text-xl max-w-2xl mx-auto leading-relaxed">
                🚀 Organize your tasks with style and boost your productivity to the moon! 🌙
            </p>
            <div class="flex justify-center space-x-2 mt-4">
                <div class="w-3 h-3 bg-rainbow-red rounded-full animate-pulse"></div>
                <div class="w-3 h-3 bg-rainbow-yellow rounded-full animate-pulse" style="animation-delay: 0.2s;"></div>
                <div class="w-3 h-3 bg-rainbow-green rounded-full animate-pulse" style="animation-delay: 0.4s;"></div>
                <div class="w-3 h-3 bg-rainbow-blue rounded-full animate-pulse" style="animation-delay: 0.6s;"></div>
                <div class="w-3 h-3 bg-rainbow-purple rounded-full animate-pulse" style="animation-delay: 0.8s;"></div>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="glass-card p-5 sm:p-6 mb-8 rounded-2xl border-l-4 border-green-400 animate-pulse-slow">
                <div class="flex items-center">
                    <div class="bg-green-500 p-2 rounded-full mr-4 animate-bounce">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <span class="text-white text-lg sm:text-xl font-medium">🎉 {{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Filter Form -->
        <div class="glass-card rounded-2xl p-6 sm:p-8 mb-8 sm:mb-10 border border-white/20">
            <form action="{{ url('/') }}" method="GET">
                <div class="flex flex-col lg:flex-row gap-6 lg:items-center">
                    <label for="due_date" class="font-semibold text-lg sm:text-xl text-white flex items-center">
                        <span class="text-2xl mr-3 animate-pulse">📅</span>
                        Filter by Dateline:
                    </label>
                    <div class="flex flex-col sm:flex-row gap-4 flex-1">
                        <input type="date" id="due_date" name="due_date" value="{{ request('due_date') }}"
                               class="glass-card border border-white/30 rounded-xl px-4 py-3 text-lg text-white placeholder-white/70 focus:ring-4 focus:ring-rainbow-blue/50 focus:border-rainbow-blue focus:outline-none transition-all duration-300 flex-1" />
                        <div class="flex gap-3">
                            <button type="submit" 
                                    class="btn-rainbow px-6 py-3 text-white rounded-xl font-semibold text-lg shadow-lg hover:shadow-2xl transition-all duration-300 flex items-center">
                                <span class="text-xl mr-2">🔍</span>
                                Filter
                            </button>
                            <a href="{{ url('/') }}" 
                               class="glass-card px-6 py-3 text-red-600 rounded-xl font-semibold text-lg shadow-lg hover:shadow-2xl transition-all duration-300 flex items-center border border-white/30 hover:bg-white/20">
                                <span class="text-xl mr-2">🗑️</span>
                                Clear
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Create New Task Button -->
        <div class="flex justify-center mb-10 sm:mb-12">
            <a href="{{ url('/create') }}"
               class="btn-rainbow px-8 sm:px-12 py-4 sm:py-5 text-white font-bold rounded-2xl text-xl sm:text-2xl shadow-2xl hover:shadow-3xl transition-all duration-300 flex items-center glow-effect">
                <span class="text-2xl mr-3 animate-bounce">➕</span>
                Create New Task
                <span class="text-2xl ml-3 animate-pulse">🚀</span>
            </a>
        </div>

        <!-- Decorative Divider -->
        <div class="flex items-center justify-center mb-10">
            <div class="h-1 bg-gradient-to-r from-transparent via-rainbow-red to-rainbow-blue to-rainbow-green to-transparent w-full rounded-full opacity-60"></div>
            <span class="text-3xl mx-4 animate-pulse">✨</span>
            <div class="h-1 bg-gradient-to-r from-rainbow-green via-rainbow-purple to-transparent w-full rounded-full opacity-60"></div>
        </div>

        <!-- Tasks List -->
        @forelse ($tasks as $task)
            @php
                $colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'purple', 'pink', 'teal', 'cyan'];
                $randomColor = $colors[array_rand($colors)];
                $statusEmojis = [
                    'pending' => '⏳',
                    'in-progress' => '🔄',
                    'completed' => '✅',
                ];
                $statusEmoji = $statusEmojis[$task->status] ?? '📝';
            @endphp
            
            <div class="task-card glass-card p-6 sm:p-8 mb-8 rounded-2xl border border-white/20 hover:border-rainbow-{{ $randomColor }}/50">
                <div class="flex flex-col xl:flex-row gap-6 xl:gap-8">
                    <!-- Task Content -->
                    <div class="flex-1 space-y-5">
                        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                            <h3 class="text-xl sm:text-2xl lg:text-3xl font-bold text-white break-words flex items-center">
                                <span class="text-2xl mr-3 animate-bounce">{{ $statusEmoji }}</span>
                                {{ $task->title }}
                            </h3>
                            
                            @php
                                $statusClasses = [
                                    'pending' => 'status-pending text-orange-800',
                                    'in-progress' => 'status-progress text-blue-800', 
                                    'completed' => 'status-completed text-green-800',
                                ];
                                $statusClass = $statusClasses[$task->status] ?? 'bg-purple-500 text-white';
                            @endphp
                            
                            <span class="inline-flex items-center px-4 py-2 text-sm sm:text-base font-bold {{ $statusClass }} rounded-full whitespace-nowrap self-start shadow-lg animate-pulse-slow">
                                {{ $statusEmoji }} {{ ucfirst(str_replace('-', ' ', $task->status)) }}
                            </span>
                        </div>

                        <div class="glass-card-dark p-4 rounded-xl border border-white/10">
                            <p class="text-white/90 text-base sm:text-lg leading-relaxed">
                                💭 {{ $task->description }}
                            </p>
                        </div>

                        @if($task->due_date)
                            <div class="flex items-center text-white/80 text-base sm:text-lg">
                                <span class="text-xl mr-3 animate-pulse">⏰</span>
                                <span class="font-medium">
                                    Dateline: <span class="text-rainbow-yellow font-bold">{{ \Carbon\Carbon::parse($task->due_date)->format('F j, Y') }}</span>
                                </span>
                            </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-4 border-t border-white/20">
                            <a href="{{ url('/edit/' . $task->id) }}"
                               class="glass-card px-6 py-3 text-blue-600 font-semibold rounded-xl hover:bg-blue-500/30 transition-all duration-300 flex items-center border border-blue-400/50 hover:border-blue-400 group">
                                <span class="text-xl mr-3 group-hover:animate-wiggle">✏️</span>
                                Edit Task
                            </a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('🗑️ Are you sure you want to delete this colorful task?')"
                                        class="glass-card px-6 py-3 text-red-600 font-semibold rounded-xl hover:bg-red-500/30 transition-all duration-300 flex items-center border border-red-400/50 hover:border-red-400 group w-full sm:w-auto">
                                    <span class="text-xl mr-3 group-hover:animate-wiggle">🗑️</span>
                                    Delete Task
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Task Image -->
                    @if($task->image)
                        <div class="flex justify-center xl:justify-end">
                            <a href="{{ asset('storage/' . $task->image) }}" target="_blank" rel="noopener noreferrer" class="group">
                                <div class="relative overflow-hidden rounded-2xl shadow-2xl border-4 border-rainbow-{{ $randomColor }}/50">
                                    <img src="{{ asset('storage/' . $task->image) }}" 
                                         alt="Task Image" 
                                         class="w-full max-w-sm xl:w-64 xl:h-64 h-64 object-cover transition-all duration-500 group-hover:scale-110 group-hover:rotate-2">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-rainbow-{{ $randomColor }}/30 opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end justify-center p-6">
                                        <span class="text-white font-bold text-lg flex items-center">
                                            <span class="text-2xl mr-2">🖼️</span>
                                            View Full Image
                                        </span>
                                    </div>
                                    <div class="absolute top-4 right-4 bg-white/20 backdrop-blur-sm rounded-full p-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                        <span class="text-xl">🔍</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="glass-card rounded-2xl p-12 sm:p-16 text-center border border-white/20">
                <div class="flex flex-col items-center justify-center">
                    <div class="text-8xl sm:text-9xl mb-6 animate-bounce-slow">📝</div>
                    <h3 class="text-2xl sm:text-3xl font-bold text-white mb-4">No tasks yet! 🌟</h3>
                    <p class="text-white/80 text-lg sm:text-xl mb-8 max-w-md">
                        Your colorful task journey starts here! Create your first amazing task and watch the magic happen! ✨
                    </p>
                    <a href="{{ url('/create') }}" 
                       class="btn-rainbow px-8 py-4 text-white font-bold rounded-2xl text-xl shadow-2xl hover:shadow-3xl transition-all duration-300 flex items-center">
                        <span class="text-2xl mr-3 animate-bounce">🚀</span>
                        Create First Task
                        <span class="text-2xl ml-3 animate-pulse">✨</span>
                    </a>
                </div>
            </div>
        @endforelse
        
        <!-- Footer -->
        <div class="mt-16 text-center">
            <div class="glass-card rounded-2xl p-6 border border-white/20">
                <p class="text-pink-500 text-xl flex items-center justify-center">
                    <span class="text-2xl mr-2 animate-pulse">✨</span>
                    Created by : Ngat Seavmey
                    <span class="text-2xl ml-2 animate-pulse">🌈</span>
                </p>
            </div>
        </div>
    </div>
</body>
</html>