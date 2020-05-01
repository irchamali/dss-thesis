// console.log('Ok');

$(function(){

    $('.tombolTambahData2').on('click', function(){
        $('#formModalLabel2').html('Tambah Data Criteria');
        $('.modal-footer button[type=submit').html('Tambah Data');
            $('#criteria').val('');
            $('#code').val('');
            $('#weight').val('');
            $('#id_criteria').val('');
        
    })

    $('.tampilModalUbah2').on('click', function(){
        // console.log('Yeay');
        $('#formModalLabel2').html('Ubah Data Criteria');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/dssweb/criteria/ubah');

        const id = $(this).data('id');
        // console.log(id);
        $.ajax({
            url:'http://localhost/dssweb/criteria/ubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){  
                // console.log(data);
                $('#criteria').val(data.criteria);
                $('#code').val(data.code);
                $('#weight').val(data.weight);
                $('#id_criteria').val(data.id_criteria);

            }
            //id yg kiri adalah data yg dikirimkan, yg kanan isi datanya
        });
    });

});