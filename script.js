
// ========== HIGHLIGHT MENU NAVIGATION ==========
const sections = document.querySelectorAll("section[id]");
const navLinks = document.querySelectorAll(".main-nav ul li a");

window.addEventListener("scroll", () => {
  let current = "";
  sections.forEach(sec => {
    const secTop = sec.offsetTop - 150;
    if (pageYOffset >= secTop) {
      current = sec.getAttribute("id");
    }
  });

  navLinks.forEach(link => {
    link.classList.remove("active");
    if (link.getAttribute("href") === `#${current}`) {
      link.classList.add("active");
    }
  });
});

// ========== SCROLL TO TOP BUTTON ==========
const scrollBtn = document.createElement("button");
scrollBtn.innerText = "↑";
scrollBtn.className = "scroll-top";
document.body.appendChild(scrollBtn);

window.addEventListener("scroll", () => {
  if (window.scrollY > 300) {
    scrollBtn.classList.add("show");
  } else {
    scrollBtn.classList.remove("show");
  }
});

scrollBtn.addEventListener("click", () => {
  window.scrollTo({ top: 0, behavior: "smooth" });
});

// ========== SIMPLE HERO TEXT FADE-IN ==========
window.addEventListener("load", () => {
  const heroText = document.querySelector(".hero-content");
  heroText.classList.add("visible");
});
// ========== NAVBAR SCROLL EFFECT ==========
window.addEventListener("scroll", () => {
  const header = document.querySelector(".site-header");
  if (window.scrollY > 60) {
    header.classList.add("scrolled");
  } else {
    header.classList.remove("scrolled");
  }
});

// ========== FADE-IN ANIMATION ON SCROLL ==========
const fadeElems = document.querySelectorAll(
  ".about-text, .about-image, .visi, .misi, .team-card"
);

function fadeInOnScroll() {
  fadeElems.forEach(el => {
    const rect = el.getBoundingClientRect();
    if (rect.top < window.innerHeight - 100) {
      el.classList.add("visible");
    }
  });
}
window.addEventListener("scroll", fadeInOnScroll);
window.addEventListener("load", fadeInOnScroll);

// ========== BACK TO TOP BUTTON ==========
const topBtn = document.createElement("button");
topBtn.textContent = "↑";
topBtn.className = "scroll-top";
document.body.appendChild(topBtn);

window.addEventListener("scroll", () => {
  if (window.scrollY > 300) {
    topBtn.classList.add("show");
  } else {
    topBtn.classList.remove("show");
  }
});

topBtn.addEventListener("click", () => {
  window.scrollTo({ top: 0, behavior: "smooth" });
});

/* Contact */
function showSuccessMessage() {
  const msg = document.getElementById("success-msg");
  msg.style.display = "block";
  msg.style.opacity = "0";
  setTimeout(() => {
    msg.style.transition = "opacity 0.5s ease";
    msg.style.opacity = "1";
  }, 100);
  setTimeout(() => {
    msg.style.opacity = "0";
    setTimeout(() => (msg.style.display = "none"), 500);
  }, 4000);
}

/** === GALERI SLIDER === */
document.addEventListener("DOMContentLoaded", () => {
  const slides = document.querySelector(".slides");
  const images = document.querySelectorAll(".slides img");
  const prev = document.querySelector(".prev");
  const next = document.querySelector(".next");
  const dotsContainer = document.querySelector(".dots");

  if (!slides) return;

  let index = 0;

  // Buat titik navigasi otomatis
  images.forEach((_, i) => {
    const dot = document.createElement("span");
    dot.classList.add("dot");
    if (i === 0) dot.classList.add("active");
    dot.addEventListener("click", () => showSlide(i));
    dotsContainer.appendChild(dot);
  });

  const dots = document.querySelectorAll(".dot");

  function showSlide(n) {
    if (n >= images.length) index = 0;
    else if (n < 0) index = images.length - 1;
    else index = n;

    slides.style.transform = `translateX(-${index * 100}%)`;

    dots.forEach(dot => dot.classList.remove("active"));
    dots[index].classList.add("active");
  }

  // Tombol navigasi manual
  next.addEventListener("click", () => showSlide(index + 1));
  prev.addEventListener("click", () => showSlide(index - 1));

  // Auto-slide
  if (slides && images.length > 0 && prev && next) {
    setInterval(() => showSlide(index + 1), 5000);
  }
});

// logout function
function logout() {
  fetch("logout.php").then(() => {
    window.location.href = "login.html";
  });
}

setInterval(() => {
  fetch("ping.php");
  fetch("online_users.php")
    .then(res => res.json())
    .then(data => {
      const ul = document.getElementById("online-users");
      if (!ul) return;
      ul.innerHTML = "";
      data.forEach(u => {
        ul.innerHTML += `<li>🟢 ${u.username}</li>`;
      });
    });
}, 5000);

