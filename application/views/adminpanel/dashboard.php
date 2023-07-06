<?php $this->load->view("adminpanel/header"); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>
      <div class="row">

      <div class="card text-white bg-primary  mb-3" style="max-width: 18rem;">
        <div class="card-body">
          <h5 class="card-header">View All Blogs</h5>
          <h6 class="card-subtitle mb-2 text-muted"></h6>
          <p class="card- body">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <a href="<?= base_url().'admin/blog'?>" class="btn btn-secondary btn-lg btn-block mb-2">Click Here</a>
      </div>
      <div class="col-1"></div>
      <div class="card text-white bg-warning  mb-3" style="max-width: 18rem;">
        <div class="card-body">
          <h5 class="card-header">Add New Blog</h5>
          <p class="card-body">Some quick example text to build on the card title and make up the bulk of the card's content.</p>          
        </div>
        <a href="<?= base_url().'admin/blog/addblog'?>" class="btn btn-secondary btn-lg btn-block mb-2">Click Here</a>
      </div>

      </div>


    </main>
<?php $this->load->view("adminpanel/footer"); ?>