{{--
    =====================================================
    VybeCart - Alert Component
    =====================================================
    Description: Reusable alert component for success, error, and info messages
    Author: VybeCart Team
    Last Modified: 2025-12-28
    =====================================================
--}}
@if(session('success'))
    <div class="fixed top-6 right-6 z-[9999] max-w-sm transform transition-all duration-500 ease-out animate-slide-in-right" 
         id="success-alert" 
         data-aos="fade-left" 
         data-aos-duration="600">
        <div class="bg-gradient-to-r from-emerald-500 to-green-600 text-white rounded-2xl shadow-2xl border border-white/20 backdrop-blur-sm overflow-hidden">
            
            <div class="px-6 py-4 flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center animate-pulse">
                        <i class="ri-check-circle-line text-2xl text-white"></i>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-white/90">Success</p>
                    <p class="text-white font-medium">{{ session('success') }}</p>
                </div>
                <button onclick="closeAlert('success-alert')" 
                        class="flex-shrink-0 w-8 h-8 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-colors duration-200 group">
                    <i class="ri-close-line text-lg text-white group-hover:rotate-90 transition-transform duration-200"></i>
                </button>
            </div>
            
            <div class="h-1 bg-white/20">
                <div class="h-full bg-white/60 rounded-full animate-progress" style="animation-duration: 5s;"></div>
            </div>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="fixed top-6 right-6 z-[9999] max-w-sm transform transition-all duration-500 ease-out animate-slide-in-right" 
         id="error-alert" 
         data-aos="fade-left" 
         data-aos-duration="600">
        <div class="bg-gradient-to-r from-red-500 to-rose-600 text-white rounded-2xl shadow-2xl border border-white/20 backdrop-blur-sm overflow-hidden">
            
            <div class="px-6 py-4 flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center animate-bounce-slow">
                        <i class="ri-error-warning-line text-2xl text-white"></i>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-white/90">Error</p>
                    <p class="text-white font-medium">{{ session('error') }}</p>
                </div>
                <button onclick="closeAlert('error-alert')" 
                        class="flex-shrink-0 w-8 h-8 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-colors duration-200 group">
                    <i class="ri-close-line text-lg text-white group-hover:rotate-90 transition-transform duration-200"></i>
                </button>
            </div>
            
            <div class="h-1 bg-white/20">
                <div class="h-full bg-white/60 rounded-full animate-progress" style="animation-duration: 5s;"></div>
            </div>
        </div>
    </div>
@endif

@if(session('delete'))
    <div class="fixed top-6 right-6 z-[9999] max-w-sm transform transition-all duration-500 ease-out animate-slide-in-right" 
         id="delete-alert" 
         data-aos="fade-left" 
         data-aos-duration="600">
        <div class="bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-2xl shadow-2xl border border-white/20 backdrop-blur-sm overflow-hidden">
            
            <div class="px-6 py-4 flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center animate-wiggle">
                        <i class="ri-delete-bin-line text-2xl text-white"></i>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-white/90">Removed</p>
                    <p class="text-white font-medium">{{ session('delete') }}</p>
                </div>
                <button onclick="closeAlert('delete-alert')" 
                        class="flex-shrink-0 w-8 h-8 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-colors duration-200 group">
                    <i class="ri-close-line text-lg text-white group-hover:rotate-90 transition-transform duration-200"></i>
                </button>
            </div>
            
            <div class="h-1 bg-white/20">
                <div class="h-full bg-white/60 rounded-full animate-progress" style="animation-duration: 5s;"></div>
            </div>
        </div>
    </div>
@endif

@if(session('update'))
    <div class="fixed top-6 right-6 z-[9999] max-w-sm transform transition-all duration-500 ease-out animate-slide-in-right" 
         id="update-alert" 
         data-aos="fade-left" 
         data-aos-duration="600">
        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-2xl shadow-2xl border border-white/20 backdrop-blur-sm overflow-hidden">
            
            <div class="px-6 py-4 flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center animate-pulse">
                        <i class="ri-information-line text-2xl text-white"></i>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-white/90">Updated</p>
                    <p class="text-white font-medium">{{ session('update') }}</p>
                </div>
                <button onclick="closeAlert('update-alert')" 
                        class="flex-shrink-0 w-8 h-8 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-colors duration-200 group">
                    <i class="ri-close-line text-lg text-white group-hover:rotate-90 transition-transform duration-200"></i>
                </button>
            </div>
            
            <div class="h-1 bg-white/20">
                <div class="h-full bg-white/60 rounded-full animate-progress" style="animation-duration: 5s;"></div>
            </div>
        </div>
    </div>
