// document.addEventListener('DOMContentLoaded', function () {
//   const headings = document.querySelectorAll('.section-heading');
//   if (!headings || headings.length === 0) return;

//   const parseNumberFromText = (text) => {
//     const m = text.match(/[\d,\.]+/);
//     if (!m) return null;
//     const raw = m[0];
//     const n = parseFloat(raw.replace(/,/g, ''));
//     return isNaN(n) ? null : { raw, value: n };
//   };

//   const START_DELAY = 600;

//   const observer = new IntersectionObserver((entries) => {
//     entries.forEach((entry) => {
//       // ONLY trigger if intersecting
//       if (!entry.isIntersecting) return;

//       const el = entry.target;
//       const txt = el.textContent || '';
//       const parsed = parseNumberFromText(txt);
//       if (!parsed) return;

//       const { raw, value } = parsed;

//       // 1. STOP observing immediately so it never runs again
//       observer.unobserve(el);

//       // 2. Prepare the span for animation
//       if (!el.querySelector('.counter-num')) {
//         const safeRaw = raw.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
//         const re = new RegExp(safeRaw);
//         el.innerHTML = el.innerHTML.replace(re, `<span class="counter-num">${raw}</span>`);
//       }

//       const numSpan = el.querySelector('.counter-num');
//       if (!numSpan) return;

//       const isFloat = String(value).indexOf('.') !== -1;

//       // 3. Schedule the one-time animation
//       setTimeout(() => {
//         numSpan.textContent = isFloat ? Number(0).toFixed(1) : '0';

//         if (window.CountUp) {
//           try {
//             const opts = { duration: 4, separator: ',' };
//             const counter = new CountUp(numSpan, value, opts);
//             if (!counter.error) {
//               counter.start();
//             } else {
//               animateFallback(numSpan, value);
//             }
//           } catch (e) {
//             animateFallback(numSpan, value);
//           }
//         } else {
//           animateFallback(numSpan, value);
//         }
//       }, START_DELAY);
//     });
//   }, { threshold: 0.25 });

//   function animateFallback(node, toValue) {
//     const duration = 4000;
//     const start = performance.now();
//     const isFloat = String(toValue).indexOf('.') !== -1;

//     function tick(now) {
//       const elapsed = now - start;
//       const progress = Math.min(elapsed / duration, 1);
//       const current = 0 + (toValue - 0) * (1 - Math.pow(1 - progress, 3)); // easeOutCubic inline
      
//       if (isFloat) {
//         node.textContent = Number(current.toFixed(1)).toLocaleString();
//       } else {
//         node.textContent = Math.floor(current).toLocaleString();
//       }

//       if (progress < 1) {
//         requestAnimationFrame(tick);
//       } else {
//         node.textContent = toValue.toLocaleString();
//       }
//     }
//     requestAnimationFrame(tick);
//   }

//   headings.forEach(h => observer.observe(h));
// });