  document.getElementById('projectForm').addEventListener('submit', function(e) {
    e.preventDefault();
    if (this.checkValidity()) {
      alert('تم حفظ المشروع بنجاح!');
      this.reset();
      var modalEl = document.getElementById('addProjectModal');
      var modal = bootstrap.Modal.getInstance(modalEl);
      modal.hide();
    } else {
      this.reportValidity();
    }
  });