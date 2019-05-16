<?php

function print_r_ho($post_data) {

    $jenis_surat = $_GET['jenis_surat'];
    $table = '';
    foreach ($post_data as $key => $postval) {
        $post_term = get_the_terms ($postval->ID,'surat');
        $meta = get_post_meta( $postval->ID);
        //print_r($meta); exit();

        $table .= '<table border="0" cellpadding="2" cellspacing="0" align="left" style="border:1px solid black">
                    <tr>
                        <td width="30%">No. Register</td>
                        <td width="5%"> : </td>
                        <td width="65%">'.$meta['docrt_r_ho_id'][0].'</td>
                    </tr>
                    <tr>
                        <td>Tgl. Register</td>
                        <td> : </td>
                        <td>'.date_i18n( 'j F Y', strtotime($postval->post_date)).'</td>
                    </tr>
                    <tr>
                        <td>Nama Pemohon</td>
                        <td> : </td>
                        <td>'.$meta['docrt_form_nama'][0].'</td>
                    </tr>
                    <tr>
                        <td>Alamat Pemohon</td>
                        <td> : </td>
                        <td>'.$meta['docrt_form_alamat'][0].'</td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Tentang Bangunan :</strong></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Nomor IMB</td>
                        <td> : </td>
                        <td>'.$meta['docrt_form_no_imb'][0].'</td>
                    </tr>
                    <tr>
                        <td>Tanggal IMB</td>
                        <td> : </td>
                        <td>'.date_i18n( 'j F Y', strtotime($meta['docrt_form_tgl_imb'][0])).'</td>
                    </tr>
                    <tr>
                        <td>Fungsi & Bentuk Bangunan</td>
                        <td> : </td>
                        <td>'.$meta['docrt_form_fungsi_imb'][0].'</td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Tentang Usaha :</strong></td>
                    </tr>
                    <tr>
                        <td>Alamat Usaha</td>
                        <td> : </td>
                        <td>'.$meta['docrt_form_alamat_usaha'][0].'</td>
                    </tr>
                    <tr>
                        <td>Jenis Usaha</td>
                        <td> : </td>
                        <td>'.$meta['docrt_form_ket_usaha'][0].'</td>
                    </tr>
                    <tr>
                        <td>Nama Usaha</td>
                        <td> : </td>
                        <td>'.$meta['docrt_form_nama_usaha'][0].'</td>
                    </tr>
                    <tr>
                        <td>Badan Hukum / Perorangan</td>
                        <td> : </td>
                        <td>'.$meta['docrt_form_badan_hukum'][0].'</td>
                    </tr>
                    <tr>
                        <td>Bukti Kepemilikan Tanah</td>
                        <td> : </td>
                        <td>'.$meta['docrt_form_bkt'][0].'</td>
                    </tr>
                </table>
                <table>
                  <tr>
                      <td colspan="3">&nbsp;</td>
                  </tr>
                  <tr>
                      <td colspan="3">&nbsp;</td>
                  </tr>
                </table>';
        $pagebreak = ($key + 1) % 2;
        if ($pagebreak === 0) {
          $table .= '<br pagebreak="true"/>';
        }
    }
    return $table;
}

