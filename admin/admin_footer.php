<!-- Footer -->
 <!-- Footer -->
             <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
        </div>


    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="admin_logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- DataTables JavaScript and CSS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">


            <script>

   document.addEventListener('DOMContentLoaded', function() {
        $('.view-btn').on('click', function() {
            var orgId = $(this).data('id');
            var name = $(this).data('name');
            var department = $(this).data('department');
            var advisor = $(this).data('advisor');
            var email = $(this).data('email');
            var logo = $(this).data('logo');

            $('#organizationModalLabel').text(name);
            $('#organizationName').text(name);
            $('#organizationDepartment').text(department);
            $('#organizationAdvisor').text(advisor);
            $('#organizationEmail').text(email);
            $('#organizationLogo').attr('src', 'uploads/' + logo);


            $.ajax({
                url: 'process_code/fetch_students_by_organization.php',
                type: 'POST',
                data: {organization_id: orgId},
                success: function(response) {
                    $('#studentList').html(response);
                }
            });
        });
    });

                    $(document).ready(function() {
                        $('.view-btn').on('click', function() {
                            var title = $(this).data('title');
                            var description = $(this).data('description');
                            var date = $(this).data('date');
                            var image = $(this).data('image');

                            $('#eventModalLabel').text(title);
                            $('#eventTitle').text(title);
                            $('#eventDescription').text(description);
                            $('#eventDate').text(date);
                            $('#eventImage').attr('src', image);
                        });
                    });


        function generatePassword() {
            const length = 12;
            const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+";
            let password = "";
            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * charset.length);
                password += charset[randomIndex];
            }
            document.getElementById('password').value = password;
        }

        $(document).ready(function() {
            $('#studentTable').DataTable();
        });


        $(document).ready(function() {
            $('#studentName').select2({
                placeholder: "Select a student",
                allowClear: true
            });
        });





     document.addEventListener("DOMContentLoaded", function () {

        document.getElementById("assignMultipleStudentsBtn").addEventListener("click", function () {

            var selectElement = document.getElementById("studentList");
            selectElement.innerHTML = "";


            var students = [
                { id: 1, name: "John Doe" },
                { id: 2, name: "Jane Smith" },
                { id: 3, name: "Alice Johnson" }

            ];


            students.forEach(function (student) {
                var option = document.createElement("option");
                option.value = student.id;
                option.textContent = student.name;
                selectElement.appendChild(option);
            });


            $("#assignMultipleStudentsModal").modal("show");
        });


        document.getElementById("assignStudentsBtn").addEventListener("click", function () {

            var studentIds = Array.from(document.getElementById("studentList").selectedOptions).map(option => option.value);
            var role = document.getElementById("role").value;


            $("#assignMultipleStudentsModal").modal("hide");
        });
    });


    function closeForm() {

        window.location.href = 'students_data.php';
    }


function calculateAge() {
    var dob = new Date(document.getElementById('dob').value);
    var today = new Date();
    var age = today.getFullYear() - dob.getFullYear();

    // Check if the birthday has not occurred yet this year
    if (today.getMonth() < dob.getMonth() || (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())) {
        age--;
    }

    document.getElementById('age').value = age;
}
</script>


</body>

</html>