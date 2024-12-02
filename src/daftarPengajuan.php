<?php
session_start();
if($_SESSION['role'] != '1'){
    header('Location: home.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Prestasi Pending</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Daftar Prestasi Pending</h1>
        <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead>
                <tr class="bg-blue-600 text-white">
                    <th class="py-2 px-4">No</th>
                    <th class="py-2 px-4">Nama Mahasiswa</th>
                    <th class="py-2 px-4">Nama Kompetisi</th>
                    <th class="py-2 px-4">Kategori</th>
                    <th class="py-2 px-4">Juara</th>
                    <th class="py-2 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once 'classes/User.php';
                include_once 'classes/Admin.php';
                include_once 'config/Database.php';
        
                $db = new Database();
                $validasiAdmin = new Admin($db);
                $list = $validasiAdmin->getPrestasiPendingList();
                
                $no = 1; // Inisialisasi variabel nomor urut
                foreach ($list as $item): ?>
                    <tr class="border-b">
                        <td class="py-2 px-4"><?php echo $no++; ?></td> <!-- Menampilkan nomor urut -->
                        <td class="py-2 px-4"><?php echo htmlspecialchars($item['nama_mahasiswa']); ?></td>
                        <td class="py-2 px-4"><?php echo htmlspecialchars($item['nama_kompetisi']); ?></td>
                        <td class="py-2 px-4"><?php echo htmlspecialchars($item['nama_kategori']); ?></td>
                        <td class="py-2 px-4"><?php echo htmlspecialchars($item['jenis_juara']); ?></td>
                        <td class="py-2 px-4">
                            <a href="detailPengajuan.php?id_pending=<?php echo $item['id_pending']; ?>" class="text-blue-600 hover:underline">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
