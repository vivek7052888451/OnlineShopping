<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('headerlink.php');
    ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="assets/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        <?php
        include('navbar.php');
        ?>
        <?php
        include('sidebar.php');
        ?>
        <div class="content-wrapper">

            <section class="content">
                <div class="container-fluid">
                    <div class="row bg-light">

                    </div>
                    <div class="row bg-light">
                        <?php
                        $sel_contact_data = "SELECT * FROM `contact`";
                        $sel_contact_query = mysqli_query($con, $sel_contact_data);
                        ?>
                        <table class="table table-borderd table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>SUBJECT</th>
                                    <th>MASSEGE</th>
                                    <th>DATE</th>
                                    <th>TIME</th>
                                    <th>DELETE</th>

                                </tr>
                            </thead>
                            <?php
                            while ($result_contact = mysqli_fetch_array($sel_contact_query, MYSQLI_BOTH)) {
                            ?>

                                <tbody>
                                    <tr>
                                        <td><?php echo $result_contact['id']; ?></td>
                                        <td><?php echo $result_contact['name']; ?></td>
                                        <td><?php echo $result_contact['email']; ?></td>
                                        <td><?php echo $result_contact['subject']; ?></td>
                                        <td><?php echo $result_contact['massege']; ?></td>

                                        <td><?php echo $result_contact['date']; ?></td>
                                        <td><?php echo $result_contact['time']; ?></td>

                                        <td><a href="../code/contact_delete.php?id=<?php echo $result_contact['id']; ?>" class="btn btn-danger">DELETE</a></td>


                                    </tr>
                                <?php
                            }
                                ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </section>

        </div>
        <?php
        include('footer.php');

        ?>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <?php
    include('footerlink.php');
    ?>
</body>


</html>