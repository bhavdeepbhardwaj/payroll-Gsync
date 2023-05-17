<?php $parent_page = "emp"; ?>
<?php $page = "view_emps"; ?>
<?php include "config.php"; ?>
<?php include "header.php"; ?>

<?php

if ($_SESSION["user_type"] == 3) {
    $redirectPg = 1;
} else {
    $redirectPg = 0;
}

?>

<div class="page-wrapper">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Employees List
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <div id="table-default" class="table-responsive">
                        <table class="table table-vcenter table-responsive" id="example">
                            <thead>
                                <tr>
                                    <th><button class="table-sort" data-sort="sort-empid">Emp Id</button></th>
                                    <th><button class="table-sort" data-sort="sort-name">Name</button></th>
                                    <th><button class="table-sort" data-sort="sort-desg">Designation</button></th>
                                    <th><button class="table-sort" data-sort="sort-dept">Department</button></th>
                                    <th><button class="table-sort" data-sort="sort-doj">DOJ</button></th>
                                    <th><button class="table-sort" data-sort="sort-status">Status</button></th>
                                    <th><button class="table-sort" data-sort="sort-action">Action</button></th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody">

                                <?php
                                // $sql = "SELECT id, emp_id, emp_name, emp_desg, emp_dept, doj, emp_status FROM gs_employees";

                                if ($_SESSION["country_type"] == 'In') {
                                    
                                    $sql = "SELECT id, emp_id, emp_name, emp_desg, emp_dept, doj, emp_status FROM gs_employees WHERE country_type = 'In' AND emp_status = '1'";
                                    $res = mysqli_query($link, $sql);

                                // $row = mysqli_fetch_row($res);

                                // print_r($row);

                                while ($row = mysqli_fetch_row($res)) {

                                    $dateofjoin = $row[5];
                                    $showdoj = date("d-M-Y", strtotime($dateofjoin));

                                    if ($row[6] != 0) {
                                        $status = 'checked';
                                        $statustxt = 'Active';
                                    } else {
                                        $status = '';
                                        $statustxt = 'Deactive';
                                    }

                                    echo '<tr>';
                                    echo '<td class="sort-empid align-middle">' . $row[1] . '</td>';
                                    echo '<td class="sort-name align-middle">' . $row[2] . '</td>';
                                    echo '<td class="sort-desg align-middle">' . $row[3] . '</td>';
                                    echo '<td class="sort-dept align-middle">' . $row[4] . '</td>';
                                    echo '<td class="sort-doj align-middle">' . $showdoj . '</td>';
                                    echo '<td class="sort-status align-middle"><label class="form-check form-switch mb-0">
        <input class="form-check-input" value="' . $row[1] . '" type="checkbox" ' . $status . '>
        <span class="form-check-label" id="span' . $row[0] . '">' . $statustxt . '</span>
      </label></td>';
                                    echo '<td class="sort-action"><div class="btn-list flex-nowrap">
        <a href="view_details.php?view=' . $row[1] . '" class="btn">
          View
        </a>
        <a href="edit_details.php?edit=' . $row[1] . '" class="btn">
          Edit
        </a>
        </td>';
                                    echo '</tr>';
                                }
                                } else if ($_SESSION["country_type"] == 'Ph') {
                                    $sql = "SELECT id, emp_id, emp_name, emp_desg, emp_dept, doj, emp_status FROM gs_employees WHERE country_type = 'Ph'";
                                    $res = mysqli_query($link, $sql);

                                // $row = mysqli_fetch_row($res);

                                // print_r($row);

                                while ($row = mysqli_fetch_row($res)) {

                                    $dateofjoin = $row[5];
                                    $showdoj = date("d-M-Y", strtotime($dateofjoin));

                                    if ($row[6] != 0) {
                                        $status = 'checked';
                                        $statustxt = 'Active';
                                    } else {
                                        $status = '';
                                        $statustxt = 'Deactive';
                                    }

                                    echo '<tr>';
                                    echo '<td class="sort-empid align-middle">' . $row[1] . '</td>';
                                    echo '<td class="sort-name align-middle">' . $row[2] . '</td>';
                                    echo '<td class="sort-desg align-middle">' . $row[3] . '</td>';
                                    echo '<td class="sort-dept align-middle">' . $row[4] . '</td>';
                                    echo '<td class="sort-doj align-middle">' . $showdoj . '</td>';
                                    echo '<td class="sort-status align-middle"><label class="form-check form-switch mb-0">
        <input class="form-check-input" value="' . $row[1] . '" type="checkbox" ' . $status . '>
        <span class="form-check-label" id="span' . $row[0] . '">' . $statustxt . '</span>
      </label></td>';
                                    echo '<td class="sort-action"><div class="btn-list flex-nowrap">
        <a href="phview_details.php?view=' . $row[1] . '" class="btn">
          View
        </a>
        <a href="edit_details.php?edit=' . $row[1] . '" class="btn">
          Edit
        </a>
        </td>';
                                    echo '</tr>';
                                }
                                }
                                // $sql = "SELECT id, emp_id, emp_name, emp_desg, emp_dept, doj, emp_status FROM gs_employees WHERE country_type = 'In'";

                                


                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 9v2m0 4v.01" />
                        <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                    </svg>
                    <h3>Are you sure?</h3>
                    <div class="text-muted">Do you really want to change status of Employee?</div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col"><a href="#" class="btn w-100" id="cancel" data-bs-dismiss="modal">
                                    Cancel
                                </a></div>
                            <div class="col"><a href="#" class="btn btn-danger w-100" id="confirm" data-bs-dismiss="modal">
                                    Yes! change it
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="toast added-toast position-absolute p-3 top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-yellow">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell-ringing me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
                <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                <path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727"></path>
                <path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727"></path>
            </svg>
            <strong class="me-auto">Notification</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-yellow-lt">
            New employee details have been added.
        </div>
    </div>

    <div class="toast update-toast position-absolute p-3 top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-blue">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell-ringing me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
                <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                <path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727"></path>
                <path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727"></path>
            </svg>
            <strong class="me-auto">Notification</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-blue-lt update-msg">
            Employee Status Updated.
        </div>
    </div>

    <div class="toast excel-toast position-absolute p-3 top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-blue">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell-ringing me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
                <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                <path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727"></path>
                <path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727"></path>
            </svg>
            <strong class="me-auto">Notification</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-blue-lt update-msg">
            Excel successfully imported.
        </div>
    </div>

    <?php include "footer.php"; ?>

    <script>
        $(document).ready(function() {
            var updateStat = '<?php echo $_SESSION["dataUpdate"]; ?>';
            var dataIns = '<?php echo $_SESSION["dataIns"]; ?>';
            if ('<?php echo $_SESSION['message'] ?>' == true) {
                excel_success();
            }
            var em_id = "";
            $('#example').DataTable({
                dom: "<'row mb-3 align-items-center'<'col-sm-12 col-md-7'B><'col-sm-12 col-md-3'f><'col-sm-12 col-md-2'l>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: [
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });

            $('input[type="checkbox"]').change(function() {
                if (this.checked) {
                    em_id = $(this).val();
                    localStorage.setItem("state", "1");
                    localStorage.setItem("em", em_id);
                    $("#modal-danger").modal('show');
                } else {
                    em_id = $(this).val();
                    localStorage.setItem("state", "0");
                    localStorage.setItem("em", em_id);
                    $("#modal-danger").modal('show');
                }
            });

            $("#confirm").click(function() {
                var v = localStorage.getItem("state");
                var i = localStorage.getItem("em");
                updateStatus(v, i);
            });

            $("#cancel").click(function() {
                location.reload();
            });

            function updateStatus(v, i) {
                var Data = {
                    userSt: v,
                    id: i,
                };

                $.ajax({
                    type: 'post',
                    url: 'update-status.php',
                    data: Data,
                    dataType: "text",
                    statusCode: {
                        200: function(response) {
                            $('.update-toast').toast('show');
                            $('.update-msg').text(response);
                            setTimeout(function() {
                                location.reload();
                            }, 4000);
                        }
                    }
                });

                localStorage.removeItem("state");
                localStorage.removeItem("em");
            }

            if (updateStat == "1") {
                $('.update-toast').toast('show');
                <?php $_SESSION["dataUpdate"] = "0"; ?>
            }

            if (dataIns == "1") {
                $('.added-toast').toast('show');
                <?php $_SESSION["dataIns"] = "0"; ?>
            }

            function excel_success() {
                $('.excel-toast').toast('show');
                <?php $_SESSION["message"] = "0"; ?>
            }
        });
    </script>

    <script>
        var redir = '<?php echo $redirectPg ?>';
        if (redir == 1) {
            window.location.replace("error-404.php");
        }
    </script>