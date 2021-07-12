// 화면 출력 완료
console.log("로딩완료")

new Swiper('.banner .swiper-container', {

    autoplay: true,
    loop: true,
    pagination: {
        el: '.banner .swiper-pagination',
        clickable: true
    },
    navigation: {
        prevEl: '.banner .swiper-prev',
        nextEl: '.banner .swiper-next'
    }
});

document.querySelector('#confirm').addEventListener('click', function () {
    if (confirm("등록이 완료되었습니다. 추가로 더 등록하시겠습니까?")) {
        // 확인 버튼 클릭 시 동작
        window.location.href = "http://localhost/wap/register.html";
    } else {
        // 취소 버튼 클릭 시 동작
        window.location.href = "http://localhost/wap/index.html";
    }
})
document.querySelector('#alert').addEventListener('click', function () {
    console.log('취소')
    if (confirm("입력한 내용이 삭제됩니다. 등록을 취소하시겠습니까?")) {
        // 확인 버튼 클릭 시 동작
        window.location.href = "http://localhost/wap/index.html";
    } else {
        // 취소 버튼 클릭 시 동작
        return;
    }
});

// $(function () {
//     $(document).on("click", "#confirm", function () {
//         action_popup.confirm("등록이 완료되었습니다. 추가로 등록하시겠습니까?", function (res) {
//             if (res) {
//                 window.location.href = "http://localhost/wap/register.html";
//             }
//         })
//     });
//     $(".modal_close").on("click", function () {
//         action_popup.close(this);
//     });
// });
//
// // 등록, 취소 모달 창 띄우기
//
// const action_popup = {
//     timer: 500,
//     confirm: function (txt, callback) {
//         if (txt == null || txt.trim() == "") {
//             console.warn("confirm message is empty");
//             return;
//         } else if (callback == null || typeof callback != 'function') {
//             console.warn("callback is null or not function");
//             return;
//         } else {
//             $(".type-confirm .btn_ok").on("click", function () {
//                 $(this).unbind("click");
//                 callback(true);
//                 action_popup.close(this);
//             });
//             this.open("type-confirm", txt);
//         }
//     },
//     open: function (type, txt) {
//         const popup = $("." + type);
//         popup.find(".menu_msg").text(txt);
//         $("body").append("<div class = 'dimLayer'</div>");
//         $(".dimLayer").css('height', $(document).height()).attr("target", type);
//         popup.fadeIn(this.timer);
//     },
//     close: function (target) {
//         const modal = $(target).closest(".modal-section");
//         let dimLayer;
//         if (modal.hasClass("type-confirm")) {
//             dimLayer = $(".dimLayer[target=type-confirm]");
//         } else if (modal.hassClass("type-alert")) {
//             dimLayer = $(".dimLayer[target=type-alert]")
//         } else {
//             console.warn("close unknown target.")
//             return;
//         }
//         modal.fadeOut(this.timer);
//         setTimeout(function () {
//             dimLayer != null ? dimLayer.remove() : "";
//         }, this.timer);
//
//     }
//
// }