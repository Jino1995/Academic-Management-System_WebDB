# 학사관리 시스템

# 프로젝트 계획
![20221001_214205](https://user-images.githubusercontent.com/74805177/193410183-91010ba4-a392-4f0e-8dbc-db52b0b0216f.png)

* ### 1주차 ~ 2주차   
 #### 학사관리 시스템 프로젝트를 계획하고 구상

<br>

* ### 3주차 ~ 5주차
 #### 학사시스템의 내부 시스템들을 파악하고, 사용자들을 분석하여 시스템 분석서를 산출
 #### 학사관리 시스템 시스템 분석서를 바탕으로 요구사항 분석서를 산출

<br>

* ### 6 ~ 10주차<br/>
 #### 학사관리 요구사항 분석서를 바탕으로 설계서 산출

<br>

* ### 8주차 ~ 14주차<br/>
 #### 각 팀원들이 만든 프로그램을 구현, 테스트를 하고 부족한 부분을 보완 및 디버깅

<br>

------------------------------------------------------------------------------------------

<br>

# 요구사항 분석
## 1. 학적관리 시스템
![image001](https://user-images.githubusercontent.com/74805177/193410635-c54a3f3a-d634-4c88-b3f3-39cc00043fe2.png)
![스장](https://user-images.githubusercontent.com/74805177/193411356-8f4ac3bf-55f6-457c-835d-f48e0b1c47f3.png)
<br><br>
## 2. 성적관리 시스템
![image003](https://user-images.githubusercontent.com/74805177/193411088-c3aaff86-d034-428e-ae01-4c58f3175379.png)
![20221001_221442](https://user-images.githubusercontent.com/74805177/193411298-1e52fbb0-b13f-40dd-b3cf-7485072b20f9.png)
<br><br>
## 3. 수업관리 시스템
![image005](https://user-images.githubusercontent.com/74805177/193411402-799a6a66-f69f-453e-b1f1-fb3354ec50ea.png)
![Last](https://user-images.githubusercontent.com/74805177/193411544-d35b236e-457b-4faa-8898-efff1def36d4.png)

<br>

------------------------------------------------------------------------------------------

<br>

# DB 설계서
![20221001_222804](https://user-images.githubusercontent.com/74805177/193411780-f224240d-0065-426e-89bd-4237edbf3a82.png)

<br>

### 학생 테이블
![1](https://user-images.githubusercontent.com/74805177/193412037-284185b6-f066-4392-a68b-92d81f166793.png)
<br><br>
### 교수 테이블
![2](https://user-images.githubusercontent.com/74805177/193412216-2fb1c102-8286-48b3-8361-e4ba4c8d61c9.png)
<br><br>
### 관리자 테이블
![3](https://user-images.githubusercontent.com/74805177/193412311-aa3f502a-5bed-4b8a-9b0c-afaaf3200ccf.png)
<br><br>
### 강의 계획서 테이블
![4](https://user-images.githubusercontent.com/74805177/193412385-01c3f1b8-24a1-4ca2-9e75-26a924aa5a73.png)
<br><br>
### 강의 테이블
![5](https://user-images.githubusercontent.com/74805177/193412426-84f83601-c38c-43a5-9cc3-e2a2bd6d13e0.png)
<br><br>
### 학과 테이블
![6](https://user-images.githubusercontent.com/74805177/193412510-a2d42bf0-1698-4954-8600-fd1d31c0e49e.png)
<br><br>
### 대학 테이블
![7](https://user-images.githubusercontent.com/74805177/193412563-a9d29133-4d53-45b0-b4dc-8f23a2eb710c.png)
<br><br>
### 신청서 테이블
![8](https://user-images.githubusercontent.com/74805177/193412695-5dbef8ac-0e85-46d0-a425-226e574972d4.png)
<br><br>
### 로그인 테이블
![9](https://user-images.githubusercontent.com/74805177/193412753-40b4a87a-b8f3-4aea-a00b-59f8a54b3d4f.png)
<br><br>

<br>

------------------------------------------------------------------------------------------

<br>

# Sequence Diagram
## 1. 학생
### <수강 신청>
![image007](https://user-images.githubusercontent.com/74805177/193412851-48bf2bfa-0c4e-433d-b872-dd0087645301.png)
### <휴학/복학 신청>
![image009](https://user-images.githubusercontent.com/74805177/193412865-34d4fbe3-26e9-402e-8d2c-b51bd8dbb28d.png)
### <학적 조회>
![image011](https://user-images.githubusercontent.com/74805177/193412877-6639434c-2aca-49c9-aded-321b435c2e4c.png)
### <성적 조회>
![image013](https://user-images.githubusercontent.com/74805177/193412891-ce669379-90f1-42fe-a546-e36e4bf1ba17.png)

<br><br>

## 2. 교수
### <강의 개설>
![image015](https://user-images.githubusercontent.com/74805177/193413079-da647b52-4424-4a73-b4b8-e93a24e58841.png)
### <성적 입력>
![image017](https://user-images.githubusercontent.com/74805177/193413084-bf2008ff-7d20-4739-8656-774849e0daaa.png)
### <강의계획서 조회>
![image019](https://user-images.githubusercontent.com/74805177/193413094-ab0ed434-0ec4-4963-891a-2b4cf3dab549.png)
### <강의계획서 입력,수정>
![image021](https://user-images.githubusercontent.com/74805177/193413101-6e01d199-eefa-4e9f-9a06-58a66aaa0b75.png)

<br><br>

## 3. 관리자
### <학생 학적 조회>
![image023](https://user-images.githubusercontent.com/74805177/193413152-2b96782a-2d08-47e0-8b3a-9b7a015b628f.png)
### <신청서 처리>
![image025](https://user-images.githubusercontent.com/74805177/193413178-0bbebe5a-a85d-486d-8fe5-f2ddcfc92ce2.png)

<br>

------------------------------------------------------------------------------------------

<br>

# 기능
## 1. 학생
![image027](https://user-images.githubusercontent.com/74805177/193413229-9fb0aceb-850f-4bf4-8fc2-e6a34bb51e43.png)
학생은 로그인하면 자기 학적을 조회할 수 있다.

<br>

![image029](https://user-images.githubusercontent.com/74805177/193413269-95742e4b-f639-4aac-8bd8-f6d0b9326c8f.png)
학생은 자신이 신청한 휴학신청을 확인할 수 있고 만약 신청을 하지 않은 상태이면 신청서를 작성할 수 있다.

<br>

![image031](https://user-images.githubusercontent.com/74805177/193413302-1f9872ed-d91e-4086-83e2-5d6536cf7e79.png)
학생은 자신이 신청한 복학신청을 확인할 수 있고 만약 신청을 하지 않은 상태이면 신청서를 작성 할 수 있다.

<br>

![image033](https://user-images.githubusercontent.com/74805177/193413328-e88e0a48-4979-4aae-ab57-10bc18800d6a.png)
학생은 수강신청을 할 수 있고 강의계획서를 조회할 수 있다.

<br>

![image035](https://user-images.githubusercontent.com/74805177/193413353-c64ed801-8e98-4ee2-ba89-78bb9d261c4e.png)
학생은 자신이 신청한 수강목록 중에 철회 하고 싶은 과목을 취소할 수 있다.

<br>

![image037](https://user-images.githubusercontent.com/74805177/193413382-750d43fa-fbcb-4bea-abae-f39c2a0848f3.png)
학생은 자신이 수강한 과목에 대한 성적을 조회할 수 있다.

<br>

![image039](https://user-images.githubusercontent.com/74805177/193413422-b73343fc-fbd2-46aa-8796-1ca3c182b2c1.png)
학생은 확정성적조회를 할 수 있으며 학기별 성적조회 총 성적 조회를 할 수 있다.

<br><br>

## 2. 교수
![image041](https://user-images.githubusercontent.com/74805177/193413438-30ac9d40-bb31-4564-b8ee-d42c4c014d29.png)
강의개설화면에서 강의정보를 입력하여 개설한다.

<br>

![image043](https://user-images.githubusercontent.com/74805177/193413461-a2c21e26-5411-45e3-b216-0956d5f44578.png)
성적입력을 누르면 현재 개설된 강의들의 버튼이 표시된다.

<br>

![image045](https://user-images.githubusercontent.com/74805177/193413474-806be681-cee4-40e5-97c2-50f7efd9bc86.png)
성적입력에서 강의를 선택하면 해당 강의의 학생 학번과 성적이 표시되며, 성적 입력란에 성적을 입력하여 입력, 수정을 할 수 있다.

<br>

![image047](https://user-images.githubusercontent.com/74805177/193413496-c98b6f0f-0a5f-4e0b-b66d-25924d0d2e58.png)
강의계획서 조회 또는 입력을 누르면 현재 개설된 강의들의 버튼이 표시된다.

<br>

![image049](https://user-images.githubusercontent.com/74805177/193413510-56e41cc7-2eec-4be9-b867-445339043ada.png)
강의를 선택하여 강의계획서 양식에 따라 입력, 수정할 수 있다.

<br>

![image051](https://user-images.githubusercontent.com/74805177/193413538-8fa21f7d-3e38-4515-92a4-1996d655324c.png)
강의를 선택하여 강의계획서를 조회할 수 있다.

<br>

![image053](https://user-images.githubusercontent.com/74805177/193413570-f40b004f-dd75-47c5-bdf9-9b2766f434d2.png)
![image055](https://user-images.githubusercontent.com/74805177/193413574-658ee9b7-b4b0-45d2-b1ba-00eab1594c74.png)
이미 개설된 강의와 중복된 강의명의로 개설할 수 없다.

<br><br>

## 3. 관리자
![image057](https://user-images.githubusercontent.com/74805177/193413602-b60249c7-8015-4147-a713-562629f7a07c.png)
관리자는 학생현황에 있는 학생들에 대해서 학적을 조회 할 수 있는 기능이 있다.

<br>

![image059](https://user-images.githubusercontent.com/74805177/193413615-4a7a1e31-c39a-45d8-b35b-7c0fbf870188.png)
관리자는 휴학신청서, 복학신청서를 작성한 학생들의 현황을 확인 할 수 있고 휴학과 복학의 승인과 미승인 처리 할 수 있다.
