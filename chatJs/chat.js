/*聊天信息*/
function show(headSrc, str, className) {
    var html = "<div class=" + className + "><div class='msg'><img src=" + headSrc + " />" +
        "<p><i class='msg_input'></i>" + str + "</p></div></div>";
    upView(html);
}
/*更新视图*/
function upView(html) {
    $('.message').append(html);
    $('body,html').animate({
        scrollTop: $('.message').outerHeight() - window.innerHeight
    }, 200); // 自动将页面移动到最底部
    // $("body").animate({scrollTop:top})不被Firefox支持,而被chrome支持
    // $("html").animate({scrollTop:top})而被chrome支持,而被Firefox支持
}

var flag = true; // 防止连续点击提交消息
var message = ''; // 接收接口返回的数据
//根据cookiename获取cookie值
function getCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=")
            if (c_start != -1) {
                c_start = c_start + c_name.length + 1
                    c_end = document.cookie.indexOf(";", c_start)
                    if (c_end == -1) c_end = document.cookie.length
                        return unescape(document.cookie.substring(c_start, c_end))
            }
    }
    return ""
}

$(function () {
    $('#inputVal').focus();
    $('.footer').on('keyup', 'input', function () {
        if ($(this).val().length > 0) {
            $(this).next().css('background', '#114F8E');

        } else {
            $(this).next().css('background', '#ddd');
        }
    });

    $('.footer p').click(getMessage);
    $(document).keyup(function (ev) {
        if (ev.keyCode == 13) {
            getMessage();
        }
    })

    function getMessage() {
        var val = $('#inputVal').val();
        if (val == '')
            return;
        if (flag) {
            flag = false;

            show("./chatImages/woman.png", $(".footer input").val(), "show");
            // 替换为各自的接口地址
            //var url = "http://chat.sustxyly.top:8082/";
            var url = "http://175.24.55.5:11000/";
            var name = getCookie("userName");
            console.log(name);
            //var url = "175.24.55.5:11000/";
            var r_name = "http://175.24.55.5:12001/mp3_data/";
            $(".footer input").val("").next().css('background', '#ddd'); //清空input
            $.getJSON(url+val+"&"+name, function (data) {
                flag = true;
                message = data.message;
                console.log(message);
                r_name = r_name + data.mp3_name;
                console.log(r_name);
                let audio = new Audio(r_name)
                    audio.play();
                setTimeout(function () {
                    show("chatImages/man.png", message, "send");
                }, 500);
            })                                                                                               

            //$.ajax({
            //  type: "get",
            //	dataType: "json",
            //	async: true,
            //	url: url,
            //	data: {
            //  infos: val,
            //	},
            //	complete: function (data) {
            //		flag = true;
            //		message = data.responseText
            //			setTimeout(function () {
            //				show("chatImages/man.png", message, "send");
            //			}, 500);
            //	}
            //});
        }
    }
});
