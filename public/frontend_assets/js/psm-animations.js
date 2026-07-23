/* PSM Craft House — scroll animation controller
   Include once, near the end of body (after Bootstrap JS):
   <script src="{{ asset('frontend_assets/js/psm-animations.js') }}"></script>
*/
document.addEventListener('DOMContentLoaded', function () {
  var targets = document.querySelectorAll('.reveal, .ring-divider');

  if (!('IntersectionObserver' in window)) {
    targets.forEach(function (el) { el.classList.add('is-visible'); });
    return;
  }

  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

  targets.forEach(function (el) { observer.observe(el); });

  // Safety net: if an element never gets marked visible (e.g. it has
  // zero height at observe-time, sits inside a hidden tab/carousel clone,
  // or the observer misses it for any reason), force it visible after a
  // short delay so content is never permanently stuck invisible.
  setTimeout(function () {
    document.querySelectorAll('.reveal:not(.is-visible), .ring-divider:not(.is-visible)').forEach(function (el) {
      el.classList.add('is-visible');
    });
  }, 1800);

  // Stagger children inside any .reveal-group (e.g. rows of cards)
  document.querySelectorAll('.reveal-group').forEach(function (group) {
    var children = group.querySelectorAll('.reveal');
    children.forEach(function (child, i) {
      child.style.transitionDelay = (i * 90) + 'ms';
    });
  });
});