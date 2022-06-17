$(document).ready(function() {
    $('body').on('click', '.fic_cals', function() {
        var td_obj = $(this);
        var year = $(this).data("year");
        var month = $(this).data("month");
        var day = $(this).children('.day').text();
        room_tbl(year, month, day)
        $('#calender_tbl .focus').removeClass('focus');
        td_obj.addClass('focus');
    });

    $('body').on('click', '#next_mon, #pre_mon, #today_btn', function() {
        var year = $(this).data("year");
        var month = $(this).data("month");
        var day = $(this).data("day");
        var chk_id = $(this).attr('id');

        var today = new Date();
        var  to_year= today.getFullYear();

        if(Number(to_year) < Number(year)-1) {
            return  false;
        } else if(Number(to_year) > Number(year)+1) {
            return  false;
        }

        if(month == '12') {
            var next_year = Number(year) +1;
            $('#next_mon').data("year", next_year);
            $('#next_mon').data("month", '1');
        } else {
            var next_month = Number(month) +1;
            $('#next_mon').data("year", year);
            $('#next_mon').data("month", next_month);
        }

        if(month == '1') {
            var pre_year =  Number(year) -1;
            $('#pre_mon').data("year", pre_year);
            $('#pre_mon').data("month", '12');
        } else {
            var pre_month = Number(month) -1;
            $('#pre_mon').data("month", pre_month);
            $('#pre_mon').data("year", year);
        }

        if(Number(to_year) +1  <= Number(year) && Number(month) == 12) {
            $('#next_mon').hide();
        } else {
            $('#next_mon').show();
        }

        if(Number(to_year) - 1  >= Number(year) && Number(month) == 1) {
            $('#pre_mon').hide();
        } else {
            $('#pre_mon').show();
        }

        /*else if(Number(to_year) > Number(year)) {
            $('#next_mon').show();
            $('#pre_mon').hide();
        } else {
            $('#next_mon').show();
            $('#pre_mon').show();
        }*/

        $('#next_year').data('year', Number(year) +1 );
        $('#next_year').data('month', month);
        $('#next_year').data('day', day);
        $('#pre_year').data('year', Number(year) -1);
        $('#pre_year').data('month', month);
        $('#pre_year').data('day', day);

        calander_tbl(year, month, day)

        $(this).parent('.month').children('span').html(year+'년 '+ month + '월');
    });

    $('body').on('click', '#pre_year, #next_year', function() {
        var year = $(this).data("year");
        var month = $(this).data("month");
        var day = $(this).data("day");

        var today = new Date();

        var  to_year= today.getFullYear();

        if(Number(to_year) < Number(year)) {
            $('#next_year').hide();
            $('#pre_year').show();
        } else if(Number(to_year) > Number(year)) {
            $('#next_year').show();
            $('#pre_year').hide();
        } else {
            $('#next_year').show();
            $('#pre_year').show();
        }

        $('#next_year').data('year', Number(year) +1 );
        $('#next_year').data('month', month);
        $('#next_year').data('day', day);
        $('#pre_year').data('year', Number(year) -1);
        $('#pre_year').data('month', month);
        $('#pre_year').data('day', day);
        $('#next_mon').data("year", year);
        $('#pre_mon').data("year", year);
        calander_tbl(year, month, day)

        $(this).parent('.month').children('span').html(year+'년 '+ month + '월');
    });

    function room_tbl(year, month, day) {
        var option = {
            url : '/site/tree/apiReserveTable/'+year+'/'+month + '/' +day,
            type : "post",
            async:false
        };
        $.ajax(
            option
        ).done(function(data){
            $('#room_tbl').empty();
            $('#room_tbl').append(data.html);
        });
    }

    function calander_tbl(year, month, day) {
        var option = {
            url : '/site/tree/apiCalenderTbl/'+year+'/'+month + '/' +day,
            type : "post",
            async:false
        };
        $.ajax(
            option
        ).done(function(data){

            $('#calender_tbl').empty();
            $('#calender_tbl').append(data.html);
            $('#pre_mon').data("day", data.pre_lastday);
            room_tbl(year, month, day);
        });
    }

    $('#emailgo').click(function () {
        var check = true;
        if(!$("#name").val()) {
            alert("이름을 입력해 주세요.");
            return false;
        }
        if(!$("#phone").val()) {
            alert("연락처를 입력해 주세요.");
            return false;
        }

        if(!$("#message").val()) {
            alert("문의사항을 입력해 주세요.");
            return false;
        }


        if($("#checked").is(":checked")) {
            if(check) {
                var data = $('#contactForm').serialize();

                var result = json('/site/tree/contractEmail/',data);
                if(result.result == true) {
                    alert("메일이 전송되었습니다");
                }
            } else {
                $(this).next().trigger('click');
            }
        }
        else {
            alert("개인정보보호정책에 동의해주세요");
        }




    })


});
