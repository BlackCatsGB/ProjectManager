"use strict";
//var csrfParam = $('meta[name="csrf-param"]').attr("content");
//var csrfToken = $('meta[name="csrf-token"]').attr("content");

$(document).ready(function () {
    //ADD event handler on demands table
    $('tbody td').on('click', function (e) {
        // take nearest id
        let input = $(this).closest('tr').find('input');
        let id = $(this).closest('tr').data('key');
        let checked = $(this).closest('tr').find('input').attr('checked');
        checked = checked === undefined ? 1 : 0;
        /*if (checked === 0) {
            //checked = 0;
            input.removeAttr('checked');
        } else {
            //checked = 1;
            input.attr('checked', 'checked');
        }*/
        console.log(checked);
        if (id !== null && id['fk_project'] !== null && id['fk_demand'] !== null) {
            //alert('call ajax');
            $.post({
                url: '/project/api-project-demands-is-relevant-update',
                dataType: 'json',
                data: {
                    "fk_project": id['fk_project'],
                    "fk_demand": id['fk_demand'],
                    "is_relevant": checked,
                    //"csrfParam" : csrfParam,
                    //"csrfToken" : csrfToken,
                },
                success: function (data) {
                    console.log("demand #" + id['fk_demand'] + " is relevant");
                    console.log(data['code']);
                    console.log(checked);
                    if (data['code'] === 1) {
                        if (checked === 0) input.removeAttr('checked');
                        else if (checked === 1) input.attr('checked', 'checked');

                    }
                },
                context: this
            });
        }


        /*if (e.target == this)
            alert(id['fk_demand']);*/
        //location.href = '" . Url::to(['/project/?fk_stage=' . $fk_stage . '&']) . "id=' + id;
    });
});