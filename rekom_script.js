document.addEventListener("DOMContentLoaded", () => {
  const grid = document.getElementById("places-grid");
  const detail = document.getElementById("place-detail");

  async function loadPlaces() {
    try {
      const res = await fetch("get_places.php");
      const data = await res.json();
      renderPlaces(data);
    } catch (err) {
      grid.innerHTML = "<p style='color:red;'>Gagal memuat data dari database.</p>";
    }
  }

  function renderPlaces(list) {
    grid.innerHTML = "";
    list.forEach(p => {
      const card = document.createElement("div");
      card.className = "menu-item";
      card.innerHTML = `
        <img src="${p.image}" alt="${p.name}">
        <div class="menu-info">
          <h3>${p.name}</h3>
          <p><strong>${p.city}</strong> • ${p.specialty}</p>
          <p>${p.address}</p>
          <button class="cta-btn" data-id="${p.id}">Lihat Detail</button>
        </div>
      `;
      grid.appendChild(card);
    });

    document.querySelectorAll(".cta-btn").forEach(btn => {
      btn.addEventListener("click", () => showDetail(btn.dataset.id));
    });
  }

  async function showDetail(id) {
    const res = await fetch("get_places.php");
    const data = await res.json();
    const p = data.find(item => item.id == id);

    detail.style.display = "block";
    detail.innerHTML = `
      <section class="artikel">
        <h2>${p.name} — ${p.city}</h2>
        <img src="${p.image}" alt="${p.name}">
        <p><strong>Alamat:</strong> ${p.address}</p>
        <p><strong>Spesialis:</strong> ${p.specialty}</p>
        <p><strong>Jam:</strong> ${p.hours}</p>
        <p><strong>Kontak:</strong> ${p.phone}</p>
        <button class="cta-btn" onclick="document.getElementById('place-detail').style.display='none'">Tutup</button>
      </section>
    `;
  }

  loadPlaces();
});
