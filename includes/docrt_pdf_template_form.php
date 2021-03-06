<?php
function docrt_pdf_template_form($type,$meta,$postID) {

    $data['sku'] = array(
        'Nama' => 'docrt_form_nama',
        'Tempat Tanggal Lahir' => 'docrt_form_ttl',
        'Jenis Kelamin' => 'docrt_form_jk',
        'Agama' => 'docrt_form_agama',
        'Status Perkawinan' => 'docrt_form_sperkawinan',
        'Nomor KK' => 'docrt_form_nokk',
        'Nomor NIK' => 'docrt_form_nonik',
        'Pekerjaan' => 'docrt_form_pekerjaan',
        'Alamat' => 'docrt_form_alamat',
        'Pendidikan' => 'docrt_form_pendidikan',
        'Keperluan' => 'docrt_form_keperluan',
        'Tujuan' => 'docrt_form_tujuan',
        'Berlaku Tanggal' => 'docrt_form_tgl_berlaku',
        'Sesuai Keterangan RT' => 'docrt_form_ketRT',
     /*   'Nama Usaha' => 'docrt_form_nama_usaha',
        'Alamat Usaha' => 'docrt_form_alamat_usaha',*/
        'Bentuk Usaha' => 'docrt_form_bentuk_usaha',
        'Telepon' => 'docrt_form_tlp',
        'NPWP' => 'docrt_form_npwp'

    );
    $data['skdu'] = array(
        'a' => array(
            'Nama' => $meta['docrt_form_nama'][0],
            'Tempat Tanggal Lahir' => $meta['docrt_form_ttl'][0],
            'Agama' => $meta['docrt_form_agama'][0],
            'Pekerjaan' => $meta['docrt_form_pekerjaan'][0],
            'Alamat' => $meta['docrt_form_alamat'][0],
            'Kelurahan' => $meta['docrt_form_kelurahan'][0],
            'Kecamatan' => $meta['docrt_form_kecamatan'][0],
            'Kota' => $meta['docrt_form_kota'][0],
            'Nama Usaha' => $meta['docrt_form_nama_usaha'][0]
        ),
        'b' => array(
            'docrt_form_alamat_usaha' => $meta['docrt_form_alamat_usaha'][0],
            'docrt_form_ketRT' => $meta['docrt_form_ketRT'][0],
            'docrt_form_rtrw_usaha' => $meta['docrt_form_rtrw_usaha'][0],
            'docrt_form_tgl' => date_i18n( 'j F Y', strtotime($meta['docrt_form_tgl'][0])),
            'docrt_form_keperluan' => $meta['docrt_form_keperluan'][0],
            'docrt_form_ket_usaha' => $meta['docrt_form_ket_usaha'][0],

            'docrt_form_kelurahan' => $meta['docrt_form_kelurahan'][0],
            'docrt_form_kecamatan' => $meta['docrt_form_kecamatan'][0],
            'docrt_form_kota' => $meta['docrt_form_kota'][0],
            'docrt_form_nama_usaha' => $meta['docrt_form_nama_usaha'][0]
        )

    );
    $data['skd'] = array(
        'a' => array(
            'Nama'=> $meta['docrt_form_nama_usaha'][0],
            'Alamat'=> $meta['docrt_form_alamat_usaha'][0],
            'Kelurahan'=> $meta['docrt_form_kelurahan'][0],
            'Kecamatan'=> $meta['docrt_form_kecamatan'][0],
            'Kota'=> $meta['docrt_form_kota'][0],
            $meta['docrt_form_nama_noinduk_lembaga'][0] => $meta['docrt_form_noinduk_lembaga'][0],  //'option'=> $meta['docrt_form_nama_noinduk_lembaga'][0],
            'Nama Lembaga / Organisasi'=> $meta['docrt_form_nama_lembaga'][0],
        ),
        'b' => array(
            'docrt_form_nama'=> $meta['docrt_form_nama'][0],
            'docrt_form_alamat'=> $meta['docrt_form_alamat'][0],
            'docrt_form_rtrw'=> $meta['docrt_form_rtrw'][0],
            'docrt_form_tujuan'=> $meta['docrt_form_tujuan'][0],
        )
    );
    $data['skik'] = array(
        'a' => array(
            'Nama' => $meta['docrt_form_nama'][0],
            'Tempat Tanggal Lahir' => $meta['docrt_form_ttl'][0],
            'Jenis Kelamin' => $meta['docrt_form_jk'][0],
            'Agama' => $meta['docrt_form_agama'][0],
            'Status Perkawinan' => $meta['docrt_form_sperkawinan'][0],
            'Nomor KK' => $meta['docrt_form_nokk'][0],
            'Nomor NIK' => $meta['docrt_form_nonik'][0],
            'Pekerjaan' => $meta['docrt_form_pekerjaan'][0],
            'Alamat' => $meta['docrt_form_alamat'][0],
            'Pendidikan' => $meta['docrt_form_pendidikan'][0],
            'Keperluan' => $meta['docrt_form_keperluan'][0],
            'Tujuan' => $meta['docrt_form_tujuan'][0],
            'Berlaku Tanggal' => $meta['docrt_form_tgl_berlaku'][0],
            'Keterangan RT/RW' => $meta['docrt_form_ketRT'][0],
        ),
        'b' => array(
            'docrt_form_nama_acara' => $meta['docrt_form_nama_acara'][0],
            'docrt_form_tgl_acara' => date_i18n( 'j F Y', strtotime($meta['docrt_form_tgl_acara'][0]))
        )
    );
    $data['skck'] = array(
        'a' => array(
            'Nama' => $meta['docrt_form_nama'][0],
            'Tempat Tanggal Lahir' => $meta['docrt_form_ttl'][0],
            'Jenis Kelamin' => $meta['docrt_form_jk'][0],
            'Agama' => $meta['docrt_form_agama'][0],
            'Status Perkawinan' => $meta['docrt_form_sperkawinan'][0],
            'Pekerjaan' => $meta['docrt_form_pekerjaan'][0],
            'Alamat' => $meta['docrt_form_alamat'][0],
            'Pendidikan' => $meta['docrt_form_pendidikan'][0],
            'Keperluan' => $meta['docrt_form_keperluan'][0],
            'Tujuan' => $meta['docrt_form_tujuan'][0],
            'Nomor KK' => $meta['docrt_form_nokk'][0],
            'Nomor NIK' => $meta['docrt_form_nonik'][0],
            'Berlaku Tanggal' => $meta['docrt_form_tgl_berlaku'][0],
            'Surat Pengantar RT No.' => $meta['docrt_form_ketRT'][0]
        )
    );
    $data['skp'] = array(
        'a' => array(
            'Nama' => $meta['docrt_form_nama'][0],
            'Jenis Kelamin' => $meta['docrt_form_jk'][0],
            'Tempat Tanggal Lahir' => $meta['docrt_form_ttl'][0],
            'Kebangsaan/Suku' => $meta['docrt_form_kebangsaan'][0],
            'Agama' => $meta['docrt_form_agama'][0],
            'Status Perkawinan' => $meta['docrt_form_sperkawinan'][0],
            'Pekerjaan' => $meta['docrt_form_pekerjaan'][0],
            'Pendidikan' => $meta['docrt_form_pendidikan'][0],
            'Alamat' => $meta['docrt_form_alamat'][0],
            'No. Kartu Keluarga' => $meta['docrt_form_nokk'][0],
            'No. Register' => docrt_no_surat($type,$meta,$postID),
            'No. KTP' => $meta['docrt_form_nonik'][0],
            'Keterangan RT nomor' => $meta['docrt_form_ketRT'][0],
            'Tanggal' => date_i18n( 'j F Y', strtotime($meta['docrt_form_tgl'][0])),
            'Keperluan' => $meta['docrt_form_keperluan'][0],
            'Tujuan' => $meta['docrt_form_tujuan'][0],
        ),
        'b' => array(
            'Desa' => $meta['docrt_form_desa_pindah'][0],
            'Kecamatan' => $meta['docrt_form_kecamatan_pindah'][0],
            'Kab/Kota' => $meta['docrt_form_kabkota_pindah'][0],
            'Provinsi' => $meta['docrt_form_provinsi_pindah'][0],
            'Pada Tanggal' => date_i18n( 'j F Y', strtotime($meta['docrt_form_tgl_pindah'][0])),
        ),
        'c' => array(
            'docrt_form_tgl_berlaku' =>  $meta['docrt_form_tgl_berlaku'][0],
            'docrt_form_alasan_pindah' => $meta['docrt_form_alasan_pindah'][0],
            'docrt_form_pengikut' => $meta['docrt_form_pengikut'][0],
        )
    );

    $data['sktm'] = $data['skck'];
    $data['skbpm'] = $data['skck'];
    $data['skel'] = array(
        'a' => array(
            'Nama Lengkap' => strtoupper($meta['docrt_form_nama_bayi'][0]),
            'Jenis Kelamin' => $meta['docrt_form_jk'][0],
            'Dilahirkan' => date_i18n( 'j F Y', strtotime($meta['docrt_form_dilahirkan1'][0])),
            'Kelahiran' => $meta['docrt_form_kelahiran'][0],
            'Jika kembar, anak ini lahir yang ke' => ($meta['docrt_form_kembarke'][0]) ? $meta['docrt_form_kembarke'][0] : '-',
            'Tempat Kelahiran' => $meta['docrt_form_tempat'][0],
            'Desa/Kota' => $meta['docrt_form_kota'][0],
            'Penolong Kelahiran' => $meta['docrt_form_penolong_lahir'][0],
        ),
        'a1' => array(
            'Nama Lengkap' => $meta['docrt_form_nama_ibu'][0],
            'Alamat' => $meta['docrt_form_alamat_ibu'][0],
            'Dilahirkan' => date_i18n( 'j F Y', strtotime($meta['docrt_form_dilahirkan2'][0])),
            'Kewarganegaraan' => $meta['docrt_form_kebangsaan_ibu'][0],
        ),
        'a2' => array(
            'Nama Lengkap' => $meta['docrt_form_nama_ayah'][0],
            'Dilahirkan' => date_i18n( 'j F Y', strtotime($meta['docrt_form_dilahirkan3'][0])),
            'Kewarganegaraan' => $meta['docrt_form_kebangsaan_ayah'][0],
            'No. KK' => $meta['docrt_form_nokk_ayah'][0],
            'No. KTP' => $meta['docrt_form_nonik_ayah'][0],
        ),
        'b' => array(
            'docrt_form_nama' => $meta['docrt_form_nama'][0],
            'docrt_form_hubungan' => $meta['docrt_form_hubungan'][0],
             'noreg' => docrt_no_surat($type,$meta,$postID),
            'Footer1' => docrt_pdf_footer($meta,$postID,$type,30,false,'15%','15%','70%'),
            'Footer2' => docrt_pdf_footer($meta,$postID,$type,30,false,'10%','10%','75%'),
        ),
        'c' => array(
            'Hari' => date_i18n( 'l', strtotime($meta['docrt_form_tgl'][0])),
            'Tanggal' => date_i18n( 'j F Y', strtotime($meta['docrt_form_tgl'][0])),
            'Di' => $meta['docrt_form_kota'][0],
            'op0' => array('-',''),
            'op1' => array('-','Telah lahir seorang anak : '),
            'Bernama' => '<strong>'.strtoupper($meta['docrt_form_nama_bayi'][0]).'</strong>',
            'op2' => array('-',''),
            'op3' => array('-','Dari seorang ibu bernama :'),
            'op4' => array('-', $meta['docrt_form_nama_ibu'][0]),
            'Alamat' => $meta['docrt_form_alamat_ibu'][0],
            'Istri dari' => $meta['docrt_form_nama_ayah'][0],
        ),

    );
    $data['skem'] = array(
        'a' => array(
            'Nama Lengkap' => $meta['docrt_form_nama_mati'][0],
            'Jenis Kelamin' => $meta['docrt_form_jk'][0],
            'Alamat' => $meta['docrt_form_alamat'][0],
            'Dilahirkan' => $meta['docrt_form_ttl'][0],
            'Tanggal Kematian' => date_i18n( 'j F Y', strtotime($meta['docrt_form_tgl'][0])),
            'Umur' => $meta['docrt_form_umur'][0].' Tahun',
            'Kewarganegaraan' => $meta['docrt_form_kebangsaan'][0],
            'Agama' => $meta['docrt_form_agama'][0],
            'Status Perkawinan' => $meta['docrt_form_sperkawinan'][0],
            'Pekerjaan' => $meta['docrt_form_pekerjaan'][0],
            'Tempat Meninggal' => $meta['docrt_form_tempat'][0],
            'Kelurahan' => $meta['docrt_form_kelurahan'][0],
            'Kab/Kota' => $meta['docrt_form_kota'][0],
            'Sebab Kematian' => $meta['docrt_form_sebab_kematian'][0],
            'No. KK' => $meta['docrt_form_nokk'][0],
            'No. KTP' => $meta['docrt_form_nonik'][0],
        ),
        'a1' => array(
            'Nama Lengkap' => $meta['docrt_form_nama_mati'][0],
            'Jenis Kelamin' => $meta['docrt_form_jk'][0],
            'Alamat' => $meta['docrt_form_alamat'][0],
            'Umur' => $meta['docrt_form_umur'][0].' Tahun',
            '-' => 'Telah meninggal dunia pada : ',
            'Hari' => date_i18n( 'l', strtotime($meta['docrt_form_tgl'][0])),
            'Tanggal' => date_i18n( 'j F Y', strtotime($meta['docrt_form_tgl'][0])),
            'Di' => $meta['docrt_form_tempat'][0],
        ),
        'b' => array(
            'docrt_form_nama' => $meta['docrt_form_nama'][0],
            'docrt_form_sebab_kematian' => $meta['docrt_form_sebab_kematian'][0],
            'docrt_form_hubungan' => $meta['docrt_form_hubungan'][0],
            'hari' => date_i18n( 'l', strtotime($meta['docrt_form_tgl'][0])),
            'noreg' => docrt_no_surat($type,$meta,$postID),
            'Footer1' => docrt_pdf_footer($meta,$postID,$type,30,false,'15%','15%','70%'),
            'Footer2' => docrt_pdf_footer($meta,$postID,$type,30,false,'10%','10%','75%'),
        ),
    );
    $data['kk'] = array(
        'a' => array(
            'Nomor KK' => $meta['docrt_form_nokk'][0],
            'Nama' => $meta['docrt_form_nama'][0],
            'Alamat' => $meta['docrt_form_alamat'][0],
            'RT/RW' => $meta['docrt_form_rtrw'][0],
            'Kelurahan' => $meta['docrt_form_kelurahan'][0],
            'Kecamatan' => $meta['docrt_form_kecamatan'][0],
            'Kota' => $meta['docrt_form_kota'][0],
            'Provinsi' => $meta['docrt_form_provinsi'][0],
            'Dikeluarkan Tanggal' => date_i18n( 'j F Y', strtotime($meta['docrt_form_tgl'][0])),
        ),
    );
    $data['ktp'] = array(
        'a' => array(
            'No KTP' =>  $meta['docrt_form_nonik'][0],
            'Nama' => $meta['docrt_form_nama'][0],
            'Tempat Tanggal Lahir' => $meta['docrt_form_ttl'][0],
            'Jenis Kelamin' => $meta['docrt_form_jk'][0],
            'Golongan Darah' => $meta['docrt_form_goldarah'][0],
            'alamat' => $meta['docrt_form_alamat'][0],
            'RT/RW' => $meta['docrt_form_rtrw'][0],
            'Kelurahan' => $meta['docrt_form_kelurahan'][0],
            'Kecamatan' => $meta['docrt_form_kecamatan'][0],
            'Agama' => $meta['docrt_form_agama'][0],
            'Status Perkawinan' => $meta['docrt_form_sperkawinan'][0],
            'Pekerjaan' => $meta['docrt_form_pekerjaan'][0],
            'Kewarganegaraan' => $meta['docrt_form_kebangsaan'][0],
            'Berlaku Hingga' => $meta['docrt_form_tgl_berlaku'][0],
        ),
    );
    $data['skkel'] = array(
        'bayi' => array(
            'Pada Hari' => date_i18n( 'l', strtotime($meta['docrt_form_dilahirkan1'][0])),
            'Tempat / Tanggal Lahir' => $meta['docrt_form_tempat'][0].' / '.date_i18n( 'j F Y', strtotime($meta['docrt_form_dilahirkan1'][0])),
            'Pukul' => $meta['docrt_form_jam'][0].' WIB',
            'Kota Kelahiran' => $meta['docrt_form_kota_bayi'][0],
            'Penolong Kelahiran' => $meta['docrt_form_penolong_lahir'][0],
            'Jenis Kelamin' => $meta['docrt_form_jk_bayi'][0],
            'NIK' => $meta['docrt_form_nonik_bayi'][0],
            'Nama Lengkap' => strtoupper($meta['docrt_form_nama_bayi'][0]),
            'Anak Ke' => $meta['docrt_form_anakke'][0],
        ),
        'ibu' => array(
            'Nama Lengkap' => $meta['docrt_form_nama_ibu'][0],
            'Umur' => date_diff(date_create($meta['docrt_form_dilahirkan2'][0]), date_create($meta['docrt_form_tgl'][0]))->y,
            'NIK' => $meta['docrt_form_nonik_ibu'][0],
            'Pekerjaan' => $meta['docrt_form_pekerjaan_ibu'][0],
            'Alamat' => $meta['docrt_form_alamat_ibu'][0],
            'Telepon' => $meta['docrt_form_tlp_ibu'][0],
        ),
        'ayah' => array(
            'Nama Lengkap' => $meta['docrt_form_nama_ayah'][0],
            'Umur' => date_diff(date_create($meta['docrt_form_dilahirkan3'][0]), date_create($meta['docrt_form_tgl'][0]))->y,
            'NIK' => $meta['docrt_form_nonik_ayah'][0],
            'Pekerjaan' => $meta['docrt_form_pekerjaan_ayah'][0],
            'Alamat' => $meta['docrt_form_alamat_ayah'][0],
            'Telepon' => $meta['docrt_form_tlp_ayah'][0],
        ),
        'pelapor' => array(
            'Nama Lengkap' => $meta['docrt_form_nama'][0],
            'Umur' => $meta['docrt_form_umur'][0],
            'NIK' => $meta['docrt_form_nonik'][0],
            'Pekerjaan' => $meta['docrt_form_pekerjaan'][0],
            'Alamat' => $meta['docrt_form_alamat'][0],
            'Telepon' => $meta['docrt_form_tlp'][0],
            'Hubungan dengan sibayi' => $meta['docrt_form_hubungan'][0],
        ),
        'other' => array(
            'kewarganegaraan' => $meta['docrt_form_kebangsaan_ayah'][0],
            'nokk' => $meta['docrt_form_nokk_ayah'][0],
            'kepalakeluarga' => $meta['docrt_form_nama_ayah'][0],
            'noreg' => docrt_no_surat($type,$meta,$postID),
            'Footer1' => docrt_pdf_footer($meta,$postID,$type,30,false,'15%','15%','70%'),
            'Footer2' => docrt_pdf_footer($meta,$postID,$type,30,false,'10%','10%','75%'),
        ),

    );

    $data['skkem'] = array(
        'jenazah' => array(
            'NIK' => $meta['docrt_form_nonik'][0],
            'Nama Lengkap' => $meta['docrt_form_nama_mati'][0],
            'Jenis kelamin' => $meta['docrt_form_jk'][0],
            'Tempat / Tanggal Lahir' => $meta['docrt_form_ttl'][0],
            'Umur' => $meta['docrt_form_umur'][0].' Tahun',
            'Agama' => $meta['docrt_form_agama'][0],
            'Pekerjaan' => $meta['docrt_form_pekerjaan'][0],
            'Alamat' => $meta['docrt_form_alamat'][0],
            'Anak ke' => $meta['docrt_form_anakke'][0],
            'Tanggal kematian' => date_i18n( 'j F Y', strtotime($meta['docrt_form_tgl'][0])),
            'Pukul' => $meta['docrt_form_jam'][0].' WIB',
            'Sebab kematian' => $meta['docrt_form_sebab_kematian'][0],
            'Tempat kematian' => $meta['docrt_form_tempat'][0],
            'Yang menerangkan' => $meta['docrt_form_yang_menerangkan'][0]
        ),
        'ibu' => array(
            'NIK' => $meta['docrt_form_nonik_ibu'][0],
            'Nama Lengkap' => $meta['docrt_form_nama_ibu'][0],
            'Tanggal lahir / umur' => date_i18n( 'j F Y', strtotime($meta['docrt_form_dilahirkan2'][0])).' / Umur :'.
            date_diff(date_create($meta['docrt_form_dilahirkan2'][0]), date_create($meta['docrt_form_tgl'][0]))->y,
            'Pekerjaan' => $meta['docrt_form_pekerjaan_ibu'][0],
            'Alamat' => $meta['docrt_form_alamat_ibu'][0],
        ),
        'ayah' => array(
            'NIK' => $meta['docrt_form_nonik_ayah'][0],
            'Nama Lengkap' => $meta['docrt_form_nama_ayah'][0],
            'Tanggal lahir / umur' => date_i18n( 'j F Y', strtotime($meta['docrt_form_dilahirkan3'][0])).' / Umur :'.
            date_diff(date_create($meta['docrt_form_dilahirkan3'][0]), date_create($meta['docrt_form_tgl'][0]))->y,
            'Pekerjaan' => $meta['docrt_form_pekerjaan_ayah'][0],
            'Alamat' => $meta['docrt_form_alamat_ayah'][0],
        ),
        'pelapor' => array(
            'NIK' => $meta['docrt_form_nonik_pelapor'][0],
            'Nama Lengkap' => $meta['docrt_form_nama'][0],
            'Tanggal lahir / umur' => date_i18n( 'j F Y', strtotime($meta['docrt_form_dilahirkan_pelapor'][0])).' / Umur :'.
            date_diff(date_create($meta['docrt_form_dilahirkan_pelapor'][0]), date_create($meta['docrt_form_tgl'][0]))->y,
            'Pekerjaan' => $meta['docrt_form_pekerjaan_pelapor'][0],
            'Alamat' => $meta['docrt_form_alamat_pelapor'][0]
        ),
        'other' => array(
            'kewarganegaraan' => $meta['docrt_form_kebangsaan_ayah'][0],
            'nokk' => $meta['docrt_form_nokk_ayah'][0],
            'kepalakeluarga' => $meta['docrt_form_nama_ayah'][0],
            'noreg' => docrt_no_surat($type,$meta,$postID),
        ),

    );
    $data['sk'] = $data['skck'];
    $data['sk']['b'] = array('docrt_form_menerangkan_bahwa' => $meta['docrt_form_menerangkan_bahwa'][0]);
    $data['skp_m'] = $data['skp'];
   /* array_push($data['sk'], 'b' => array(
        'docrt_form_menerangkan_bahwa' => $meta['docrt_form_menerangkan_bahwa'][0]
    ));*/
   /* echo "<pre>";
    print_r( $data['sk']);
    exit;*/
    // $data['skai'] = array(
    //     'a_skai' => array(
    //         'Nama' => $meta['docrt_form_nama'][0],
    //         'Jenis Kelamin' => $meta['docrt_form_jk'][0],
    //         'Tempat Tanggal Lahir' => $meta['docrt_form_ttl'][0],
    //         'Kebangsaan/Suku' => $meta['docrt_form_kebangsaan'][0],
    //         'Agama' => $meta['docrt_form_agama'][0],
    //         'Status Perkawinan' => $meta['docrt_form_sperkawinan'][0],
    //         'Nomor KK' => $meta['docrt_form_nokk'][0],
    //         'Nomor Register' => docrt_no_surat($type,$meta,$postID),
    //         'Nomor KTP' => $meta['docrt_form_nonik'][0],
    //         'Pekerjaan' => $meta['docrt_form_pekerjaan'][0],
    //         'Alamat' => $meta['docrt_form_alamat'][0],
    //         'Pendidikan' => $meta['docrt_form_pendidikan'][0],
    //         'Keperluan' => $meta['docrt_form_keperluan'][0],
    //         'Tujuan' => $meta['docrt_form_tujuan'][0],

    //         'Berlaku Tanggal' => $meta['docrt_form_tgl_berlaku'][0],
    //         'Keterangan RT No.' => $meta['docrt_form_ketRT'][0],
    //     )
    // );

    // altering skp and skai

    return $data[$type];
}
