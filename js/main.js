// 화면 출력 완료
console.log("로딩완료");

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
    // 필수항목입력 여부 체크
    if (checkForm() == false) {
        // 필요항목이 입력되지 않을 경우 submit이 되지 않게 함
        event.preventDefault();
        return false;
    } else {
        return true;
        window.location.href = "https://rikarsong.cafe24.com/wap/record_regist.html";
    }
})
document.querySelector('#cancel').addEventListener('click', function () {
    if (confirm("입력한 내용이 삭제됩니다. 등록을 취소하시겠습니까?")) {
        // 확인 버튼 클릭 시 동작
        window.location.href = "https://rikarsong.cafe24.com/wap/index.html";
    } else {
        // 취소 버튼 클릭 시 동작
        return;
    }
});
// $("input[type='file']").on('change', function () {
//     $(this).next('.custom-file-label').html(event.target.files[0].name);
// });


// 마우스 올렸을 시 확대
function zoomIn(event) {
    event.target.style.transform = "scale(1.2)";
    event.target.style.zIndex = 1;
    event.target.style.transition = "all 0.5s";
}

// 마우스 뺐을 시 축소
function zoomOut(event) {
    event.target.style.transform = "scale(1)";
    event.target.style.zIndex = 0;
    event.target.style.transition = "all 0.5s";
}

// 필수 항목 입력 체크
function checkForm() {
    if (document.getElementById("title").value == "") {
        alert("제목을 입력해주세요.")
        $("#title").focus();
        return false;
    } else if (document.getElementById("creator").value == "") {
        alert("생산자를 입력해주세요.")
        $("#creator").focus();
        return false;
    } else if (document.getElementById("date_from").value == "") {
        alert("시작날짜를 입력해주세요.")
        $("#date_from").focus();
        return false;
    } else if (document.getElementById("date_to").value == "") {
        alert("종료날짜를 입력해주세요.")
        $("#date_to").focus();
        return false;
    } else if (document.getElementById("extent").value == "") {
        alert("기록규모를 입력해주세요.")
        $("#extent").focus();
        return false;
    } else if (document.getElementById("medium").value == "") {
        alert("기록매체를 입력해주세요.")
        $("#medium").focus();
        return false;
    } else if (document.getElementById("type").value == "") {
        alert("기록유형을 입력해주세요.")
        $("#type").focus();
        return false;
    } else {
        return true;
    }
}


// 파일 확장자 체크
function checkFile(f) {
    let file = f.files;
    console.log(file)
    // 정규표현식으로 확장자 체크
    if (!/\.(gif|jpg|jpeg|png|mp4|avi)$/i.test(file[0].name)) {
        alert('gif, jpg, jpeg, png, mp4, avi 파일만 선택해주세요.\n\n현재파일 : ' + file[0].name);
        f.outerHTML = f.outerHTML;
        console.log("파일 형식 체크")
        return;
    } else {
        // 파일 용량 체크
        checkFileSize(f)

    }

}

// 파일 용량 체크
function checkFileSize(f) {
    let file = f.files;
    if (file[0].size >= 10000000) {
        console.log("이미지 파일 용량 체크")
        alert('파일은 10MB 이하의 크기만 첨부 가능합니다.');

        f.outerHTML = f.outerHTML;
        console.log("10메가보다 크다.")
        return false;
    } else {
        // 파일 이름 출력하기

        document.getElementById("custom-file-label").innerHTML = file[0].name;
        console.log("10메가보다 작다.")
    }
}