function print_r_imb($post_data) {

    $jenis_surat = $_GET['jenis_surat'];
    $table = '';
    foreach ($post_data as $key => $postval) {
        $post_term = get_the_terms ($postval->ID,'surat');
        $meta = get_post_meta( $postval->ID);

        $table .= '<table border="0" cellpadding="2" cellspacing="3" align="left" style="border:1px solid black">
                    <tr>
                        <td width="30%">No. Register</td>
                        <td width="5%"> : </td>
                        <td width="65%">'.$meta['docrt_r_imb_id'][0].'</td>
                    </tr>
                    <tr>
                        <td>Tgl. Register</td>
                        <td> : </td>
                        <td>'.date_i18n( 'j F Y', strtotime($postval->post_date)).'</td>
                    </tr>
                    <tr>
                        <td>Nama Pemohon</td>
                        <td> : </td>
                        <td>'.$meta['docrt_form_nama'][0].'</td>
                    </tr>
                    <tr>
                        <td>Alamat Pemohon</td>
                        <td> : </td>
                        <td>'.$meta['docrt_form_alamat'][0].'</td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Tentang Bangunan :</strong></td>
                    </tr>
                    <tr>
                        <td>Nomor tgl. KRK</td>
                        <td> : </td>
                        <td>'.$meta['docrt_form_no_krk'][0].'  &#9;&#9;&#9;&#9; tgl.'.date_i18n( 'j F Y', strtotime($meta['docrt_form_tgl_krk'][0])).'</td>
                    </tr>
                    <tr>
                        <td>Fungsi & Bentuk Bgn (KRK)</td>
                        <td> : </td>
                        <td>'.$meta['docrt_form_fungsi_krk'][0].'</td>
                    </tr>
                    <tr>
                        <td>Penyerahan & Max. Lantai</td>
                        <td> : </td>
                        <td> / '.$meta['docrt_form_jml_lantai'][0].'</td>
                    </tr>
                    <tr>
                        <td>Fungsi & Bentuk Bgn (IMB)</td>
                        <td> : </td>
                        <td>'.$meta['docrt_form_fungsi_imb'][0].'</td>
                    </tr>
                    <tr>
                        <td>Jumlah Lantai & Unit</td>
                        <td> : </td>
                        <td>'.$meta['docrt_form_jml_lantai'][0].' / '.$meta['docrt_form_jml_unit'][0].'</td>
                    </tr>
                    <tr>
                        <td>Alamat Bangunan</td>
                        <td> : </td>
                        <td>'.$meta['docrt_form_alamat_bangunan'][0].'</td>
                    </tr>
                    <tr>
                        <td>Bukti Kepemilikan Tanah</td>
                        <td> : </td>
                        <td>'.$meta['docrt_form_bkt'][0].'</td>
                    </tr>
                </table>
                <table>
                  <tr>
                      <td colspan="3">&nbsp;</td>
                  </tr>
                  <tr>
                      <td colspan="3">&nbsp;</td>
                  </tr>
                </table>';
        $pagebreak = ($key + 1) % 2;
        if ($pagebreak === 0) {
          $table .= '<br pagebreak="true"/>';
        }
    }
    return $table;
}

function print_kk($post_data) {

    $jenis_surat = $_GET['jenis_surat'];
    $table = '';
    $table .= print_table_space();
    foreach ($post_data as $key => $postval) {
        $post_term = get_the_terms ($postval->ID,'surat');
        $meta = get_post_meta( $postval->ID);
        $table .= '<table border="1" cellpadding="3" cellspacing="0">';
        $table .= '<tr align="center">
            <th width="5%">REG</th>
            <th width="20%">NAMA LENGKAP</th>
            <th width="5%">L/P</th>
            <th width="10%">TEMPAT/TGL LAHIR</th>

            <th width="20%">ALAMAT</th>
            <th width="10%">AGAMA</th>
            <th width="10%">STATUS</th>
            <th width="10%">PENDK.</th>
            <th width="10%">PEKERJAAN</th>
        </tr>';
        $table .= '<tr>
            <td>'.$meta['docrt_'.$jenis_surat.'_id'][0].'</td>
            <td>1. '.$meta['docrt_form_nama'][0].'</td>
            <td>'.(($meta['docrt_form_jk'][0] == 'Perempuan') ? 'P' : 'L').'</td>
            <td>'.$meta['docrt_form_ttl'][0].'</td>
            <td>'.$meta['docrt_form_alamat'][0].'</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>';

        $p_count = $meta['docrt_form_pengikut'][0];
        for ($i=1; $i <= $p_count; $i++) {
          $no = $i + 1;
          $table .= '<tr>
              <td></td>
              <td>'.$no.'. '.$meta['docrt_pengikut_nama'.$i][0].'</td>
              <td>'.(($meta['docrt_pengikut_jk'.$i][0] == 'Perempuan') ? 'P' : 'L').'</td>
              <td>'.date_i18n( 'j F Y', strtotime($meta['docrt_pengikut_lahir'.$i][0])).'</td>
              <td></td>
              <td></td>
              <td>'.$meta['docrt_pengikut_status'.$i][0].'</td>
              <td>'.$meta['docrt_pengikut_pendidikan'.$i][0].'</td>
              <td></td>
          </tr>';
        }
        $table .= '</table>';
        $table .= print_table_space(2);
    }
    return $table;
}

