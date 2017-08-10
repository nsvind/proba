function updateKatastar () {
    jQuery('#katopstinaId').prop('disabled', true);
        var idOpstine = jQuery('#opstinaId').val();
        if (idOpstine !== '') {
            jQuery.get('/realestate/katastar.php?idOpstine=' + idOpstine, function (data) {
            var str = '<option value="">Izaberite katastarsku opštinu</option><optgroup label="Katastarska Opština">';
            for (var i = 0; i < data.length; i++) {
                if (data[i]['naziv'] != "") {
                str += '<option ';
                        str += ' value="' + data[i]['id'] + '">' + data[i]['naziv'] + '</option>';
                }
                };
                 str += '</optgroup>';
                        jQuery('#katopstinaId').html(str);
                        jQuery('#katopstinaId').prop('disabled', false);
                });
            } else {
                jQuery('#katopstinaId').html('<option value="">Izaberite katastarsku opštinu</option>');
            }
}

function updateOption () {
    jQuery('#classId').html('<option value="">Izaberite klasu</option>');
   jQuery('#optionId').html('<option value="">Izaberite opciju</option>');
   
   jQuery('#optionId').prop('disabled', true);
   jQuery('#classId').prop('disabled', true);
   
    var vrstaID = jQuery('#vrstaID').val();
    if (vrstaID !== '' && vrstaID !== '1') {
        jQuery.get('/realestate/option.php?vrstaId=' + vrstaID, function (data) {
        var str = '<option value="">Izaberite opciju</option>';
        for (var i = 0; i < data.length; i++) {
            if (data[i]['naziv'] != "") {
                str += '<option ';
                str +=' value="' + data[i]['id'] + '">' + data[i]['naziv'] + '</option>';
            }
        };

        jQuery('#optionId').html(str);
        jQuery('#optionId').prop('disabled', false);
        });
        
    }// else {
     //   jQuery('#optionId').html('<option value="">Izaberite opciju</option>');
    //}
}

function updateClass () {
    jQuery('#classId').html('<option value="">Izaberite klasu</option>');
    
    jQuery('#classId').prop('disabled', true);
    
    var classId = jQuery('#optionId').val();
    if (classId !== '' && classId !== '1' && classId !== '2' && classId !== '4') {
        jQuery.get('/realestate/class.php?id=' + classId, function (data) {
        var str = '<option value="">Izaberite klasu</option>';
        for (var i = 0; i < data.length; i++) {
            if (data[i]['naziv'] != "") {
                str += '<option ';
                str +=' value="' + data[i]['id'] + '">' + data[i]['naziv'] + '</option>';
            }
        };

        jQuery('#classId').html(str);
        jQuery('#classId').prop('disabled', false);
        });
        
    }// else {
     //   jQuery('#classId').html('<option value="">Izaberite klasu</option>');
    //}
}

function validate () {
    var ok = true;
        
        if (jQuery('#email_client').val() == '') {
           ok = ok && false;
        }
        
        if (jQuery('#address_client').val() == '') {
           ok = ok && false;
        }
        
        if (jQuery('#quadrature').val() == '') {
           ok = ok && false;
        }
        
        if (jQuery('#opstinaId').val() == '') {
            ok = ok && false;
        }
                        
        if (jQuery('#katopstinaId').val() == '') {
            ok = ok && true;
        }
        
        if(jQuery('#vrstaID').val() == 1){
            ok = ok && true;
        } else if (jQuery('#vrstaID').val() == 2){
            ok = ok && true;
            if(jQuery('#optionId').val() == ''){
                ok = ok && false;
            }
        } else if (jQuery('#vrstaID').val() == 3){
            ok = ok && true;
            if(jQuery('#optionId').val() == ''){
                 ok = ok && false;
            } else {
                ok = ok && true;
                if(jQuery('#optionId').val() == 3){
                    
                if(jQuery('#classId').val() == ''){
                    ok = ok && false;
                }
            }
            }
        }else {
            ok = ok && false;
        }
                
        if (jQuery('#comment').val() == '') {
            ok = ok && false;
        }
     
//        if (jQuery('#img')[0].files.length > 3) {  //SLIKA NIJE OBAVEZNA
//            ok = ok && false;
//        }
        
        if (jQuery('#img')[0].files.length < 6){
            var sum = 0;
            var files = jQuery('#img')[0].files;
           for(var i = 0; i < files.length; i++) {
               sum += files[i].size;
           }
           
           if (5 * 1024 * 1024 < sum) {
               alert('Maksimalna velicina svih slika je 5Mb, izaberite ponovo...');
               jQuery('#img').val('');
               ok = ok && true;
           }
           
        } else {
            alert('Maksimalan broj slika je 5, izaberite ponovo...');
            jQuery('#img').val('');
            ok = ok && true;
        }
        
        if (ok) {
            jQuery('#submit').prop('disabled', false);
        } else {                                    
            jQuery('#submit').prop('disabled', true);
        }
}

function resetuj () {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        } 

        if (dd == 0) {
            dd2 = 11;
        } else {
            dd2 = dd - 1;
        }

        if (dd2 < 10) {
            dd2 = '0' + dd2;
        } 

        today = mm + '/' + dd + '/' + yyyy;
        // begining = mm + '/' + dd2 + '/' + yyyy;
        begining = '01/01/2014';


        jQuery("#dateFrom").val(begining);
        jQuery("#dateTo").val(today);
        jQuery("#opstinaId").val("");
        jQuery("#katopstinaId").val("");

        var data="";

        //Make an array

        var dataarray=data.split(",");

        // Set the value

        jQuery("#vrstanepokretnosti").val(dataarray);

        // Then refresh

        jQuery("#vrstanepokretnosti").multiselect("refresh");

        validate();
}


    