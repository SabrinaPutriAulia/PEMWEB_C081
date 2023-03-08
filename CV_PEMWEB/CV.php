<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae</title>
    <link rel="stylesheet" href="tampilan.css">
    <link rel="stylesheet" href="960.css">
</head>
<body>
<?php
//variabel 
$nama = 'Sabrina Putri Aulia';
$alamat = 'Desa Kerik RT 18 RW 03 Kecamatan Takeran Kabupaten Magetan';
$status = 'Mahasiswa';

echo '<div id="container" class="container_12" style="border: 1px solid black; padding-left: 5px;">';
echo '        <div id="header" class="grid_12" style="padding-right: 9px; margin-top: 2%;">';
echo '            <div class="cover">';
echo '                <div class="sector">';
echo '                    <div class="box">';
echo '                        <h1>S</h1>';
echo '                    </div>';
echo '                    <h1 class="main-title">'.$nama.'</h1>';
echo '                </div>';
echo '            </div>';
echo '        </div>';
echo '';
//Fungsi untuk menghitung umur & menampilkan tanggal lahir
function umur($tgl_lahir) {
    $lahir = new DateTime($tgl_lahir);
    $hari_ini = new DateTime();

    $umur = $hari_ini -> diff($lahir);

    echo date('d F Y', strtotime($tgl_lahir)) .'<br />';
    echo "<p>Umur : ".$umur -> y." Tahun";
}
echo '        <div id="content1" class="grid_8">';
echo '            <div class="aves">';
echo '                <img src="file-1453.svg" height="30" alt="">';
echo '                <i class="fas fa-file" style="font-size: 25px;"></i>';
echo '                <div class="subjudul">PROFIL<hr class="garis" align="left"></div>';
echo '                <p>Nama : '.$nama.'</p>';
echo '                <p>Tempat, Tanggal Lahir : Lumajang, '; umur('2003-04-17'); //Pemanggilan function umur
echo '                <p>Alamat : '.$alamat.'</p>';
echo '                <p>Status : '.$status.'</p>';
echo '            </div>';
echo '        </div>';
echo '';
echo '        <div id="content2" class="grid_4 alpha">';
echo '            <div class="background">';
echo '                <div class="bves">';
echo '                    <img class="img1" src="Sabrina Putri Aulia.jpg" alt="">';
echo '                    <hr class="garis1" align="left">';
echo '                    <a href="https://wa.me/628999813032">';
echo '                    <img src="whatsapp-103.svg" height="30" alt=""></a> &nbsp;';
echo '                    <a href="https://www.linkedin.com/in/sabrina-putri-aulia-05ab98221?lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_view_base_contact_details%3BB2xBgXO3TQWUw%2FIj1s%2Fsaw%3D%3D">';
echo '                    <img src="linkedin-logo-black-outline-15918.svg" height="30" alt=""></a> &nbsp;';
echo '                    <a href="https://github.com/SabrinaPutriAulia">';
echo '                    <img src="github-logo-6532.svg" height="30" alt=""></a> &nbsp;';
echo '                    <a href="CV_Sabrina Putri Aulia.pdf" download="fa-file">';
echo '                    <img src="import-14554.svg" height="30" align="right" alt=""></a>';
echo '                </div>';
echo '            </div>';
echo '        </div>';
echo '        <div id="content3" class="grid_12" style="padding-right: 10px;">';
echo '            <div class="cves">';
echo '                <img src="book-4989.svg" height="30" alt="">';
echo '                <div class="subjudul">PENDIDIKAN<hr class="garis" align="left"></div>';
echo '                <div class="div">';
echo '                    <p>';
echo '                        <b>Universitas Pembangunan Nasional "Veteran" Jawa Timur, Surabaya</b>';
echo '                    </p>';
echo '                    <p style="line-height: 1px;"><b>Informatika</b></p>';
echo '                    <p>Saya menempuh pendidikan di UPN Veteran Jawa Timur dengan konsentrasi';
echo '                        jurusan Informatika</p>';
echo '                    <p>';
echo '';
echo '                    <p>';
echo '                        <br><b>Madrasah Aliyah Negeri 1 Magetan, Kabupaten Magetan</b>';
echo '                    </p>';
echo '                    <p style="line-height: 1px;"><b>Ilmu Pengetahuan Alam</b></p>';
echo '                    <p>Saya menempuh pendidikan di Madrasah Aliyah Negeri 1 Magetan dengan konsentrasi';
echo '                        Ilmu Pengetahuan Alam</p>';
echo '                </div>';
echo '            </div>';
echo '        </div>';
echo '';
echo '        <div id="content4" class="grid_6" style="margin-top: 2%;">';
echo '            <div class="background1">';
echo '                <div class="cves">';
echo '                    <img src="star-2763.svg" height="30" alt="">';
echo '                    <div class="subjudul">PENGALAMAN<hr class="garis" align="left"></div>';
echo '                    <p>';
echo '                        <ul type="circle">';
echo '                            <li>';
echo '                                <p><b>LANIK : Latihan Dasar Kepemimpinan Mahasiswa Informatika</b></p>';
echo '                                <p style="line-height: 1px;"><b>Divisi Acara</b></p>';
echo '                                <p>(Juli 2022 - November 2022)</p>';
echo '                            </li>';
echo '                            <li>';
echo '                                <p><b>MOSAIK : Masa Orientasi Mahasiswa Fakultas Ilmu Komputer</b></p>';
echo '                                <p style="line-height: 1px;"><b>Divisi Senior Pendamping</b></p></li>';
echo '                                <p>(Juni 2022 - Agustus 2022)</p>';
echo '                            </li>';
echo '                        </ul>    ';
echo '                    </p>';
echo '                </div>';
echo '            </div>';
echo '        </div>';
echo '';
echo '        <div id="content5" class="grid_6 alpha" style="margin-top: 2%;">';
echo '            <div class="cves">';
echo '                <div class="projek">';
echo '                    <img src="laptop-and-coding-12521.svg" height="30" alt="">';
echo '                    <div class="subjudul">PROJEK KULIAH<hr class="garis" align="left"></div>';
echo '                        <p>';
echo '                            <ul type="circle">';
echo '                                <li>';
echo '                                    <p><b>Program Sederhana : Seleksi Penerima Bantuan Sosial</b></p>';
echo '                                    <p style="line-height: 1px;">(Juli 2022 - November 2022)</p>';
echo '                                </li>';
echo '                                <li>';
echo '                                 <p><b>Remastering Linux</b></p>';
echo '                                <p style="line-height: 1px;">(Juni 2022 - Agustus 2022)</p>';
echo '                                 </li>';
echo '                            </ul>   ';
echo '                        </p>';
echo '                </div>';
echo '            </div>';
echo '        </div>';
echo '';
echo '        <div id="footer" class="grid_12" style="padding-right: 10px;">';
echo '            <div class="background1">';
echo '                <div class="cves" style="margin-bottom: 2%;"></div>';
echo '            </div>';
echo '        </div>';
echo '    </div>';
?>
</body>
</html>