function print_ktp($post_data) {

    $jenis_surat = $_GET['jenis_surat'];
    $table = '<table>';
    $table .= '<tr><td width="50%">';

    $data_count = count($post_data);
    $data = [];
    $toggle = true;
    $ic = 1;
    for ($i = 0; $i < $data_count; $i++) {
        if ($toggle) {
            $data1[] = $i;
            if ($ic == 5) {
                $toggle = false;
                $ic = 1;
            } else {
                $ic++;
            }
        } else {
            $data2[] = $i;
            if ($ic == 5) {
               $toggle = true;
               $ic = 1;
            } else {
               $ic++;
            }
        }
    }

    foreach ($data1 as  $postval) {
        $post = $post_data[$postval];
        $post_term = get_the_terms ($post->ID,'surat');
        $meta = get_post_meta( $post->ID);

        $table .= '<table border="0" cellpadding="0" cellspacing="0" align="left">
            <tr>
                <td width="42%">NO. REG</td>
                <td width="3%"> : </td>
                <td width="55%">'.$meta['docrt_ktp_id'][0].' &#9;&#9;&#9;&#9;&#9;&#9; Tgl : '.date_i18n( 'j F Y', strtotime($post->post_date)).'</td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td> : </td>
                <td>'.$meta['docrt_form_nama'][0].'</td>
            </tr>
            <tr>
                <td>TEMPAT/TGL. LAHIR</td>
                <td> : </td>
                <td>'.$meta['docrt_form_ttl'][0].'</td>
            </tr>
            <tr>
                <td>JENIS KELAMIN</td>
                <td> : </td>
                <td>'.$meta['docrt_form_jk'][0].'</td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td> : </td>
                <td>'.$meta['docrt_form_alamat'][0].'</td>
            </tr>
            <tr>
                <td>KELURAHAN</td>
                <td> : </td>
                <td>'.$meta['docrt_form_kelurahan'][0].'</td>
            </tr>
            <tr>
                <td>KECAMATAN</td>
                <td> : </td>
                <td>'.$meta['docrt_form_kecamatan'][0].'</td>
            </tr>
            <tr>
                <td>AGAMA</td>
                <td> : </td>
                <td>'.$meta['docrt_form_agama'][0].'</td>
            </tr>
            <tr>
                <td>STATUS PERKAWINAN</td>
                <td> : </td>
                <td>'.$meta['docrt_form_sperkawinan'][0].'</td>
            </tr>
            <tr>
                <td>PEKERJAAN</td>
                <td> : </td>
                <td>'.$meta['docrt_form_pekerjaan'][0].'</td>
            </tr>
            <tr>
                <td>KEWARGANEGARAAN</td>
                <td> : </td>
                <td>'.$meta['docrt_form_kebangsaan'][0].'</td>
            </tr>
        </table>';
        $table .= print_table_space(2);
    }
    $table .= '</td>';
    $table .= '<td width="50%">';

    foreach ($data2 as  $postval) {
        $post = $post_data[$postval];
        $post_term = get_the_terms ($post->ID,'surat');
        $meta = get_post_meta( $post->ID);

        $table .= '<table border="0" cellpadding="0" cellspacing="0" align="left">
            <tr>
                <td width="42%">NO. REG</td>
                <td width="3%"> : </td>
                <td width="55%">'.$meta['docrt_ktp_id'][0].' &#9;&#9;&#9;&#9;&#9;&#9; Tgl : '.date_i18n( 'j F Y', strtotime($post->post_date)).'</td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td> : </td>
                <td>'.$meta['docrt_form_nama'][0].'</td>
            </tr>
            <tr>
                <td>TEMPAT/TGL. LAHIR</td>
                <td> : </td>
                <td>'.$meta['docrt_form_ttl'][0].'</td>
            </tr>
            <tr>
                <td>JENIS KELAMIN</td>
                <td> : </td>
                <td>'.$meta['docrt_form_jk'][0].'</td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td> : </td>
                <td>'.$meta['docrt_form_alamat'][0].'</td>
            </tr>
            <tr>
                <td>KELURAHAN</td>
                <td> : </td>
                <td>'.$meta['docrt_form_kelurahan'][0].'</td>
            </tr>
            <tr>
                <td>KECAMATAN</td>
                <td> : </td>
                <td>'.$meta['docrt_form_kecamatan'][0].'</td>
            </tr>
            <tr>
                <td>AGAMA</td>
                <td> : </td>
                <td>'.$meta['docrt_form_agama'][0].'</td>
            </tr>
            <tr>
                <td>STATUS PERKAWINAN</td>
                <td> : </td>
                <td>'.$meta['docrt_form_sperkawinan'][0].'</td>
            </tr>
            <tr>
                <td>PEKERJAAN</td>
                <td> : </td>
                <td>'.$meta['docrt_form_pekerjaan'][0].'</td>
            </tr>
            <tr>
                <td>KEWARGANEGARAAN</td>
                <td> : </td>
                <td>'.$meta['docrt_form_kebangsaan'][0].'</td>
            </tr>
        </table>';
        $table .= print_table_space(2);
    }

    $table .= '</td></tr>';
    $table .= '</table>';
    return $table;
}

