$(function () {

    function getLeasingterm(data) {
        content = data;
        returnFunction = "handleLeasingTerm";
        showOverlay();

    }


    function getFlinkerintern(data) {
        content = data;
        returnFunction = "handleFlinkerIntern";
        showOverlay();
    }


    $(document).on('click', '.new_leasingterm', function(e) {

        e.preventDefault();

        currentNode = -1;

        var what = this.id;

        if (what == 'dialog_link') {
            what = "";
        } else {
            currentNode = $("#leasingtermList").dataTable().fnGetPosition($(this).closest('tr')[0]);
        }

        console.log(currentNode);

        var reqUrl = '?r=leasingTerm/leasingterm_form&guid='+what;

        $.get(reqUrl, getLeasingterm);

        return false;

    });

     $(document).on('click', '.new_flinkerintern', function(e) {

   // $(".new_flinkerintern").on('click', function (e) {

        e.preventDefault();

        currentNode = -1;

        var what = this.id;

        if (what == 'dialog_link') {
            what = "";
        } else {
            currentNode = $("#flinkerinternList").dataTable().fnGetPosition($(this).closest('tr')[0]);
        }

        console.log(currentNode);

        var reqUrl = '?r=flinkerIntern/flinkerIntern_form&id='+what;

        $.get(reqUrl, getFlinkerintern);

        return false;

    });

    $('#logoutButton').click(function(){

        window.location = "?r=site/logout"

    });


});



function handleLeasingTerm() {

    $('.cancel_overlay').click(function (e) {
        e.preventDefault();

        $('.simple_overlay').overlay().close();
    });

    $(".saveLeasingTerm").on('click', function (e) {

        e.preventDefault();

        $.ajax({

            'url': '?r=leasingTerm/saveLeasingTerm',
            'data': {
                guid: $('#guid').val(),
                title: $('#title').val(),
                description: $('#description').val(),
                tag: $('#tag').val()
            },
            'cache': false,
            'dataType': 'json',
            'success': function (data) {

                if (currentNode >= 0) {
                    $('#leasingtermList').dataTable().fnUpdate([
                        data.guid, data.title, data.description, data.tag, data.button], currentNode);
                } else {
                    $('#leasingtermList').dataTable().fnAddData([
                        data.guid, data.title, data.description, data.tag, data.button]);
                }

                $('.simple_overlay').overlay().close();

            },

            'error': function (data) { // if error occured
                alert("Ett fel uppstod. Försök igen.");

            },

        });

    });

}

function handleFlinkerIntern() {

    $('.cancel_overlay').click(function (e) {
        e.preventDefault();

        $('.simple_overlay').overlay().close();
    });

    $(".saveFlinkerIntern").on('click', function (e) {

        e.preventDefault();

        $.ajax({

            'url': '?r=leasingTerm/saveFlinkerIntern',
            'data': {
                guid: $('#id').val(),
                title: $('#type').val(),
                description: $('#description').val(),
                section: $('#section').val()
            },
            'cache': false,
            'dataType': 'json',
            'success': function (data) {

                if (currentNode >= 0) {
                    $('#leasingtermList').dataTable().fnUpdate([
                        data.id, data.type, data.description, data.section, data.button], currentNode);
                } else {
                    $('#leasingtermList').dataTable().fnAddData([
                        data.id, data.type, data.description, data.section, data.button]);
                }

                $('.simple_overlay').overlay().close();

            },

            'error': function (data) { // if error occured
                alert("Ett fel uppstod. Försök igen.");

            },

        });

    });

}

$(document).ready(function () {
    $('.display').DataTable();

    $('#example').DataTable({
        language: {
            paginate: {
                next: '&#8594;', // or '→'
                previous: '&#8592;' // or '←'
            }
        }
    });
});