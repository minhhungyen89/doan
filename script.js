const videoContainer = document.querySelector("#videos");
const vm = new Vue({
  el: "#app",
  data: {
    userToken: "",
    roomId: "",
    roomToken: "",
    room: undefined,
    client: undefined,
  },
  computed: {
    roomUrl: function() {
      return `https://${location.hostname}doan/meeting.php?groupID=${this.roomId}`;
    }
  },
  async mounted() {
    api.setRestToken();
  },
  methods: {
    // Hàm xác thực người dùng
    authen: async function() {
      return new Promise(async(resolve) =>{
        const userToken = await api.getUserToken(userId);
        this.userToken = userToken;
        const client = new StringeeClient();
        client.on('authen', (result) => {
          console.log('on authen', result);
          resolve(result);
        })
        client.connect(userToken);
        this.client = client;
        // currentCall = new StringeeCall(client, userId, "minh89", true);
        // settingCallEvent(currentCall, videos, remoteVideo, callButton, answerCallButton, endCallButton, rejectCallButton);
      })},
      // Hiển thị webcam
    publish: async function(screenSharing = false) {
      const localTrack = await StringeeVideo.createLocalVideoTrack(this.client,
        {
          audio: true,
          video: true,
          screen: screenSharing,
          videoDimensions: { width: 500, height: 500 }
        });
        
      const videoElement = localTrack.attach();
      videoContainer.appendChild(videoElement);
      // this.addVideo(videoElement);

      const roomData = await StringeeVideo.joinRoom(
        this.client,
        this.roomToken,
      );
      const room = roomData.room;
      console.log({ roomData, room });
      
      this.room = room;
      room.clearAllOnMethos();
    room.on('addtrack', async function (event) {
      const trackInfo = event.info.track;
      if (trackInfo.serverId === localTrack.serverId) {
        return;
      }
      this.subscribeTrack(trackInfo);
    });
    room.on("removetrack", (event) => {
      if (!event.track) {
        return}
      const elements = event.track.detach();
      elements.forEach(element => element.remove());})
      roomData.listTracksInfo.forEach(trackInfo => this.subscribeTrack(trackInfo))
      room.publish(localTrack);
    //   if (!this.room) {
    //     this.room = room;
    //     room.clearAllOnMethos();
    //     room.on("addtrack", e => {
    //       const track = e.info.track;

    //       console.log("addtrack", track);
    //       if (track.serverId === localTrack.serverId) {
    //         console.log("local");
    //         return;
    //       }
    //       this.subscribe(track);
    //     });
    //     room.on("removetrack", e => {
    //       const track = e.track;
    //       if (!track) {
    //         return;
    //       }

    //       const mediaElements = track.detach();
    //       mediaElements.forEach(element => element.remove());
    //     });

    //     // Join existing tracks
    //     roomData.listTracksInfo.forEach(info => this.subscribe(info));
    //   }

    //   await room.publish(localTrack);
    //   console.log("room publish successful");
    },    // Tạo room id, room
    createRoom: async function() {
      const room = await api.createRoom();
      const roomToken = await api.getRoomToken(room.roomId);
      this.roomId = room.roomId;
      this.roomToken = roomToken;
      await this.authen();
      await this.publish();
    },
    joinRoom: async function() {
      const roomId = prompt("Dán Room ID vào đây nhé!");
      if (!roomId) {
           return;
          }
      const roomToken = await api.getRoomToken(roomId);
      this.roomId = roomId;
      this.roomToken = roomToken;
      await this.authen();
      await this.publish();
    },
    subscribeTrack: async function(trackInfo) {
      const track = await this.room.subscribe(trackInfo.serverId);
    track.on('ready', () => {
      const ele = track.attach();
      videoContainer.appendChild(ele);
    });  }
    // joinWithId: async function() {
    //   
    //  
    // },
    // subscribe: async function(trackInfo) {
    //   
    //   track.on("ready", () => {
    //     const videoElement = track.attach();
    //     this.addVideo(videoElement);
    //   });
    // },
    // addVideo: function(video) {
    //   video.setAttribute("controls", "true");
    //   video.setAttribute("playsinline", "true");
    //   videoContainer.appendChild(video);
    // }
  }
});
