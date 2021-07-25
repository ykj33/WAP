// 화면 출력 완료
console.log("로딩완료");

// 등록버튼 클릭 시 유효성 검사
document.querySelector('#confirm').addEventListener('click', function () {
    // 필수항목입력 여부 체크
    if (checkForm() == false) {
        // 필요항목이 입력되지 않을 경우 submit이 되지 않게 함
        event.preventDefault();
        return false;
    }
})
document.querySelector('#cancel').addEventListener('click', function () {
    if (confirm("입력한 내용이 삭제됩니다. 등록을 취소하시겠습니까?")) {
        // 확인 버튼 클릭 시 동작
        window.location.href = "https://rikarsong.cafe24.com/wap/index.html.php";
    } else {
        // 취소 버튼 클릭 시 동작
        return;
    }
});

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
        // 날짜 비교
    } else if (document.getElementById("date_from").value > document.getElementById("date_to").value) {
        alert("종료날짜가 시작날짜보다 앞서면 안됩니다.")
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
    if (!/\.(jpg|jpeg|png|tiff)$/i.test(file[0].name)) {
        alert('이미지 파일만 선택해주세요.\njpg, jpeg, png, tiff 파일만 가능합니다. \n현재파일 : ' + file[0].name);
        f.outerHTML = f.outerHTML;
        console.log("파일 형식 체크")
        return;
    } else {
        // 파일 용량 체크
        checkFileSize(f)
        fileUpload(f)
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

// 파일 첨부시 리스트 생성
// let lastTableindex = 0;
// function fileUpload(f) {
//     console.log("함수 실행")
//     let file = f.files;
//     let i = 0;
//     let fileName = "";
//
//
//     for (i; i < file.length; i++) {
//         fileName = file[i].name;
//         let tableIndex = 0;
//         if(lastTableindex == 0) {
//             tableIndex = i+1;
//         } else {
//             tableIndex = lastTableindex + i;
//         }
//         let insertHtml = "<tbody><tr><td><input type='checkbox' name='upload-board-check'></td><td>" + tableIndex + "</td><td>" + fileName + "</td></tr></tbody>";
//         $(".upload-board table").append(insertHtml);
//         console.log(file);
//         // 업로드 버튼 막기
//         $("#uploadfile").attr('disabled', true);
//     }
//
//     $(".upload-board").css("display", "block");
//     lastTableindex = document.getElementById('uploadFileList').rows.length;
//     console.log('마지막번호' + lastTableindex)
// };
let lastTableindex = 0;

// 파일 업로드 시 이미지 썸네일 출력
function fileUpload(f) {
    let file = f.files;
    console.log("파일들 :"+file)
    // let i = 0;
    let tableIndex = 0;
    for (let i =0; i < file.length; i++) {

        if (lastTableindex == 0) {
            tableIndex = i + 1;
        } else {
            tableIndex = lastTableindex + i;
        }
        lastTableindex = tableIndex+1;
        console.log("마지막 번호1 :"+ lastTableindex)
        let src = URL.createObjectURL(file[i]);
        console.log(src)
        let html = "<div><input type='checkbox' name='upload-thumb-check' class='upload-thumb-check' id='upload-thumb-check" + tableIndex + "'><label for='upload-thumb-check" + tableIndex + "'><img src=" + src + " className='upload-thumb' alt='썸네일' width='170px' style='margin: 10px'></label></div>"
        $(".thumb-box").append(html);
        console.log("마지막 번호2 :"+ lastTableindex)

        $(".upload-board").css("display", "block");
        console.log("이미지 연결")
    }

}

// 전체 선택, 전체 해제
// $('input[name=upload-board-check-all]').on('change', function () {
//     $('input[name=upload-board-check]').prop('checked', this.checked);
// });


// 체크한 파일 삭제
function deleteFile() {
    console.log("개수" + $(".thumb-box").children().length)
    $('input[name=upload-thumb-check]:checked').parent().remove();
    // 더 이상 삭제할 것이 없으면 썸네일 목록 화면에서 감춤
    if ($(".thumb-box").children().length == 0) {
        $(".upload-board").css("display", "none");
    }
}
