
        <?php
        include '../config/koneksi.php';

        $kategori = $_POST['kategori'];

            // Query UPDATE
            $insert = mysqli_query($koneksi, "
                INSERT INTO `kategori` (`ket_kategori`)
                VALUES ('$kategori')
            ");

            if($insert){
                echo "<script>
                        alert('Data berhasil ditambahkan');
                        window.location='../views/admin/data_kategori.php';
                    </script>";
            }
            
            else{
                echo"gagal";
            }   

        
        ?>