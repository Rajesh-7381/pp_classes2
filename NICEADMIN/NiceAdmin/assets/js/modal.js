
document.addEventListener("DOMContentLoaded", function() {
  const addButton = document.getElementById("addButton");
  const addModal = new bootstrap.Modal(document.getElementById("addModal"));

  addButton.addEventListener("click", function() {
    addModal.show();
  });
});

  



