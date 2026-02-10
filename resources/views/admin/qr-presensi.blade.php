<!DOCTYPE html>
<html>

<head>
    <title>QR Presensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-10 rounded-xl shadow text-center">
            <h1 class="text-2xl font-bold mb-6">QR PRESENSI KARYAWAN</h1>

            <div id="qr-container">
                Loading QR...
            </div>
        </div>
    </div>

    <script>
        function getLatestQR() {
            fetch("{{ url('/admin/generate-qr') }}")
                .then(res => res.text())
                .then(svg => {
                    document.getElementById('qr-container').innerHTML = svg;
                })
                .catch(err => console.log("Error ambil QR:", err));
        }

        setInterval(getLatestQR, 10000);

        // load pertama kali
        getLatestQR();
    </script>

</body>

</html>