document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".open-cancel-modal").forEach(btn => {
    btn.addEventListener("click", () => {
      document.getElementById("modalDate").textContent = btn.dataset.date;
      document.getElementById("modalPart").textContent = btn.dataset.part;
      document.getElementById("modalReserveId").value = btn.dataset.reserveId;

      $('#cancelModal').modal('show');
    });
  });
});
