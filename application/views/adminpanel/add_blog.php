<?php $this->load->view("adminpanel/header"); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-4">

  <?php
      if (isset($_SESSION['inserted'])) { ?>
          <div class="alert alert-secondary alert-dismissible fade show  mt-5 w-50 m-auto" role="alert">
          <?php echo $_SESSION['inserted']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php }
    ?>
   <h3 class="m-3">Add Blog</h3>   
  <form enctype="multipart/form-data" method="post" action="<?= base_url().'admin/blog/addblog_post' ?>">
    <div class="form-group m-3">
      <input type="text" class="form-control" name="blog_title" placeholder="Title">
    </div>
    <div class="form-group m-3">
      <textarea type="text" class="form-control" name="blog_desc" placeholder="Description"></textarea>
    </div>
    <div class="form-group m-3">
      <input type="file" class="form-control" name="blogimage" accept="image/png, image/gif, image/jpeg">
    </div>

    <button class="btn btn-primary m-3" type="submit">Add Blog</button>
  </form>
      
</main>

<?php $this->load->view("adminpanel/footer"); ?>
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
        CKEDITOR.replace( 'blog_desc' );
</script>
