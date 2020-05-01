// console.log('Ok');

$(function(){

    $('.tombolTambahData').on('click', function(){
        $('#formModalLabel').html('Tambah Data Alternatif');
        $('.modal-footer button[type=submit').html('Tambah Data');
            $('#name').val('');
            $('#code').val('');
            $('#info').val('');
            $('#plants').val('');
            $('#id_alternative').val('');
        
    })

    $('.tampilModalUbah').on('click', function(){
        // console.log('Yeay');
        $('#formModalLabel').html('Ubah Data Alternatif');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/dssweb/alternative/ubah');

        const id = $(this).data('id');
        // console.log(id);
        $.ajax({
            url:'http://localhost/dssweb/alternative/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){  
                // console.log(data);
                $('#name').val(data.name);
                $('#code').val(data.code);
                $('#info').val(data.info);
                $('#plants').val(data.plants);
                $('#id_alternative').val(data.id_alternative);

            }
            //id yg kiri adalah data yg dikirimkan, yg kanan isi datanya
        });
    });

});