const lenis = new Lenis({
  duration: 1.5, // Slightly longer duration for more "weight"
  easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), 
  smoothWheel: true,
  wheelMultiplier: 0.8, // Slightly slows down the initial wheel kick
  touchMultiplier: 1.5,
});

window.lenis = lenis; 

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

gsap.ticker.add((time) => {
  lenis.raf(time * 1000);
});

gsap.ticker.lagSmoothing(0);

// Register the plugin
gsap.registerPlugin(ScrollTrigger);

// 1. Smooth Word-style Translation for Headings/Paragraphs
// Register ScrollTrigger
gsap.registerPlugin(ScrollTrigger);

const revealTexts = document.querySelectorAll('.reveal-text');

revealTexts.forEach((container) => {
  const nodes = Array.from(container.childNodes);
  container.innerHTML = "";

  nodes.forEach((node) => {
    if (node.nodeType === Node.TEXT_NODE) {
      // .filter(Boolean) removes any empty strings or accidental "phantom" spans
      const words = node.textContent.split(/\s+/).filter(Boolean);

      words.forEach((word) => {
        const span = document.createElement("span");
        span.textContent = word; // Add just the word
        span.style.display = "inline-block";
        span.style.marginRight = "0.25em"; // Use CSS margin for the gap instead of a text space
        container.appendChild(span);
      });
    } else if (node.nodeName === "BR") {
      container.appendChild(document.createElement("br"));
    }
  });

  gsap.from(container.querySelectorAll('span'), {
    scrollTrigger: {
      trigger: container,
      start: "top 85%",
    },
    y: 20,
    opacity: 0,
    duration: 3,
    ease: "expo.out",
    stagger: 0.1,
  });
});

// 2. Light Gray to Dark on Scroll
const colorTexts = document.querySelectorAll('.color-scroll');

colorTexts.forEach((text) => {
  gsap.to(text, {
    scrollTrigger: {
      trigger: text,
      start: "top 80%",
      end: "top 40%",
      scrub: true, // Smoothly ties color change to scroll progress
    },
    color: "#202020", // Your target dark color
    ease: "none"
  });
});


// 3. Image Reveal
const revealImages = document.querySelectorAll('.reveal-img');

revealImages.forEach((img) => {
  gsap.from(img, {
    scrollTrigger: {
      trigger: img,
      start: "top 85%",
    },
    y: 100,
    opacity: 0,
    duration: 2,
    ease: "power2.out"
  });
});

// 4. Counter Animation

// Register ScrollTrigger
gsap.registerPlugin(ScrollTrigger);

const statWrappers = document.querySelectorAll('.stats-wrapper');

statWrappers.forEach((wrapper) => {
  const headings = wrapper.querySelectorAll('.section-heading');

  headings.forEach((heading) => {
    const originalText = heading.innerText;
    const numericMatch = originalText.match(/\d+/);

    if (numericMatch) {
      const targetValue = numericMatch[0];
      const finalNumber = parseInt(targetValue);

      // Prepare HTML: Wrap number in a span and preserve symbols (+, %, etc.)
      heading.innerHTML = originalText.replace(
        targetValue,
        `<span class="count-up">0</span>`
      );

      const span = heading.querySelector('.count-up');

      // Create a timeline for each stat to make it fancy
      let tl = gsap.timeline({
        scrollTrigger: {
          trigger: wrapper,
          start: "top 85%",
          // REPLAY LOGIC: restarts every time it enters the viewport
          toggleActions: "restart none none none",
        }
      });

      // The Animation
      tl.from(heading, {
        y: 30,
        opacity: 0,
        duration: 0.8,
        ease: "back.out(1.7)", // Slight 'pop' effect
        stagger: 0.2
      })
        .to(span, {
          innerText: finalNumber,
          duration: 2,
          snap: { innerText: 1 },
          ease: "expo.out", // High-end deceleration
          // Formatting commas if number is large (e.g. 1,000)
          onUpdate: function () {
            span.innerText = Math.ceil(span.innerText).toLocaleString();
          }
        }, "-=0.6"); // Starts the count slightly before the heading finishes moving
    }
  });
});

// Simple Parallax for Images
gsap.to(".parallax-img", {
  yPercent: -20, // Moves the image up by 20% of its height
  ease: "none",
  scrollTrigger: {
    trigger: ".parallax-container", // The section containing the image
    start: "top bottom", // Starts when container enters bottom of screen
    end: "bottom top",   // Ends when container leaves top of screen
    scrub: true          // Ties the movement directly to the scrollbar
  }
});

// const revealParas = document.querySelectorAll('.reveal-para');

// revealParas.forEach((para) => {
//   // 1. Save the original HTML to preserve <br> and other tags
//   const nodes = Array.from(para.childNodes);
//   para.innerHTML = ""; 

//   nodes.forEach((node) => {
//     if (node.nodeType === Node.TEXT_NODE) {
//       // Split by space and filter out empty strings
//       const words = node.textContent.split(/\s+/).filter(Boolean);
      
//       words.forEach((word) => {
//         const span = document.createElement("span");
//         // We use a trailing space inside the span to maintain natural kerning
//         span.textContent = word + " "; 
        
//         // CRITICAL: display: inline keeps the paragraph flow/wrap perfect
//         // We use transform on an inline element by adding 'will-change'
//         span.style.display = "inline-block"; 
//         span.style.willChange = "transform, opacity";
        
//         para.appendChild(span);
//       });
//     } else {
//       // If it's a <br> or <strong> tag, just put it back
//       para.appendChild(node.cloneNode(true));
//     }
//   });

//   // 2. Ultra-smooth GSAP Animation
//   gsap.from(para.querySelectorAll('span'), {
//     scrollTrigger: {
//       trigger: para,
//       start: "top 85%",
//       // Replays the animation on scroll (as you requested for stats)
//       toggleActions: "restart none none none", 
//     },
//     y: 20,              // Subtle lift
//     opacity: 0,
//     duration: 1.4,      // Long duration for smoothness
//     ease: "power2.out",
//     stagger: 0.03,      // Faster stagger for long paragraphs so it doesn't take forever
//   });
// });