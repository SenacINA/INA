/**
 * Parallax Loader - Controla a exibição do elemento parallax e o scroll da página
 * @version 2.0
 */
class ParallaxController {
  constructor() {
    this.parallaxElement = document.getElementById('hoverElement');
    this.html = document.documentElement;
    this.body = document.body;
    this.scrollPosition = 0;
    this.hasSeenParallax = sessionStorage.getItem('parallaxViewed');
    this.timeoutDuration = 4000;
    this.timeoutId = null;
  }

  init() {
    this.disableScroll();
    
    if (!this.parallaxElement) {
      this.scheduleScrollEnable();
      return;
    }

    if (this.hasSeenParallax) {
      this.removeParallax();
      this.enableScroll();
      return;
    }

    this.setupNewUserFlow();
  }

  disableScroll() {
    this.scrollPosition = window.pageYOffset;
    this.html.style.overflow = 'hidden';
    this.body.style.overflow = 'hidden';
    this.body.style.position = 'fixed';
    this.body.style.top = `-${this.scrollPosition}px`;
    this.body.style.width = '100%';
  }

  enableScroll() {
    this.html.style.overflow = '';
    this.body.style.overflow = '';
    this.body.style.position = '';
    this.body.style.top = '';
    this.body.style.width = '';
    window.scrollTo(0, this.scrollPosition);
  }

  removeParallax() {
    if (this.parallaxElement && this.parallaxElement.parentNode) {
      this.parallaxElement.parentNode.removeChild(this.parallaxElement);
    }
  }

  scheduleScrollEnable() {
    this.timeoutId = setTimeout(() => {
      this.enableScroll();
      this.cleanup();
    }, this.timeoutDuration);
  }

  setupNewUserFlow() {
    this.timeoutId = setTimeout(() => {
      sessionStorage.setItem('parallaxViewed', 'true');
      this.removeParallax();
      this.enableScroll();
      this.cleanup();
    }, this.timeoutDuration);
  }

  cleanup() {
    if (this.timeoutId) {
      clearTimeout(this.timeoutId);
    }
  }
}

// Inicializa quando o DOM estiver pronto
document.addEventListener('DOMContentLoaded', () => {
  const parallaxController = new ParallaxController();
  parallaxController.init();
});