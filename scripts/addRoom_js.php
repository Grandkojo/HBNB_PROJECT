<script>
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    <script>
        function hideAlert() {
            var alert = document.getElementById('roomsuccess');
            if (alert) {
                alert.style.display = 'none';
            }
        }

        setTimeout(hideAlert, 1000);
    </script>

    <script>
        function hideAlert() {
            var alert = document.getElementById('roomerror');
            if (alert) {
                alert.style.display = 'none';
            }
        }

        setTimeout(hideAlert, 1000);
    </script>
    <script>
        function hideAlert() {
            var alert = document.getElementById('occupantsnumberfail');
            if (alert) {
                alert.style.display = 'none';
            }
        }

        setTimeout(hideAlert, 1000);
    </script>