<script>
        // Get today's date in the format "YYYY-MM-DD"
        function getTodayDate() {
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-based
            const day = String(today.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }

        // Set the minimum date to today
        document.getElementById('check_in_date').min = getTodayDate();
    </script>


    <script>
        // Get today's date in the format "YYYY-MM-DD"
        function getTodayDate() {
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-based
            const day = String(today.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }

        document.getElementById('check_out_date').min = getTodayDate();
    </script>

    <script>
        let submitform = document.getElementById('bookingForm');
        let submit = document.getElementById('emailsubmission');
        submit.addEventListener('click', function() {
            swal({
                title: "Booking Successful!",
                text: "You will receive a confirmation email shortly...",
                icon: "success",
                buttons: ["CANCEL", "SEND"],
            }).then((result) => {
                if (result) {
                    submitform.submit();
                    swal("Email Sent!", "Thank you for booking with us!", "success");
                }
            });
        });
    </script>