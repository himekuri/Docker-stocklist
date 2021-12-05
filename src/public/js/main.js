// フォームボタンの制御
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

        $('#form .js_radio').each(function(index, element) {

            let name = $($(this).find("input")).attr('name');

            if (!$(`input[name=${name}]:checked`).val()){
                flag = false;
            }
        });

        if (flag) {
            //送信ボタンを押せるようにする
            $('.is_send').prop("disabled", false);
        }
        else {
            //送信ボタンを押せないようにする
            $('.is_send').prop("disabled", true);
        }
    });
});

// アコーディオンメニューの開閉
function toggle() {
    document.getElementById('navbar_nav').classList.toggle("is_show");
    document.getElementById('navbar_nav_logout').classList.toggle("is_show");
}

document.getElementById('headerToggler').addEventListener("click", toggle);
