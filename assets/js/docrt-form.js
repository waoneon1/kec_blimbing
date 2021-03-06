jQuery(document).ready(function($) {
console.log(cpt_type);
    if (cpt_type == 'create_document') {
        tes_docrt_form_selected();
    }

    //docrt_form_selected();
    docrt_kusus_skp();
    //docrt_kusus_skel();
    datepicker_init();

    $(".docrt_type_surat_box input:radio").click(function() {
        // docrt_form_selected();
        tes_docrt_form_selected();
    });





    // tambah form pengikut khusus skp
    $(document).on("change", "#docrt_form_pengikut", function (e) { //vpc-options
        docrt_kusus_skp();
    });

    //  form kembar khusus skel
    $(document).on("change", "#docrt_form_kelahiran", function (e) { //vpc-options
        docrt_kusus_skel();
    });

    // add pejabat
    $(document).on("click", ".button-pej-add", function(e) {
        docrt_add_pejabat_kel();
    });
    // remove pejabat
    $(document).on("click", ".button-pej-remove", function(e) {
        docrt_remove_pejabat_kel();
    });

    //  ========================================================================
    //  API KTP ================================================================
    //  ========================================================================
    $(document).on("click", ".nik_api_button", function (e) { //vpc-options
        e.preventDefault();
        //console.log($(this));
        var msg = $(this).parents('.api_msg_parent').find('.api_msg_nik');
        msg.text('');
        msg.hide();

        if ($('#docrt_form_nonik').val()) {
            msg.hide();
            docrt_api_ktp($('#docrt_form_nonik').val(), 'nik', '', msg);
        } else {
            msg.text('mohon isi form No NIK');
            msg.show();
        }
    });

    $(document).on("click", ".nik_api_button_pengikut", function (e) { //vpc-options
        e.preventDefault();
        var i       = $(this).data('nikid');
        var value   = $('#docrt_pengikut_nik'+i).val();
        var msg = $(this).parents('.api_msg_parent').find('.api_msg_nik');
        console.log(msg.length);

        msg.text('');
        msg.hide();

        if (value) {
            msg.hide();
            docrt_api_ktp(value, 'pengikut', i, msg);
        } else {
            msg.text('mohon isi form No KTP');
            msg.show();
        }
    });
    //  ========================================================================

    function datepicker_init() {
        jQuery( ".docrt_datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    }

    function tes_docrt_form_selected() {

        var form_class = '';
        var tr_tag = $(".docrt_pemohon_box .docrt_form");
        var type_surat = $(".docrt_type_surat_box input[type='radio']:checked").data('typesurat');
        var param = docrt_form_data(type_surat);

        // frontend input
        $('#docrt_formrw_type').val(type_surat);

        $('.docrt-master-form').html('');
        var data = {
            'data': param,
            'post_id': post_id,
            'type_surat': type_surat,
            'cpt_type': cpt_type
        };
        //console.log(ajax_params);
        //console.log(data);
        $.ajax({
            data: data,
            type: 'POST',
            url: ajax_url+'form_creator.php',
            success: function(data){
                $('.docrt-master-form').append(data);
                datepicker_init();
                docrt_kusus_skp();
                //console.log(data);

            }
        });

    }

    function docrt_api_ktp(nik, jenis, i, msg) {
        var param = docrt_form_data(type_surat);
        var type_surat = $(".docrt_type_surat_box input[type='radio']:checked").data('typesurat');

        var data = {
            'data': param,
            'post_id': post_id,
            'nik': nik,
            'type_surat': type_surat,
            'jenis': jenis,
            'i': i
        };
        console.log(data);
        $.ajax({
            data: data,
            type: 'POST',
            url: ajax_url+'api.php',
            success: function(data){
                console.log(data);
                //msg.text('');
                //msg.hide();
                var obj = jQuery.parseJSON(data);

                if (obj.status === false) {
                    msg.show();
                    msg.text(obj.message);
                } else {
                    var x;
                    for (x in obj) {
                        if ($('#' + x).length) {
                            $('#' + x).val(obj[x]);
                            $('#' + x).addClass('ajaxApi');
                        }
                    }
                }
            }
        });
    }

    // skp, kk, skpm
    function docrt_kusus_skp() {
        var value = $("#docrt_form_pengikut").val();
        var current_val = $(".docrt_pengikut").length;

        $(".docrt_tbl_pindah").addClass('d-hide');
        $(".docrt_pengikut").addClass('d-hide');
        $(".docrt_pengikut input").attr('disabled', 'disabled');
        $(".docrt_pengikut select").attr('disabled', 'disabled');

        if (value == 0) {
            $(".docrt_tbl_pindah").addClass('d-hide');
        } else {
            $(".docrt_tbl_pindah").removeClass('d-hide');
            for (var i = 1; i <= value; i++) {
                $(".docrt_pengikut"+i).removeClass('d-hide');
                $(".docrt_pengikut"+i+" input").removeAttr('disabled', 'disabled');
                $(".docrt_pengikut"+i+" select").removeAttr('disabled', 'disabled');
            }
        }

    }

    function docrt_kusus_skel() {
        var kelahiran = $("#docrt_form_kelahiran");
        var kembar = $("#docrt_form_kembarke");

        if (kelahiran.val() == 'Tunggal') {
            kembar.attr('disabled', 'disabled');
            kembar.val('');
        } else {
            kembar.removeAttr('disabled', 'disabled');
        }
    }

    function docrt_add_pejabat_kel() {
        var count_html = $(".docrt_pej_count");
        var count = $(".docrt_pej_count").val();

        console.log(typeof count);
       // count_html.val()

    }
    function docrt_remove_pejabat_kel() {

    }

    function docrt_form_data(type_surat = '') {
        var data = {};
        // 1. data surat keterangan usaha ===================================================================================================
        data.sku = {
            'surat' : [
                'title###docrt_get_group_title### Data Diri / Pelapor',
                'docrt_form_nonik',
                'docrt_form_nokk',
                'docrt_form_nama',
                'docrt_form_ttl',
                'docrt_form_jk',
                'docrt_form_agama',
                'docrt_form_sperkawinan',
                'docrt_form_pekerjaan',
                'docrt_form_alamat',
                'docrt_form_pendidikan',
                'docrt_form_keperluan',

                'title###docrt_get_group_title### Keterangan',
                'docrt_form_tujuan',
                'docrt_form_tgl',
                'docrt_form_tgl_berlaku',
                'docrt_form_ketRT',

                'title###docrt_get_group_title### Keterangan Usaha',
                'docrt_form_nama_usaha',
                'docrt_form_alamat_usaha',
                'docrt_form_bentuk_usaha',
                'docrt_form_tlp',
                'docrt_form_npwp' 
            ]
        };

        // 2. data surat keterangan domisili usaha ===================================================================================================
        data.skdu ={
            'surat' : [
                'title###docrt_get_group_title### Data Diri / Pelapor',
                'docrt_form_nama',
                'docrt_form_ttl',
                'docrt_form_agama',
                'docrt_form_pekerjaan',
                'docrt_form_alamat',
                'docrt_form_kelurahan',
                'docrt_form_kecamatan',
                'docrt_form_kota',

                'title###docrt_get_group_title### Keterangan',
                'docrt_form_ketRT',
                'docrt_form_tgl',
                'docrt_form_keperluan',

                'title###docrt_get_group_title### Keterangan Usaha',
                'docrt_form_nama_usaha',
                'docrt_form_alamat_usaha',
                'docrt_form_rtrw_usaha',
                'docrt_form_ket_usaha'
            ]
        };
        // 3. data surat keterangan domisili usaha ===================================================================================================
        data.skd ={
            'surat' : [
                'title###docrt_get_group_title### Data Diri / Pelapor',
                'docrt_form_nama',
                'docrt_form_alamat',
                'docrt_form_rtrw',
                'docrt_form_kelurahan',
                'docrt_form_kecamatan',
                'docrt_form_kota',

                'title###docrt_get_group_title###Keterangan Lembaga',
                'docrt_form_nama_usaha',
                'docrt_form_alamat_usaha',
                'docrt_form_nama_noinduk_lembaga',
                'docrt_form_noinduk_lembaga',
                'docrt_form_nama_lembaga',

                'title###docrt_get_group_title### Keterangan',
                'docrt_form_tujuan'
            ]
        };
        // 4. data surat keterangan ijin keramaian ===================================================================================================
        data.skik ={
            'surat' : [
                'title###docrt_get_group_title### Data Diri / Pelapor',
                'docrt_form_nonik',
                'docrt_form_nokk',
                'docrt_form_nama',
                'docrt_form_ttl',
                'docrt_form_jk',
                'docrt_form_agama',
                'docrt_form_sperkawinan',
                'docrt_form_pekerjaan',
                'docrt_form_alamat',
                'docrt_form_pendidikan',

                'title###docrt_get_group_title###Keterangan',
                'docrt_form_keperluan',
                'docrt_form_tujuan',
                'docrt_form_tgl_berlaku',
                'docrt_form_ketRT',

                'title###docrt_get_group_title###Keterangan Acara',
                'docrt_form_nama_acara',
                'docrt_form_tgl_acara'
            ]
        };
        // 5. data surat keterangan catatan kepolisian ===================================================================================================
        data.skck ={
            'surat' : [
                'title###docrt_get_group_title### Data Diri / Pelapor',
                'docrt_form_nonik',
                'docrt_form_nokk',
                'docrt_form_nama',
                'docrt_form_ttl',
                'docrt_form_jk',
                'docrt_form_agama',
                'docrt_form_sperkawinan',
                'docrt_form_pekerjaan',
                'docrt_form_alamat',
                'docrt_form_pendidikan',

                'title###docrt_get_group_title###Keterangan',
                'docrt_form_keperluan',
                'docrt_form_tujuan',
                'docrt_form_tgl_berlaku',
                'docrt_form_ketRT'
            ]
        };
        // 6. data surat keterangan pindah  ===================================================================================================
        data.skp ={
            'surat' : [
                'title###docrt_get_group_title### Data Diri / Pelapor',
                'docrt_form_nonik',
                'docrt_form_nokk',
                'docrt_form_nama',
                'docrt_form_ttl',
                'docrt_form_jk',
                'docrt_form_kebangsaan',
                'docrt_form_agama',
                'docrt_form_sperkawinan',
                'docrt_form_pekerjaan',
                'docrt_form_pendidikan',
                'docrt_form_alamat',

                'title###docrt_get_group_title###Keterangan',
                'docrt_form_keperluan',
                'docrt_form_tujuan',
                'docrt_form_tgl', //perlu alter
                'docrt_form_tgl_berlaku',
                'docrt_form_ketRT',

                'title###docrt_get_group_title###Pindah Ke',
                'docrt_form_desa_pindah',
                'docrt_form_kecamatan_pindah',
                'docrt_form_kabkota_pindah',
                'docrt_form_provinsi_pindah',

                'title###docrt_get_group_title###Keterangan Pindah',
                'docrt_form_tgl_pindah',
                'docrt_form_alasan_pindah',
                'docrt_form_pengikut', //perlu alter (belum bisa otomatis we`ll take care of it)

                'table###docrt_tbl_pindah'
                // -no, nama, jk, tgl lahir, st perkawinan, pendidikan, noktp, keterangan(suami istri anak ortu keluarga lain)
            ]
        };
        // 7. data surat keterangan tidak mampu ===================================================================================================
        data.sktm = data['skck'];
        // 8. data surat keterangan balum pernah menikah ===================================================================================================
        data.skbpm = data['skck'];
        // 9. data surat kelahiran ===================================================================================================
        data.skel ={
            'surat' : [
                'title###docrt_get_group_title### Data Pelapor',
                'docrt_form_nonik',
                'docrt_form_nama',
                'docrt_form_hubungan', //perlu alter
                'docrt_form_umur',
                'docrt_form_pekerjaan',
                'docrt_form_alamat',
                'docrt_form_tlp',

                'title###docrt_get_group_title### Data Kelahiran',
                'docrt_form_nonik_bayi',
                'docrt_form_nama_bayi',
                'docrt_form_dilahirkan1',
                'docrt_form_anakke',
                'docrt_form_kelahiran',
                'docrt_form_kembarke',
                'docrt_form_jk_bayi',
                'docrt_form_kota_bayi',

                'title###docrt_get_group_title###Keterangan Tambahan',
                'docrt_form_tgl_jam',
                'docrt_form_tempat',
                'docrt_form_penolong_lahir',
                'docrt_form_saksi',

                'title###docrt_get_group_title###Data Ayah',
                'docrt_form_nonik_ayah',
                'docrt_form_nokk_ayah',
                'docrt_form_nama_ayah',
                'docrt_form_dilahirkan3',
                'docrt_form_alamat_ayah',
                'docrt_form_kebangsaan_ayah',
                'docrt_form_pekerjaan_ayah',
                'docrt_form_tlp_ayah',

                'title###docrt_get_group_title###Data Ibu',
                'docrt_form_nonik_ibu',
                'docrt_form_nama_ibu',
                'docrt_form_dilahirkan2',
                'docrt_form_alamat_ibu',
                'docrt_form_kebangsaan_ibu',
                'docrt_form_pekerjaan_ibu',
                'docrt_form_tlp_ibu',
            ]
        };
        // 10. data surat kematian ===================================================================================================
        data.skem ={
            'surat' : [
                'title###docrt_get_group_title### Data Pelapor',
                'docrt_form_nonik_pelapor',
                'docrt_form_nama',
                'docrt_form_hubungan',
                'docrt_form_dilahirkan_pelapor',
                'docrt_form_alamat_pelapor',
                'docrt_form_pekerjaan_pelapor',
                //'docrt_form_nama_pelapor',

                'title###docrt_get_group_title### Data Kematian',
                'docrt_form_nama_mati',//
                'docrt_form_ttl',
                'docrt_form_umur',//
                'docrt_form_jk',
                'docrt_form_anakke',
                'docrt_form_kebangsaan',
                'docrt_form_agama',
                'docrt_form_sperkawinan',
                'docrt_form_nokk',
                'docrt_form_nonik',
                'docrt_form_pekerjaan',
                'docrt_form_alamat',
                'docrt_form_kelurahan',
                'docrt_form_kota',

                'title###docrt_get_group_title### Keterangan',
                'docrt_form_tgl_jam',
                'docrt_form_tempat',//
                'docrt_form_sebab_kematian',
                'docrt_form_yang_menerangkan',
                'docrt_form_saksi',

                'title###docrt_get_group_title### Data Ayah',
                'docrt_form_nama_ayah',
                'docrt_form_dilahirkan3',
                'docrt_form_alamat_ayah',
                'docrt_form_nokk_ayah',
                'docrt_form_nonik_ayah',
                'docrt_form_pekerjaan_ayah',

                'title###docrt_get_group_title### Data Ibu',
                'docrt_form_nama_ibu',
                'docrt_form_dilahirkan2',
                'docrt_form_alamat_ibu',
                'docrt_form_nonik_ibu',
                'docrt_form_pekerjaan_ibu',
            ]
        };
        // 11. kk ===================================================================================================
        data.kk ={
            'surat' : [
                'title###docrt_get_group_title### Data Diri / Pelapor',
                'docrt_form_nonik',
                'docrt_form_nokk',
                'docrt_form_nama',
                'docrt_form_jk',
                'docrt_form_ttl',
                'docrt_form_alamat',
                'docrt_form_rtrw',
                'docrt_form_kelurahan',
                'docrt_form_kecamatan',
                'docrt_form_kota',
                'docrt_form_provinsi',
                'title###docrt_get_group_title### Keterangan',
                'docrt_form_tgl',
                'docrt_form_pengikut',
                'table###docrt_tbl_pindah',
            ]
        };
        // 12. ktp ===================================================================================================
        data.ktp ={
            'surat' : [
                'title###docrt_get_group_title### Data Diri / Pelapor',
                'docrt_form_nonik',
                'docrt_form_nama',
                'docrt_form_ttl',
                'docrt_form_jk',
                'docrt_form_goldarah',
                'docrt_form_alamat',
                'docrt_form_rtrw',
                'docrt_form_kelurahan',
                'docrt_form_kecamatan',
                'docrt_form_agama',
                'docrt_form_sperkawinan',
                'docrt_form_pekerjaan',
                'docrt_form_kebangsaan',
                'title###docrt_get_group_title###Keterangan',
                'docrt_form_tgl_berlaku',
                'docrt_form_keterangan',
            ]
        };
        // 13. data surat keterangan ===================================================================================================
        data.sk ={
            'surat' : [
                'title###docrt_get_group_title### Data Diri / Pelapor',
                'docrt_form_nonik',
                'docrt_form_nokk',
                'docrt_form_nama',
                'docrt_form_ttl',
                'docrt_form_jk',
                'docrt_form_agama',
                'docrt_form_sperkawinan',
                'docrt_form_pekerjaan',
                'docrt_form_alamat',
                'docrt_form_pendidikan',

                'title###docrt_get_group_title###Keterangan',
                'docrt_form_keperluan',
                'docrt_form_tujuan',
                'docrt_form_tgl_berlaku',
                'docrt_form_ketRT',
                'docrt_form_menerangkan_bahwa',
            ]
        };
        // 14. kk_p ===================================================================================================
        data.kk_p = data['kk'];
        // 15. kk_t ===================================================================================================
        data.kk_t = data['kk'];
        // 16. lg ===================================================================================================
        data.lg ={
            'surat' : [
                'title###docrt_get_group_title### Data Diri / Pemohon',
                'docrt_form_nonik',
                'docrt_form_nokk',
                'docrt_form_nama',
                'docrt_form_ttl',
                'docrt_form_jk',
                'docrt_form_alamat',
                'docrt_form_rtrw',
                'title###docrt_get_group_title###Keterangan',
                'docrt_form_tgl',
                'docrt_form_keterangan',
                'title###docrt_get_group_title###Rekomendasi',
                'docrt_form_dokumen',
                'docrt_form_keperluan',
                'docrt_form_tujuan',
            ]
        };
        // 17. r_u ===================================================================================================
        data.r_u = data['lg'];
        // 18. r_ho ===================================================================================================
        data.r_ho ={
            'surat' : [
                'title###docrt_get_group_title### Data Diri / Pemohon',
                'docrt_form_nonik',
                'docrt_form_nama',
                'docrt_form_ttl',
                'docrt_form_jk',
                'docrt_form_alamat',
                'docrt_form_rtrw',
                'title###docrt_get_group_title###Keterangan',
                'docrt_form_tgl',
                'title###docrt_get_group_title###Tentang Bangunan',
                'docrt_form_no_imb',
                'docrt_form_tgl_imb',
                'docrt_form_fungsi_imb',
                'title###docrt_get_group_title### Keterangan Usaha',
                'docrt_form_nama_usaha',
                'docrt_form_alamat_usaha',
                'docrt_form_ket_usaha',
                'docrt_form_badan_hukum',
                'docrt_form_bkt'
            ]
        };
        // 19. r_imb ===================================================================================================
        data.r_imb ={
            'surat' : [
                'title###docrt_get_group_title### Data Diri / Pemohon',
                'docrt_form_nonik',
                'docrt_form_nama',
                'docrt_form_ttl',
                'docrt_form_jk',
                'docrt_form_alamat',
                'docrt_form_rtrw',
                'title###docrt_get_group_title###Keterangan',
                'docrt_form_tgl',
                'title###docrt_get_group_title###Tentang Bangunan',
                'docrt_form_no_krk',
                'docrt_form_tgl_krk',
                'docrt_form_fungsi_krk',
                'docrt_form_fungsi_imb',
                'docrt_form_jml_lantai',
                'docrt_form_jml_unit',
                'docrt_form_alamat_bangunan',
                'docrt_form_bkt',
            ]
        };
        // 20. skp masuk ===================================================================================================
        data.skp_m ={
            'surat' : [
                'title###docrt_get_group_title### Data Diri / Pelapor',
                'docrt_form_nonik',
                'docrt_form_nokk',
                'docrt_form_nama',
                'docrt_form_ttl',
                'docrt_form_jk',
                'docrt_form_kebangsaan',
                'docrt_form_agama',
                'docrt_form_sperkawinan',
                'docrt_form_pekerjaan',
                'docrt_form_pendidikan',
                'docrt_form_alamat',
                'title###docrt_get_group_title###Alamat',
                'docrt_form_alamat_luar',
                'docrt_form_desa_pindah',
                'docrt_form_kecamatan_pindah',
                'docrt_form_kabkota_pindah',
                'docrt_form_provinsi_pindah',
                'title###docrt_get_group_title###Keterangan',
                'docrt_form_keperluan',
                'docrt_form_tujuan',
                'docrt_form_tgl',
                'docrt_form_tgl_berlaku',
                'docrt_form_ketRT',
                'title###docrt_get_group_title###Keterangan Pindah',
                'docrt_form_tgl_pindah',
                'docrt_form_alasan_pindah',
                'docrt_form_pengikut', //perlu alter (belum bisa otomatis we`ll take care of it)

                'table###docrt_tbl_pindah'
                // -no, nama, jk, tgl lahir, st perkawinan, pendidikan, noktp, keterangan(suami istri anak ortu keluarga lain)
            ]
        };
        if (type_surat == '')
            return docrt_merge_options(data,docrt_header_data());
        else
            return docrt_merge_options(data[type_surat],docrt_header_data(type_surat));
    }

    function docrt_header_data(type_surat = '') {
        var data = {};
        data.sku = {'header' : ['thead=>org', 'torg=>org']};
        data.skdu = {'header' : ['thead=>org', 'torg=>org']};
        data.skd = {'header' : ['thead=>org', 'torg=>org']};
        data.skik = {'header' : ['thead=>org', 'torg=>org']};
        data.skck = {'header' : []};
        data.skp = {'header' : ['thead=>pindah']};
        data.sktm = {'header' : []};
        data.skbpm = {'header' : []};
        data.skel = {'header' : []};
        data.skem = {'header' : []};
        data.sk = {'header' : []};

        if (type_surat == '')
            return data;
        else
            return data[type_surat];
    }
    function docrt_merge_options(obj1,obj2){
        var obj3 = {};
        for (var attrname in obj1) { obj3[attrname] = obj1[attrname]; }
        for (var attrname in obj2) { obj3[attrname] = obj2[attrname]; }
        return obj3;
    }
});

jQuery(document).ready(function($) {

    var perangkat_jabatan = $('#docrt_perangkat_jabatan');
    var rw_option = $('#docrt_perangkat_jabatan_rw');
    var perangkat_no_jabatan_rw = $('#docrt_perangkat_jabatan_rw');
    perangkat_jabatan_change();
    rw_option_change();

    $(perangkat_jabatan).change(function(e) {
        perangkat_jabatan_change();
    });

    $(rw_option).change(function(e) {
        rw_option_change();
    });

    function perangkat_jabatan_change() {
        if (perangkat_jabatan.val() == 'RW') {
            $("#docrt_perangkat_jabatan_rw").addClass('d-hide');
        } else {
            $("#docrt_perangkat_jabatan_rw").removeClass('d-hide');
        }
    }

    function rw_option_change() {
        var rw_txt = $("#docrt_perangkat_jabatan_rw option:selected").text();
        $("#docrt_perangkat_no_jabatan_rw").val(rw_txt);
    }
});

/*jQuery(document).ready(function($) {
    var $sidebar   = $("#side-sortables"),
        $window    = $(window),
        offset     = $sidebar.offset(),
        topPadding = 50;

    $window.scroll(function() {
        if ($window.scrollTop() > offset.top) {
            $sidebar.stop().animate({
                marginTop: $window.scrollTop() - offset.top + topPadding
            });
        } else {
            $sidebar.stop().animate({
                marginTop: 0
            });
        }
    });

});*/

//SELECTED CURRENTLY NOT USE THIS
    /*function docrt_form_selected() {
        var form_class = '';
        var tr_tag = $(".docrt_pemohon_box .docrt_form");
        var type_surat = $(".docrt_type_surat_box input[type='radio']:checked").data('typesurat');
        var data = docrt_form_data(type_surat);

        docrt_title_selected(type_surat);

        $("input[type='hidden']#docrt_tysrt_form ").val(type_surat);
        //$(tr_tag).addClass('d-hide');
        $(".docrt_pemohon_box .docrt_thead").addClass('d-hide');
        $(".docrt_pemohon_box .docrt_form .docrt_inputs").attr('disabled', 'disabled');

        // FORM utama
        var data_surat = data['surat'];
        if (data_surat) {
            for (var i = 0 ; i < data_surat.length; i++) {
                $(".docrt_pemohon_box ."+data_surat[i]+"_tr").removeClass('d-hide');
                $(".docrt_pemohon_box #"+data_surat[i]).removeAttr('disabled');
            }
        }
        //tHeader
        var data_theads = data['header'];
        var data_thead = '';
        if (data_theads) {
            for (var i = 0 ; i < data_theads.length; i++) {
                data_thead = data_theads[i].split("=>");
                if (data_thead[0] == 'thead') {

                    $(".docrt_pemohon_box .docrt_"+data_thead[0]+"_"+data_thead[1]).removeClass('d-hide');
                }
            }
        }

    }

    function docrt_title_selected(type_surat) {
        var title_tag = $(".docrt_pemohon_box .docrt_form_title");
        $(title_tag).addClass('d-hide');
        $(".docrt_pemohon_box .docrt_form_title .docrt_inputs").attr('disabled', 'disabled');


        $(".docrt_pemohon_box .docrt_"+type_surat+"_id_title").removeClass('d-hide');
        $(".docrt_pemohon_box #docrt_"+type_surat+"_id").removeAttr('disabled');
    }*/
