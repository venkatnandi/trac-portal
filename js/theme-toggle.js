// TRAC Portal - Theme Management & Interactions
console.log('🚀 Initializing TRAC Portal...');

// === THEME MANAGEMENT ===
class ThemeManager {
  constructor() {
    this.isDark = localStorage.getItem('theme') === 'dark';
    this.init();
  }

  init() {
    this.applyTheme(this.isDark);
    this.setupToggle();
    console.log('✅ Theme system initialized');
  }

  applyTheme(isDark) {
    const html = document.documentElement;
    
    if (isDark) {
      html.setAttribute('data-theme', 'dark');
      this.updateToggleButton('dark');
    } else {
      html.setAttribute('data-theme', 'light');
      this.updateToggleButton('light');
    }
    
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
    this.isDark = isDark;
  }

  updateToggleButton(theme) {
    const lightIcon = document.getElementById('lightIcon');
    const darkIcon = document.getElementById('darkIcon');
    const themeText = document.getElementById('themeText');

    if (lightIcon && darkIcon && themeText) {
      if (theme === 'dark') {
        lightIcon.style.display = 'none';
        darkIcon.style.display = 'block';
        themeText.textContent = 'Light Mode';
      } else {
        lightIcon.style.display = 'block';
        darkIcon.style.display = 'none';
        themeText.textContent = 'Dark Mode';
      }
    }
  }

  setupToggle() {
    document.addEventListener('DOMContentLoaded', () => {
      const toggleBtn = document.getElementById('themeToggle');
      if (toggleBtn) {
        toggleBtn.addEventListener('click', (e) => {
          e.preventDefault();
          this.toggle();
        });
      }
    });
  }

  toggle() {
    this.applyTheme(!this.isDark);
    console.log('🎨 Theme switched to:', this.isDark ? 'dark' : 'light');
  }
}

// === ANIMATION MANAGER ===
class AnimationManager {
  constructor() {
    this.observers = new Map();
    this.init();
  }

  init() {
    document.addEventListener('DOMContentLoaded', () => {
      this.setupScrollAnimations();
      this.setupHoverEffects();
      this.setupCounterAnimations();
      console.log('✅ Animations initialized');
    });
  }

  setupScrollAnimations() {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
          
          // Trigger counter animation if present
          const counter = entry.target.querySelector('[data-target]');
          if (counter) {
            this.animateCounter(counter);
          }
          
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    });

    // Observe all animated elements
    const elements = document.querySelectorAll('.stat-card, .trend-card, .sector-card');
    elements.forEach(el => {
      el.style.opacity = '0';
      el.style.transform = 'translateY(30px)';
      el.style.transition = 'all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
      observer.observe(el);
    });
  }

  setupHoverEffects() {
    // Card hover effects
    const cards = document.querySelectorAll('.stat-card, .trend-card, .sector-card');
    cards.forEach(card => {
      card.addEventListener('mouseenter', function() {
        this.style.transform += ' scale(1.02)';
      });

      card.addEventListener('mouseleave', function() {
        this.style.transform = this.style.transform.replace(' scale(1.02)', '');
      });
    });

    // Button hover effects
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
      button.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-2px)';
      });

      button.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
      });
    });
  }

  setupCounterAnimations() {
    this.animateCounter = (element) => {
      const target = parseInt(element.getAttribute('data-target'));
      const duration = 2000;
      const startTime = performance.now();
      
      const animate = (currentTime) => {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        // Easing function
        const easeOut = 1 - Math.pow(1 - progress, 3);
        const current = Math.floor(target * easeOut);
        
        element.textContent = current;
        
        if (progress < 1) {
          requestAnimationFrame(animate);
        } else {
          element.textContent = target;
        }
      };
      
      requestAnimationFrame(animate);
    };
  }
}

// === UTILITY FUNCTIONS ===
const Utils = {
  // Smooth scroll to section
  scrollToSection(sectionId) {
    const element = document.getElementById(sectionId);
    if (element) {
      const navbarHeight = 64;
      const targetPosition = element.offsetTop - navbarHeight;
      
      window.scrollTo({
        top: targetPosition,
        behavior: 'smooth'
      });
    }
  },

  // Debounce function for performance
  debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  },

  // Check if user prefers reduced motion
  prefersReducedMotion() {
    return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  }
};

// === CHART ENHANCEMENTS ===
class ChartManager {
  constructor() {
    this.charts = new Map();
    this.init();
  }

  init() {
    document.addEventListener('DOMContentLoaded', () => {
      // Wait for Chart.js to load
      if (typeof Chart !== 'undefined') {
        this.enhanceCharts();
      } else {
        setTimeout(() => this.init(), 100);
      }
    });
  }

  enhanceCharts() {
    const canvases = document.querySelectorAll('canvas[id$="Chart"]');
    canvases.forEach(canvas => {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            this.addChartHover(canvas);
            observer.unobserve(entry.target);
          }
        });
      });
      observer.observe(canvas);
    });
  }

  addChartHover(canvas) {
    const container = canvas.closest('.trend-card');
    if (container) {
      container.addEventListener('mouseenter', () => {
        canvas.style.filter = 'brightness(1.1)';
        canvas.style.transition = 'filter 0.3s ease';
      });

      container.addEventListener('mouseleave', () => {
        canvas.style.filter = 'brightness(1)';
      });
    }
  }
}

// === INITIALIZE EVERYTHING ===
document.addEventListener('DOMContentLoaded', function() {
  // Reduce animations if user prefers
  if (Utils.prefersReducedMotion()) {
    document.documentElement.style.setProperty('--transition-fast', '0s');
    document.documentElement.style.setProperty('--transition-normal', '0s');
    document.documentElement.style.setProperty('--transition-slow', '0s');
  }

  // Initialize managers
  window.themeManager = new ThemeManager();
  window.animationManager = new AnimationManager();
  window.chartManager = new ChartManager();

  // Make utility functions globally available
  window.scrollToSection = Utils.scrollToSection;

  // Loading complete
  setTimeout(() => {
    document.body.classList.add('loaded');
    console.log('🎉 TRAC Portal fully loaded and enhanced!');
  }, 100);
});

// Handle page visibility for performance
document.addEventListener('visibilitychange', function() {
  if (document.hidden) {
    // Pause animations when tab is not visible
    document.documentElement.style.animationPlayState = 'paused';
  } else {
    // Resume animations when tab becomes visible
    document.documentElement.style.animationPlayState = 'running';
  }
});
