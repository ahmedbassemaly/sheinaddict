<!-- To fix search bar in header -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js%22%3E</script>"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
  
  class viewCustomers extends View{
    public function output(){
        //$title = $this->model->title;

        require APPROOT . '/views/inc/header.php';
        $this->printTable();
        require APPROOT . '/views/inc/footer.php';
    }
    public function printTable(){
        ?>
        <div class="container">
        <link rel="stylesheet" href="<?php echo URLROOT . 'css/viewCustomers.css'; ?>">
        <br><h2 class="heading">Customers Info</h2> <br><br>       
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Order Number</th>
                <th>Arrived</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Basma</td>
                <td>Dessouky</td>
                <td>0112345642</td>
                <td>basma@gmail.com</td>
                <td>4</td>
                <td>No</td>
            </tr>
            </tbody>
        </table>
        </div>
        <!-- <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Order Number</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table> -->
        <?php
    }
}
?>