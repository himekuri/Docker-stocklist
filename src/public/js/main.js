$(function() {

    //入力欄の操作時
    $('form input:required').change(function () {
        let flag = true;
        $('form input:required').each(function(e) {
            //もし必須項目が空なら
            if ($('form input:required').eq(e).val() === "") {
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