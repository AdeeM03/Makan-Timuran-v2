document.addEventListener("DOMContentLoaded", () => {
  const list = document.getElementById("admin-online-list");
  const count = document.getElementById("online-count");

  if (!list) return;

  async function loadOnlineUsers() {
    try {
      const res = await fetch("admin_online.php");
      const data = await res.json();

      list.innerHTML = "";

      if (count) {
        count.innerText = `${data.length} user online`;
      }

      if (!Array.isArray(data) || data.length === 0) {
        list.innerHTML = "<li>Tidak ada user online</li>";
        return;
      }

      data.forEach(u => {
        const li = document.createElement("li");
        li.style.padding = "6px 0";
        li.innerHTML = `
          <strong>${u.username}</strong>
          <span style="font-size:12px; color:gray;">
            — aktif: ${u.last_activity}
          </span>
        `;
        list.appendChild(li);
      });

    } catch (err) {
      list.innerHTML = "<li style='color:red'>Gagal memuat data</li>";
    }
  }

  loadOnlineUsers();
  setInterval(loadOnlineUsers, 5000);
});
