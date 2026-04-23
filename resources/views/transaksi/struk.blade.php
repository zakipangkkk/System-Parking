<!DOCTYPE html>
<html>
<head>
    <title>Struk Parkir</title>
    <style>
        body {
            font-family: monospace;
            width: 250px;
            margin: auto;
        }
        .struk {
            border: 1px dashed #000;
            padding: 10px;
        }
        h3 {
            text-align: center;
            margin-bottom: 10px;
        }
        .line {
            border-top: 1px dashed #000;
            margin: 10px 0;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body onload="window.print()">

<div class="struk">
    <h3>PARKIRAN</h3>

    <div class="line"></div>

    <p>No Polisi : {{ $transaksi->kendaraan->plat_nomor }}</p>
    <p>Jenis     : {{ $transaksi->kendaraan->jenis_kendaraan }}</p>

    <div class="line"></div>

    <p>Masuk  : {{ $transaksi->waktu_masuk }}</p>
    <p>Keluar : {{ $transaksi->waktu_keluar }}</p>

    <div class="line"></div>
    <p>Tarif  : Rp {{ number_format($transaksi->tarif->tarif_per_jam) }}</p>

    <h4>Total: Rp {{ number_format($transaksi->biaya_total) }}</h4>

    <div class="line"></div>

    <p class="text-center">Terima Kasih 🙏</p>
</div>

</body>
</html>