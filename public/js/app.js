$(".toggleNav").click(function () {
    $("#subnav").toggleClass("active");
    $(".toggleNavButton").toggleClass("active");
});



$('#createFolder').click(function(){
    $('.addFolder').fadeIn("slow");
});

$('#submitFolder').click(function(){
    $('.addFolder').fadeOut("slow");
});



$('#formFolder').on('submit', function (e) {
    e.preventDefault();
    $.post('/createFolder',
        {
            "_token": $(this).find( 'input[name=_token]' ).val(),
            "folder": $( '#folder' ).val(),
            "path" : $(this).find( 'input[name=path]' ).val()
        },
        function( data ) {

            var newname = data;
            $('.addFolder').after(
                '<tr class="line line-folder">' +
                    '<td>' +
                        '<i class="fa fa-folder"></i>  <a class="folder-name" href="http://localhost:8000/cloud/'+ newname +'">'+ newname +'</a>' +
                    '</td>' +
                    '<td></td>' +
                    '<td></td>' +
                '</tr>')
        },
        'json'
    );

});

$('#delete').on('submit', function (e) {
    e.preventDefault();
    $.post('/delete',
        {
            "_token": $(this).find( 'input[name=_token]' ).val(),
            "delete" : $(this).find( 'input[name=delete]' ).val()
        },
        function( data ) {

        },
        'json'
    );

});



$('#download').on('submit',function(e){
    e.preventDefault();
    $url = '/download?file=' + $(this).find( 'input[name=download]' ).val();
    $.ajax({
        type: 'GET',
        url: $url,
        success: function(data){
            if(data == true){
                alert('This file is not available for download.');
            }else{
                window.location =""+$url+"";
            }
        }

    })
});




$(document).bind('dragover', function (e) {
    var dropZone = $('.zone'),
        timeout = window.dropZoneTimeout;
    if (!timeout) {
        dropZone.addClass('in');
    } else {
        clearTimeout(timeout);
    }
    var found = false,
        node = e.target;
    do {
        if (node === dropZone[0]) {
            found = true;
            break;
        }
        node = node.parentNode;
    } while (node != null);
    if (found) {
        dropZone.addClass('hover');
    } else {
        dropZone.removeClass('hover');
    }
    window.dropZoneTimeout = setTimeout(function () {
        window.dropZoneTimeout = null;
        dropZone.removeClass('in hover');
    }, 100);
});



var baseUrl = '/';
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("div#dropzoneFileUpload", {
    url: baseUrl + "upload",
    addRemoveLinks: true,
    path: $('.addFolder').find( 'input[name=path]' ).val(),
    params: {
        path: $('.addFolder').find( 'input[name=path]' ).val(),
        _token: token
    },
    success: function (data) {

       console.log('ok');

    }
});
Dropzone.options.myAwesomeDropzone = {
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 500, // MB
    addRemoveLinks: true,
    accept: function(file, done) {

    },
    success: function () {

    }
};



$('.line').click(function(){

    $('.line').css('background-color', 'rgba(230, 11, 62, 0)');

    $(this).css('background-color', '#e60b3e');

});


$('.line-folder').click(function(){

    var name = $(this).find('.folder-name').text();
    var path = $('.addFolder').find( 'input[name=path]' ).val();
    line = $(this);


    $('.action').fadeIn();
    $('#input-delete').val(path + name);

    $('#edit-btn').click(function(){
        line.children(':first').html(

            '<form class=\"action-button\" id=\"edit\" method=\"post\">' +
            '<div class=\"input-field action-button\"> ' +
            '<input id=\"rename\" name=\"rename\" type=\"text\">' +
            '<input id=\"name\" name=\"name\" type=\"hidden\" value=\"'+ name +'\">' +
            ' <label for=\"folder\">Renommer</label> ' +
            '</div>'+
            '<div class="switch action-button">' +
            '<label> Privé' +
            '<input type="checkbox" id="mycheckbox">' +
            '<span class="lever"></span>' +
            'Public</label>' +
            '</div>' +
            '<button class="btn nav-color action-button"  id="submitEdit" type="submit" >'+
            '<i class="fa fa-pencil"></i>'+
            '</button>'+
            '</form>');

        $('#edit').on('submit', function(e) {
            e.preventDefault();
                var limite;
            if($('#mycheckbox').prop('checked'))
                limite = 3;
            else
                limite = 1;
            $.post('/edit',
                {
                    "_token": $('#delete').find( 'input[name=_token]' ).val(),
                    "edit" : $(this).find( 'input[name=rename]' ).val(),
                    "name" : $(this).find( 'input[name=name]' ).val(),
                    "path" : path,
                    "limite" : limite


                },
                function(data) {
                    var newname = data;
                    line.children(':first').html('<i class="fa fa-folder">  </i><a class="folder-name" href="http://localhost:8000/cloud/'+ newname +'/">'+ newname +'</a>')
                }
            )
        });
    });


});


