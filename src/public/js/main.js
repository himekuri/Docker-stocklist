$(document).ready(function () {

    $('#form input').on('input', function () {

        let flag = true;


        if (
            $('#form input[type="text"]').val() == "" ||
            $('#form input[type="email"]').val() == "" ||
            $('#form input[type="password"]').val() == ""||
            $('#form input[name="password_confirmation"]').val() == ""
        ) {
            flag = false;
        }



        $('#form .radio').each(function(index, element) {

            let name = $($(this).find("input")).attr('name');

            if (!$(`input[name=${name}]:checked`).val()){
                flag = false;
            }
        });

        if (flag) {
            //送信ボタンを押せるようにする
            $('.send').prop("disabled", false);
        }
        else {
            //送信ボタンを押せないようにする
            $('.send').prop("disabled", true);
        }
    });
});