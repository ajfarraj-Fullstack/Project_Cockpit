<link rel="stylesheet" href="css/StyleCssDashbord.css">
<div class="modal fade" id="editprojectModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <?php if (isset($_GET['edit_id_project'])) { ?>
        <form id="editForm" method="POST">
          <div class="" style="padding-inline: 25px;
    padding-top: 18px;">
            <button type="button" class="btn-close position-absolute top-3 end-3" data-bs-dismiss="modal"></button>
            <h4 class="mb-4 text-center">تعديل المشروع</h4>
          </div>
          <div class="modal-body">
            <div class="mb-2">
              <label>اسم المشروع</label>
              <input type="text" id="projectName" value="<?php echo $roweditproject['projectName']; ?>" name="projectName"
                class="form-control">
            </div>
            <div class="modal-body">
              <div class="mb-2">
                <label>الميزانية</label>
                <input type="text" id="budgetProject" value="<?php echo $roweditproject['budgetProject']; ?>"
                  name="budgetProject" class="form-control">
              </div>

              <div class="modal-footer" style="justify-content: center;">
                <button type="Submit" class="btn btn-primary" name="saveupdate">حفظ</button>
              </div>
        </form>
      <?php } ?>
    </div>
  </div>
</div>
<script>
  <?php if (isset($_GET['edit_id_project'])) { ?>
    document.addEventListener("DOMContentLoaded", function () {
      var modal = new bootstrap.Modal(
        document.getElementById("editprojectModal")
      );
      modal.show();
    });
  <?php } ?>
</script>