$('.line-files').click(function(){

    var name = $(this).find('.file-name').text();
    var path = $('.addFolder').find( 'input[name=path]' ).val();
    line = $(this);



    $('.action').fadeIn();
    $('#input-delete').val(path + name);
    $('#input-download').val(path+ '/' + name);

    console.log(line);

    $('#edit-btn').click(function(){
        line.children(':first').html(

            '<form class=\"action-button\" id=\"edit\" method=\"post\">' +
            '<div class=\"input-field\"> ' +
            '<input id=\"rename\" name=\"rename\" type=\"text\">' +
            '<input id=\"name\" name=\"name\" type=\"hidden\" value=\"'+ name +'\">' +
            ' <label for=\"folder\">Renommer</label> ' +
            '<button class="btn nav-color"  id="submitEdit" type="submit" >'+
            '<i class="fa fa-pencil"></i>'+
            '</button>'+
            '</div>'+
            '</form>');

        $('#edit').on('submit', function(e) {
            e.preventDefault();
            $.post('/edit',
                {
                    "_token": $('#delete').find( 'input[name=_token]' ).val(),
                    "edit" : $(this).find( 'input[name=rename]' ).val(),
                    "name" : $(this).find( 'input[name=name]' ).val(),
                    "path" : path


                },
                function(data) {
                    console.log(data);
                }
            )
        });
    });
});

function createDonutCharts() {
    $("<style type='text/css' id='dynamic' />").appendTo("head");
    $("div[chart-type*=donut]").each(function () {
        var d = $(this);
        var id = $(this).attr('id');
        var max = $(this).data('chart-max');
        if ($(this).data('chart-text')) {
            var text = $(this).data('chart-text');
        } else {
            var text = "";
        }
        if ($(this).data('chart-caption')) {
            var caption = $(this).data('chart-caption');
        } else {
            var caption = "";
        }
        if ($(this).data('chart-initial-rotate')) {
            var rotate = $(this).data('chart-initial-rotate');
        } else {
            var rotate = 0;
        }
        var segments = $(this).data('chart-segments');

        for (var i = 0; i < Object.keys(segments).length; i++) {
            var s = segments[i];
            var start = ((s[0] / max) * 360) + rotate;
            var deg = ((s[1] / max) * 360);
            if (s[1] >= (max / 2)) {
                d.append('<div class="large donut-bite" data-segment-index="' + i + '"> ');
            } else {
                d.append('<div class="donut-bite" data-segment-index="' + i + '"> ');
            }
            var style = $("#dynamic").text() + "#" + id + " .donut-bite[data-segment-index=\"" + i + "\"]{-moz-transform:rotate(" + start + "deg);-ms-transform:rotate(" + start + "deg);-webkit-transform:rotate(" + start + "deg);-o-transform:rotate(" + start + "deg);transform:rotate(" + start + "deg);}#" + id + " .donut-bite[data-segment-index=\"" + i + "\"]:BEFORE{-moz-transform:rotate(" + deg + "deg);-ms-transform:rotate(" + deg + "deg);-webkit-transform:rotate(" + deg + "deg);-o-transform:rotate(" + deg + "deg);transform:rotate(" + deg + "deg); background-color: " + s[2] + ";}#" + id + " .donut-bite[data-segment-index=\"" + i + "\"]:BEFORE{ background-color: " + s[2] + ";}#" + id + " .donut-bite[data-segment-index=\"" + i + "\"].large:AFTER{ background-color: " + s[2] + ";}";
            $("#dynamic").text(style);
        }

        d.children().first().before("<div class='donut-hole'><span class='donut-filling'>" + text + "</span></div>");
        d.append("<div class='donut-caption-wrapper'><span class='donut-caption'>" + caption + "</span></div>");
    });
}

createDonutCharts();
