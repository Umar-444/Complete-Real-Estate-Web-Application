// Dashboard JavaScript - Advanced Interactive Features
document.addEventListener('DOMContentLoaded', function() {

    // Initialize Charts
    initializeCharts();

    // Add hover effects to cards
    addCardHoverEffects();

    // Add click handlers for quick actions
    addQuickActionHandlers();

    // Add animation delays for staggered loading
    addStaggeredAnimations();

    // Initialize tooltips
    initializeTooltips();

    // Add real-time updates (simulated)
    simulateRealTimeUpdates();

    // Handle responsive sidebar
    handleResponsiveSidebar();
});

function initializeCharts() {
    // Property Views Chart (Line Chart)
    const viewsCtx = document.getElementById('propertyViewsChart');
    if (viewsCtx) {
        new Chart(viewsCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Property Views',
                    data: [1200, 1900, 3000, 5000, 2000, 3000, 4500, 3200, 4100, 3800, 5200, 4800],
                    borderColor: '#667eea',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#667eea',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });
    }

    // Property Types Chart (Doughnut Chart)
    const typesCtx = document.getElementById('propertyTypesChart');
    if (typesCtx) {
        new Chart(typesCtx, {
            type: 'doughnut',
            data: {
                labels: ['Apartments', 'Houses', 'Commercial', 'Land'],
                datasets: [{
                    data: [45, 30, 15, 10],
                    backgroundColor: [
                        '#667eea',
                        '#10b981',
                        '#f59e0b',
                        '#ef4444'
                    ],
                    borderWidth: 0,
                    hoverBorderWidth: 2,
                    hoverBorderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                cutout: '70%'
            }
        });
    }
}

function addCardHoverEffects() {
    const cards = document.querySelectorAll('.stats-card, .card');

    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
}

function addQuickActionHandlers() {
    const quickActions = document.querySelectorAll('.card-body a.btn');

    quickActions.forEach(action => {
        action.addEventListener('click', function(e) {
            // Add loading effect
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Loading...';

            // Simulate loading (remove in production)
            setTimeout(() => {
                window.location.href = this.getAttribute('href');
            }, 800);

            e.preventDefault();
        });
    });
}

function addStaggeredAnimations() {
    const animatedElements = document.querySelectorAll('.fade-in, .slide-up');

    animatedElements.forEach((element, index) => {
        element.style.animationDelay = `${index * 0.1}s`;
    });
}

function initializeTooltips() {
    // Initialize Bootstrap tooltips if available
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }
}

function simulateRealTimeUpdates() {
    // Simulate real-time updates every 30 seconds
    setInterval(() => {
        updateStatistics();
    }, 30000);
}

function updateStatistics() {
    // This would typically fetch data from an API
    // For demo purposes, we'll add small random changes
    const statsNumbers = document.querySelectorAll('.stats-number');

    statsNumbers.forEach(stat => {
        const currentValue = parseInt(stat.textContent.replace(/[^0-9]/g, ''));
        const change = Math.floor(Math.random() * 10) - 5; // -5 to +5
        const newValue = Math.max(0, currentValue + change);

        // Animate the change
        animateValue(stat, currentValue, newValue, 1000);
    });
}

function animateValue(element, start, end, duration) {
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        const currentValue = Math.floor(progress * (end - start) + start);

        if (element.id === 'totalRevenue') {
            element.textContent = '$' + currentValue.toLocaleString();
        } else {
            element.textContent = currentValue;
        }

        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };
    window.requestAnimationFrame(step);
}

function handleResponsiveSidebar() {
    const sidebarToggle = document.querySelector('.bars');
    const sidebar = document.querySelector('.sidebar');
    const body = document.body;
    const overlay = createSidebarOverlay();

    // Update toggle button icon based on sidebar state
    function updateToggleIcon() {
        if (!sidebarToggle) return;

        const icon = sidebarToggle.querySelector('i');
        if (!icon) return;

        if (window.innerWidth <= 768) {
            // Mobile: check if sidebar is open
            const isOpen = sidebar.classList.contains('open');
            icon.className = isOpen ? 'fas fa-times' : 'fas fa-bars';
        } else {
            // Desktop: check if sidebar is closed
            const isClosed = body.classList.contains('ls-closed');
            icon.className = isClosed ? 'fas fa-bars' : 'fas fa-times';
        }
    }

    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function(e) {
            e.preventDefault();

            if (window.innerWidth <= 768) {
                // Mobile behavior
                const isOpen = sidebar.classList.contains('open');
                if (isOpen) {
                    closeSidebarMobile(sidebar, overlay);
                } else {
                    openSidebarMobile(sidebar, overlay);
                }
            } else {
                // Desktop behavior
                body.classList.toggle('ls-closed');
            }

            // Update icon after state change
            setTimeout(updateToggleIcon, 50);
        });
    }

    // Close sidebar when clicking overlay on mobile
    if (overlay) {
        overlay.addEventListener('click', function() {
            closeSidebarMobile(sidebar, overlay);
        });
    }

    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(e) {
        if (window.innerWidth <= 768) {
            if (!e.target.closest('.sidebar') && !e.target.closest('.bars') && !e.target.closest('.navbar-collapse')) {
                closeSidebarMobile(sidebar, overlay);
            }
        }
    });

    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            // Reset mobile classes on desktop
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
        } else {
            // Ensure sidebar is closed on mobile by default
            if (!body.classList.contains('ls-closed')) {
                body.classList.add('ls-closed');
            }
        }
        // Update toggle icon on resize
        updateToggleIcon();
    });

    // Initialize toggle icon on page load
    updateToggleIcon();
}

