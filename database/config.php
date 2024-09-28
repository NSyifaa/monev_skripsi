<?php
date_default_timezone_set('Asia/Jakarta');
$con = mysqli_connect('localhost','root','','monev_skripsi');
if(!$con){
	"Mohon Maaf, Koneksi database terputus";

}

                  function encriptData($kk)
                  {
                    $hh = base64_encode($kk);
                    $aa = str_replace('=', '', $hh);

                    $panjang_karakter = strlen($aa);

                    $rand = '123';

                    if($panjang_karakter % 2 === 0)
                    {
                      //genap
                      $pp = $panjang_karakter;
                      $bagi_2 = $pp / 2;
                      $bagian_pecah = $aa;
                    }
                    else{
                      //ganjil
                      $mm = $aa . $rand;
                      $pp = strlen($mm);
                      $bagi_2 = $pp / 2 ;
                      $bagian_pecah = $mm;

                    }

                    $bagian_awal = substr($bagian_pecah, 0, -$bagi_2);
                    $bagian_tengah = '9999';
                    $bagian_akhir = substr($bagian_pecah, $bagi_2);

                    $hasil_encode = $bagian_awal . $bagian_tengah . $bagian_akhir;

                    //tambahan encode
                    $encode_akhir = base64_encode($hasil_encode);
                    $encode_akhir = str_replace('=', '', $encode_akhir);

                    return $encode_akhir;
                  }

                   function decriptData($vale)
                  {
                    $val = base64_decode($vale);

                    $jl = str_replace('9999','',$val);
                    $mm = str_replace('123','',$jl);
                    $hasil_decript = base64_decode($mm);

                   return $hasil_decript;
                  }

                  $value = 'jokowi';
                  $encript_data = encriptData($value);
                  $decript_data = decriptData($encript_data);

                   echo $value;
                   echo '<hr>';
                   echo $encript_data;
                   echo '<hr>';
                  echo $decript_data;

                  

?>