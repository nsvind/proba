
window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2.2.1\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2.2.1\/svg\/","svgExt":".svg","source":{"concatemoji":"http:\/\/www.datainvestment.rs\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.7"}};
!function(a,b,c){function d(a){var b,c,d,e,f=String.fromCharCode;if(!k||!k.fillText)return!1;switch(k.clearRect(0,0,j.width,j.height),k.textBaseline="top",k.font="600 32px Arial",a){case"flag":return k.fillText(f(55356,56826,55356,56819),0,0),!(j.toDataURL().length<3e3)&&(k.clearRect(0,0,j.width,j.height),k.fillText(f(55356,57331,65039,8205,55356,57096),0,0),b=j.toDataURL(),k.clearRect(0,0,j.width,j.height),k.fillText(f(55356,57331,55356,57096),0,0),c=j.toDataURL(),b!==c);case"emoji4":return k.fillText(f(55357,56425,55356,57341,8205,55357,56507),0,0),d=j.toDataURL(),k.clearRect(0,0,j.width,j.height),k.fillText(f(55357,56425,55356,57341,55357,56507),0,0),e=j.toDataURL(),d!==e}return!1}function e(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g,h,i,j=b.createElement("canvas"),k=j.getContext&&j.getContext("2d");for(i=Array("flag","emoji4"),c.supports={everything:!0,everythingExceptFlag:!0},h=0;h<i.length;h++)c.supports[i[h]]=d(i[h]),c.supports.everything=c.supports.everything&&c.supports[i[h]],"flag"!==i[h]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[i[h]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);


/* <![CDATA[ */
var ajaxurl = "http:\/\/www.datainvestment.rs\/wp-admin\/admin-ajax.php";
/* ]]> */

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52595800-1', 'auto');
  ga('send', 'pageview');


function updateKatastar () {
    jQuery('#katopstinaId').prop('disabled', true);
        var idOpstine = jQuery('#opstinaId').val();
        if (idOpstine !== '') {
            jQuery.get('./katastar.php?idOpstine=' + idOpstine, function (data) {
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
        jQuery.get('./option.php?vrstaId=' + vrstaID, function (data) {
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
        jQuery.get('./class.php?id=' + classId, function (data) {
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
        
        if (jQuery('#quadrature').val() == '') {
           ok = ok && false;
        }
        
        if (jQuery('#opstinaId').val() == '') {
            ok = ok && false;
        }
                        
        if (jQuery('#katopstinaId').val() == '') {
            ok = ok && false;
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
        
        if (jQuery('#img')[0].files.length < 4){
            var sum = 0;
            var files = jQuery('#img')[0].files;
           for(var i = 0; i < files.length; i++) {
               sum += files[i].size;
           }
           
           if (1 * 1024 * 1024 < sum) {
               alert('Maksimalna velicina svih slika je 5Mb, izaberite ponovo...');
               jQuery('#img').val('');
               ok = ok && true;
           }
           
        } else {
            alert('Maksimalan broj slika je 3, izaberite ponovo...');
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

function fixDate (elem) {
                        var from = new Date(jQuery('#dateFrom').val());
                        var to = new Date(jQuery('#dateTo').val());

                        if (elem == 1) {
                            if (from > to) {
                                jQuery('#dateTo').val(dateToString(from));
                            }
                        } else {
                            if (to < from) {
                                jQuery('#dateFrom').val(dateToString(to));
                            }
                        }
}

function dateToString (date) {
                        dd = date.getDate();
                        mm = date.getMonth() + 1;
                        yyyy = date.getFullYear();

                        if (dd < 10) {
                            dd = '0' + dd;
                        }

                        if (mm < 10) {
                            mm = '0' + mm;
                        }

                        return mm + '/' + dd + '/' + yyyy;
}
/*
var rgzOpstine = '<option value="">Izaberite opštinu</option><option  value="80012">Ada</option><option  value="70017">Aleksandrovac</option><option  value="70025">Aleksinac</option><option  value="80039">Alibunar</option><option  value="80047">Apatin</option><option  value="70033">Aranđelovac</option><option  value="70041">Arilje</option><option  value="70050">Babušnica</option><option  value="80055">Bač</option><option  value="80063">Bačka Palanka</option><option  value="80071">Bačka Topola</option><option  value="80080">Bački Petrovac</option><option  value="70068">Bajina Bašta</option><option  value="70092">Barajevo</option><option  value="70076">Batočina</option><option  value="80110">Bečej</option><option  value="80098">Bela Crkva</option><option  value="70084">Bela Palanka</option><option  value="80101">Beočin</option><option  value="70254">Beograd - Čukarica</option><option  value="70181">Beograd - Novi Beograd</option><option  value="70203">Beograd - Palilula</option><option  value="70211">Beograd - Rakovica</option><option  value="70220">Beograd - Savski Venac</option><option  value="70246">Beograd - Stari Grad</option><option  value="70106">Beograd - Voždovac</option><option  value="70114">Beograd - Vračar</option><option  value="70157">Beograd - Zemun</option><option  value="70149">Beograd - Zvezdara</option><option  value="70262">Blace</option><option  value="70289">Bogatić</option><option  value="70297">Bojnik</option><option  value="70319">Boljevac</option><option  value="70327">Bor</option><option  value="70335">Bosilegrad</option><option  value="70343">Brus</option><option  value="70351">Bujanovac</option><option  value="71226">Crna Trava</option><option  value="71196">Ćićevac</option><option  value="71200">Ćuprija</option><option  value="71242">Čačak</option><option  value="71234">Čajetina</option><option  value="80489">Čoka</option><option  value="70491">Despotovac</option><option  value="70505">Dimitrovgrad</option><option  value="70513">Doljevac</option><option  value="70467">Gadžin Han</option><option  value="70475">Golubac</option><option  value="70483">Gornji Milanovac</option><option  value="70122">Grocka</option><option  value="80179">Inđija</option><option  value="80187">Irig</option><option  value="70564">Ivanjica</option><option  value="71048">Jagodina</option><option  value="80195">Kanjiža</option><option  value="80209">Kikinda</option><option  value="70572">Kladovo</option><option  value="70599">Knić</option><option  value="70602">Knjaževac</option><option  value="70637">Koceljeva</option><option  value="70629">Kosjerić</option><option  value="71340">Kostolac</option><option  value="80217">Kovačica</option><option  value="80225">Kovin</option><option  value="70645">Kragujevac</option><option  value="70653">Kraljevo</option><option  value="70661">Krupanj</option><option  value="70670">Kruševac</option><option  value="70696">Kučevo</option><option  value="80233">Kula</option><option  value="70688">Kuršumlija</option><option  value="70700">Lajkovac</option><option  value="71277">Lapovo</option><option  value="70165">Lazarevac</option><option  value="70718">Lebane</option><option  value="70726">Leskovac</option><option  value="70769">Ljig</option><option  value="70777">Ljubovija</option><option  value="70734">Loznica</option><option  value="70742">Lučani</option><option  value="70785">Majdanpek</option><option  value="80241">Mali Iđoš</option><option  value="70793">Mali Zvornik</option><option  value="70807">Malo Crniće</option><option  value="70815">Medveđa</option><option  value="70823">Merošina</option><option  value="70831">Mionica</option><option  value="70173">Mladenovac</option><option  value="70840">Negotin</option><option  value="71315">Niš - Crveni Krst</option><option  value="71331">Niš - Medijana</option><option  value="71285">Niš - Niška Banja</option><option  value="71323">Niš - Palilula</option><option  value="71307">Niš - Pantelej</option><option  value="80250">Nova Crnja</option><option  value="70866">Nova Varoš</option><option  value="80268">Novi Bečej</option><option  value="80276">Novi Kneževac</option><option  value="70874">Novi Pazar</option><option selected="selected" value="80284">Novi Sad</option><option  value="70190">Obrenovac</option><option  value="80306">Odžaci</option><option  value="80292">Opovo</option><option  value="70882">Osečina</option><option  value="80314">Pančevo</option><option  value="70904">Paraćin</option><option  value="80322">Pećinci</option><option  value="70912">Petrovac</option><option  value="80519">Petrovaradin</option><option  value="70939">Pirot</option><option  value="80349">Plandište</option><option  value="70947">Požarevac</option><option  value="70955">Požega</option><option  value="70963">Preševo</option><option  value="70971">Priboj</option><option  value="70980">Prijepolje</option><option  value="70998">Prokuplje</option><option  value="71013">Rača</option><option  value="71021">Raška</option><option  value="71005">Ražanj</option><option  value="71030">Rekovac</option><option  value="80357">Ruma</option><option  value="80373">Sečanj</option><option  value="80365">Senta</option><option  value="71072">Sjenica</option><option  value="71099">Smederevo</option><option  value="71102">Smederevska Palanka</option><option  value="71129">Soko Banja</option><option  value="80381">Sombor</option><option  value="70238">Sopot</option><option  value="80390">Srbobran</option><option  value="80403">Sremska Mitrovica</option><option  value="80411">Sremski Karlovci</option><option  value="80420">Stara Pazova</option><option  value="80438">Subotica</option><option  value="71293">Surčin</option><option  value="71137">Surdulica</option><option  value="71056">Svilajnac</option><option  value="71064">Svrljig</option><option  value="71269">Šabac</option><option  value="80497">Šid</option><option  value="80446">Temerin</option><option  value="80454">Titel</option><option  value="71153">Topola</option><option  value="71161">Trgovište</option><option  value="71170">Trstenik</option><option  value="71188">Tutin</option><option  value="71218">Ub</option><option  value="71145">Užice</option><option  value="70360">Valjevo</option><option  value="70378">Varvarin</option><option  value="70386">Velika Plana</option><option  value="70394">Veliko Gradište</option><option  value="70416">Vladičin Han</option><option  value="70408">Vladimirci</option><option  value="70424">Vlasotince</option><option  value="70432">Vranje</option><option  value="71358">Vranjska Banja</option><option  value="80462">Vrbas</option><option  value="70459">Vrnjačka Banja</option><option  value="80128">Vršac</option><option  value="70556">Zaječar</option><option  value="80152">Zrenjanin</option><option  value="80136">Žabalj</option><option  value="70521">Žabari</option><option  value="70530">Žagubica</option><option  value="80144">Žitište</option><option  value="70548">Žitorađa</option>';                    function setOpstine () {
                        var izvor = jQuery('#izvor').val();

                        //if (izvor == 1) {
                            jQuery('#opstinaId').html(rgzOpstine);

                        //} else if (izvor == 2) {
                        //    jQuery('#opstinaId').html(diOpstine);
                        //}
}

                    var rgzVrste = '<option value="1">Poslovni objekat</option><option value="2">Poslovni prostor</option><option value="3">Kuća</option><option value="4">Stan</option><option value="5">Garaža</option><optgroup label="Zemljište"><option value="6">Građevinsko</option><option value="7">Poljoprivredno</option></optgroup>';
                    function setVrste () {
                        var izvor = jQuery('#izvor').val();

                        //if (izvor == 1) {
                            jQuery('#vrstanepokretnosti').html(rgzVrste);
                        //} else if (izvor == 2) {
                        //    jQuery('#vrstanepokretnosti').html(diVrste);
                        //}

                        var data="";

                        //Make an array

                        var dataarray=data.split(",");

                        // Set the value

                        jQuery("#vrstanepokretnosti").val(dataarray);

                        // Then refresh

                        jQuery("#vrstanepokretnosti").multiselect("refresh");
                    }

/* <![CDATA[ */
var _wpcf7 = {"recaptcha":{"messages":{"empty":"Please verify that you are not a robot."}}};
/* ]]> */
/*
jQuery(document).ready(function(jQuery){jQuery.datepicker.setDefaults({"closeText":"Close","currentText":"Today","monthNames":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthNamesShort":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"nextText":"Next","prevText":"Previous","dayNames":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"dayNamesShort":["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],"dayNamesMin":["S","M","T","W","T","F","S"],"dateFormat":"MM d, yy","firstDay":1,"isRTL":false});});

/* <![CDATA[ */
var st_register_params = {"ajax_url":"http:\/\/www.datainvestment.rs\/wp-admin\/admin-ajax.php","username_required":"Please enter your username","email_required":"Please enter your email","error_class":"alert alert-warning"};
var st_login_params = {"ajax_url":"http:\/\/www.datainvestment.rs\/wp-admin\/admin-ajax.php","force_ssl_login":"0","force_ssl_admin":"0","is_ssl":"0","username_required":"Please enter your username","password_required":"Please enter your password","error_class":"alert alert-warning"};
/* ]]> */

/* <![CDATA[ */
var stMegamenuSettings = {"type":"hover","effect":"slide","speed":"600","align":"no","textnav":"Main Navigation"};
/* ]]> */

    var map;
    jQuery(function() {
        jQuery("#dateFrom").datepicker({
            autoclose: true
        });
        jQuery("#dateTo").datepicker({
            autoclose: true
        });

        jQuery("#vrstanepokretnosti").multiselect({
            noneSelectedText: "Izaberite nepokretnosti",
            selectedText: "# od # izabrano",
            checkAllText: "Izaberi sve",
            uncheckAllText: "Poništi sve"
        });
        jQuery("#vrstanepokretnosti").multiselect("uncheckAll");

        /***  little hack starts here ***/
        L.Map = L.Map.extend({
            openPopup: function(popup) {
                //        this.closePopup();  // just comment this
                this._popup = popup;

                return this.addLayer(popup).fire('popupopen', {
                    popup: this._popup
                });
            }
        }); /***  end of hack ***/

        map = L.map('map', {
            center: [45.272229, 19.849441],
            zoom: 13
        });

        var OpenStreetMap_Mapnik = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

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

        begining = '12/01/2015';today = '01/01/2017';
        jQuery("#dateFrom").val(begining);
        jQuery("#dateTo").val(today);

        var izvor = 1;                jQuery('#izvor').val(izvor);
                
        setOpstine();
        setVrste();

        var data = '1,2,3,4,5,6,7';        //Do it simple

        // var data="821,822,823,824";

        //Make an array

        var dataarray=data.split(",");

        // Set the value

        jQuery("#vrstanepokretnosti").val(dataarray);

        // Then refresh

        jQuery("#vrstanepokretnosti").multiselect("refresh");

        updateKatastar(true);
        validate();
        showMarkers();
    });

    function showMarkers () {
                var uids = [
        54150,54151        ];
        var lats = [
        45.2508,45.2506        ];
        var longs = [
        19.7864,19.7904        ];
        var nepNazivi = [
        'stan u stambenoj  zgradi za kolektivno stanov','stan u stambenoj  zgradi za kolektivno stanov'        ];
        var datumiU = [
        '2016-01-26 00:00:00','2016-01-19 00:00:00'        ];
        var ppNazivi = [
        'Poseban deo objekta','Poseban deo objekta'        ];
        var promNazivi = [
        'poseban deo objekta','poseban deo objekta'        ];
        var povrsine = [
        26,52        ];
        var povrsineZ = [
        26,52        ];
        var cene = [
        '23500','38140'        ];
        var ceneF = [
        '23.500','38.140'        ];
        // var pripadnosti = [
                // ];
        var ceneV = [
        '23500','38140'        ];

        var lastuid = -1;
        var markers = L.markerClusterGroup({ maxClusterRadius: 100, chunkedLoading: true, chunkProgress: updateProgressBar });
        var markerList = [];
        for (var i = 0; i < lats.length; i++) {
            // if (uids[i] != lastuid) {
            //     lastuid = uids[i];
            //     clusters.push(new L.MarkerClusterGroup());
            // }
                        var txt = "<b>Cena:</b> " + ceneF[i] + " " + "EUR" + "<br>";

            tMesec = Number(datumiU[i].substr(5, 2));tGodina = datumiU[i].substr(0, 4);                switch (tMesec) {
                    case 1:
                        tMesec = "Januar";
                        break;
                    case 2:
                        tMesec = "Februar";
                        break;
                    case 3:
                        tMesec = "Mart";
                        break;
                    case 4:
                        tMesec = "April";
                        break;
                    case 5:
                        tMesec = "Maj";
                        break;
                    case 6:
                        tMesec = "Jun";
                        break;
                    case 7:
                        tMesec = "Jul";
                        break;
                    case 8:
                        tMesec = "Avgust";
                        break;
                    case 9:
                        tMesec = "Septembar";
                        break;
                    case 10:
                        tMesec = "Oktobar";
                        break;
                    case 11:
                        tMesec = "Novembar";
                        break;
                    case 12:
                        tMesec = "Decembar";
                        break;
                }
            txt += "<b>Datum:</b> " + tMesec + " " + tGodina + "<br>";            if (nepNazivi[i] != "") {
                txt += "<br><b>Naziv:</b> " + nepNazivi[i] + "<br>";            }

                                // if (pripadnosti[i] != "") {
                    //     txt += '<b>Pripadnost:</b> ' + pripadnosti[i] + '<br>';
                    // } 
                    
            txt += "<b>Vrsta nepokretnosti:</b> " + promNazivi[i];

            if (povrsine[i] != -1) {
                txt +="<br><b>Površina:</b> " + povrsine[i] + " m²";
            }
            if (povrsineZ[i] != "-1") {
                        }
            if (povrsine[i] != -1) {
                cenam2 = Math.round((cene[i] / povrsine[i]) * 100) / 100;
                txt += '<br><b>Cena/m²:</b> ' + cenam2 + ' EUR'; 
            }

            txt += "<br>Kupoprodaja";            var marker = L.marker([lats[i], longs[i]])
                // .addTo(map)
                .bindPopup(txt)
                .on('popupopen', function (e) {
                    console.log(e);
                    if (!lockOpen) {
                        lockOpen = true;
                        for (var x = 0; x < markerList.length; x++) {
                            if (uids[x] == e.target.uid) {
                                markerList[x].openPopup();
                            }
                        }
                        lockOpen = false;
                    }
                });
            marker.uid = uids[i];
            markerList.push(marker);
        }

        markers.addLayers(markerList);
        map.addLayer(markers);

        var group = new L.featureGroup(markerList);
        map.fitBounds(group.getBounds().pad(0.5));

            }

    var lockOpen = false;
    var progress = document.getElementById('progress');
    var progressBar = document.getElementById('progress-bar');


    function updateProgressBar(processed, total, elapsed, layersArray) {
        if (elapsed > 1000) {
            // if it takes more than a second to load, display the progress bar:
            progress.style.display = 'block';
            progressBar.style.width = Math.round(processed/total*100) + '%';
        }

        if (processed === total) {
            // all markers processed - hide the progress bar:
            progress.style.display = 'none';
        }
    }