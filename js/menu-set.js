 $(document).ready(function() {
        $('#wrapper1').dockmenu({
            buttons: [{
                'title': 'Settings',
                'href': '#settings',
                'imgURL': '../icons/Settings.png',
                'onClick': function(){
                    alert('You clicked on the Settings icon');
                }
            },{
                'title': 'App Store',
                'href': '#AppStore',
                'imgURL': '../icons/AppStore.png',

            },{
                'title': 'Camera',
                'href': '#camera',
                'imgURL': '../icons/Camera.png',

            },{
                'title': 'Games',
                'href': '#Games',
                'imgURL': '../icons/Games.png',

            },{
                'title': 'Mail',
                'href': '#Mail',
                'imgURL': '../icons/Mail.png',

            },{
                'title': 'Music',
                'href': '#Music',
                'imgURL': '../icons/Music.png',
                'onClick': function(){
                    alert('You clicked on the Music icon');
                }
            },{
                'title': 'Safari',
                'href': '#Safari',
                'imgURL': '../icons/Safari.png',

            },{
                'title': 'Photos',
                'href': '#Photos',
                'imgURL': '../icons/Photos.png',

            }]

        });

    });

function recreate()
{
    var width = $('#width').val(),
        position = $('#position option:selected').val(),
        menuposition = $('#menuposition option:selected').val(),
        top = $('#top').val(),
        bottom = $('#bottom').val(),
        left = $('#left').val(),
        right = $('#right').val(),
        margin = $('#margin').val().split(','),
        padding = $('#padding').val().split(','),
        showBoard = $('#showBoard').val();

    $('#wrapper1').empty();

    $('#wrapper1').dockmenu({
        width: width,
        position: position,
        menuPosition: menuposition,
        top: top,
        bottom: bottom,
        left: left,
        right: right,
        margin: margin,
        padding: padding,
        showBoard:  $('#showBoard').is(':checked'),
        buttons: [{
            'title': 'Settings',
            'href': '#',
            'imgURL': '../icons/Settings.png',
            'onClick': function(){
                alert('You clicked on the Settings icon');
            }
        },{
            'title': 'App Store',
            'href': '#',
            'imgURL': '../icon/AppStore.png',

        },{
            'title': 'Camera',
            'href': '#',
            'imgURL': '../icon/Camera.png',

        },{
            'title': 'Games',
            'href': '#',
            'imgURL': '../icon/Games.png',

        },{
            'title': 'Mail',
            'href': '#',
            'imgURL': '../icon/Mail.png',

        },{
            'title': 'Music',
            'href': '#',
            'imgURL': '../icon/Music.png',
            'onClick': function(){
                alert('You clicked on the Music icon');
            }
        },{
            'title': 'Safari',
            'href': '#',
            'imgURL': '../icon/Safari.png',

        },{
            'title': 'Photos',
            'href': '#',
            'imgURL': '../icon/Photos.png',

        }]

    });
}
