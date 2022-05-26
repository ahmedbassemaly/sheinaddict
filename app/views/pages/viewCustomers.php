<!-- To fix search bar in header -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js%22%3E</script>"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title> View Customers </title>

<?php
  
  class viewCustomers extends View{
    public function output(){
        //$title = $this->model->title;

        require APPROOT . '/views/inc/header.php';
        // require APPROOT . '/views/inc/sidebar.php';
        $this->printTable();
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
            <?php
            $i=0;
            $x=2;
            while($i< $this->model->getCustomer()){
              ?>
              <tr>
                <td><?php echo $i+1 ?></td>
                <td><?php echo $this->model->getFName($this->model->getID()[$i]);?></td>
                <td><?php echo $this->model->getLName($this->model->getID()[$i]);?></td>
                <td><?php echo $this->model->getPhone($this->model->getID()[$i]);?></td>
                <td><?php echo $this->model->getEmail($this->model->getID()[$i]);?></td>
                <td>4</td>
                <td>No</td>
            </tr>
            <?php
            $x++;
            $i++;
            }
            ?>
            </tbody>
        </table>
        </div>
      <?php
    }
}
?>