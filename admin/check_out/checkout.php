
<div class="row">
  <div class="col-lg-12 text-center">

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
    Check Out
  </button>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #8E3937; color: white;">
          <h1 class="modal-title fs-5" id="exampleModalCenterTitle">Check Out</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="" action="check_out/checkoutprocess.php" method="post">
          <input type="text" hidden="" name="bookingid" value="<?php echo $_GET['bookingid']; ?>">
          <strong>Select Date of Check Out:</strong>
          <input class="form-control" type="date" name="date">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="btnsubmit" class="btn btn-danger">Check Out</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  </div>
</div>