function createSidebarOverlay() {
    let overlay = document.querySelector('.sidebar-overlay');
    if (!overlay) {
        overlay = document.createElement('div');
        overlay.className = 'sidebar-overlay';
        document.body.appendChild(overlay);
    }
    return overlay;
}

function openSidebarMobile(sidebar, overlay) {
    sidebar.classList.add('open');
    overlay.classList.add('show');
    document.body.style.overflow = 'hidden'; // Prevent background scrolling
}

function closeSidebarMobile(sidebar, overlay) {
    sidebar.classList.remove('open');
    overlay.classList.remove('show');
    document.body.style.overflow = ''; // Restore scrolling
}

// Export functionality (placeholder)
function exportReport() {
    alert('Export functionality would be implemented here. This could generate a PDF or CSV report.');
}

// Utility functions
function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); border: none; border-radius: 8px;';
    notification.innerHTML = `
        <i class="fas fa-${getIconForType(type)} me-2"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;

    document.body.appendChild(notification);

    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.style.animation = 'slideOutRight 0.3s ease-in-out';
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.remove();
                }
            }, 300);
        }
    }, 5000);
}

function getIconForType(type) {
    const icons = {
        'success': 'check-circle',
        'info': 'info-circle',
        'warning': 'exclamation-triangle',
        'danger': 'times-circle',
        'primary': 'bell'
    };
    return icons[type] || 'info-circle';
}

// Add loading states to buttons
function addLoadingState(button, text = 'Loading...') {
    button.disabled = true;
    button.innerHTML = `<i class="fas fa-spinner fa-spin me-2"></i>${text}`;

    return {
        remove: () => {
            button.disabled = false;
            button.innerHTML = button.getAttribute('data-original-text') || 'Button';
        }
    };
}

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Ctrl/Cmd + D for dashboard
    if ((e.ctrlKey || e.metaKey) && e.key === 'd') {
        e.preventDefault();
        window.location.href = 'dashboard.php';
    }
});

// Add animations keyframes via JavaScript
const style = document.createElement('style');
style.textContent = `
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }

    @keyframes slideOutRight {
        0% {
            transform: translateX(0);
            opacity: 1;
        }
        100% {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// Performance monitoring
window.addEventListener('load', function() {
    // Log page load time
    const loadTime = performance.now();
    console.log(`Dashboard loaded in ${loadTime.toFixed(2)}ms`);
});