@endif

<script>
    function closeAlert(alertId) {
        const alert = document.getElementById(alertId);
        if (alert) {
            alert.style.transform = 'translateX(100%) scale(0.8)';
            alert.style.opacity = '0';
            setTimeout(() => {
                if (alert.parentNode) {
                    alert.remove();
                }
            }, 400);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('[id$="-alert"]');
        let topOffset = 24; // Start with 6 units (1.5rem)

        alerts.forEach((alert, index) => {
            if (index > 0) {
                alert.style.top = `${topOffset}px`;
                topOffset += alert.offsetHeight + 16; // Add alert height + gap
            }

            setTimeout(() => {
                if (document.getElementById(alert.id)) {
                    closeAlert(alert.id);
                }
            }, 5000);

            let autoCloseTimer;
            const resetTimer = () => {
                clearTimeout(autoCloseTimer);
                autoCloseTimer = setTimeout(() => {
                    if (document.getElementById(alert.id)) {
                        closeAlert(alert.id);
                    }
                }, 5000);
            };

            alert.addEventListener('mouseenter', () => {
                clearTimeout(autoCloseTimer);
                alert.style.transform = 'translateX(-8px) scale(1.02)';
            });

            alert.addEventListener('mouseleave', () => {
                alert.style.transform = 'translateX(0) scale(1)';
                resetTimer();
            });
        });
    });

    function playAlertSound(type) {
        if (typeof AudioContext !== 'undefined' || typeof webkitAudioContext !== 'undefined') {
            const audioContext = new (AudioContext || webkitAudioContext)();
            const oscillator = audioContext.createOscillator();
            const gainNode = audioContext.createGain();
            
            oscillator.connect(gainNode);
            gainNode.connect(audioContext.destination);
            
            const frequencies = {
                success: 800,
                error: 400,
                delete: 600,
                update: 700
            };
            
            oscillator.frequency.setValueAtTime(frequencies[type] || 600, audioContext.currentTime);
            gainNode.gain.setValueAtTime(0.1, audioContext.currentTime);
            gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.2);
            
            oscillator.start(audioContext.currentTime);
            oscillator.stop(audioContext.currentTime + 0.2);
        }
    }
</script>

<style>
    /* Enhanced slide-in animation */
    .animate-slide-in-right {
        animation: slideInRight 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    @keyframes slideInRight {
        0% {
            transform: translateX(100%) scale(0.8);
            opacity: 0;
        }
        60% {
            transform: translateX(-10px) scale(1.05);
            opacity: 0.8;
        }
        100% {
            transform: translateX(0) scale(1);
            opacity: 1;
        }
    }

    /* Progress bar animation */
    @keyframes progress {
        0% {
            width: 100%;
        }
        100% {
            width: 0%;
        }
    }

    .animate-progress {
        animation: progress linear forwards;
    }

    /* Enhanced bounce animation */
    .animate-bounce-slow {
        animation: bounceSlow 2s infinite;
    }

    @keyframes bounceSlow {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-8px);
        }
    }

    /* Wiggle animation for delete */
    .animate-wiggle {
        animation: wiggle 1s ease-in-out infinite;
    }

    @keyframes wiggle {
        0%, 100% {
            transform: rotate(-5deg);
        }
        50% {
            transform: rotate(5deg);
        }
    }

    /* Glassmorphism hover effect */
    [id$="-alert"]:hover {
        backdrop-filter: blur(20px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    /* Responsive design */
    @media (max-width: 640px) {
        [id$="-alert"] {
            left: 1rem;
            right: 1rem;
            max-width: none;
        }
    }
</style>