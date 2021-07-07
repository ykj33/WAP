# WAP(Wonpyeong Archive Platform) 개발을 위한 git환경 구축

0. 개요
- WAP 개발에 참여하는 인원을 위한 문서로, 윈도우 명령 프롬프트(= cmd)를 이용해서 git을 사용
- git bash 혹은 자주 사용하는 개발 환경(Visual Studio Code, PHP Storm 등)에서 자체적으로 git을 연동하여 사용하여도 괜찮음

1. git 다운로드 및 설치
- https://git-scm.com/ 에 접속하여 git 다운로드 후 설치
- 설치 시 다음버튼만 눌러 일단 설치해도 무방


2. git 설정
- cmd 창을 켜서
`git --version`
입력하여 현재 git이 설치되었는지, 어떤 버전인지 확인

- git은 특정 디렉토리에 대한 변경 이력을 추적하여 버전 관리를 하기 때문에 버전 관리를 할 위치를 지정하는 것이 필요(= 앞으로 작업을 할 폴더라고 생각하면 편함)

- cd 를 이용하여 작업할 위치로 이동

- `git init`
을 입력하여 현재 위치를 git이 추적하도록 함

- `git config --global core.autocrlf true`
를 입력하여 개행문자 설정(OS 별로 개행문자를 처리하는 방식이 다르기 때문)

3. github 가입
- 인터넷 브라우저를 켜서 https://github.com/ 에 접속하여 계정 생성
- github은 로컬에서만 관리되는 git의 원격저장소로, 브라우저 단에서 자유롭게 사용가능

- 가입을 완료하였을 경우 다시 cmd 창으로 돌아와서

`git config --global user.name 'github에 입력한 이름'`
`git config --golbal user.email 'github에 입력한 이메일'`
을 입력하여 설정 완료

- `git config --global --list`
를 입력하여 제대로 설정이 되었는지 확인


4. git 사용
- git의 경우 변경이력 감지 - 추적 - 커밋 - 푸쉬의 4단계
- add - commit - push의 4단계를 기억하자

- 변경이 일어난 경우 
`git status`
를 입력하여 현재 추적 상황 확인
- 파일 이름이 초록색일 경우 추적하고 있는 것이며 빨간색일 경우 아직 추적하지 않고 있는 상황

- `git add .`
(맨 뒤에는 마침표)을 입력하여 추적되지 않고 있는 파일을 추적

- `git commit -m "입력할 커밋 메시지"`
를 입력하여 추적한 변경사항을 커밋
- " " 안의 커밋 메시지는 "20210706 ~~~ 기능 추가"와 같이 8자리 날짜 + 변경 내용 작성 권장

- 이렇게 되면 로컬에서만 버전관리가 되고 있으므로 원격저장소인 github에도 저장이 필요
`git remote add origin https://github.com/ykj33/WAP.git`
을 입력하여 원격 저장소 연결
- 한번 연결해두면 앞으로도 계속 사용할 수 있다.

- `git push origin master`
를 입력하여 로컬에 커밋된 내용을 원격 저장소에 저장

- github에 들어가서 제대로 푸쉬되었는지 확인 가능

5. git pull로 동기화
- github은 여러 사람이 이용하므로 파일의 변경이 지속적으로 일어남
- 내가 작업하기 전에 변경 사항을 동기화하지 않으면 충돌이 일어날 수 있으므로
`git pull`
을 입력하여 그동안의 변경사항을 내려 받음
- (git pull이 되어 있지 않으면 git push가 되지 않음. 그러나 그 전에 pull을 받아서 미리 동기화시킨 이후 작업하도록 하자.

