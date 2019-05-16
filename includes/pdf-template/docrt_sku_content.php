<?php
function docrt_sku_content($param, $meta, $post_term) {

    $tanggal_permohonan = date_i18n( 'j F Y', strtotime($meta['docrt_form_tgl'][0]));
    $tbl = '
    <table cellspacing="0" cellpadding="1" border="0">
        <tr>
            <td width="15%">Menimbang</td>
            <td width="5%">:</td>
            <td width="3%">a.</td>
            <td width="77%" align="justify">Bahwa Permohonan Izin Usaha Mikro dari '.$meta['docrt_form_nama'][0].' Tanggal '.$tanggal_permohonan.' telah memenuhi persyaratan sebagaimana diatur dalam Peraturan Walikota Malang Nomor 12 Tahun 2015 tentang Tata Cara Pelayanan Perizinan di Kecamatan;</td>
        </tr>
        <tr>
            <td></td>
            <td>:</td>
            <td>b.</td>
            <td align="justify">Bahwa berdasarkan pertimbangan sebagaimana dimaksudkan dalam huruf a, perlu menetapkan Keputusan Camat '.docrt_dd('kec').' tentang Izin Usaha Mikro;</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Mengingat</td>
            <td>:</td>
            <td>1.</td>
            <td align="justify">Undang-Undang Nomor 20 Tahun 2008 tentang Usaha Mikro Kecil;</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>2.</td>
            <td align="justify">Undang-Undang Nomor 23 Tahun 2014 tentang Pemerintah Daerah sebagaimana telah diubah dengan Undnag-Undang Nomor 2 Tahun 2015;</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>3.</td>
            <td align="justify">Peraturan Menteri Dalam Negeri Nomor 83 Tahun 2014 tentang Pedoman Pemberian Izin Usaha Mikro dan Kecil;</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>4.</td>
            <td align="justify">Peraturan Daerah Kota Malang Nomor 7 Tahun 2016 Tentang Pembentukan dan Susunan Perangkat Daerah;</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>5.</td>
            <td align="justify">Peraturan Walikota Malang Nomor 11 Tahun 2015 tentang Pelimpahan Sebagaian Kewenangan Walikota kepada Camat;</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>6.</td>
            <td align="justify">Peraturan Walikota Malang Nomor 12 Tahun 2015 tentang Tata Cara Pelayanan Perizinan di Kecamatan;</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>7.</td>
            <td align="justify">Peraturan Walikota Malang Nomor 49 Tahun 2016 Tentang Kedudukan Organisasi, Tugas dan Fungsi Serta Tata Cara Kerja Kecamatan.</td>
        </tr>
    </table>';

    $tbl .= ' <table cellspacing="0" cellpadding="1" border="0">
        <tr><td align="center">&nbsp;</td></tr>
        <tr><td align="center"><b>MEMUTUSKAN : </b></td></tr>
        <tr><td align="center">&nbsp;</td></tr>
    </table>';

    $tbl .= '
    <table cellspacing="0" cellpadding="1" border="0">
        <tr>
            <td width="15%">Menetapkan</td>
            <td width="5%">:</td>
            <td width="80%" align="justify">KEPUTUSAN CAMAT '.strtoupper(docrt_dd('kec')).' TENTANG IZIN USAHA MIKRO</td>
        </tr>
        <tr><td colspan="3"></td></tr>
        <tr>
            <td width="15%">KESATU</td>
            <td width="5%">:</td>
            <td width="80%">Memberikan izin Usaha Mikro kepada</td>
        </tr>
        <tr>
            <td width="15%"></td>
            <td width="4%"></td>
            <td width="81%">
                <table cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td width="30%">Nama</td>
                        <td width="5%">:</td>
                        <td width="65%">'.$meta['docrt_form_nama'][0].'</td>
                    </tr>
                    <tr>
                        <td>Alamat Rumah</td>
                        <td>:</td>
                        <td>'.$meta['docrt_form_alamat'][0].'</td>
                    </tr>
                    <tr>
                        <td>Nomor KTP</td>
                        <td>:</td>
                        <td>'.$meta['docrt_form_nonik'][0].'</td>
                    </tr>
                    <tr>
                        <td>Nama Usaha</td>
                        <td>:</td>
                        <td>'.$meta['docrt_form_nama_usaha'][0].'</td>
                    </tr>
                    <tr>
                        <td>Alamat Usaha</td>
                        <td>:</td>
                        <td>'.$meta['docrt_form_alamat_usaha'][0].'</td>
                    </tr>
                    <tr>
                        <td>Nomor Telepon</td>
                        <td>:</td>
                        <td>'.$meta['docrt_form_tlp'][0].'</td>
                    </tr>
                    <tr>
                        <td>NPWP</td>
                        <td>:</td>
                        <td>'.$meta['docrt_form_npwp'][0].'</td>
                    </tr>
                    <tr>
                        <td>Bentuk Usaha</td>
                        <td>:</td>
                        <td>'.$meta['docrt_form_bentuk_usaha'][0].'</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td colspan="3"></td></tr>
        <tr>
            <td width="15%">KEDUA</td>
            <td width="5%">:</td>
            <td width="80%">Masa berlaku izin selamanya, sepanjang tidak ada perubahan lokasi dan jenis kegiatan/usaha dan wajib melakukan pendaftaran ulang setiap tahun.</td>
        </tr>
         <tr>
            <td width="15%">KETIGA</td>
            <td width="5%">:</td>
            <td width="80%">Keputusan Camat '.docrt_dd('kec').' ini mulai berlaku pada tanggal ditetapkan.</td>
        </tr>
        <tr><td colspan="3"></td></tr>
    </table>';

    return $tbl;
}
//====================================================================================================