function print_skp($post_data) {

    $jenis_surat = $_GET['jenis_surat'];
    $table = '';
    $table .= print_table_space();
    foreach ($post_data as $key => $postval) {
        $post_term = get_the_terms ($postval->ID,'surat');
        $meta = get_post_meta( $postval->ID);
        $table .= '<table border="1" cellpadding="2" cellspacing="0">';
        $table .= '<tr align="center">
            <th width="3%" rowspan="3">NO. REG</th>
            <th width="15%" rowspan="2" colspan="2">PEMBUATAN SURAT</th>
            <th width="15%" rowspan="3">&nbsp;NAMA PELAPOR / PENGIKUT</th>
            <th width="18%" colspan="4">KATEGORI PINDAH</th>
            <th width="9%" rowspan="3">UMUR</th>
            <th width="5%" rowspan="3">STATUS</th>
            <th width="6%" rowspan="3">AGAMA</th>
            <th width="7%" rowspan="3">PEKERJAAN</th>
            <th width="5%" rowspan="3">PEND</th>
            <th width="15%" rowspan="3">ALAMAT ASAL</th>
        </tr>';
        $table .= '<tr align="center">
            <th>DLM KOTA</th>
            <th>LUAR KOTA</th>
            <th>ANTAR PROP</th>
            <th>LUAR NEG.</th>
        </tr>';
        $table .= '<tr align="center">
            <th>NOMOR</th>
            <th>TANGGAL</th>
            <th>L / P</th>
            <th>L / P</th>
            <th>L / P</th>
            <th>L / P</th>
        </tr>';
        $table .= '<tr align="center">
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
            <th>10</th>
            <th>11</th>
            <th>12</th>
            <th>13</th>
            <th>14</th>
        </tr>';
        $table .= '<tr align="center">
            <td>'.$meta['docrt_'.$jenis_surat.'_id'][0].'</td>
            <td></td>
            <td>'.date_i18n( 'j-m-Y', strtotime($postval->post_date)).'</td>
            <td align="left"> 1. '.$meta['docrt_form_nama'][0].'</td>
            <td>'.(($meta['docrt_form_jk'][0] == 'Perempuan') ? 'P' : 'L').'</td>
            <td></td>
            <td></td>
            <td></td>
            <td>'.$meta['docrt_form_ttl'][0].'</td>
            <td>'.$meta['docrt_form_sperkawinan'][0].'</td>
            <td>'.$meta['docrt_form_agama'][0].'</td>
            <td>'.$meta['docrt_form_pekerjaan'][0].'</td>
            <td>'.$meta['docrt_form_pendidikan'][0].'</td>
            <td align="left" rowspan="20">'.$meta['docrt_form_alamat'][0].'</td>
        </tr>';

        $p_count = $meta['docrt_form_pengikut'][0];
        for ($i=1; $i <= $p_count; $i++) {
          $no = $i + 1;
          $table .= '<tr align="center">
              <td></td>
              <td></td>
              <td></td>
              <td align="left"> '.$no.'. '.$meta['docrt_pengikut_nama'.$i][0].'</td>
              <td>'.(($meta['docrt_pengikut_jk'.$i][0] == 'Perempuan') ? 'P' : 'L').'</td>
              <td></td>
              <td></td>
              <td></td>
              <td>'.date_i18n( 'j F Y', strtotime($meta['docrt_pengikut_lahir'.$i][0])).'</td>
              <td>'.$meta['docrt_pengikut_status'.$i][0].'</td>
              <td></td>
              <td></td>
              <td>'.$meta['docrt_pengikut_pendidikan'.$i][0].'</td>
          </tr>';
        }

        $table .= '</table>';
        $table .= print_table_space(2);
    }
    return $table;
}

function print_table_space($tr = 1) {
    $table = '<table>';
    for ($i=0; $i < $tr; $i++) {
        $table .= '<tr><td>&nbsp;</td></tr>';
    }
    $table .= '</table>';

    return $table;
}
?>
