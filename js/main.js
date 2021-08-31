// 화면 출력 완료
console.log("로딩완료");

// 등록버튼 클릭 시 유효성 검사
document.querySelector('#confirm').addEventListener('click', function () {
    // 필수항목입력 여부 체크
// $("#board_content").val($("#div_content").html());
    if (checkForm() == false) {
        // 필요항목이 입력되지 않을 경우 submit이 되지 않게 함
        event.preventDefault();
        return false;
    }
})
document.querySelector('#cancel').addEventListener('click', function () {
    location.reload();
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
    let regist = true;
    let file = f.files;
    for (let i = 0; i < file.length; i++) {
        // 정규표현식으로 확장자 체크
        if (!/\.(jpg|jpeg|png|tiff)$/i.test(file[i].name)) {

            console.log("등록불가")
            alert('이미지 파일만 선택해주세요.\njpg, jpeg, png, tiff 파일만 가능합니다. \n현재파일 : ' + file[i].name);
            regist = false;
            // break;
            f.outerHTML = f.outerHTML;


            console.log("파일 형식 체크");
        }

    }
    // 파일 용량 체크
    if (regist == true) {
        checkFileCount(f)
        checkFileSize(f)
        fileUpload(f)
    }

}

function checkFileCount(f) {
    let file = f.files;
    console.log($(".custom-file-input")[0].files.length);

}

function checkFileSingle(f) {
    let file = f.files;
    console.log(file)
    // 정규표현식으로 확장자 체크
    if (!/\.(jpg|jpeg|png|tiff)$/i.test(file[0].name)) {
        alert('이미지 파일만 선택해주세요.\njpg, jpeg, png, tiff 파일만 가능합니다. \n현재파일 : ' + file[0].name);

        return false;
        console.log("파일 형식 체크")
    } else {
        // 파일 용량 체크
        checkFileSize(f)
        fileUploadSingle(f)
    }

}

// 파일 용량 체크
function checkFileSize(f) {
    let file = f.files;
    if (file[0].size >= 10000000) {

        alert('파일은 10MB 이하의 크기만 첨부 가능합니다.');

        f.outerHTML = f.outerHTML;

        return false;
    } else {
        // 파일 이름 출력하기

        document.getElementById("custom-file-label").innerHTML = file[0].name;

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

// document.getElementById('thumb-box').addEventListener('change', (event) => {
//     const fileList = event.target.files;
//     console.log(fileList);
// });

// 파일 업로드 시 이미지 썸네일 출력
function fileUpload(f) {

    let file = f.files;

    let tableIndex = 0;
    for (let i = 0; i < file.length; i++) {

        if (lastTableindex == 0) {
            tableIndex = i + 1;
        } else {
            tableIndex = lastTableindex + i;
        }
        lastTableindex = tableIndex + 1;

        let src = URL.createObjectURL(file[i]);

        let html = "<div>" +
            "<input type='button' name='delete-file' class='delete-file' id='delete-file" + tableIndex + "' value='삭제' onclick='deleteFile(this)'>" +
            "<img src=" + src + " className='upload-thumb' alt='썸네일' width='170px' style='margin: 10px'></div>"
        $(".thumb-box").append(html);
        console.log("id값 확인" + tableIndex);
        $('#img_box').append("<img src='" + src + "' data-image='tmp1' class='tmp1'><input type=hidden name='tmpfile[]' value='" + src + "'  class='tmp1'>");
        console.log(file);
        $(".upload-board").css("display", "block");
        console.log("이미지 연결")
    }
}


function deleteFile(obj) {
    $(obj).parent().empty();
    $(obj).parent().parent().remove();
    $(obj).parent().val("");
}



function fileUploadSingle(f) {
    let file = f.files;
    console.log(file)
    let tableIndex = 0;
    console.log("마지막 번호1 :" + lastTableindex)
    let src = URL.createObjectURL(file[0]);
    console.log(src)
    let html = "<div>" +
        // "<input type='checkbox' name='upload-thumb-check' class='upload-thumb-check' id='upload-thumb-check" + tableIndex + "'><label for='upload-thumb-check" + tableIndex + "'>" +
        "<img src=" + src + " className='upload-thumb' alt='썸네일' width='250px' style='margin: 10px'></label></div>"
    $(".thumb-box").html(html);
    console.log("마지막 번호2 :" + lastTableindex)

    $(".upload-board").css("display", "block");
    console.log("이미지 연결")

}

function boardFileUpload(f) {
    let file = f.files;

    let tableIndex = 0;
    for (let i = 0; i < file.length; i++) {

        if (lastTableindex == 0) {
            tableIndex = i + 1;
        } else {
            tableIndex = lastTableindex + i;
        }
        lastTableindex = tableIndex + 1;

        let src = URL.createObjectURL(file[i]);

        let html =
            // "<tr><td><input type='checkbox' name='upload-thumb-check' class='upload-thumb-check' id='upload-thumb-check" + tableIndex + "' value='" + i + "'><label for='upload-thumb-check" + tableIndex + "'></td></tr>" +
            "<div>" + file[i].name + "</div><br>"
        $(".board-thumb-box").append(html);
        console.log("id값 확인" + tableIndex);
        console.log("이미지 연결")
    }
}

// 전체 선택, 전체 해제
// $('input[name=upload-board-check-all]').on('change', function () {
//     $('input[name=upload-board-check]').prop('checked', this.checked);
// });


// 모든 파일 삭제
function deleteFileAll() {
    console.log("개수" + $(".thumb-box").children().length)
    $(".upload-board .thumb-box").children().remove();
    $("#custom-file-input").value = "";
    // $('input[name=upload-thumb-check]:checked').parent().remove();
    console.log("삭제됨")
    // 더 이상 삭제할 것이 없으면 썸네일 목록 화면에서 감춤
    // if ($(".thumb-box").children().length == 0) {
    //     $(".upload-board").css("display", "none");
    // }
}

function deleteBoardFileAll() {
    $(".upload-board .board-thumb-box").children().remove();
    $("#custom-file-input").value = "";
}

// 체크한 파일 삭제
function deleteFileChecked() {

    let remainFile = $(".thumb-box").val();
    $('input[name=upload-thumb-check]:checked').parent().remove();
    let fileValue = $('input[name=upload-thumb-check]:checked').val();
    console.log("이미지 삭제" + fileValue);
    // $('input[name=upload-thumb-check]:checked').parent().value = "";
    console.log("파일 삭제");
    console.log("뭐가 남았나" + remainFile);
}

function checkBoardFile(f) {
    checkFileSize(f);
    boardFileUpload(f);
}

$.fn.fileUploader = function (filesToUpload, sectionIdentifier) {
    var fileIdCounter = 0;

    this.closest(".files").change(function (evt) {
        var output = [];

        for (var i = 0; i < evt.target.files.length; i++) {
            fileIdCounter++;
            var file = evt.target.files[i];
            var fileId = sectionIdentifier + fileIdCounter;

            filesToUpload.push({
                id: fileId,
                file: file
            });

            var removeLink = "<a class=\"removeFile\" href=\"#\" data-fileid=\"" + fileId + "\">Remove</a>";

            output.push("<li><strong>", escape(file.name), "</strong> - ", file.size, " bytes. &nbsp; &nbsp; ", removeLink, "</li> ");
        }
        ;

        $(this).children(".fileList")
            .append(output.join(""));

        //reset the input to null - nice little chrome bug!
        evt.target.value = null;
    });

    $(this).on("click", ".removeFile", function (e) {
        e.preventDefault();

        var fileId = $(this).parent().children("a").data("fileid");

        // loop through the files array and check if the name of that file matches FileName
        // and get the index of the match
        for (var i = 0; i < filesToUpload.length; ++i) {
            if (filesToUpload[i].id === fileId)
                filesToUpload.splice(i, 1);
        }

        $(this).parent().remove();
    });

    this.clear = function () {
        for (var i = 0; i < filesToUpload.length; ++i) {
            if (filesToUpload[i].id.indexOf(sectionIdentifier) >= 0)
                filesToUpload.splice(i, 1);
        }

        $(this).children(".fileList").empty();
    }

    return this;
};

(function () {
    var filesToUpload = [];

    var files1Uploader = $("#files1").fileUploader(filesToUpload, "files1");
    var files2Uploader = $("#files2").fileUploader(filesToUpload, "files2");
    var files3Uploader = $("#files3").fileUploader(filesToUpload, "files3");

    $("#uploadBtn").click(function (e) {
        e.preventDefault();

        var formData = new FormData();

        for (var i = 0, len = filesToUpload.length; i < len; i++) {
            formData.append("files", filesToUpload[i].file);
        }

        $.ajax({
            url: "http://requestb.in/1k0dxvs1",
            data: formData,
            processData: false,
            contentType: false,
            type: "POST",
            success: function (data) {
                alert("DONE");

                files1Uploader.clear();
                files2Uploader.clear();
                files3Uploader.clear();
            },
            error: function (data) {
                alert("ERROR - " + data.responseText);
            }
        });
    });
})()

// 파일 등록시 파일 추가

let files = {};
let previewIndex = 0;

function addPreview(input) {
    if (input[0].files) {
        for (let fileIndex = 0; fileIndex < input[0].files.length; fileIndex++) {
            let file = input[0].files[fileIndex];

            let reader = new FileReader();
            reader.onload = function (img) {
                let imgNum = previewIndex++;
                $("#preview").append(
                    "<div class=\"preview-box\" value=\"" + imgNum + "\">"
                    + "<img class=\"thumnail\" src= \"" + img.target.result + "\"\ style='width: 150px'/>"
                    + "<p>"
                    + file.name
                    + "</p>"
                    + "<a href=\"#\" value=\"" + imgNum + "\" onclick=\"deletePreview(this)\">"
                    + "삭제" + "</a>" + "</div>"
                );
                files[imgNum] = file;
            };
            reader.readAsDataURL(file);
        }
    } else {
        alert("올바르지 않은 입력입니다.");
    }
}

// 삭제 버튼 클릭시 미리보기 이미지 영역 삭제
function deletePreview(obj) {
    let imgNum = obj.attributes['value'].value;
    console.log(imgNum);
    delete files[imgNum];
    console.log(files);
    $("#preview .preview-box[value=" + imgNum + "]").remove();
}

$(document).ready(function() {
        $("#preview").on('change', function(){
        let form = $("#register_form")[0];
        let formData = new FormData(form);

        for (let index = 0; index<Object.keys(files).length; index++){
            formData.append('files',files[index]);
        }

        $.ajax({
            type : 'POST',
            url : '../php/record_regist.html.php',
            data:formData,
            success : function(result){
                console.log("성공");
            }
        })
    })
})

$("#attach input[type=file]").change(function () {
    console.log("작동")
    addPreview($(this));
});