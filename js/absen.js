function docReady(fn) {
    // see if DOM is already available
    if (document.readyState === "complete" ||
        document.readyState === "interactive") {
        // call on next available tick
        setTimeout(fn, 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}

docReady(function() {
    var resultContainer = document.getElementById('qr-reader-results');
    var lastResult, countResults = 0;

    function onScanSuccess(decodedText, decodedResult) {
        if (decodedText !== lastResult) {
            ++countResults;
            lastResult = decodedText;
            nama = lastResult.length
            idPeserta = lastResult.substr(nama - 10)
            namaPeserta = lastResult.substr(0, nama - 10)
            ganti = namaPeserta.replace(' ', '-')
            // Handle on success condition with the decoded message.
            document.getElementById('body-result').innerHTML =
                `<h1>Selamat Datang</h1><h1>${decodedText}</h1> 
                 <div class="registrasi">
                    <form action="" method="post">
                        <input type="text" name="id" value=${idPeserta} hidden>
                        <input type="text" name="nama" size="50" value=${ganti} hidden>
                        <button class="btn btn-primary" type="submit" name="registrasi" value="REGISTRASI">REGISTRASI</button>
                    </form>
                 </div>`;


        }
    }

    var html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader", {
            fps: 10,
            qrbox: 250
        });
    html5QrcodeScanner.render(onScanSuccess);
});