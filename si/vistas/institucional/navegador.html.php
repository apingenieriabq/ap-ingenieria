NAvegador
<!-- Page Header -->
<div class="page-header row no-gutters py-4">
  <div class="col">
    <span class="text-uppercase page-subtitle">Dashboards</span>
    <h3 class="page-title">File Manager</h3>
  </div>
  <div class="col d-flex">
    <div class="btn-group btn-group-sm d-inline-flex ml-auto my-auto" role="group" aria-label="Table row actions">
      <a href="file-manager-list.html" class="btn btn-white">
        <i class="material-icons">&#xE8EF;</i>
      </a>
      <a href="file-manager-cards.html" class="btn btn-white active">
        <i class="material-icons">&#xE8F0;</i>
      </a>
    </div>
  </div>
</div>
<!-- End Page Header -->
<!-- File Manager - Cards -->
<div class="file-manager file-manager-cards">
  <div class="row">
    <div class="col">
      <span class="file-manager__group-title text-uppercase text-light">Directories</span>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3">
      <div class="file-manager__item file-manager__item--directory file-manager__item--selected card card-small mb-3">
        <div class="card-footer">
          <span class="file-manager__item-icon">
            <i class="material-icons">&#xE2C7;</i>
          </span>
          <h6 class="file-manager__item-title">Projects</h6>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="file-manager__item file-manager__item--directory card card-small mb-3">
        <div class="card-footer">
          <span class="file-manager__item-icon">
            <i class="material-icons">&#xE2C7;</i>
          </span>
          <h6 class="file-manager__item-title">Movies</h6>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="file-manager__item file-manager__item--directory card card-small mb-3">
        <div class="card-footer">
          <span class="file-manager__item-icon">
            <i class="material-icons">&#xE2C7;</i>
          </span>
          <h6 class="file-manager__item-title">Backups</h6>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="file-manager__item file-manager__item--directory card card-small mb-3">
        <div class="card-footer">
          <span class="file-manager__item-icon">
            <i class="material-icons">&#xE2C7;</i>
          </span>
          <h6 class="file-manager__item-title">Photos</h6>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="file-manager__item file-manager__item--directory card card-small mb-3">
        <div class="card-footer">
          <span class="file-manager__item-icon">
            <i class="material-icons">&#xE2C7;</i>
          </span>
          <h6 class="file-manager__item-title">Old Files</h6>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="file-manager__item file-manager__item--directory card card-small mb-3">
        <div class="card-footer">
          <span class="file-manager__item-icon">
            <i class="material-icons">&#xE2C7;</i>
          </span>
          <h6 class="file-manager__item-title">New Folder With Extremely Long Name</h6>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <span class="file-manager__group-title text-uppercase text-light">Documents</span>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-sm-6 col-lg-3">
      <div class="file-manager__item card card-small mb-3">
        <div class="file-manager__item-preview card-body px-0 pb-0 pt-4">
          <img src="images/file-manager/document-preview-1.jpg" alt="File Manager - Item Preview">
        </div>
        <div class="card-footer border-top">
          <span class="file-manager__item-icon">
            <i class="material-icons">&#xE24D;</i>
          </span>
          <h6 class="file-manager__item-title">Lorem Ipsum Document</h6>
          <span class="file-manager__item-size ml-auto">12kb</span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
      <div class="file-manager__item card card-small mb-3">
        <div class="file-manager__item-preview card-body px-0 pb-0 pt-4">
          <img src="images/file-manager/document-preview-1.jpg" alt="File Manager - Item Preview">
        </div>
        <div class="card-footer border-top">
          <span class="file-manager__item-icon">
            <i class="material-icons">&#xE24D;</i>
          </span>
          <h6 class="file-manager__item-title">Lorem Ipsum Document</h6>
          <span class="file-manager__item-size ml-auto">12kb</span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
      <div class="file-manager__item card card-small mb-3">
        <div class="file-manager__item-preview card-body px-0 pb-0 pt-4">
          <img src="images/file-manager/document-preview-1.jpg" alt="File Manager - Item Preview">
        </div>
        <div class="card-footer border-top">
          <span class="file-manager__item-icon">
            <i class="material-icons">&#xE24D;</i>
          </span>
          <h6 class="file-manager__item-title">Lorem Ipsum Document</h6>
          <span class="file-manager__item-size ml-auto">12kb</span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
      <div class="file-manager__item card card-small mb-3">
        <div class="file-manager__item-preview card-body px-0 pb-0 pt-4">
          <img src="images/file-manager/document-preview-1.jpg" alt="File Manager - Item Preview">
        </div>
        <div class="card-footer border-top">
          <span class="file-manager__item-icon">
            <i class="material-icons">&#xE24D;</i>
          </span>
          <h6 class="file-manager__item-title">Lorem Ipsum Document</h6>
          <span class="file-manager__item-size ml-auto">12kb</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End File Manager - Cards -->


<script>
$( document ).ready(function() {
    alertaError( "ready!" );
});
</script>