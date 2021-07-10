console.log("로딩")
// document.querySelector('#regist').addEventListener('click', function () {
//     if (confirm("등록이 완료되었습니다. 추가로 더 등록하시겠습니까?")) {
//         // 확인 버튼 클릭 시 동작
//         window.location.href = "http://localhost/wap/register.html";
//     } else {
//         // 취소 버튼 클릭 시 동작
//         window.location.href = "http://localhost/wap/index.html";
//     }
// })
document.querySelector('#cancel').addEventListener('click', function () {
    console.log('취소')
    if (confirm("입력한 내용이 삭제됩니다. 등록을 취소하시겠습니까?")) {
        // 확인 버튼 클릭 시 동작
        window.location.href = "http://localhost/wap/index.html";
    } else {
        // 취소 버튼 클릭 시 동작
        return;
    }
});
