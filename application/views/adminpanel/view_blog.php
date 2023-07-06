<?php $this->load->view("adminpanel/header"); 
// print_r($result);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-4">
    <h3 class="m-3">View Blog</h3>   
    <div class="table-responsive small">
        <table class="table table-striped table-bordered table-sm table-responsive">
          <thead>
            <tr>
              <th scope="col">Sr No</th>
              <th scope="col">Title</th>
              <th scope="col" width="600">Description</th>
              <th scope="col">Image</th>
              <th scope="col" width="100">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if ($result) {
                $n=1;
                foreach ($result as $key => $value) {
                  $id = $value['id'];
                ?>
                <tr>
                  <td><?php echo $n; ?></td>
                  <td><?php echo $value['blog_title']; ?></td>
                  <td><?php echo $value['blog_desc']; ?></td>
                  <td><?php echo "<img src='".base_url().$value['blog_img']."' class='img-fluid' width='100' >" ; ?></td>
                  <td>
                    <a class="btn btn-warning" href="<?= base_url().'admin/blog/editblog/'.$id ; ?>"><i class="fa fa-pencil"></i></a>
                    <a class="btn delete btn-danger " href="" data-id="<?php echo $value['id']; ?>"  ><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <?php
                $n+=1;
                }
              }
              else{
                echo "<tr colspan= '6'>No Records Found</tr>";
              }
            ?>
            
          </tbody>
        </table>
      </div>
      
</main>


<?php $this->load->view("adminpanel/footer"); ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<script type="text/javascript">
  $(".delete").click(function(){
    var delete_id = $(this).attr("data-id");
    // alert(delete_id);
    var bool = confirm("Are you sure you want to delete this blog forever? ");
    // console.log(bool);
    // alert(bool);
    if(bool){
      // alert("ajax");
      $.ajax({
              url:'<?= base_url().'admin/blog/deleteblog/'?>',
              type:'post',
              data:{'delete_id': delete_id},
              success: function(response){
                console.log(response);
                if (response == "deleted") {
                  location.reload();
                }else if (response == "notdeleted"){
                  alert("Something went wrong!");
                }
              }
            });
    }
    else{
      alert("Your blog is safe !")
    }
  });


  <?php 

      if (isset($_SESSION['updated'])) {
        if ($_SESSION['updated'] == "yes") {
          echo 'alert("Data has been updated!");';
        }else if($_SESSION['updated'] == "no"){
          echo 'alert("Some error occurred & data not updated!");';

        }
      }

   ?>

</script>