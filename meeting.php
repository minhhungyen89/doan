<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='icon' href="icon.jpg" type image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title> Cuộc họp nhóm </title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@0.20.0/dist/axios.min.js"></script>
    <script src="https://cdn.stringee.com/sdk/web/2.2.1/stringee-web-sdk.min.js"></script>
    <style>
    .bi{
        font-size:150%;
    }
    .bi#hover{
        curson:point;
    }</style>
</head>
<?php session_start();
if(!isset($_SESSION['ten_dang_nhap'])){}
  // echo '<script language="javascript">window.location.href = "eror.php";</script>';}
if(isset($_SESSION['ten_dang_nhap'])){
    $ten_dang_nhap = $_SESSION['ten_dang_nhap'];}?>
<body>
<div class="container-fluid ">
<div class="container has-text-centered" v-cloak id="app">

      <div>
        <button class="button is-primary" v-if="!room" @click="createRoom">
          Tạo Meeting
        </button>

        <button class="button is-info" v-if="!room" @click="joinRoom">
          Join Meeting
        </button>

        <button class="button is-info" v-if="room" @click="publish(true)">
          Share Desktop
        </button>
      </div>

      <div v-if="roomId" class="info">
        <p>Bạn đang ở trong room <strong>{{roomId}} </strong>.</p>
        <!-- <p>
          Gửi link này cho bạn bè cùng join room nhé
          <a v-bind:href="roomUrl" target="_blank">{{roomUrl}}</a>.
        </p> -->
        <p>Hoặc bạn cũng có thể copy <code>{{roomId}}</code> để share.</p>
      </div>
    </div>
    <div id="videos"> </div>
    <video id="remoteVideo" autoplay style="height: 360px;"></video>
    <div class="row">
            <div class="col" id="action-buttons">
                <!-- <button id="callButton" class="btn btn-success">Call</button> -->
                <button id="answerCallButton" class="btn btn-info hidden-first">Answer Call</button>
                <button id="rejectCallButton" class="btn btn-warning hidden-first">Reject Call</button>
                <button id="endCallButton" class="btn btn-danger hidden-first">End Call</button>
            </div>
            
        </div>
<!-- <div class="d-flex justify-content-end">
    <div class="p-1 border" style="width:50px;"><i class="bi bi-mic"></i></div>
    <div class="p-1 border" style="width:50px;"><i class="bi bi-camera-video"></i></div>
    <div class="p-1 border" style="width:50px;"> <i class="bi bi-arrow-up-square"></i></div>
    <div class="p-1 border" style="width:50px;">  <i class="bi bi-telephone-x"></i> </div>
</div>
<div class="d-flex flex-wrap bg-light" style='max-height:200px;'>
  <div class="col-sm-1 border pl-1 m-1"><img src="icon.jpg" class="rounded-circle img-fluid mt-1"></div>
  <div class="col-sm-1 border pl-1 m-1"><img src="icon.jpg" class="rounded-circle img-fluid mt-1"></div>
  <div class="col-sm-1 border pl-1 m-1"><img src="icon.jpg" class="rounded-circle img-fluid mt-1"></div>
  <div class="col-sm-1 border pl-1 m-1"><img src="icon.jpg" class="rounded-circle img-fluid mt-1"></div>
  <div class="col-sm-1 border pl-1 m-1"><img src="icon.jpg" class="rounded-circle img-fluid mt-1"></div>
  <div class="col-sm-1 border pl-1 m-1"><img src="icon.jpg" class="rounded-circle img-fluid mt-1"></div>
  <div class="col-sm-1 border pl-1 m-1"><img src="icon.jpg" class="rounded-circle img-fluid mt-1"></div>
  <div class="col-sm-1 border pl-1 m-1"><img src="icon.jpg" class="rounded-circle img-fluid mt-1"></div>
  <div class="col-sm-1 border pl-1 m-1"><img src="icon.jpg" class="rounded-circle img-fluid mt-1"></div>
  <div class="col-sm-1 border pl-1 m-1"><img src="icon.jpg" class="rounded-circle img-fluid mt-1"></div>
  <div class="col-sm-1 border pl-1 m-1"><img src="icon.jpg" class="rounded-circle img-fluid mt-1"></div>
  <div class="col-sm-1 border pl-1 m-1"><img src="icon.jpg" class="rounded-circle img-fluid mt-1"></div>
  <div class="col-sm-1 border pl-1 m-1"><img src="icon.jpg" class="rounded-circle img-fluid mt-1"></div>
</div>
<div class="row p-2" style='height: 190px;'>
  <div class="col-sm-3 border">.col-sm-3</div>
  <div class="col-sm-3 border">.col-sm-3</div>
  <div class="col-sm-3 border">.col-sm-3</div>
  <div class="col-sm-3 border">.col-sm-3</div>
</div>
<div class="row p-2" style='height: 180px;'>
  <div class="col-sm-3 border">.col-sm-3</div>
  <div class="col-sm-3 border">.col-sm-3</div>
  <div class="col-sm-3 border">.col-sm-3</div>
  <div class="col-sm-3 border">.col-sm-3</div>
</div>
<div>  -->
</body>
<script>   const userId = <?php echo json_encode($ten_dang_nhap); ?>; </script>
<script src="api.js"></script>
<script src="script.js" defer></script>

</html>